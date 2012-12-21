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
                    <li class="nav-header"> Application Menu </li>                    
                    <li><a href="addApplication.php">Add Application</a></li>
                    <li><a href="viewApplication.php">View Application</a></li>
                    <li><a href="viewApplication.php?appType=active">Active Countries</a></li>
                    <li><a href="viewApplication.php?appType=inactive">InActive Countries</a></li>
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
            if (!empty($_GET['id'])) {
                $objApplication = $objAppManager->GetApplicationById($_GET['id']);
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                try {
                    $objApplication->setApplicationId($_POST["applicationId"]);
                    $objApplication->setApplicationImgUrl($_POST["applicationImg"]);
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
                    if ($_FILES['applicationImg']['tmp_name']) {
                        $objfileUpload->setTargetFilePath("../img/applications/");
                        $objfileUpload->file = $_FILES['applicationImg'];
                        $objfileUpload->deny = array('pdf,zip');
                        if ($objfileUpload->upload_file()) {
                            $objApplication->setApplicationImgUrl($objfileUpload->getApplicationImgPath());
                            if ($objAppManager->EditApplication($objApplication))
                              //  echo "<span class='offset1' style='color: #a71010'>Item is successfully Added in the System</span>";
                            header("Location: viewApplication.php?mesg= The Record was updated successfully");
                        }
                        else {
                            throw new Exception($objfileUpload->file['error']);
                        }
                    }
                    else {
                        if ($objAppManager->EditApplication($objApplication))
                          //  echo "<span class='offset1' style='color: #a71010'>Item is successfully Added in the System</span>";
                         header("Location: viewApplication.php?mesg= The Record was updated successfully");
                    }
                } catch (Exception $exc) {
                    echo "<span class='offset1' style='color: #a71010'>" . $exc->getMessage() . " </span>";
                }
            }
            ?>
            <h3 style="padding-left:8%;">Add New Application</h3>
            <form class="form-horizontal" id="addFeatureForm" method="post"  action="editApplication.php" enctype="multipart/form-data">
                <input type="hidden" class="span4" name="applicationId" id="applicationId" required  value="<?php echo $objApplication->getApplicationId() ?>">
                <input type="hidden" class="span4" name="applicationImg" id="applicationImg" placeholder="Application Name" required  value="<?php echo $objApplication->getApplicationImgUrl() ?>">
                <div class="control-group">
                    <label class="control-label" for="applicationName" >Application Name</label>
                    <div class="controls">
                        <input type="text" class="span4" name="applicationName" id="applicationName" placeholder="Application Name" required  value="<?php echo $objApplication->getApplicationName() ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="applicationPlatform">Application Platform </label>
                    <div class="controls">
                        <select id="applicationPlatform" name="applicationPlatform" required class="span4">
                            <option <?php if ($objApplication->getApplicationPlatformId() == "") echo 'selected="true"'; ?>  value="">(please select a Platform)</option>
                            <option <?php if ($objApplication->getApplicationPlatformId() == "1") echo 'selected="true"'; ?>  value="1">Windows Mobile</option>
                            <option <?php if ($objApplication->getApplicationPlatformId() == "2") echo 'selected="true"'; ?>  value="2">Apple</option>
                            <option <?php if ($objApplication->getApplicationPlatformId() == "3") echo 'selected="true"'; ?>  value="3">Android</option>
                            <option <?php if ($objApplication->getApplicationPlatformId() == "4") echo 'selected="true"'; ?>  value="4">Blackberry</option>
                            <option <?php if ($objApplication->getApplicationPlatformId() == "5") echo 'selected="true"'; ?>  value="5">Palm</option>
                            <option <?php if ($objApplication->getApplicationPlatformId() == "6") echo 'selected="true"'; ?>  value="6">Symbian</option>
                        </select>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" for="applicationCompany">Application Company</label>
                    <div class="controls">
                        <select id="applicationCompany" name="applicationCompany" required class="span4">
                            <option value="" <?php if ($objApplication->getApplicationCompanyId() == "") echo 'selected="true"'; ?> >(please select a Company)</option>
                            <?php foreach ($arr as $value) { ?>
                                <option <?php if ($objApplication->getApplicationCompanyId() == $value->getCompanyId()) echo 'selected="true"'; ?> value='<?php echo $value->getCompanyId() ?>' ><?php echo $value->getCompanyName() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" for="applicationUrl">Application Link</label>
                    <div class="controls">
                        <input type="url" class="span4" name="applicationUrl" id="applicationUrl" placeholder="Application Url" required value="<?php echo $objApplication->getApplicationUrl() ?>">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="applicationImg">Application Image</label>
                    <div class="controls">
                        <div class="fileinputs">
                            <input type="file" class="file span4" name="applicationImg"  id="applicationImg"  onchange="CopyMe(this, 'filename'); ">
                            <div class="fakefile">
                                <input type="text" id="filename"  />
                                <img src="../img/button_select.gif" /> &nbsp; <img src="<?php echo ApplicationSetting::APPLICATION_ROUTE . $objApplication->getApplicationImgUrl() ?>" alt="Image" width="50px" height="30px"/>
                            </div>

                        </div>

                    </div>
                </div>     
                <div class="control-group">
                    <label class="control-label" for="applicationDescription">Description</label>
                    <div class="controls">                        
                        <textarea class="field span4" id="applicationDescription" name="applicationDescription" required rows="6" placeholder="Enter a short Application Description"><?php echo $objApplication->getApplicationDescription() ?></textarea>
                    </div>
                </div> 

                <div class="control-group">
                    <label class="control-label" for="applicationRanking">Application Ranking</label>
                    <div class="controls" >                        
                        <input type="radio" name="applicationRanking" <?php if ($objApplication->getApplicationRankingId() == '1') {
                                echo 'checked="true"';
                            } ?> value="1">1 &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="applicationRanking" <?php if ($objApplication->getApplicationRankingId() == '2') {
                                echo 'checked="true"';
                            } ?> value="2">2 &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="applicationRanking" <?php if ($objApplication->getApplicationRankingId() == '3') {
                                echo 'checked="true"';
                            } ?> value="3">3&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="applicationRanking" <?php if ($objApplication->getApplicationRankingId() == '4') {
                                echo 'checked="true"';
                            } ?> value="4">4&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="applicationRanking" <?php if ($objApplication->getApplicationRankingId() == '5') {
                                echo 'checked="true"';
                            } ?> value="5">5&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>


                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="applicationStatus" id="applicationStatus" <?php if ($objApplication->getApplicationStatus() == '1') {
                                echo 'checked="true"';
                            } ?> value="1">Application Status
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