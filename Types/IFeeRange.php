<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IFeeRange {
    //put your code here
    public function getFeeId();
    public function setFeeId($id);
    public function getFeeLowerAmount();
    public function setFeeLowerValue($value);
    public function getFeeUpperAmount();
    public function setFeeUpperValue($value);
    public function getFeeDescription();
    public function setFeeDescription($description);
    public function getFeeStatus();
    public function setFeeStatus($status = 0);
    public function getFeeCreationDate();
    public function setFeeCreationDate($date = "");
    public function getFeeUpdationDate();
    public function setFeeUpdationDate($date = "");
    
}

?>
