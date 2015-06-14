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
                <li class="active"><a href="http://sdsm.6b.by/">Home</a></li>
                <li ><a href="http://sdsm.6b.by/howitworks.php">How it Works</a></li>
            </ul>
        </nav>
    </header>


    <div class="info">
        <article class="hero clearfix">
            <div class="col_100">
                <h2>SDSM</h2>
                    <p>This tool constantly checks every 2 and 3 character domain's availability for a list of TLDs and maintains an easily searchable database of their availability.</p>
                <h2>Current TLDs</h2>
                <p>Currently we are supporting: .ee, .ch, .hu, .ax, .lv, .co, .io, .by. More TLDs will be added soon.</p>

            </div>
        </article>


        <article class="article clearfix">

            <p class="message"><code>SDSM is currently running in test/development mode. Data may be inaccurate.</code></p>



            <div class="col_50">
                <form action="search.php" method="get" class="form">
                    <h2>Search by TLD</h2>

                    <p class="col_50">
                        <label for="name">Domain:</label><br/>
                        <input type="text" name="name" id="name" value="" />
                    </p>


                    <p>
                        <label for="select-choice">TLD:</label><br>
                        <select name="TLD" id="TLD">
                            <option value="ax">.ax</option>
                            <option value="by">.by</option>
                            <option value="ch">.ch</option>
                            <option value="co">.co</option>
                            <option value="ee">.ee</option>
                            <option value="io">.io</option>
                            <option value="lv">.lv</option>

                        </select>
                    </p>



                    <div>
                        <button type="submit" class="button">Search</button>
                    </div>
                </form>
            </div>



            <div class="col_50">
                <form action="listall.php" method="get" class="form">
                    <h2>List all Available Domains for TLD</h2>




                    <p>
                        <label for="select-choice">TLD:</label><br>
                        <select name="TLD" id="TLD">
                            <option value="ax">.ax</option>
                            <option value="by">.by</option>
                            <option value="ch">.ch</option>
                            <option value="co">.co</option>
                            <option value="ee">.ee</option>
                            <option value="io">.io</option>
                            <option value="lv">.lv</option>
                        </select>
                    </p>



                    <div>
                        <button type="submit" class="button">List</button>
                    </div>
                </form>
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