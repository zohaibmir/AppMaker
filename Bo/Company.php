<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Company
 *
 * @author zohaib
 */
class Company implements ICompany {
    //put your code here
    
    private $_id;
    private $_companyName;
    private $_description;
    private $_companyUrl;
    private $_facebookUrl;
    private $_twitterUrl;
    private $_sponsored;
    private $_status;
    private $_creationDate;
    private $_updationDate;
    private $_expiryDate;
    //Foreign Keys
    
    private $_platformId;
    private $_feeId;
    private $_userId;
    private $_contactId;
    private $_countryId;


    public function __construct() {
        $this->_creationDate = date('Y-m-d H:i:s');
        $this->_updationDate = date('Y-m-d H:i:s');
        $this->_sponsored = 0;
        $this->_expiryDate = date('Y-m-d H:i:s');
        $this->_userId = 1;
    }   

    public function getCompanyId(){
        return $this->_id;
    }
    public function setCompanyId($id) {
        $this->_id = $id;
    }
    public function getCompanyName() {
        return $this->_companyName;
    }
    public function setCompanyName($companyname) {
        if(empty($companyname) || !isset($companyname))
            throw new Exception("Please Enter The Company Name");
        else
            $this->_companyName = $companyname;
    }
    public function getCompanyDescription() {
        return $this->_description;
    }
    public function setCompanyDescription($description) {
        $this->_description = $description;
    }
    public function getCompanyUrl() {
        return $this->_companyUrl;
    }
    public function setCompanyUrl($companyUrl){
        $this->_companyUrl = $companyUrl;
    }
    public function getCompanyTwitterUrl() {
        return $this->_twitterUrl;
    }
    public function setCompanyTwiiterUrl($twitterUrl) {
        $this->_twitterUrl = $twitterUrl;
    }
    public function getCompanyFacebookUrl() {
        return $this->_facebookUrl;
    }
    public function setCompanyFacebooUrl($facebookUrl) {
        $this->_facebookUrl =  $facebookUrl;
    }
    public function getCompanyIsSponsored() {
        return $this->_sponsored;
    }
    public function setCompanyIsSponsored($sponsored) {
        $this->_sponsored = $sponsored;
    }
    public function getCompanyStatus() {
        return $this->_status;
    }
    public function setCompanyStatus($status) {
        $this->_status = $status;
    }
    public function getCompanySponsorExpireyDate() {
        return $this->_expiryDate;
    }
    public function setCompanySponsorExpireyDate($date) {
        $this->_expiryDate = $date;
    }
    public function getCompanyCreationnDate() {
        return $this->_creationDate;
    }
    public function setCompanyCreationDate($date = "") {
        if (!empty($date)) {
            $this->_creationDate = $date;
        }
    }
    public function getCompanyModificationDate() {
        return $this->_updationDate;
    }
    public function setCompanyModificationDate($date = "") {
         if (!empty($date)) {
            $this->_updationDate = $date;
        }
    }
    public function getCompanyPlateforms() {
        return $this->_platformId;
        
    }
    public function setCompanyPlatforms($platforms) {
        $this->_platformId = $platforms;
    }
    public function getCompanyFeeRangeId() {
        return $this->_feeId;
    }
    public function setCompanyFeeRangeId($id) {
        $this->_feeId = $id;
    }
    public function getCompanyContactId() {
        return $this->_contactId;
    }
    public function setCompanyContactId($contactId) {
        $this->_contactId = $contactId;
    }
    public function getCompanyCountryId() {
        return $this->_countryId;
    }
    public function setCompanyCountryId($countryId) {
        $this->_countryId = $countryId;
    }
    public function getCompanyUserId() {
        return $this->_userId;
    }
    public function setCompanyUserId($userId = 1) {
        $this->_userId = $userId;
    }
    
    public function printCompanyInfo() {
        echo $this->_companyName . $this->_companyUrl . $this->_description . $this->_facebookUrl . $this->_twitterUrl . $this->_feeId . $this->_platformId . $this->_sponsored , $this->_status . $this->_userId . $this->_countryId , $this->_contactId;
    }
}

?>
