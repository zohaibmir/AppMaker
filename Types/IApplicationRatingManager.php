<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IApplicationRatingManager {
    public function AddRating(IApplicationRating $IRating);
    public function EditRating(IApplicationRating $IRating);
    public function RemoveRating($id);        
    public function GetRatingById($id);    
    public function GetAllRatings();
}

?>
