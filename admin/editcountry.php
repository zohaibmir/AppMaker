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
                    <li><a href="addcountry.php">Add Country</a></li>
                    <li><a href="viewcountry.php">View Countries</a></li>
                    <li><a href="viewcountry.php?countryType=active">Active Countries</a></li>
                    <li><a href="viewcountry.php?countryType=inactive">InActive Countries</a></li>

                </ul>

            </div><!--/.well -->

        </div><!--/span-->
        <div class="span9">
             <?php
             try {
                    $objCountry = new Country();
                    $objCManager = AppMakerFactory::CreateObject("Country");
                     if (!empty($_GET['id'])) {
                        $objCountry = $objCManager->GetCountryById($_GET['id']);
                    }     
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $objCountry->setCountryId($_POST["countryId"]);
                    $objCountry->setCountryName($_POST["countryName"]);
                    $objCountry->setCountryIso2($_POST["inputIso2"]);
                    $objCountry->setCountryIso3($_POST["inputIso3"]);
                    if (isset($_POST["countryStatus"])) {
                        $objCountry->setCountryStatus(1);
                    } else {
                        $objCountry->setCountryStatus(0);
                    }
                    if ($objCManager->EditCountry($objCountry))                    
                        echo "<span class='offset1' style='color: #a71010'>Item is successfully Added in the System</span>";
            }
                } catch (Exception $exc) {
                     echo "<span class='offset1' style='color: #a71010'>". $exc->getMessage() ." </span>";
                }
            
            ?>
            <h3 style="padding-left:8%;">Add New Country</h3>
            <form class="form-horizontal" id="addFeatureForm" method="post" action="editcountry.php">
                <input type="hidden" name="countryId" id="countryId" value="<?php echo $objCountry->getCountryId() ?>" required>
                <div class="control-group">
                    <label class="control-label" for="countryName" >Country Name</label>
                    <div class="controls">
                        <input type="text" name="countryName" id="countryName" placeholder="Country Name" value="<?php echo $objCountry->getCountryName() ?>" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputIso2">Country Iso2</label>
                    <div class="controls">
                        <input type="text" name="inputIso2" id="inputIso2" placeholder="Country ISO2" value="<?php echo $objCountry->getCountryIso2() ?>" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputIso3">Country Iso3</label>
                    <div class="controls">
                        <input type="text" name="inputIso3" id="inputIso3" placeholder="Country ISO3" value="<?php echo $objCountry->getCountryIso3() ?>" required>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="countryStatus" id="countryStatus" <?php if($objCountry->getCountryStatus() == '1') { echo 'checked="true"'; }?> value="1"> Is Active
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