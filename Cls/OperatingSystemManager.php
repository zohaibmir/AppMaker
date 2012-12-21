<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperatingSystemManager
 *
 * @author zohaib
 */
class OperatingSystemManager implements IOperatingSystemManager {

    //put your code here

    public function AddOperatingSystem(IOperatingSystem $Ios) {
         try {
            $objOsModel = new OperatingSystemModel();
            return $objOsModel->AddOperatingSystem($Ios);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function EditOperatingSystem(IOperatingSystem $ios) {
         try {
            $objOsModel = new OperatingSystemModel();
            return $objOsModel->EditOperatingSystem($ios);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function RemoveOperatingSystem($id) {
        try {
            $objOsModel = new OperatingSystemModel();
            return $objOsModel->RemoveOperatingSystem($id);
        } catch (Exception $exc) {
            throw $exc;
        }        
    }

    public function GetAllOperatingSystems() {
        try {
            $objOsModel = new OperatingSystemModel();            
            $results = $objOsModel->GetAllOperatingSystems();
            return $this->GetOsList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetAllActiveOperatingSystems() {
        try {
            $objOsModel = new OperatingSystemModel();            
            $results = $objOsModel->GetAllActiveOperatingSystems();
            return $this->GetOsList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetAllInActiveOperatingSystems() {
        try {
            $objOsModel = new OperatingSystemModel();            
            $results = $objOsModel->GetAllInActiveOperatingSystems();
            return $this->GetOsList($results);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetOperatingSystemById($id) {
         try {            
            $objOsModel = new OperatingSystemModel();
            $objOS = new OperatingSystem();
            $results = $objOsModel->GetOperatingSystemById($id);
            $objOS->setOsId($results[0]["id"]);
            $objOS->setOsName($results[0]["name"]);
            $objOS->setOsIconPath($results[0]["icon_path"]);
            $objOS->setOsStatus($results[0]["status"]);
            $objOS->setOsVersion($results[0]["version"]);
            $objOS->setOsCreationDate($results[0]["creation_date"]);
            $objOS->setOsModificationDate($results[0]["updation_date"]);
            return $objOS;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
     public function GetOsList($results) {        
         try {
         for ($i = 0; $i < count($results); $i++) {
            $objOS = new OperatingSystem();            
            $objOS->setOsId($results[$i]["id"]);
            $objOS->setOsName($results[$i]["name"]);
            $objOS->setOsIconPath($results[$i]["icon_path"]);
            $objOS->setOsStatus($results[$i]["status"]);
            $objOS->setOsVersion($results[$i]["version"]);
            $objOS->setOsCreationDate($results[$i]["creation_date"]);
            $objOS->setOsModificationDate($results[$i]["updation_date"]);
           $ratingList[] = $objOS;
       }
       return $ratingList;
        } catch (Exception $exc) {
            throw  $exc;
        }
    }

    public function GetApplicationswithSameOs($id) {
        
    }

    public function GetCompanieswithSameOs($id) {
        
    }

}

?>
