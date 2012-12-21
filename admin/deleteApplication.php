<?php
if (file_exists('header.php')) {
    include_once 'header.php';
}
$objAppManager = AppMakerFactory::CreateObject("Application");
$application_id = $_GET['id'];
$result = $objAppManager->RemoveApplication($application_id);
if($result == true)
{
    header("Location: viewratings.php?mesg=The Record was deleted successfully");  // bring back to original page
}
else
{
    header("Location: viewratings.php?mesg= The Record was not deleted successfully");
}
ob_flush();
?>