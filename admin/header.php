<?php
ob_start();
spl_autoload_register(function ($className) {
            $possibilities = array(
                '../Bo' . DIRECTORY_SEPARATOR . $className . '.php',
                '../Cls' . DIRECTORY_SEPARATOR . $className . '.php',
                '../Cls/Config' . DIRECTORY_SEPARATOR . $className . '.php',
                '../Cls/DBConnection' . DIRECTORY_SEPARATOR . $className . '.php',
                '../Types' . DIRECTORY_SEPARATOR . $className . '.php',
                '../Models' . DIRECTORY_SEPARATOR . $className . '.php',
                $className . '.php'
            );
            foreach ($possibilities as $file) {
                if (file_exists($file)) {
                    include_once($file);
                    return true;
                }
            }
            throw new Exception($file . "   Not Found");
        });
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>App Maker Admin Side</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
            div.fileinputs {
                position: relative;
            }

            div.fakefile {
                position: absolute;
                top: 0px;
                left: 0px;
                z-index: 1;
            }

            input.file {
                position: relative;
                text-align: right;
                -moz-opacity:0 ;
                filter:alpha(opacity: 0);
                opacity: 0;
                z-index: 2;
            }
            div.first-page,div.last-page {
             display: none;   
            }
            div.previous-page, div.next-page span {
                display: none;
            }
            .fdtablePaginatorWrapTop { display:none; }
        </style>
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="../js/paginate.js"></script>
        <script>
        function CopyMe(oFileInput, sTargetID) {
            document.getElementById(sTargetID).value = oFileInput.value;
        }
        </script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">App Maker</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Companies <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Add New Company </a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">View Existing Companies</a></li>                  
                                    <li class="divider"></li>
                                    <li><a href="#">Sponsored Companies</a></li>                  
                                    <li class="divider"></li>
                                    <li><a href="#">Non Sponsored Companies</a></li>                  
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Applications <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Add New Application </a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">View Existing Application</a></li>  
                                    <li class="divider"></li>
                                    <li><a href="#">Sponsored Application</a></li>                  
                                    <li class="divider"></li>
                                    <li><a href="#">Non Sponsored Applications</a></li>                  
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Application Features <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="addplatform.php">Add Operating Systems </a></li>
                                    <li class="divider"></li>
                                    <li><a href="addrating.php">Add Ratings</a></li>                  
                                    <li class="divider"></li>
                                    <li><a href="addfeature.php">Add Features</a></li>                  
                                    <li class="divider"></li>
                                    <li><a href="addfeerange.php">Add Fee Range</a></li>                  
                                    <li class="divider"></li>
                                    <li><a href="addcountry.php">Add Countries</a></li>                  
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Banners <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Add New Banner</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">View Existing Banners</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Active Banners</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">InActive Banners</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">News Letters <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Add New Subscriber</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">View Existing Subscribers</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Active Subscriber</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">InActive Subscribers</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Payment Details <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">View Payment Details</a></li>
                                    <li class="divider"></li>

                                </ul>
                            </li>

                        </ul>
                        <h5 style="text-align: right">Welcome Admin</h5>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>