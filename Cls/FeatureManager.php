<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FeatureManager
 *
 * @author zohaib
 */
class FeatureManager implements IFeatureManager {

    //put your code here

    public function AddFeature(IFeature $IFeature) {
        try {
            $ObjFModel = new FeatureModel();
            return $ObjFModel->AddFeature($IFeature);
        } catch (Exception $exc) {
            throw $exc;
        }        
    }

    public function EditFeature(IFeature $IFeature) {
        try {
            $ObjFModel = new FeatureModel();
            return $ObjFModel->EditFeature($IFeature);            
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function RemoveFeature($id) {
        try {
            $ObjFModel = new FeatureModel();
            return $ObjFModel->RemoveFeature($id);            
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetFeatureById($id) {
        try {
            $ObjFModel = new FeatureModel();
            $objFeature = new Feature();
            $results = $ObjFModel->GetFeatureById($id);
           $objFeature->setFeatureId($results["id"]);
           $objFeature->setFeatureName($results["name"]);
           $objFeature->setFeatureDescription($results["description"]);
           $objFeature->setFeatureStatus($results["status"]);
           $objFeature->setFeatureCreationDate($results["creation_date"]);
           $objFeature->setFeatureModificationDate($results["updation_date"]);
           return $objFeature;
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetAllActiveFeatures() {
        try {
            $ObjFModel = new FeatureModel();
            $results = $ObjFModel->GetAllActiveFeatures();  
            return $this->getFeatureList($results);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetAllInActiveFeatures() {
       try {
            $ObjFModel = new FeatureModel();
            $results = $ObjFModel->GetAllInActiveFeatures();  
            return $this->getFeatureList($results);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetAllFeatures() {
        try {
            $ObjFModel = new FeatureModel();
            $results = $ObjFModel->GetAllFeatures();  
            return $this->getFeatureList($results);
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function getFeatureList($results) {        
       for ($i = 0; $i < count($results); $i++) {
           $objFeature = new Feature();
           $objFeature->setFeatureId($results[$i]["id"]);
           $objFeature->setFeatureName($results[$i]["name"]);
           $objFeature->setFeatureDescription($results[$i]["description"]);
           $objFeature->setFeatureStatus($results[$i]["status"]);
           $objFeature->setFeatureCreationDate($results[$i]["creation_date"]);
           $objFeature->setFeatureModificationDate($results[$i]["updation_date"]);
           $featureList[] = $objFeature;
       }
       return $featureList;
    }
    
}

?>
