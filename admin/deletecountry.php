<?php
if (file_exists('header.php')) {
    include_once 'header.php';
}


$objCManager = AppMakerFactory::CreateObject("Country");
$country_id = $_GET['id'];
$result = $objCManager->RemoveCountry($country_id);
if($result == true)
{
    header("Location: viewcountry.php?mesg=The Record was deleted successfully");  // bring back to original page
}
else
{
    header("Location: viewcountry.php?mesg= The Record was not deleted successfully");
}
?>