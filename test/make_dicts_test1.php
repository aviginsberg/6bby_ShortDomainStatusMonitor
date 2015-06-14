<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 6/13/15
 */
//kill this test script since it's now on the production server and could interfere with things if run by accident
die();

$avail_chars = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

$combos = Array();
$file_names_index = Array();
$file_counter=1;


for ($a=0; $a<36; $a++)
{
    for ($b=0; $b<36; $b++)
    {

            $combo_line =  $avail_chars[$a] . $avail_chars[$b] . $avail_chars[$c]."\n";
            array_push($combos,$combo_line);

            if(count($combos)==648){
                //write our current $combos array to a file
                file_put_contents("$file_counter.txt",$combos);
                echo "\n\nWriting to file $file_counter.txt\nThe contents of the index are:\n";

                //push the file name into our index
                array_push($file_names_index, trim(array_pop($combos)).",$file_counter.txt\n");
                print_r($file_names_index);


                //clear the $combos array
                $combos = Array();

                //increment the file counter
                $file_counter++;


            }

    }
}



for ($a=0; $a<36; $a++)
{
    for ($b=0; $b<36; $b++)
    {
        for ($c=0; $c<36; $c++)
        {
            $combo_line =  $avail_chars[$a] . $avail_chars[$b] . $avail_chars[$c]."\n";
            array_push($combos,$combo_line);

            if(count($combos)==648){
                //write our current $combos array to a file
                file_put_contents("$file_counter.txt",$combos);
                echo "\n\nWriting to file $file_counter.txt\nThe contents of the index are:\n";

                //push the file name into our index
                array_push($file_names_index, trim(array_pop($combos)).",$file_counter.txt\n");
                print_r($file_names_index);


                //clear the $combos array
                $combos = Array();

                //increment the file counter
                $file_counter++;


            }
        }
    }
}


//write our index to the file
file_put_contents("index1.txt",$file_names_index);
?>