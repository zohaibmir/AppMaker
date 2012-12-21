<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FeatureModel
 *
 * @author zohaib
 */
class FeatureModel {

    //put your code here
    /*

      private $_id;
      private $_name;
      private $_description;
      private $_status;
      private $_creationDate;
      private $_updationDate;
     */

    private $dbConnection;
    private $m_Result;

    public function __construct() {
        $this->dbConnection = Connection::Connect();
    }

    public function AddFeature(IFeature $IFeature) {
        try {
            $query = "INSERT INTO features (name, description, status, creation_date, updation_date) VALUES ('" . $IFeature->getFeatureName() . "','" . $IFeature->getFeatureDescription() . "','" . $IFeature->getFeatureStatus() . "','" . $IFeature->getFeatureCreationDate() . "','" . $IFeature->getFeatureModificationDate() . "')";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $e) {
            throw $e;
        }
        return $this->m_Result;
    }

    public function EditFeature(IFeature $IFeature) {
        try {
           $query = "UPDATE Features SET name = '" . $IFeature->getFeatureName() . "',description = '" . $IFeature->getFeatureDescription() . "',status = '" . $IFeature->getFeatureStatus() . "',updation_date = '" . $IFeature->getFeatureModificationDate() . "'  WHERE Id = " . $IFeature->getFeatureId() . "";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function RemoveFeature($id) {
        try {
            $query = "DELETE FROM Features WHERE Id=" . $id;
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetFeatureById($id) {
        try {
            $query = "SELECT * FROM features where id =" . $id;
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchRow();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetAllActiveFeatures() {
        try {
            $query = "SELECT * FROM features where status = 1";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetAllInActiveFeatures() {
        try {
            $query = "SELECT * FROM features where status = 0";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetAllFeatures() {
        try {            
            $query = "SELECT * FROM features order by id";
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
