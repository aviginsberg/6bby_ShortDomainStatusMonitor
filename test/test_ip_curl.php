<?php


$url = "https://wtfismyip.com/text";

//echo "Curling: $url";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_INTERFACE, "23.226.132.212");
curl_setopt($ch, CURLOPT_URL, $url);


$source = curl_exec($ch);

curl_close($ch);

print_r($source);