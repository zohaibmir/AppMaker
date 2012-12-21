<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationManager
 *
 * @author zohaib
 */
class ApplicationManager {
    //put your code here
    public function AddApplication(IApplication $IApplication) {
        try {
            $objApplicationModel = new ApplicationModel();
            return $objApplicationModel->AddApplication($IApplication);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function EditApplication(IApplication $IApplication) {
         try {
            $objApplicationModel = new ApplicationModel();
            return $objApplicationModel->EditApplication($IApplication);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function RemoveApplication($id) {
        try {
            $objApplicationModel = new ApplicationModel();
            return $objApplicationModel->RemoveApplication($id);            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetApplicationById($id) {
       try {
            $objApplicationModel = new ApplicationModel();
            $value = $objApplicationModel->GetApplicationById($id);
            $objApplication = new Application();
            $objApplication->setApplicationId($value["id"]);
            $objApplication->setApplicationName($value["name"]);
            $objApplication->setApplicationDescription($value["description"]);
            $objApplication->setApplicationUrl($value["application_url"]);
            $objApplication->setApplicationImgUrl($value["image_url"]);
            $objApplication->setApplicationStatus($value["status"]);
            $objApplication->setApplicationCreationDate($value["creation_date"]);
            $objApplication->setApplicationCompanyId($value["company_id"]);
            $objApplication->setApplicationPlatformId($value["platform_id"]);
            $objApplication->setApplicationRankingId($value["ranking_id"]);
        } catch (Exception $exc) {
            throw $exc;
        }
        return $objApplication;
    }
    public function GetAllActiveApplications() {
        try {
            $objApplicationModel = new ApplicationModel();
            $results = $objApplicationModel->GetAllActiveApplications();
            return $this->GetApplicationList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetAllInActiveApplications() {
        try {
            $objApplicationModel = new ApplicationModel();
            $results = $objApplicationModel->GetAllInActiveApplications();
            return $this->GetApplicationList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetAllApplications() {
        try {
            $objApplicationModel = new ApplicationModel();
            $results = $objApplicationModel->GetAllApplications();
            return $this->GetApplicationList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function GetApplicationList($results) {
        try {
            foreach($results as $value) {
                $objApplication = new Application();
                $objApplication->setApplicationId($value["id"]);
                $objApplication->setApplicationName($value["name"]);
                $objApplication->setApplicationDescription($value["description"]);
                $objApplication->setApplicationUrl($value["application_url"]);
                $objApplication->setApplicationImgUrl($value["image_url"]);
                $objApplication->setApplicationStatus($value["status"]);
                $objApplication->setApplicationCreationDate($value["creation_date"]);
                $objApplication->setApplicationCompanyId($value["company_id"]);
                $objApplication->setApplicationPlatformId($value["platform_id"]);
                $objApplication->setApplicationRankingId($value["ranking_id"]);
                $applicationlist[] = $objApplication;
            }
        } catch (Exception $exc) {
            throw $exc;
        }
        return $applicationlist;
    }
}

?>
