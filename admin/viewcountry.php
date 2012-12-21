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
            <h4 style="color: #0077b3">Countries List</h4>
                <table class="table table-hover sortable-onload-3r no-arrow colstyle-alt rowstyle-alt paginate-10 max-pages-7 paginationcallback-callbackTest-calculateTotalRating sortcompletecallback-callbackTest-calculateTotalRating">              
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>County Name</th>
                        <th>Country ISO2</th>
                        <th>Country ISO3</th>
                        <th>Status</th>                        
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                <form class="form-inline" method="post">  
                    <td colspan="5">
                        <div class="input-append">
                            <input class="span3" id="countryName" name="countryName" placeholder="Search By Country Name" required type="text">
                            <button class="btn" type="submit">Search</button>
                        </div>
                    </td>
                    <td colspan="2"></td>

                </form>
                    </tr>
                    <?php
                    try {
                        $objCManager = AppMakerFactory::CreateObject("Country");
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {                            
                            $arr = $objCManager->GetCountryByName($_POST["countryName"]);
                        }
                        else {
                        if (isset($_GET['countryType']) && $_GET['countryType'] == "active") {
                            $arr = $objCManager->GetAllActiveCountries();
                        } elseif (isset($_GET['countryType']) && $_GET['countryType'] == "inactive") {
                            $arr = $objCManager->GetAllInActiveCountries();
                        } else {
                            $arr = $objCManager->GetAllCountries();
                        }

                        }
                        foreach ($arr as $value) {
                            ?>       
                            <tr>
                                <td><?php echo htmlentities($value->getCountryId()) ?></td>
                                <td><?php echo htmlentities($value->getCountryName()) ?></td>
                                <td><?php echo htmlentities($value->getCountryIso2()) ?></td>
                                <td><?php echo htmlentities($value->getCountryIso3()) ?></td>
                                <td><?php echo htmlentities((($value->getCountryStatus() ? 1 : 0) ? 'Active' : 'InActive')); ?></td>                                
                                <td><a href="editcountry.php?id=<?php echo $value->getCountryId() ?>">Edit</a></td>
                                <td><a href="deletecountry.php?id=<?php echo $value->getCountryId() ?>">Delete</a></td>
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