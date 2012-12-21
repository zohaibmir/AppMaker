<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicaitonRatingManager
 *
 * @author zohaib
 */
class ApplicaitonRatingManager implements IApplicationRatingManager {

    //put your code here
    public function AddRating(IApplicationRating $IRating) {
        try {
            $objRatingModel = new ApplicationRatingModel();
            return $objRatingModel->AddRating($IRating);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function EditRating(IApplicationRating $IRating) {
        try {
            $objRatingModel = new ApplicationRatingModel();
            return $objRatingModel->EditRating($IRating);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function RemoveRating($id) {
        try {
            $objRatingModel = new ApplicationRatingModel();
            return $objRatingModel->RemoveRating($id);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetRatingById($id) {
        try {
            $objRatingModel = new ApplicationRatingModel();
            $objRating = new ApplicationRating();
            $results = $objRatingModel->GetRatingById($id);
            $objRating->setRatingId($results["id"]);
            $objRating->setRatingValue($results["value"]);
            $objRating->setRatingDescription($results["description"]);
            $objRating->setRatingCreationDate($results["creation_date"]);
            $objRating->setRatingModificationDate($results["updation_date"]);
            $objRating->setRatingStatus($results["status"]);
            return $objRating;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetAllRatings() {
        try {
            $objRatingModel = new ApplicationRatingModel();            
            $results = $objRatingModel->GetAllRatings();
            return $this->getRatingList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function GetActiveRatings(){
         try {
            $objRatingModel = new ApplicationRatingModel();            
            $results = $objRatingModel->GetActiveRatings();
            return $this->getRatingList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function GetInActiveRatings(){
         try {
            $objRatingModel = new ApplicationRatingModel();            
            $results = $objRatingModel->GetInActiveRatings();
            return $this->getRatingList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function getRatingList($results) {        
       for ($i = 0; $i < count($results); $i++) {
            $objRating = new ApplicationRating();            
            $objRating->setRatingId($results[$i]["id"]);
            $objRating->setRatingValue($results[$i]["value"]);
            $objRating->setRatingDescription($results[$i]["description"]);
            $objRating->setRatingCreationDate($results[$i]["creation_date"]);
            $objRating->setRatingModificationDate($results[$i]["updation_date"]);
            $objRating->setRatingStatus($results[$i]["status"]);
           $ratingList[] = $objRating;
       }
       return $ratingList;
    }
    

}

?>
