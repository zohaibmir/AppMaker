<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface ICompany {
    //put your code here
    public function getCompanyId();
    public function setCompanyId($id);
    public function getCompanyName();
    public function setCompanyName($companyname);
    public function getCompanyDescription();
    public function setCompanyDescription($description);
    public function getCompanyUrl();
    public function setCompanyUrl($companyUrl);
    public function getCompanyTwitterUrl();
    public function setCompanyTwiiterUrl($twitterUrl);
    public function getCompanyFacebookUrl();
    public function setCompanyFacebooUrl($facebookUrl);
    public function getCompanyIsSponsored();
    public function setCompanyIsSponsored($sponsored);
    public function getCompanyStatus();
    public function setCompanyStatus($status);
    public function getCompanySponsorExpireyDate();
    public function setCompanySponsorExpireyDate($date);
    public function getCompanyCreationnDate();
    public function setCompanyCreationDate($date = "");
    public function getCompanyModificationDate();
    public function setCompanyModificationDate($date = "");
    public function getCompanyPlateforms();
    public function setCompanyPlatforms($platforms);
    public function getCompanyFeeRangeId();
    public function setCompanyFeeRangeId($id);
    public function getCompanyContactId();
    public function setCompanyContactId($contactId);
    public function getCompanyCountryId();
    public function setCompanyCountryId($countryId);
    
}

?>
