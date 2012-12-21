<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperatingSystem
 *
 * @author zohaib
 */
class OperatingSystem implements IOperatingSystem {

    //put your code here
    private $_id;
    private $_name;
    private $_version;
    private $_iconPath;
    private $_status;
    private $_creationDate;
    private $_updationDate;

    public function __construct() {
        $this->_creationDate = date('Y-m-d H:i:s');
        $this->_updationDate = date('Y-m-d H:i:s');
    }

    public function getOsId() {
        return $this->_id;
    }

    public function setOsId($id) {
        $this->_id = $id;
    }

    public function getOsName() {
        return $this->_name;
    }

    public function setOsName($name) {
        $this->_name = $name;
    }

    public function getOsIconPath() {
        return $this->_iconPath;
    }

    public function setOsIconPath($path) {
        $this->_iconPath = $path;
    }

    public function getOsStatus() {
        return $this->_status;
    }

    public function getOsVersion() {
        return $this->_version;
    }

    public function setOsVersion($version) {
        $this->_version = $version;
    }

    public function setOsStatus($status = 0) {
        $this->_status = $status;
    }

    public function getOsCreationDate() {
        return $this->_creationDate;
    }

    public function setOsCreationDate($date = "") {
        if (!empty($date)) {
            $this->_creationDate = $date;
        }
    }

    public function getOsModificationDate() {
        return $this->_creationDate;
    }

    public function setOsModificationDate($date = "") {
        if (!empty($date)) {
            $this->_updationDate = $date;
        }
    }

}

?>
