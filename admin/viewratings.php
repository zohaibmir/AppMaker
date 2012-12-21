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
                    <li class="nav-header"> Application Ratings </li>                    
                    <li><a href="addfeature.php">Add New Rating</a></li>
                    <li><a href="viewratings.php">All Ratings</a></li>
                    <li><a href="viewratings.php?ratingType=active">Active Ratings</a></li>
                    <li><a href="viewratings.php?ratingType=inactive">Inactive Ratings</a></li>
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
            <h4 style="color: #0077b3">Ratings</h4>
            <table class="table table-hover sortable-onload-3r no-arrow colstyle-alt rowstyle-alt paginate-5 max-pages-7 paginationcallback-callbackTest-calculateTotalRating sortcompletecallback-callbackTest-calculateTotalRating">              
                <thead>

                    <tr>
                        <th>Id</th>
                        <th>Value</th>
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
                        $objRatingManager = AppMakerFactory::CreateObject("ApplicaitonRating");
                        if (isset($_GET['ratingType']) && $_GET['ratingType'] == "active") {
                            $arr = $objRatingManager->GetActiveRatings();
                        } elseif (isset($_GET['ratingType']) && $_GET['ratingType'] == "inactive") {
                            $arr = $objRatingManager->GetInActiveRatings();
                        } else {
                            $arr = $objRatingManager->GetAllRatings();
                        }

                        foreach ($arr as $value) {
                            ?>       
                            <tr>
                                <td><?php echo $value->getRatingId() ?></td>
                                <td><?php echo $value->getRatingValue() ?></td>
                                <td><?php echo $value->getRatingDescription() ?></td>
                                <td><?php echo (($value->getRatingStatus() ? 1 : 0) ? 'Active' : 'InActive'); ?></td>
                                <td><?php echo $value->getRatingCreationDate() ?></td>
                                <td><a href="editRating.php?id=<?php echo $value->getRatingId() ?>">Edit</a></td>
                                <td><a href="deleteRating.php?id=<?php echo $value->getRatingId() ?>">Delete</a></td>
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