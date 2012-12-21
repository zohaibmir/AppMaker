<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CountryModel
 *
 * @author zohaib
 */
class CountryModel {
    /*
      private $_id;
      private $_countryName;
      private $_iso2;
      private $_iso3;
      private $_status;
     */

    private $dbConnection; // Connection Class Object
    private $m_Result; // Result returned from the Database;

    public function __construct() {
        $this->dbConnection = Connection::Connect();
    }

    public function AddCountry(ICountry $ICountry) {
        try {
            $query = "INSERT INTO countries (country, iso2, iso3, status) VALUES ('" . $ICountry->getCountryName() . "','" . $ICountry->getCountryIso2() . "','" . $ICountry->getCountryIso3() . "','" . $ICountry->getCountryStatus() . "')";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function EditCountry(ICountry $ICountry) {
        try {
            $query = "UPDATE countries SET country = '" . $ICountry->getCountryName() . "',iso2 = '" . $ICountry->getCountryIso2() . "',iso3 = '" . $ICountry->getCountryIso3() . "',status = '" . $ICountry->getCountryStatus() . "'  WHERE Id = " . $ICountry->getCountryId() . "";            
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function RemoveCountry($id) {
        try {
            $query = "DELETE FROM Countries WHERE 1 = 1 and Id=" . $id;
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetCountryById($id) {
        try {
            $query = "SELECT * FROM Countries where 1 = 1 and id =" . $id ;
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchRow();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetAllActiveCountries() {
        try {            
            $query = "SELECT * FROM countries where 1 = 1 and status = 1 order by country";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
         
    }

    public function GetAllInActiveCountries() {
        try {            
            $query = "SELECT * FROM countries where 1 = 1 and status = 0 order by country";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
        
    }

    public function GetAllCountries() {
        try {            
            $query = "SELECT * FROM countries where 1 = 1 order by country";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }
    
    public function GetCountryByName($countryName) {
        try {            
            $query = "SELECT * FROM countries where 1 = 1 and country like '". $countryName ."%'  order by country";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

}
?>
