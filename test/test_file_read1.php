<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 *
 */

//kill this test script since it's now on the production server and could interfere with things if run by accident
die();

require_once("SDSM_FileManagement.php");

$FM = new SDSM_FileManagement();

//print_r($FM->Get_Current_TLD());

$FM->Advance_TLD_List_Position();

//print_r($FM->Get_Current_TLD());

//print_r($FM->Get_Main_Index_Array());

//print_r($FM->Get_Data_File_Contents_Array("1.txt"));