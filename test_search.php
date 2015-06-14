<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/14/15
 */

require_once("SDSM_Search.php");

$S = new SDSM_Search();

$domain = "zj";
$tld = "ee";
//print_r($S->Find_Data_File_By_Domain("z9"));
if($S->CheckIfAvailable($domain,$tld)){
    echo "$domain.$tld is available!!! :)";
}else{
    echo "$domain.$tld is NOT available :(";
}


?>