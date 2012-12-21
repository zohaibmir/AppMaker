<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface ICompanyContact {
    //put your code here
    public function getCompanyContactId();
    public function setCompanyContactId($id);
    public function getCompanyContactName();
    public function setCompanyContactName($name);
    public function getCompanyContactEmail();
    public function setCompanyContactEmail($email);
    public function getCompanyContactCreationDate();
    public function setCompanyContactCreationDate($date = "");
    public function getCompanyContactModificationDate();
    public function setCompanyContactModificationDate($date = "");
}

?>
