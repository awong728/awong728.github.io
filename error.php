<?php

$page_redirected_from = $_SERVER['REQUEST_URI'];  // this is especially useful with error 404 to indicate the missing page.
$server_url = "http://" . $_SERVER["SERVER_NAME"] . "/";
$redirect_url = $_SERVER["REDIRECT_URL"];
$redirect_url_array = parse_url($redirect_url);
$end_of_path = strrchr($redirect_url_array["path"], "/");

switch(getenv("REDIRECT_STATUS"))
{
	# "400 - Bad Request"
	case 400:
	$error_code = "400 - Bad Request";
	$explanation = "The syntax of the URL submitted by your browser could not be understood.  Please verify the address and try again.";
	$redirect_to = "";
	break;

	# "401 - Unauthorized"
	case 401:
	$error_code = "401 - Unauthorized";
	$explanation = "This section requires a password or is otherwise protected.";
	$redirect_to = "";
	break;

	# "403 - Forbidden"
	case 403:
	$error_code = "403 - Forbidden";
	$explanation = "This section requires a password or is otherwise protected.";
	$redirect_to = "";
	break;

	# "404 - Not Found"
	case 404:
	$error_code = "404 - Not Found";
	$explanation = "The page you were looking for: '" . $page_redirected_from . "' could not be found.  Please verify the address and try again.";
	$redirect_to = "";
	break;

	# "500 - Internal Server Error"
	case 500:
	$error_code = "500 - Internal Server Error";
	$explanation = "The server experienced an unexpected error.  Please verify the address and try again.";
	$redirect_to = "";
	break;
}
?>

<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Error - Andrew T. Wong</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="assets/css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/style.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie/v8.css" /><![endif]-->
		<?php
            if ($redirect_to != "")
            {
        ?>
        
            <meta http-equiv="Refresh" content="5; url='<?php print($redirect_to); ?>'">
        <?php
            }
        ?>
	</head>
	<body>
        <div id="page-wrapper">

            <!-- Header -->
                <header id="header">
                    <h1><a href="index.html">Andrew T. Wong</a></h1>
                    <nav id="nav">
                        <ul>
                            <li class="special">
                                <a href="#" class="menuToggle"><span>Menu</span></a>
                                <div id="menu">
                                    <ul>
											<li><a href="index.html">Home</a></li>
                                            <li><a href="index.html#profile">Profile</a></li>
											<li><a href="index.html#experiences">Experiences</a></li>
                                            <li><a href="portfolio.html">Portfolio</a></li>
											<li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </header>

            <!-- Main -->
                <article id="main">
                    <header>
                        <p>An error has occured.</p>
                        <h2><?php print ($error_code); ?></h2>
                    </header>
                    <section class="wrapper style5">
                        <div class="inner">
                            <div id="contactinfo" class="row uniform 50%">
                                <div class="12u">
                                    <h2>Oh no!</h2>
                                    <p>Error <?php print ($error_code); ?></p>
                                    <p>There was a problem trying to get you to where you wanted to go. <?PHP echo($explanation); ?>  If you feel you have reached this page in error, please try again, or contact me if you continue to have problems.</p>
                                    <p><a href="contact.html">Contact me.</a><br />
                                    <a href="index.html">Return to site.</a></p>
                                </div>
                                </div>
                        </div>
                    </section>
                </article>

            <!-- Footer -->
                <footer id="footer">
                    <ul class="icons">
                        <li><a href="http://ca.linkedin.com/atwong" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
                        <li><a href="http://www.facebook.com/awong7" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="http://instagram.com/atwong7" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="mailto:awong728@gmail.com" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
                    </ul>
                    <ul class="copyright">
                        <li><a href="copyright.html" target="_blank">&copy; 2015 Andrew Talor Wong. All Rights Reserved</a></li>
                        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>
                </footer>
        </div>

    <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/init.js"></script>
	</body>
</html>