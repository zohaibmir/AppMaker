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
                    <li class="nav-header"> Fee Ranges</li>                    
                    <li><a href="addfeerange.php">Add Fee Range</a></li>
                    <li><a href="viewfeerange.php">All Fee Ranges</a></li>
                    <li><a href="viewfeerange.php?feeType=active">Active Fee Ranges</a></li>
                    <li><a href="viewfeerange.php?feeType=inactive">InActive Fee Ranges</a></li>

                </ul>

            </div><!--/.well -->

        </div><!--/span-->
        <div class="span9">
            <?php
            try {
                $objFee = new FeeRange();
                $objFeeManager = AppMakerFactory::CreateObject("FeeRange");
                if (!empty($_GET['id'])) {
                    $objFee = $objFeeManager->GetFeeRangeById($_GET['id']);
                }
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $objFee->setFeeLowerValue($_POST["feeLAmount"]);
                    $objFee->setFeeUpperValue($_POST["feeUAmount"]);
                    $objFee->setFeeDescription($_POST["feeDescription"]);
                    $objFee->setFeeUpdationDate(date('Y-m-d H:i:s'));
                    $objFee->setFeeId($_POST["feeId"]);
                    if (isset($_POST["feeStatus"])) {
                        $objFee->setFeeStatus(1);
                    } else {
                        $objFee->setFeeStatus(0);
                    }
                    if ($objFeeManager->EditFeeRange($objFee))
                        header("Location: viewfeerange.php?mesg= The Record was updated successfully");
                }
            } catch (Exception $exc) {
                echo "<span class='offset1' style='color: #a71010'>" . $exc->getMessage() . " </span>";
            }
            ?>
            <h3 style="padding-left:8%;">Edit Fee Range</h3>
            <form class="form-horizontal" id="addFeatureForm" method="post" action="editfeerange.php">
                <input type="hidden" name="feeId" id="feeId" value="<?php echo $objFee->getFeeId() ?>" placeholder="Lower Amount" required>
                <div class="control-group">
                    <label class="control-label" for="feeLAmount" >Lower Value</label>
                    <div class="controls">
                        <input type="text" name="feeLAmount" id="feeLAmount" value="<?php echo $objFee->getFeeLowerAmount() ?>" placeholder="Lower Amount" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="feeUAmount" >Upper Value</label>
                    <div class="controls">
                        <input type="text" name="feeUAmount" id="feeUAmount" value="<?php echo $objFee->getFeeUpperAmount() ?>" placeholder="Upper Amount" required>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="feeStatus" id="fedStatus" <?php if($objFee->getFeeStatus() == '1') { echo 'checked="true"'; }?> value="1"> Is Active
                        </label>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="feeDescription">Description</label>
                    <div class="controls">                        
                        <textarea class="field span4" id="feeDescription" name="feeDescription" rows="6" placeholder="Enter a short synopsis"><?php echo $objFee->getFeeDescription() ?></textarea>
                    </div>
                </div>              
                <div class="offset2">
                    <button type="submit" class="btn btn-info">Submit</button>
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