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
                    <li class="nav-header"> Country Menu </li>                    
                    <li><a href="addApplication.php.php">Add Application</a></li>
                    <li><a href="viewApplication.php">View Countries</a></li>
                    <li><a href="viewcountry.php?countryType=active">Active Countries</a></li>
                    <li><a href="viewcountry.php?countryType=inactive">InActive Countries</a></li>

                </ul>

            </div><!--/.well -->

        </div><!--/span-->
        <div class="span9">
            <?php
            $objApplication = new Application();
            $objfileUpload = new UploadFile();
            $objAppManager = AppMakerFactory::CreateObject("Application");
            $objCompanyManager = AppMakerFactory::CreateObject("Company");
            $arr = $objCompanyManager->GetAllActiveCompanies();
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                try {
                    if ($_FILES['applicationImg']['tmp_name']) {
                        $objfileUpload->setTargetFilePath("../img/applications/");
                        $objfileUpload->file = $_FILES['applicationImg'];
                        $objfileUpload->deny = array('pdf,zip');
                        if ($objfileUpload->upload_file()) {
                            $objApplication->setApplicationImgUrl($objfileUpload->getApplicationImgPath());
                            $objApplication->setApplicationName($_POST["applicationName"]);
                            $objApplication->setApplicationPlatformId($_POST["applicationPlatform"]);
                            $objApplication->setApplicationUrl($_POST["applicationUrl"]);
                            $objApplication->setApplicationDescription($_POST["applicationDescription"]);
                            $objApplication->setApplicationRankingId($_POST["applicationRanking"]);
                            $objApplication->setApplicationCompanyId($_POST["applicationCompany"]);
                            if (isset($_POST["applicationStatus"])) {
                                $objApplication->setApplicationStatus(1);
                            } else {
                                $objApplication->setApplicationStatus(0);
                            }
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
            <h3 style="padding-left:8%;">Add New Application</h3>
            <form class="form-horizontal" id="addFeatureForm" method="post"  action="addApplication.php" enctype="multipart/form-data">
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
                    <label class="control-label" for="applicationPlatform">Application Company</label>
                    <div class="controls">
                        <select id="applicationCompany" name="applicationCompany" required class="span4">
                            <option value="" selected>(please select a Company)</option>
                            <?php foreach ($arr as $value) { ?>
                                <option value='<?php echo $value->getCompanyId() ?>' ><?php echo $value->getCompanyName() ?></option>
                            <?php } ?>
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
                                <img src="../img/button_select.gif" />
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
                    <label class="control-label" for="applicationRanking">Application Ranking</label>
                    <div class="controls" >                        
                        <input type="radio" name="applicationRanking" value="1">1 &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="applicationRanking" value="2">2 &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="applicationRanking" value="3">3&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="applicationRanking" value="4">4&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="applicationRanking" value="5">5&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>


                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="applicationStatus" id="applicationStatus" value="1">Application Status
                        </label>
                        <button type="submit" class="btn btn-info">Add This App</button>
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