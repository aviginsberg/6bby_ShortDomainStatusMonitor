<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */

//kill this test script since it's now on the production server and could interfere with things if run by accident
die();

$tlds = file("all_2_3_char.txt");

foreach($tlds as $tld){
    $tld = trim($tld);
    mkdir("../data/tld_buckets/$tld");
}
