<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */

class SDSM_FileManagement {

    //returns an array: Pos 0 = TLD, Pos 1 = #chars supported (2 or 3)
    function Get_Current_TLD(){
        return explode(',',file_get_contents("tlds.txt", NULL, NULL, NULL,4));
    }

    //takes the TLD at the top of tlds.txt and puts it at the end of the file
    function Advance_TLD_List_Position(){
        $tld_list = file("tlds.txt");
        array_push($tld_list,array_shift($tld_list));
        file_put_contents("tlds.txt",$tld_list);
    }

    function Get_Main_Index_Array(){
        $Main_Index_Array = Array();

        foreach (file("data/index1.txt") as $indexline){
            array_push($Main_Index_Array,explode(',',$indexline));
        }
        return $Main_Index_Array;
    }



    function Get_Data_File_Contents_Array($file){
        $Data_File_Contents = file("data/".trim($file));
        $Data_File_Array = Array();

        foreach($Data_File_Contents as $Data_File_Line){
            $temp_line_array = explode(',',trim($Data_File_Line));
            $Data_File_Key = array_shift($temp_line_array);


            $Data_File_Array[trim($Data_File_Key)] = $temp_line_array;
        }

        return $Data_File_Array;

    }

    function Write_Data_File_Contents_Array($file,$contents_array){
        $Data_File_Out = Array();
        foreach($contents_array as $domain_key=>$tlds_array){

            $Data_File_Line = $domain_key;
            if(count($tlds_array)>0){
                foreach($tlds_array as $tld){
                    $Data_File_Line .= ",$tld";
                }
            }
            $Data_File_Line .= "\n";

            array_push($Data_File_Out,$Data_File_Line);
        }
        //print_r($Data_File_Out);
        file_put_contents("data/".trim($file),$Data_File_Out);
    }


    function Write_TLD_Bucket_List_To_File($tld,$Current_Bucket_List){
        $fname = count(scandir("data/tld_buckets/$tld"))-1;
        file_put_contents("data/tld_buckets/$tld/$fname.txt",$Current_Bucket_List);

    }

    function Clear_TLD_Bucket($tld){
        $fcount = count(scandir("data/tld_buckets/$tld"))-2;
        if($fcount>0){
            for($x = 0; $x <= $fcount; $x++){
                unlink("data/tld_buckets/$tld/$x.txt");
            }
        }
    }

    function Get_Number_Of_Items_In_TLD_Bucket($tld){
        return count(scandir("data/tld_buckets/$tld"))-2;
    }

    //returns as array
    function Get_TLD_Bucket_List_Contents_By_Number($tld,$listnum){
        return file("data/tld_buckets/$tld/$listnum.txt");
    }


}