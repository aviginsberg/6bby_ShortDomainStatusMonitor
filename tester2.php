<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */


require_once("SDSM_ProcessManagement.php");

$t2 = new SDSM_ProcessManagement();



if($t2->CheckIfProcessDied()){
    echo "TRUE";
}else{
    echo "FALSE";
}