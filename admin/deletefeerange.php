<?php
if (file_exists('header.php')) {
    include_once 'header.php';
}
$objFeeManager = AppMakerFactory::CreateObject("FeeRange");
$fee_id = $_GET['id'];
$result = $objFeeManager->RemoveFeeRange($fee_id);
if($result == true)
{
    header("Location: viewfeerange.php?mesg=The Record was deleted successfully");  // bring back to original page
}
else
{
    header("Location: viewfeerange.php?mesg= The Record was not deleted successfully");
}
?>