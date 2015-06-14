<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */

require_once("SDSM_DomainChecking.php");

class SDSM_ProcessManagement {

    //variable definitions
    public $DC1;

    //constructor
    public function __construct() {
        $this->DC1 = new SDSM_DomainChecking();
    }


    //start the domain checker
    public function StartChecker(){
        file_put_contents("pid.txt",getmypid());
        $this->DC1->CheckAll();
    }


    //check if our last PID is still alive. Return TRUE if dead, FALSE if alive.
    public function CheckIfProcessDied(){
        $pid = trim(file_get_contents("pid.txt"));
        if(!posix_getpgid($pid)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

}