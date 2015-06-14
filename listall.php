<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/style.css">
    <title>6b.by ShortDomainStatusMonitor</title>
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<div class="container">

    <header class="header clearfix">
        <div class="logo">6b.by ShortDomainStatusMonitor</div>

        <nav class="menu_main">
            <ul>
                <li><a href="http://sdsm.6b.by/">Home</a></li>
                <li ><a href="http://sdsm.6b.by/howitworks.php">How it Works</a></li>
            </ul>
        </nav>
    </header>

    <? $tld = $_GET['TLD']; if(!preg_match('/^[a-z]{2}$/',$tld)){die("invalid TLD");} ?>

    <div class="info">
        <article class="hero clearfix">
            <div class="col_100">
                <h1>All available domains for .<? echo $tld; ?></h1>

            </div>
        </article>


        <article class="article clearfix">





            <div class="col_100">

                    <p class="col_100">
                        <?

                        require_once("SDSM_FileManagement.php");
                        $FM_L = new SDSM_FileManagement();


                        $bucketcount = $FM_L->Get_Number_Of_Items_In_TLD_Bucket($tld);



                        for($i = 1; $i <= $bucketcount; $i++){

                            $current_tld_bucket_data = $FM_L->Get_TLD_Bucket_List_Contents_By_Number($tld,$i);
                            //print_r($current_tld_bucket_data);
                            foreach ($current_tld_bucket_data as $domain){
                                echo $domain." ";

                                //echo str_replace($domain, "\n", " ");
                            }
                        }


                        ?>
                    </p>



            </div>





            <div class="clearfix"></div>




        </article>
    </div>

    <footer class="footer clearfix">

        <font style="font-size:.7em;"><u>Credits:</u><br>Web Layout CSS by Renat Rafikov (cssr.ru) | Whois AvailabilityService PHP Class by Helge Sverre | Everything else was created by Avi Ginsberg | Full code available on <a href="https://github.com/aviginsberg/6bby_ShortDomainStatusMonitor">Github</a></font>





    </footer>

</div>
</body>
</html>