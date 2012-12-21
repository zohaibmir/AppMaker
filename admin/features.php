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
            <span class='text-info'> 
                <?php
                if (!empty($_REQUEST["mesg"]))
                    echo $_REQUEST['mesg'];
                ?>
            </span>
            <table class="table table-hover">
                <caption><h4>Features</h4></caption>
                <thead>

                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Creation Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $objFeatureManager = AppMakerFactory::CreateObject("Feature");
                        if (isset($_GET['featureType']) && $_GET['featureType'] == "active") {
                            $arr = $objFeatureManager->GetAllActiveFeatures();
                        } elseif (isset($_GET['featureType']) && $_GET['featureType'] == "inactive") {
                            $arr = $objFeatureManager->GetAllInActiveFeatures();
                        } else {
                            $arr = $objFeatureManager->GetAllFeatures();
                        }

                        foreach ($arr as $value) {
                            ?>       
                            <tr>
                                <td><?php echo $value->getFeatureId() ?></td>
                                <td><?php echo $value->getFeatureName() ?></td>
                                <td><?php echo $value->getFeatureDescription() ?></td>
                                <td><?php echo (($value->getFeatureStatus() ? 1 : 0) ? 'Active' : 'InActive'); ?></td>
                                <td><?php echo $value->getFeatureCreationDate() ?></td>
                                <td><a href="editfeature.php?id=<?php echo $value->getFeatureId() ?>">Edit</a></td>
                                <td><a href="deletefeature.php?id=<?php echo $value->getFeatureId() ?>">Delete</a></td>
                            </tr>

                            <?
                            $p = new Pagination();
                            $p->calculate_pages(8, 4, 2);
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