<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IOperatingSystem {
    //put your code here
    public function getOsId();
    public function setOsId($id);
    public function getOsName();
    public function setOsName($name);
    public function getOsIconPath();
    public function setOsIconPath($path);
    public function getOsStatus();
    public function getOsVersion();
    public function setOsVersion($version);
    public function setOsStatus($status = 0);
    public function getOsCreationDate();
    public function setOsCreationDate($date = "");
    public function getOsModificationDate();
    public function setOsModificationDate($date = "");
}

?>
