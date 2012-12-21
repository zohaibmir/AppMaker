<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationModel
 *
 * @author zohaib
 */
class ApplicationModel {
    //put your code here
      
    private $m_Result; // Result returned from the Database;
    private $dbConnection;
    
    public function __construct() {
        $this->dbConnection = PdoConnection::Connect();        
    }    
    public function AddApplication(IApplication $IApplication) {
        try {             
             $query = "Insert Into applications (name, description, application_url, image_url, status, company_id, ranking_id, user_id, creation_date, updation_date, platform_id) VALUES ('" . $IApplication->getApplicationName() . "','" . $IApplication->getApplicationDescription() . "','" . $IApplication->getApplicationUrl() . "','" . $IApplication->getApplicationImgUrl() . "','" . $IApplication->getApplicationStatus() . "','" . $IApplication->getApplicationCompanyId() . "','" . $IApplication->getApplicationRankingId() . "','" . $IApplication->getApplicationUserId() . "','" . $IApplication->getApplicationCreationDate() . "','" . $IApplication->getApplicationUpdationDate() . "','" . $IApplication->getApplicationPlatformId() . "')";
             if($this->dbConnection->ExecuteQuery($query) > 0)
                 return true;
             else
                 throw new Exception("Problem in Adding new Application");
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function EditApplication(IApplication $IApplication) {
        try {            
            $query = "UPDATE applications SET name = '" . $IApplication->getApplicationName() . "',description = '" . $IApplication->getApplicationDescription() . "',application_url = '" . $IApplication->getApplicationUrl() . "',image_url = '" . $IApplication->getApplicationImgUrl() . "',status = '" . $IApplication->getApplicationStatus() . "',company_id = '" . $IApplication->getApplicationCompanyId() . "',ranking_id = '" . $IApplication->getApplicationRankingId() . "',updation_date = '" . $IApplication->getApplicationUpdationDate() . "',platform_id = '" . $IApplication->getApplicationPlatformId() . "'  WHERE Id = " . $IApplication->getApplicationId() . "";            
             if($this->dbConnection->ExecuteQuery($query) > 0)
                 return true;
             else
                 throw new Exception("Problem in Adding new Application");
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function RemoveApplication($id) {
        try {
            $query = "Delete from applications where  1 = 1 and id = " . $id;            
             if($this->dbConnection->ExecuteQuery($query) > 0)
                 return true;
             else
                 return FALSE;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetApplicationById($id) {
        try {
            $this->dbConnection->debug = true;
            $query = "SELECT * FROM applications where 1 = 1 and id = " .$id." order by id";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchRow();            
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }
    
     public function GetApplicationByUserId($id) {
        try {
            $this->dbConnection->debug = true;
            $query = "SELECT * FROM applications where 1 = 1 and user_id = " .$id;
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchRow();            
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }
    
    
    
    public function GetAllActiveApplications() {
        try {
            $query = "SELECT * FROM applications where 1 = 1 and status = 1 order by id";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();            
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }
    public function GetAllInActiveApplications() {
        try {
            $query = "SELECT * FROM applications where 1 = 1 and status = 0 order by id";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();            
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetAllApplications() {
        try {
            $query = "SELECT * FROM applications where 1 = 1 order by id";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();            
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }
    
}

?>
