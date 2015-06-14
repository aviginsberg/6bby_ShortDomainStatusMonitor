<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */

$tlds = file("all_2_3_char.txt");

foreach($tlds as $tld){
    $tld = trim($tld);
    mkdir("../data/tld_buckets/$tld");
}
