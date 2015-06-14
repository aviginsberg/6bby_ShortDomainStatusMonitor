<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */

//kill this test script since it's now on the production server and could interfere with things if run by accident
die();

require_once("SDSM_DomainChecking.php");

$DCt = new SDSM_DomainChecking();

while(true){

    $DCt->Check_ALL_For_Current_TLD_and_Adv_To_Next();

}

