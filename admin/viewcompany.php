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
                    <li class="nav-header"> Country Menu </li>                    
                    <li><a href="addcountry.php">Add Country</a></li>
                    <li><a href="viewcountry.php">View Countries</a></li>
                    <li><a href="viewcountry.php?countryType=active">Active Countries</a></li>
                    <li><a href="viewcountry.php?countryType=inactive">InActive Countries</a></li>
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
            <h4 style="color: #0077b3">Companies List</h4>
                <table class="table table-hover sortable-onload-3r no-arrow colstyle-alt rowstyle-alt paginate-10 max-pages-7 paginationcallback-callbackTest-calculateTotalRating sortcompletecallback-callbackTest-calculateTotalRating">              
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Company URL</th>
                        <th>Company Contact Person</th>
                        <th>Company Fee</th>
                        <th>Status</th>
                        <th>Sponsored</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                <form class="form-inline" method="post">  
                    <td colspan="5">
                        <div class="input-append">
                            <input class="span3" id="companyName" name="companyName" placeholder="Search By Company Name" required type="text">
                            <button class="btn" type="submit">Search</button>
                        </div>
                    </td>
                    <td colspan="2"></td>

                </form>
                    </tr>
                    <?php
                    try {
                        $objCompanyManager = AppMakerFactory::CreateObject("Company");
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {                            
                            $arr = $objCManager->GetCountryByName($_POST["countryName"]);
                        }
                        else {
                        if (isset($_GET['countryType']) && $_GET['countryType'] == "active") {
                            $arr = $objCManager->GetAllActiveCountries();
                        } elseif (isset($_GET['countryType']) && $_GET['countryType'] == "inactive") {
                            $arr = $objCManager->GetAllInActiveCountries();
                        } else {
                             $arr = $objCompanyManager->GetAllCompanis();
                        }

                        }
                        foreach ($arr as $value) {
                            ?>       
                            <tr>
                                <td><?php echo htmlentities($value["companyName"]) ?></td>
                                <td><?php echo htmlentities($value["Url"]) ?></td>
                                <td><?php echo htmlentities($value["contactName"]) ?></td>
                                <td><?php echo htmlentities($value["upperAmount"]) ?></td>
                                <td><?php echo htmlentities((($value['companyStatus'] ? 1 : 0) ? 'Active' : 'InActive')); ?></td>                                
                                <td><?php echo htmlentities((($value['sposoredComnay'] ? 1 : 0) ? 'Yes' : 'No')); ?></td>                                
                                <td><a href="editcompany.php?id=<?php echo $value['companyId'] ?>">Edit</a></td>
                                <td><a href="deletecompany.php?id=<?php echo $value['companyId'] ?>">Delete</a></td>
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