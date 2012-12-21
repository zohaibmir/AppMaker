<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperatingSystemModel
 *
 * @author zohaib
 */
class OperatingSystemModel {

    //put your code here

    private $dbConnection;
    private $m_Result;

    public function __construct() {
        $this->dbConnection = Connection::Connect();
    }

    public function AddOperatingSystem(IOperatingSystem $Ios) {
         try {
            $query = "INSERT INTO operatingsystems (name, icon_path, status, version, creation_date, updation_date) VALUES ('" . $Ios->getOsName() . "','" . $Ios->getOsIconPath() . "','" . $Ios->getOsStatus() . "','" . $Ios->getOsVersion() . "','" . $Ios->getOsCreationDate() . "','" . $Ios->getOsModificationDate() . "')";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $e) {
            throw $e;
        }
        return $this->m_Result;
    }
    
    public function EditOperatingSystem(IOperatingSystem $Ios) {
        try {
            $this->dbConnection->debug = true;
            $query = "UPDATE operatingsystems SET name = '" . $Ios->getOsName() . "',icon_path = '" . $Ios->getOsIconPath() . "',status = '" . $Ios->getOsStatus() . "',version = '" . $Ios->getOsVersion() . "',updation_date = '" . $Ios->getOsModificationDate() . "'  WHERE Id = " . $Ios->getOsId() . "";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }
     public function RemoveOperatingSystem($id) {
      try {
            $query = "DELETE FROM operatingsystems WHERE Id=" . $id;
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;   
    }
    
     public function GetAllOperatingSystems() {
      try {            
            $query = "SELECT * FROM operatingsystems order by id";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;   
    }
     public function GetAllActiveOperatingSystems() {
        try {            
            $query = "SELECT * FROM operatingsystems where status = 1 order by id";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetAllInActiveOperatingSystems() {
        try {            
            $query = "SELECT * FROM operatingsystems where status = 0 order by id";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetOperatingSystemById($id) {
     try {  
            $query = "SELECT * FROM operatingsystems where id = " . $id;
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;   
    }

    public function GetApplicationswithSameOs($id) {
        
    }

    public function GetCompanieswithSameOs($id) {
        
    }

}

?>
