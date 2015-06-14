<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */
require_once("SDSM_FileManagement.php");
require_once("AvailabilityService.php");


class SDSM_DomainChecking {

    //variable definitions
    public $FM1, $DAC1;
    private $Current_TLD, $Current_Data_Set, $Current_Bucket_List, $Main_Index;


    //constructor
    public function __construct() {
        $this->FM1 = new SDSM_FileManagement();
        $this->Main_Index = $this->FM1->Get_Main_Index_Array();
        $this->DAC1 = new HelgeSverre\DomainAvailability\AvailabilityService(true);
        $this->Current_Bucket_List = Array();
    }


    function Check_ALL_For_Current_TLD_and_Adv_To_Next()
    {
        //load up the current TLD we are checking
        $this->Current_TLD = $this->FM1->Get_Current_TLD();

        //make a copy of the main index to use as our progress marker
        $Current_Temp_Index = $this->Main_Index;

        //if our current TLD is only supporting 3 chars, remove the first 2 entries from our progress marker index
        if($this->Current_TLD[1]==3){
            array_shift($Current_Temp_Index);
            array_shift($Current_Temp_Index);
        }

        //clear TLD bucket to start fresh
        $this->FM1->Clear_TLD_Bucket($this->Current_TLD[0]);

        //iterate thru each data set
        while(count($Current_Temp_Index)>0){

            $this->Current_Data_Set = $this->FM1->Get_Data_File_Contents_Array($Current_Temp_Index[0][1]);
            //iterate thru the current data set lines and check each
            foreach($this->Current_Data_Set as $key_domain => $value_tlds){
                //first check by ping
                if(!$this->CheckByPing($key_domain.".".$this->Current_TLD[0])){
                    //site didn't respond to ping so now check by API
                    if($this->CheckByWhois($key_domain.".".$this->Current_TLD[0])){
                        //domain is available!

                        //add it to the TLD bucket list because we cleared it and are making a fresh list
                        $this->Add_To_TLD_Bucket_List($this->Current_TLD[0],$key_domain);

                        //if it's not already in the Current_Data_Set array add it!
                        if(!in_array($this->Current_TLD[0],$this->Current_Data_Set[$key_domain])){
                            array_push($this->Current_Data_Set[$key_domain],$this->Current_TLD[0]);
                        }
                    }else{
                        //domain is not available per API. make sure its not in the data file.
                        if(in_array($this->Current_TLD[0],$this->Current_Data_Set[$key_domain])){
                            $this->Current_Data_Set[$key_domain] = array_diff($this->Current_Data_Set[$key_domain], array($this->Current_TLD[0]));
                        }
                    }
                }else{
                    //domain is not available because it responded to ping. make sure its not in the data file.
                    if(in_array($this->Current_TLD[0],$this->Current_Data_Set[$key_domain])){
                        $this->Current_Data_Set[$key_domain] = array_diff($this->Current_Data_Set[$key_domain], array($this->Current_TLD[0]));
                    }
                }

                //testing!!!
                //$this->FM1->Write_Data_File_Contents_Array($Current_Temp_Index[0][1],$this->Current_Data_Set);
               // print_r($this->Current_Data_Set);


            }

            //testing
            print_r($this->Current_Data_Set);

            //write the check results back to the file
            $this->FM1->Write_Data_File_Contents_Array($Current_Temp_Index[0][1],$this->Current_Data_Set);

            //we finished checking the data set so we remove it from the index and go to the next
            array_shift($Current_Temp_Index);
        }


        ///***we finished iterating thru all of the data sets for the current TLD
        //write the rest of the Current TLD bucket list out to file
        $this->Write_Current_TLD_Bucket_List_To_File($this->Current_TLD[0]);

        //advance to next TLD
        $this->FM1->Advance_TLD_List_Position();



    }

    function Add_To_TLD_Bucket_List($tld,$domain){


        array_push($this->Current_Bucket_List,$domain.".".$tld."\n");

        if(count($this->Current_Bucket_List)>499){
            $this->Write_Current_TLD_Bucket_List_To_File($tld);
        }


    }

    function Write_Current_TLD_Bucket_List_To_File($tld){
        if(count($this->Current_Bucket_List)>0){
            $this->FM1->Write_TLD_Bucket_List_To_File($tld,$this->Current_Bucket_List);
            $this->Current_Bucket_List = Array();
        }

    }


    //returns true if domain is AVAILABLE, else returns false
    function CheckByWhois($host){
        if($this->DAC1->isAvailable($host)){
            echo "\nDomain $host is available!\n";
            sleep (0.5);
            return TRUE;
        }else{
            echo "\nDomain $host is NOT available!\n";
            sleep (0.5);
            return FALSE;
        }

    }

    //return TRUE if site responds to ping, else return FALSE
    function CheckByPing($host){

        exec(sprintf('ping -c 1 -W 5 %s', escapeshellarg($host)), $res, $rval);
        return $rval === 0;
    }

}