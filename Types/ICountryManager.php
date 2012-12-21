<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface ICountryManager {
    public function AddCountry(ICountry $ICountry);
    public function EditCountry(ICountry $ICountry);
    public function RemoveCountry($id);        
    public function GetCountryById($id);
    public function GetAllActiveCountries();
    public function GetAllInActiveCountries();
    public function GetAllCountries();
    public function GetCountriesList($results);
    public function GetCountryByName($countryName);
}

?>
