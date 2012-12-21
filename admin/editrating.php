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
                    <li><a href="addrating.php">Add New Rating</a></li>
                    <li><a href="viewratings.php">All Ratings</a></li>
                    <li><a href="viewratings.php?ratingType=active">Active Rating</a></li>
                    <li><a href="viewratings.php?ratingType=inactive">Inactive Ratings</a></li>
                </ul>

            </div><!--/.well -->

        </div><!--/span-->
        <div class="span9">
            <?php
            try {
                $objRating = new ApplicationRating();
                $objRatingManager = AppMakerFactory::CreateObject("ApplicaitonRating");
                if (!empty($_GET['id'])) {
                    $objRating = $objRatingManager->GetRatingById($_GET['id']);
                }
                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    $objRating->setRatingId($_POST["ratingId"]);
                    $objRating->setRatingValue($_POST["ratingValue"]);
                    $objRating->setRatingDescription($_POST["ratingDescription"]);
                    $objRating->setRatingModificationDate(date('Y-m-d H:i:s'));
                    if (isset($_POST["RatingStatus"])) {
                        $objRating->setRatingStatus(1);
                    } else {
                        $objRating->setRatingStatus(0);
                    }
                    if ($objRatingManager->EditRating($objRating)) {
                        header("Location: viewratings.php?mesg= The Record was updated successfully");
                    }
                }
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
            ?>
            <h3 style="padding-left:8%;">Add Rating</h3>

            <form class="form-horizontal" id="addRatingForm" method="post" action="editRating.php">
                <input  type="hidden" id="ratingId" name="ratingId" size="25" class="required" value="<?php echo $objRating->getRatingId() ?>"  />                
                <div class="control-group">
                    <label class="control-label" for="inputName" >Rating Value</label>
                    <div class="controls">
                        <input type="text" name="ratingValue" id="ratingValue" value="<?php echo $objRating->getRatingValue() ?>" placeholder="Rating Value" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputDescription">Rating Description</label>
                    <div class="controls">
                        <input type="text" name="ratingDescription" id="ratingDescription" value="<?php echo $objRating->getRatingDescription() ?>" placeholder="RatingDescription">
                    </div>
                </div>              

                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="RatingStatus" id="RatingStatus" <?php if ($objRating->getRatingStatus() == '1') {
                echo 'checked="true"';
            } ?> value="1"> Is Active
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