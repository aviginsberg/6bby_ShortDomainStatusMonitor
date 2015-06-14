<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/14/15
 */

require_once("SDSM_ProcessManagement.php");

$PM1 = new SDSM_ProcessManagement();

if($PM1->CheckIfProcessDied()){
    echo date("d M y [H:i]"). " Index process isn't running. Starting it!\n";
    $PM1->StartChecker();
}else{
    echo date("d M y [H:i]")." Index process is already running. \n";
}