<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FeeRange
 *
 * @author zohaib
 */
class FeeRange implements IFeeRange{
    //put your code here
    private $_id;
    private $_lowerAmount;
    private $_upperAmount;
    private $_description;
    private $_status;
    private $_creationDate;
    private $_updationDate;
    
    public function __construct() {
        $this->_creationDate = date('Y-m-d H:i:s');
        $this->_updationDate = date('Y-m-d H:i:s');
    }
    
    public function getFeeId() {
        return $this->_id;
    }
    public function setFeeId($id) {
        $this->_id = $id;
    }
    public function getFeeLowerAmount() {
        return $this->_lowerAmount;
    }
    public function setFeeLowerValue($value) {
        $this->_lowerAmount = $value;
    }
    public function getFeeUpperAmount() {
        return $this->_upperAmount;
    }
    public function setFeeUpperValue($value) {
        $this->_upperAmount = $value;
    }
    public function getFeeDescription() {
        return $this->_description;
    }
    public function setFeeDescription($description) {
        $this->_description = $description;
    }
    public function getFeeStatus() {
        return $this->_status;
    }
    public function setFeeStatus($status = 0) {
        $this->_status = $status;
    }
    public function getFeeCreationDate() {
        return $this->_creationDate;
    }
    public function setFeeCreationDate($date = "") {
        if (!empty($date)) {
            $this->_creationDate = $date;
        }
    }
    public function getFeeUpdationDate() {
        return $this->_updationDate;
    }
    public function setFeeUpdationDate($date = "") {
         if (!empty($date)) {
            $this->_updationDate = $date;
        }
    }
}

?>
