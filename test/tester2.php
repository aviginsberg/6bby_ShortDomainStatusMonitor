<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */

//kill this test script since it's now on the production server and could interfere with things if run by accident
die();

require_once("SDSM_ProcessManagement.php");

$t2 = new SDSM_ProcessManagement();



if($t2->CheckIfProcessDied()){
    echo "TRUE";
}else{
    echo "FALSE";
}