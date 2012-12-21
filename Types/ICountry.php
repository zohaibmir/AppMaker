<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface ICountry {
    //put your code here
    public function getCountryId();
    public function setCountryId($id);
    public function getCountryName();
    public function setCountryName($name);
    public function getCountryIso2();
    public function setCountryIso2($value);
    public function getCountryIso3();
    public function setCountryIso3($value);
    public function getCountryStatus();
    public function setCountryStatus($status);
}

?>
