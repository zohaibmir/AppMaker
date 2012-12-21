<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Country
 *
 * @author zohaib
 */
class Country implements ICountry {
    //put your code here
    private $_id;
    private $_countryName;
    private $_iso2;
    private $_iso3;
    private $_status;
    
    public function getCountryId() {
        return $this->_id;
    }
    public function setCountryId($id) {
        $this->_id = $id;
        
    }
    public function getCountryName() {
        return $this->_countryName;
    }
    public function setCountryName($name) {
        if(!isset($name) || empty($name))
            throw new Exception("Please Enter a valid Country Name");
        $this->_countryName = $name;
        
    }
    public function getCountryIso2() {
        return $this->_iso2;
    }
    public function setCountryIso2($value) {
        if(!isset($value) || empty($value) || strlen($value) > 2)
            throw new Exception("Please Enter a valid 2 Digit Country ISO2");
        $this->_iso2 = $value;
    }
    public function getCountryIso3() {
        return $this->_iso3;
    }
    public function setCountryIso3($value) {
        if(!isset($value) || empty($value) || strlen($value) > 3)
            throw new Exception("Please Enter a valid 3 Digit Country ISO3");
        $this->_iso3 = $value;
    }
    public function getCountryStatus() {
        return $this->_status;
    }
    public function setCountryStatus($status) {
        $this->_status = $status;
    }
}

?>
