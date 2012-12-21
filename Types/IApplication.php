<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IApplication
 *
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
 * @author zohaib
 */
interface IApplication {
    //put your code here
    public function getApplicationId();
    public function setApplicationId($id);
    public function getApplicationName();
    public function setApplicationName($name);
    public function getApplicationDescription();
    public function setApplicationDescription($description);
    public function getApplicationUrl();
    public function setApplicationUrl($url);
    public function getApplicationImgUrl();
    public function setApplicationImgUrl($url);
    public function getApplicationStatus();
    public function setApplicationStatus($status);
    public function getApplicationCreationDate();
    public function setApplicationCreationDate($date = "");
    public function getApplicationUpdationDate();
    public function setApplicationUpdationDate($date = "");
    public function getApplicationCompanyId();
    public function setApplicationCompanyId($companyid);
    public function getApplicationUserId();
    public function setApplicationUserId($userid);
    public function getApplicationRankingId();
    public function setApplicationRankingId($rankingId);
    public function getApplicationPlatformId();
    public function setApplicationPlatformId($platform);
}

?>
