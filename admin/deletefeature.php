<?php
if (file_exists('header.php')) {
    include_once 'header.php';
}


$objFeatureManager = AppMakerFactory::CreateObject("Feature");
$feature_id = $_GET['id'];
$result = $objFeatureManager->RemoveFeature($feature_id);
if($result == true)
{
    header("Location: features.php?mesg=The Record was deleted successfully");  // bring back to original page
}
else
{
    header("Location: features.php?mesg= The Record was not deleted successfully");
}
?>