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
                    <li class="nav-header"> Platforms </li>                    
                    <li><a href="addplatform.php">Add New Platform</a></li>
                    <li><a href="platforms.php">All Platforms</a></li>
                    <li><a href="platforms.php?osType=active">Active Platforms</a></li>
                    <li><a href="platforms.php?osType=inactive">Inactive Platforms</a></li>
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
            <h4 style="color: #0077b3">Application Platforms</h4>
            <table class="table table-hover">              
                <thead>

                    <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>version</th>
                        <th>Status</th>
                        <th>image</th>
                        <th>Creation Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $objOsManager = AppMakerFactory::CreateObject("OperatingSystem");
                        if (isset($_GET['osType']) && $_GET['osType'] == "active") {
                            $arr = $objOsManager->GetAllActiveOperatingSystems();
                        } elseif (isset($_GET['osType']) && $_GET['osType'] == "inactive") {
                            $arr = $objOsManager->GetAllInActiveOperatingSystems();
                        } else {
                            $arr = $objOsManager->GetAllOperatingSystems();
                        }

                        foreach ($arr as $value) {
                            ?>       
                            <tr>
                                <td><?php echo $value->getOsId() ?></td>
                                <td><?php echo $value->getOsName() ?></td>
                                <td><?php echo $value->getOsVersion() ?></td>
                                <td><?php echo (($value->getOsStatus() ? 1 : 0) ? 'Active' : 'InActive'); ?></td>
                                <td><img src="<?php echo ApplicationSetting::APPLICATION_ROUTE.$value->getOsIconPath() ?>" /></td>
                                <td><?php echo $value->getOsCreationDate() ?></td>
                                <td><a href="editplatform.php?id=<?php echo $value->getOsId() ?>">Edit</a></td>
                                <td><a href="deleteplatform.php?id=<?php echo $value->getOsId() ?>">Delete</a></td>
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