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
                    <li class="nav-header"> Application Menu </li>                    
                    <li><a href="addApplication.php">Add Application</a></li>
                    <li><a href="viewApplication.php">View Application</a></li>
                    <li><a href="viewApplication.php?appType=active">Active Applications</a></li>
                    <li><a href="viewApplication.php?appType=inactive">InActive Applications</a></li>
                    <li><a href="viewApplication.php?appType=inactive">Sponsored Applications</a></li>
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
            <h4 style="color: #0077b3">Applications</h4>
                <table class="table table-hover sortable-onload-3r no-arrow colstyle-alt rowstyle-alt paginate-10 max-pages-7 paginationcallback-callbackTest-calculateTotalRating sortcompletecallback-callbackTest-calculateTotalRating">              
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Application Name</th>
                        <th>Application Description</th>
                        <th>Application Url</th>
                        <th>Application  Image</th>  
                        <th>Application  Status</th>  
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                <form class="form-inline" method="post">  
                    <td colspan="5">
                        <div class="input-append">
                            <input class="span3" id="applicationName" name="applicationName" placeholder="Search By Application Name" required type="text">
                            <button class="btn" type="submit">Search</button>
                        </div>
                    </td>
                    <td colspan="2"></td>

                </form>
                    </tr>
                    <?php
                    try {
                        $objAppManager = AppMakerFactory::CreateObject("Application");
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {                            
                            //$arr = $objCManager->GetCountryByName($_POST["countryName"]);
                        }
                        else {
                        if (isset($_GET['appType']) && $_GET['appType'] == "active") {
                            $arr = $objAppManager->GetAllActiveApplications();
                        } elseif (isset($_GET['appType']) && $_GET['appType'] == "inactive") {
                            $arr = $objAppManager->GetAllInActiveApplications();
                        } else {
                            $arr = $objAppManager->GetAllApplications();
                        }

                        }
                        foreach ($arr as $value) {
                            ?>       
                            <tr>
                                <td><?php echo htmlentities($value->getApplicationId()) ?></td>
                                <td><?php echo htmlentities($value->getApplicationName()) ?></td>
                                <td><?php echo htmlentities($value->getApplicationDescription()) ?></td>
                                <td><?php echo htmlentities($value->getApplicationUrl()) ?></td>
                                <td><img src ="<?php echo ApplicationSetting::APPLICATION_ROUTE . htmlentities($value->getApplicationImgUrl()) ?>" width="50px height = 30px" /></td>
                                <td><?php echo htmlentities((($value->getApplicationStatus() ? 1 : 0) ? 'Active' : 'InActive')); ?></td>                                
                                <td><a href="editapplication.php?id=<?php echo $value->getApplicationId() ?>">Edit</a></td>
                                <td><a href="deleteapplication.php?id=<?php echo $value->getApplicationId() ?>">Delete</a></td>
                            </tr>

                            <?                           
                        }
                    } catch (Exception $exc) {
                        echo $exc->getMessage();
                    }
                    ?>
                </tbody>
            </table>

            
        </div>
    </div>
</div><!--/.fluid-container-->
<hr>
<?php
if (file_exists('footer.php')) {
    include_once 'footer.php';
}
?>