<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyContact
 *
 * @author zohaib
 */
class CompanyContact  implements ICompanyContact {
    //put your code here
    
    private $_id;
    private $_name;
    private $_email;
    private $_creationDate;
    private $_updationDate;
    
    public function __construct() {
        $this->_creationDate = date('Y-m-d H:i:s');
        $this->_updationDate = date('Y-m-d H:i:s');
    }
    public function getCompanyContactId() {
        return $this->_id;
        
    }
    public function setCompanyContactId($id) {
        $this->_id = $id;
    }
    public function getCompanyContactName() {
        return $this->_name;
    }
    public function setCompanyContactName($name) {
        $this->_name = $name;
    }
    public function getCompanyContactEmail() {
        return $this->_email;
    }
    public function setCompanyContactEmail($email) {
        $this->_email = $email;
    }
    public function getCompanyContactCreationDate() {
        return $this->_creationDate;
    }
    public function setCompanyContactCreationDate($date = "") {
        $this->_creationDate =$date;
    }
    public function getCompanyContactModificationDate() {
        return $this->_updationDate;
    }
    public function setCompanyContactModificationDate($date = "") {
        $this->_updationDate = $date;
    }
    
    public function printCompanyContactInfo() {
        
        echo $this->_name . $this->_email . $this->_creationDate , $this->_updationDate; 
    }
}

?>
