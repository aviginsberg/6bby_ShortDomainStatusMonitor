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
                <li class="active"><a href="http://sdsm.6b.by/howitworks.php">How it Works</a></li>
            </ul>
        </nav>
    </header>



    <div class="info">
        <article class="hero clearfix">
            <div class="col_100">
                <h1>How the SDSM Works</h1>

            </div>
        </article>


        <article class="article clearfix">





            <div class="col_100">

                <h2>Checking & Indexing the Domains</h2>
                <p class="col_100">
                A sorted list of all 2 and 3 alphanumeric character combinations were generated and the list was broken into 74 (text based) data files with 648 entries per file. This was determined to be a reasonable size because if we expand the service to index all 175tlds that support 2 and or 3char domains, at the worst theoretical case (which will never be hit because it would be impossible to have 648 domains available on every tld) a file would be roughtly 343kb. This is small enough to load into an array in main memory and search without a serious performance impact. In actual implementation these files will most likely never be above 100kb in size.
                An index was generated containing 74 lines. Each line has the last entry of the last line in a data file and the corresponding file name. <br>
                For each TLD that is currently supported by the system, the index is loaded and iterated thru. Each Data file is loaded and the combination of the domain entry in the data file with the current TLD is checked.<br>
                The check is performed by first pinging the full FQDN (domain+tld). If the ping is not returned, the whois server for that TLD is queried. If the whois server does not return an answer for that FQDN it is adjudicated that the FQDN is available and the TLD is added to the line in the current data file. <i>Note: for testing purposes the whois querying is currently disabled and the data set in the system is being generated purely based on ping responses.</i><br>
                    Every TLD also has a bucket (folder) of text files, each containing up to 500 entries. If the FQDN is available and hence added to the indexed data file it is also stored in a text file in a bucket for that TLD.
                </p>

                <h2>Listing Available Domains</h2>
                <p class="col_100">
                An list of files in the bucket for the given TLD is generated (using the file system). For each file on the list, the file is opened, the contents are printed out, and the file is closed. This allows us to display large amounts of data without filling up too much memory by opening a single massive file.
                </p>


                <h2>Searching Available Domains</h2>
                <p class="col_100">
                    The index of the data files is opened and searched linearly (by comparing strings) to find the corresponding data file. The data file is then loaded into main memory and the element containing the domain is searched for the presence of the TLD.
                </p>

            </div>





            <div class="clearfix"></div>




        </article>
    </div>

    <footer class="footer clearfix">

        <font style="font-size:.7em;"><u>Credits:</u><br>Web Layout CSS by Renat Rafikov (cssr.ru) | Whois AvailabilityService PHP Class by Helge Sverre | Everything else was created by Avi Ginsberg | Full code available on <a href="https://github.com/aviginsberg/6bby_ShortDomainStatusMonitor" target="_blank">Github</a></font>





    </footer>

</div>
</body>
</html>