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
             <span class='text-info'> 
                <?php
                if (!empty($_REQUEST["mesg"]))
                    echo $_REQUEST['mesg'];
                ?>
            </span>
            <h4 style="color: #0077b3">Fee Ranges</h4>
            <table class="table table-hover">              
                <thead>

                    <tr>
                        <th>Id</th>
                        <th>Lower Amount</th>
                        <th>Upper Amount</th>
                        <th>description</th>
                        <th>Status</th>
                        <th>Creation Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $objFeeManager = AppMakerFactory::CreateObject("FeeRange");
                        if (isset($_GET['feeType']) && $_GET['feeType'] == "active") {
                            $arr = $objFeeManager->GetAllActiveFeeRange();
                        } elseif (isset($_GET['feeType']) && $_GET['feeType'] == "inactive") {
                            $arr = $objFeeManager->GetAllInActiveFeeRange();
                        } else {
                            $arr = $objFeeManager->GetAllFeeRange();
                        }

                        foreach ($arr as $value) {
                            ?>       
                            <tr>
                                <td><?php echo htmlentities($value->getFeeId()) ?></td>
                                <td><?php echo htmlentities($value->getFeeLowerAmount()) ?></td>
                                <td><?php echo htmlentities($value->getFeeUpperAmount()) ?></td>
                                <td><?php echo htmlentities($value->getFeeDescription()) ?></td>
                                <td><?php echo htmlentities((($value->getFeeStatus() ? 1 : 0) ? 'Active' : 'InActive')); ?></td>
                                <td><?php echo htmlentities($value->getFeeCreationDate()) ?></td>
                                <td><a href="editfeerange.php?id=<?php echo $value->getFeeId() ?>">Edit</a></td>
                                <td><a href="deletefeerange.php?id=<?php echo $value->getFeeId() ?>">Delete</a></td>
                            </tr>

                            <?                           
                        }
                    } catch (Exception $exc) {
                        echo $exc->getMessage();
                    }
                    ?>
                </tbody>
            </table>

            <div class="pagination">
                <ul>
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.fluid-container-->
<hr>
<?php
if (file_exists('footer.php')) {
    include_once 'footer.php';
}
?>