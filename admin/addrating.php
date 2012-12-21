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
                    <li><a href="viewratings.php">View Ratings</a></li>
                </ul>

            </div><!--/.well -->

        </div><!--/span-->
        <div class="span9">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                try {
                    $objRating = new ApplicationRating();
                    $objRatingManager = AppMakerFactory::CreateObject("ApplicaitonRating");
                    $objRating->setRatingValue($_POST["ratingValue"]);
                    $objRating->setRatingDescription($_POST["ratingDescription"]);
                    if (isset($_POST["RatingStatus"])) {
                        $objRating->setRatingStatus(1);
                    } else {
                        $objRating->setRatingStatus(0);
                    }
                    if ($objRatingManager->AddRating($objRating))
                        echo "<span style='color: #a71010;padding-left:100px;'>Rating is successfully Added</span>";
                } catch (Exception $exc) {
                    echo $exc->getMessage();
                }
            }
            ?>
            <h3 style="padding-left:8%;">Add Rating</h3>
            
            <form class="form-horizontal" id="addRatingForm" method="post" action="addrating.php">
                <div class="control-group">
                    <label class="control-label" for="inputName" >Rating Value</label>
                    <div class="controls">
                        <input type="text" name="ratingValue" id="ratingValue" placeholder="Rating Value" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputDescription">Rating Description</label>
                    <div class="controls">
                        <input type="text" name="ratingDescription" id="ratingDescription" placeholder="RatingDescription">
                    </div>
                </div>              

                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="RatingStatus" id="RatingStatus" value="1"> Is Active
                        </label>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
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