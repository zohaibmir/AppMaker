<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CountryManager
 *
 * @author zohaib
 */
class CountryManager implements ICountryManager{
    public function AddCountry(ICountry $ICountry) {
         try {
            $objCModel = new CountryModel();
            return $objCModel->AddCountry($ICountry);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function EditCountry(ICountry $ICountry) {
        try {
            $objCModel = new CountryModel();
            return $objCModel->EditCountry($ICountry);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function RemoveCountry($id) {
        try {
            $objCModel = new CountryModel();
            return $objCModel->RemoveCountry($id);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetCountryById($id) {
        try {            
            $objCModel = new CountryModel();
            $objCountry = new Country();
            $results = $objCModel->GetCountryById($id);
            $objCountry->setCountryId($results["id"]);
            $objCountry->setCountryName($results["country"]);
            $objCountry->setCountryIso2($results["iso2"]);
            $objCountry->setCountryIso3($results["iso3"]);
            $objCountry->setCountryStatus($results["status"]);
            return $objCountry;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetAllActiveCountries() {
         try {
            $objCModel = new CountryModel();
            $results = $objCModel->GetAllActiveCountries();
            return $this->GetCountriesList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetAllInActiveCountries() {
         try {
            $objCModel = new CountryModel();
            $results = $objCModel->GetAllInActiveCountries();
            return $this->GetCountriesList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetAllCountries() {
         try {
            $objCModel = new CountryModel();
            $results = $objCModel->GetAllCountries();
            return $this->GetCountriesList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetCountryByName($countryName) {
        try {
            $objCModel = new CountryModel();            
            $results = $objCModel->GetCountryByName($countryName);
            return $this->GetCountriesList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetCountriesList($results) {
         try {
         for ($i = 0; $i < count($results); $i++) {
            $objCountry = new Country();            
            $objCountry->setCountryId($results[$i]["id"]);
            $objCountry->setCountryName($results[$i]["country"]);
            $objCountry->setCountryIso2($results[$i]["iso2"]);
            $objCountry->setCountryIso3($results[$i]["iso3"]);
            $objCountry->setCountryStatus($results[$i]["status"]);
           $countryList[] = $objCountry;
       }
       return $countryList;
        } catch (Exception $exc) {
            throw  $exc;
        }
    }
}

?>
