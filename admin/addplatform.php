<?php
if (file_exists('header.php')) {
    include_once 'header.php';
}
?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">

            <div class="well sidebar-nav">

                <ul class="nav nav-list" style="padding-left: 20%">
                    <li class="nav-header"> Platforms </li>                    
                    <li><a href="addplatform.php">Add New Platform</a></li>
                    <li><a href="platforms.php">All Platforms</a></li>
                    <li><a href="platforms.php?osType=active">Active Platforms</a></li>
                    <li><a href="platforms.php?osType=inactive">Inactive Platforms</a></li>
                </ul>

            </div><!--/.well -->

        </div><!--/span-->
        <div class="span9">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                try {
                $objOS = new OperatingSystem();
                $objfileUpload = new UploadFile();
                $objOsManager = AppMakerFactory::CreateObject("OperatingSystem");
                if ($_FILES['osIcon']['tmp_name']) {
                    $objfileUpload->file = $_FILES['osIcon'];
                    $objfileUpload->deny = array('pdf,zip');
                    if ($objfileUpload->upload_file()) {
                        $objOS->setOsName($_POST["osName"]);
                        $objOS->setOsVersion($_POST["osVersion"]);
                        $objOS->setOsIconPath($objfileUpload->getFilePath());
                        if (isset($_POST["osStatus"])) {
                            $objOS->setOsStatus(1);
                        } else {
                            $objOS->setOsStatus(0);
                        }
                        $objOsManager->AddOperatingSystem($objOS);
                    }
                    else
                        echo $objfileUpload->file['error'];
                }
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
            }
            
            ?>
            <h3 style="padding-left:8%;">Add Operating System</h3>

            <form class="form-horizontal" id="addOsForm" method="post" action="addoperatingsystem.php" enctype="multipart/form-data">
                <div class="control-group">
                    <label class="control-label" for="osName" >Operating System</label>
                    <div class="controls">
                        <input type="text" name="osName" id="osName" placeholder="Plateform Name" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="osVersion">Version</label>
                    <div class="controls">
                        <input type="text" name="osVersion" id="osVersion" placeholder="Version" >
                    </div>
                </div>     

                <div class="control-group">
                    <label class="control-label" for="osIcon">Operating System Icon</label>
                    <div class="controls">
                        <div class="fileinputs">
                            <input type="file" class="file" name="osIcon" id="osIcon" required onchange="CopyMe(this, 'filename'); ">
                            <div class="fakefile">
                                <input type="text" id="filename" />
                                <img src="../img/button_select.gif" />
                            </div>
                            
                        </div>
                        
                    </div>
                </div>     

                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="osStatus" id="osStatus" value="1"> Is Active
                        </label>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!--/.fluid-container-->
<hr>
<?php
if (file_exists('footer.php')) {
    include_once 'footer.php';
}
?>