<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */

require_once("SDSM_FileManagement.php");

class SDSM_Search {

    public $FM2;
    protected $Main_Index,$Data_File_Contents;

    //constructor
    public function __construct() {
        $this->FM2 = new SDSM_FileManagement();
    }

    function Find_Data_File_By_Domain($domain){

        //print_r($this->Main_Index = $this->FM2->Get_Main_Index_Array());
        $this->Main_Index = $this->FM2->Get_Main_Index_Array();

        if(strlen($domain)>2){
            array_shift($this->Main_Index);
            array_shift($this->Main_Index);
        }

        foreach($this->Main_Index as $index_item){
           // echo strcmp($domain,$index_item[0]). " $domain " .$index_item[0]."\n";
            if(strcmp($domain,$index_item[0])<0){

                return $index_item[1];
            }
        }

    }

    function CheckIfAvailable($domain,$tld){
        $this->Data_File_Contents = $this->FM2->Get_Data_File_Contents_Array($this->Find_Data_File_By_Domain($domain));

        if(in_array($tld,$this->Data_File_Contents[$domain])){
            return TRUE;
        }else{
            return FALSE;
        }


    }




}