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
             $objOS = new OperatingSystem();
             $objOsManager = AppMakerFactory::CreateObject("OperatingSystem");
             if (!empty($_GET['id'])) {
                    $objOS = $objOsManager->GetOperatingSystemById($_GET['id']);
             }             
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                try {
                
                $objfileUpload = new UploadFile();
                
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
                         $objOS->setOsId($_POST["osId"]);                        
                         $objOS->setOsModificationDate(date('Y-m-d H:i:s'));
                        if($objOsManager->EditOperatingSystem($objOS))
                         header("Location: operatingsystems.php?mesg= The Record was updated successfully");
                    }
                    else
                        echo $objfileUpload->file['error'];
                }
                else {
                        $objOS->setOsId($_POST["osId"]);                        
                        $objOS->setOsName($_POST["osName"]);
                        $objOS->setOsVersion($_POST["osVersion"]);
                        $objOS->setOsIconPath($_POST["osPath"]);
                        $objOS->setOsModificationDate(date('Y-m-d H:i:s'));
                        if (isset($_POST["osStatus"])) {
                            $objOS->setOsStatus(1);
                        } else {
                            $objOS->setOsStatus(0);
                        }
                        if($objOsManager->EditOperatingSystem($objOS))
                         header("Location: operatingsystems.php?mesg= The Record was updated successfully");
                }
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
            }
            
            ?>
            <h3 style="padding-left:8%;">Edit Platform</h3>

            <form class="form-horizontal" id="addOsForm" method="post" action="editplatform.php" enctype="multipart/form-data">
                <input  type="hidden" id="osId" name="osId" size="25" class="required" value="<?php echo $objOS->getOsId() ?>"  />                
                <input  type="hidden" id="osPath" name="osPath" size="25" class="required" value="<?php echo $objOS->getOsIconPath() ?>"  />                
                <div class="control-group">
                    <label class="control-label" for="osName" >Operating System</label>
                    <div class="controls">
                        <input type="text" name="osName" id="osName" placeholder="Plateform Name" value="<?php echo $objOS->getOsName() ?>" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="osVersion">Version</label>
                    <div class="controls">
                        <input type="text" name="osVersion" id="osVersion" placeholder="Version" value="<?php echo $objOS->getOsVersion() ?>" >
                    </div>
                </div>     

                <div class="control-group">
                    <label class="control-label" for="osIcon">Operating System Icon</label>
                    <div class="controls">
                        <div class="fileinputs">
                            <input type="file" class="file" name="osIcon" id="osIcon"  onchange="CopyMe(this, 'filename'); ">
                            <div class="fakefile">
                                <input type="text" id="filename" />
                                <img src="../img/button_select.gif" /> &nbsp; <img src="<?php echo ApplicationSetting::APPLICATION_ROUTE . $objOS->getOsIconPath()?>" alt="Image" />
                            </div>
                            
                        </div>

                    </div>
                </div>     

                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="osStatus" id="osStatus"<?php if($objOS->getOsStatus() == '1') { echo 'checked="true"'; }?>  value="1"> Is Active
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