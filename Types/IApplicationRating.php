<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IApplicationRating {
    //put your code here
    public function getRatingId();
    public function setRatingId($id);
    public function getRatingValue();
    public function setRatingValue($value);
    public function getRatingDescription();
    public function setRatingDescription($description);
    public function getRatingCreationDate();
    public function setRatingCreationDate($date = "");
    public function getRatingModificationDate();
    public function setRatingModificationDate($date = "");
}

?>
