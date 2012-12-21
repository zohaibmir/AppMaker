<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationRatingModel
 *
 * @author zohaib
 */
class ApplicationRatingModel {
    /*
     * DateBase Fields
      private $_id Auto //Increment;
      private $_value //Rating value;
      private $_description //Rating Description;
      private $_creationDate;
      private $_updationDate;
     */

    private $dbConnection; // Connection Class Object
    private $m_Result; // Result returned from the Database;

    public function __construct() {
        $this->dbConnection = Connection::Connect();
    }

    public function AddRating(IApplicationRating $IRating) {
        try {
            $query = "INSERT INTO ratings (value, description, creation_date, updation_date, status) VALUES ('" . $IRating->getRatingValue() . "','" . $IRating->getRatingDescription() . "','" . $IRating->getRatingCreationDate() . "','" . $IRating->getRatingModificationDate() . "','" . $IRating->getRatingStatus() . "')";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function EditRating(IApplicationRating $IRating) {
        try {

            $query = "UPDATE ratings SET value = '" . $IRating->getRatingValue() . "',description = '" . $IRating->getRatingDescription() . "',updation_date = '" . $IRating->getRatingModificationDate() . "',status = '" . $IRating->getRatingStatus() . "'  WHERE Id = " . $IRating->getRatingId() . "";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function RemoveRating($id) {
        try {
            $query = "DELETE FROM Ratings WHERE Id=" . $id;
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetRatingById($id) {
        try {
            $query = "SELECT * FROM Ratings where id =" . $id;
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchRow();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetAllRatings() {
        try {            
            $query = "SELECT * FROM ratings order by id";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }
    
    public function GetActiveRatings() {
        try {            
            $query = "SELECT * FROM ratings where status = 1 order by value ";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        echo $this->m_Result;
        return $this->m_Result;
    }

    public function GetInActiveRatings() {
        try {            
            $query = "SELECT * FROM ratings where status = 0 order by value ";
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
