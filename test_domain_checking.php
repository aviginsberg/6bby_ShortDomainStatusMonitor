<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */

require_once("SDSM_DomainChecking.php");

$DCt = new SDSM_DomainChecking();

while(true){

    $DCt->Check_ALL_For_Current_TLD_and_Adv_To_Next();

}

