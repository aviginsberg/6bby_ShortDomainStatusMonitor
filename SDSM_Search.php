<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */

require_once("SDSM_FileManagement.php");

class SDSM_Search {

    public $FM2;
    protected $Main_Index;

    //constructor
    public function __construct() {
        $this->FM2 = new SDSM_FileManagement();
    }


    function CheckIfAvailable(){
        $this->Main_Index = $this->FM2->Get_Main_Index_Array();
        return TRUE;
    }




}