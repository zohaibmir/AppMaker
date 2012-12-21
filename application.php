<?php
ob_start();
spl_autoload_register(function ($className) {
            $possibilities = array(
                'Bo' . DIRECTORY_SEPARATOR . $className . '.php',
                'Cls' . DIRECTORY_SEPARATOR . $className . '.php',
                'Cls/Config' . DIRECTORY_SEPARATOR . $className . '.php',
                'Cls/DBConnection' . DIRECTORY_SEPARATOR . $className . '.php',
                'Types' . DIRECTORY_SEPARATOR . $className . '.php',
                'Models' . DIRECTORY_SEPARATOR . $className . '.php',
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
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <style type="text/css">

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
            .success{  

                border: 2px solid #009400;  
                background: #B3FFB3;  
                color: #555;  
                font-weight: bold;  

            }  

            .error{  

                border: 2px solid #DE001A;  
                background: #FFA8B3;  
                color: #000;  
                font-weight: bold;  
            }  
        </style>
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>       
        
    </head>
    <body>
         <?php
            $objApplication = new Application();
            $objfileUpload = new UploadFile();
            $objAppManager = AppMakerFactory::CreateObject("Application");
             
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                try {
                    if ($_FILES['applicationImg']['tmp_name']) {
                        $objfileUpload->setTargetFilePath("img/applications/");
                        $objfileUpload->file = $_FILES['applicationImg'];
                        $objfileUpload->deny = array('pdf,zip');
                        if ($objfileUpload->upload_file()) {
                            $objApplication->setApplicationImgUrl($objfileUpload->getApplicationImgPath());
                            $objApplication->setApplicationName($_POST["applicationName"]);
                            $objApplication->setApplicationPlatformId($_POST["applicationPlatform"]);
                            $objApplication->setApplicationUrl($_POST["applicationUrl"]);
                            $objApplication->setApplicationDescription($_POST["applicationDescription"]);
                            $objApplication->setApplicationRankingId(1);
                            $objApplication->setApplicationCompanyId($_POST["applicationCompany"]);
                            $objApplication->setApplicationStatus(1);
                            
                            if ($objAppManager->AddApplication($objApplication))
                                echo "<span class='offset1' style='color: #a71010'>Item is successfully Added in the System</span>";
                        }
                        else {
                            echo "<span class='offset1' style='color: #a71010'>$objfileUpload->file['error']</span>";
                        }
                    }
                } catch (Exception $exc) {
                    echo "<span class='offset1' style='color: #a71010'>" . $exc->getMessage() . " </span>";
                }
            }
            ?>
        <?php
            $_SESSION["userId"] = 4;
        ?>
        <div class="container-fluid">
            <div class="row-fluid">
                 <div id="formResponse"></div>                                         
            <h3 style="padding-left:8%;">Add New Application</h3>
            <form class="form-horizontal" id="applicationForm" name="applicationForm" enctype="multipart/form-data" method="post">
                <input type="hidden" class="span4" name="applicationCompany" id="applicationCompany" value="3" placeholder="Application Name" required >
                <div class="control-group">
                    <label class="control-label" for="applicationName" >Application Name</label>
                    <div class="controls">
                        <input type="text" class="span4" name="applicationName" id="applicationName" placeholder="Application Name" required >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="applicationPlatform">Application Platform</label>
                    <div class="controls">
                        <select id="applicationPlatform" name="applicationPlatform" required class="span4">
                            <option value="" selected>(please select a Platform)</option>
                            <option value="1">Windows Mobile</option>
                            <option value="2">Apple</option>
                            <option value="3">Android</option>
                            <option value="4">Blackberry</option>
                            <option value="5">Palm</option>
                            <option value="6">Symbian</option>
                        </select>
                    </div>
                </div>

               
                <div class="control-group">
                    <label class="control-label" for="applicationUrl">Application Link</label>
                    <div class="controls">
                        <input type="url" class="span4" name="applicationUrl" id="applicationUrl" placeholder="Application Url" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="applicationImg">Application Image</label>
                    <div class="controls">
                        <div class="fileinputs">
                            <input type="file" class="file span4" name="applicationImg"  id="applicationImg" required onchange="CopyMe(this, 'filename'); ">
                            <div class="fakefile">
                                <input type="text" id="filename"  />
                                <img src="img/button_select.gif" />
                            </div>

                        </div>

                    </div>
                </div>     
                <div class="control-group">
                    <label class="control-label" for="applicationDescription">Description</label>
                    <div class="controls">                        
                        <textarea class="field span4" id="applicationDescription" name="applicationDescription" required rows="6" placeholder="Enter a short Application Description"></textarea>
                    </div>
                </div> 

                


                <div class="control-group">
                    <div class="controls">
                        
                        <button type="submit" id="applicationSubmit" name="applicationSubmit" class="btn btn-info">Add This App</button>
                    </div>
                </div>
            </form>
                
            </div>
        </div>

        <!-- javascript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!--script src="js/ajaxApplicationSubmit.js"></script-->
         <script>
        function CopyMe(oFileInput, sTargetID) {
            document.getElementById(sTargetID).value = oFileInput.value;
        }
        </script>
    </body>
</html>
