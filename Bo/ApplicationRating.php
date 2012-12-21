<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationRating
 *
 * @author zohaib
 */
class ApplicationRating implements IApplicationRating {
    //put your code here
    
    private $_id;
    private $_value;
    private $_description;
    private $_creationDate;
    private $_updationDate;
    private $_status;
    
    public function __construct() {
         $this->_creationDate = date('Y-m-d H:i:s');
         $this->_updationDate = date('Y-m-d H:i:s');
    }
    
    public function getRatingId() {
        return $this->_id;
    }    
    public function setRatingId($id) {
        $this->_id = $id;
    }
    public function getRatingValue() {
        return $this->_value;
    }
    public function setRatingValue($value) {
        $this->_value = $value;
    }
    public function getRatingDescription() {
        return $this->_description;
    }
    
    public function setRatingDescription($description) {
        $this->_description = $description;
    }
    
     public function getRatingCreationDate() {
        return $this->_creationDate;
    }

    public function setRatingCreationDate($date = "") {
        if (!empty($date)) {
            $this->_creationDate = $date;
        }
    }

    public function getRatingModificationDate() {
        return $this->_creationDate;
    }

    public function setRatingModificationDate($date = "") {
        if (!empty($date)) {
            $this->_updationDate = $date;
        }
    }
     public function getRatingStatus() {
        return $this->_status;
    }

    public function setRatingStatus($status = 0) {
        $this->_status = $status;
    }
}

?>
