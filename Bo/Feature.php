<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Feature
 * The purpose of this class is to add the features and then admin can associate the features with the User Application
 * User then can search on the system based on the Application features.
 * @author zohaib
 */
//namespace AppMaker\Bo 

class Feature implements IFeature {

    private $_id;
    private $_name;
    private $_description;
    private $_status;
    private $_creationDate;
    private $_updationDate;

    public function __construct() {
        $this->_creationDate = date('Y-m-d H:i:s');
        $this->_updationDate = date('Y-m-d H:i:s');
    }

    public function getFeatureId() {
        return $this->_id;
    }

    public function setFeatureId($id) {
        $this->_id = $id;
    }

    public function getFeatureName() {
        return $this->_name;
    }

    public function setFeatureName($name) {
        $this->_name = $name;
    }

    public function getFeatureDescription() {
        return $this->_description;
    }

    public function setFeatureDescription($description = "") {
        $this->_description = $description;
    }

    public function getFeatureStatus() {
        return $this->_status;
    }

    public function setFeatureStatus($status = 0) {
        $this->_status = $status;
    }

    public function getFeatureCreationDate() {
        return $this->_creationDate;
    }

    public function setFeatureCreationDate($date = "") {
        if (!empty($date)) {
            $this->_creationDate = $date;
        }
    }

    public function getFeatureModificationDate() {
        return $this->_creationDate;
    }

    public function setFeatureModificationDate($date = "") {
        if (!empty($date)) {
            $this->_updationDate = $date;
        }
    }
}

?>
