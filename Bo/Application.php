<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Application
 *
 * @author zohaib
 */
class Application implements IApplication {
    //put your code here
    
    private $_id;
    private $_name;
    private $_description;
    private $_applicationUrl;
    private $_imagUrl;
    private $_status;
    private $_creationDate;
    private $_updationDate;
    
    private $_companyId;
    private $_userId;
    private $_rankingId;
    private $_platformId;
    
    public function __construct() {
        $this->_creationDate = date('Y-m-d H:i:s');
        $this->_updationDate = date('Y-m-d H:i:s');
        $this->_userId = 1;
        $this->_companyId = 31;
    }
    public function getApplicationId() {
         return $this->_id;
    }
    public function setApplicationId($id) {
        $this->_id = $id;
    }
    public function getApplicationName() {
        return $this->_name;
    }
    public function setApplicationName($name) {
        $this->_name = $name;
    }
    public function getApplicationDescription() {
        return $this->_description;
    }
    public function setApplicationDescription($description) {
        $this->_description = $description;
    }
    public function getApplicationUrl() {
        return $this->_applicationUrl;
    }
    public function setApplicationUrl($url) {
        $this->_applicationUrl = $url;
    }
    public function getApplicationImgUrl() {
        return $this->_imagUrl;
    }
    public function setApplicationImgUrl($url) {
        $this->_imagUrl = $url;
    }
    public function getApplicationStatus() {
        return $this->_status;
    }
    public function setApplicationStatus($status) {
        $this->_status = $status;
    }
    public function getApplicationCreationDate() {
        return $this->_creationDate;
    }
    public function setApplicationCreationDate($date = "") {
        if (!empty($date)) {
            $this->_creationDate = $date;
        }
    }
    public function getApplicationUpdationDate() {
        return $this->_updationDate;
    }
    public function setApplicationUpdationDate($date = "") {
        if (!empty($date)) {
            $this->_updationDate = $date;
        }
    }
    public function getApplicationCompanyId() {
        return $this->_companyId;
    }
    public function setApplicationCompanyId($companyid) {
        $this->_companyId = $companyid;
    }
    public function getApplicationUserId() {
        return $this->_userId;
    }
    public function setApplicationUserId($userid) {
        $this->_userId = $userid;
    }
    public function getApplicationRankingId() {
        return $this->_rankingId;
    }
    public function setApplicationRankingId($rankingId) {
        $this->_rankingId = $rankingId;
    }
    public function getApplicationPlatformId() {
        return $this->_platformId;
    }
    public function setApplicationPlatformId($platform) {
        $this->_platformId = $platform;
    }
    
    public function printValues() {
        echo "Application Name: $this->_name    ApplicationUrl: $this->_applicationUrl <br />";
        echo "Company Id: $this->_companyId    Platform Id: $this->_platformId <br />";
        echo "Application desc: $this->_description    ApplicationRanking: $this->_rankingId <br />";
        echo "Application Img Url " . $this->_imagUrl;
    }
}

?>
