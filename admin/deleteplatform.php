<?php
if (file_exists('header.php')) {
    include_once 'header.php';
}


$objOsManager = AppMakerFactory::CreateObject("OperatingSystem");
$os_id = $_GET['id'];
$result = $objOsManager->RemoveOperatingSystem($os_id);
if($result == true)
{
    header("Location: platforms.php?mesg=The Record was deleted successfully");  // bring back to original page
}
else
{
    header("Location: platforms.php?mesg= The Record was not deleted successfully");
}
?>