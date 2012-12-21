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
                    <li class="nav-header"> Application Features </li>                    
                    <li><a href="addfeature.php">Add New Feature</a></li>
                    <li><a href="features.php">Features</a></li>
                    <li><a href="features.php?featureType=active">Active Features</a></li>
                    <li><a href="features.php?featureType=inactive">InActive Features</a></li>

                </ul>

            </div><!--/.well -->

        </div><!--/span-->
        <div class="span9">
            <h3 style="padding-left:8%;">Add a New Feature</h3>
            <form class="form-horizontal" id="addFeatureForm" method="post" action="addfeature.php">
                <div class="control-group">
                    <label class="control-label" for="inputName" >Feature Name</label>
                    <div class="controls">
                        <input type="text" name="featureName" id="featureName" placeholder="Feature Name" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputDescription">Feature Description</label>
                    <div class="controls">
                        <input type="text" name="featureDescription" id="featureDescription" placeholder="Description">
                    </div>
                </div>              

                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="featureStatus" id="featureStatus" value="1"> Is Active
                        </label>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </form>

        
   
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    try {
        $objFeature = new Feature();
        $objFeatureManager = AppMakerFactory::CreateObject("Feature");
        $objFeature->setFeatureName($_POST["featureName"]);
        $objFeature->setFeatureDescription($_POST["featureDescription"]);
        if (isset($_POST["featureStatus"])) {
            $objFeature->setFeatureStatus(1);
        }
        else {
            $objFeature->setFeatureStatus(0);
        }        
        if($objFeatureManager->AddFeature($objFeature))
            echo "<span style='color: #a71010'>Feature is successfully Added</span>";
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
}
?>
            </div>
 </div>
</div><!--/.fluid-container-->
<hr>
<?php
if (file_exists('footer.php')) {
    include_once 'footer.php';
}
?>