<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface ICompanyManager {
    //put your code here
    public function AddCompany(ICompany $ICompany, ICompanyContact $IContact);
    public function EditCompany(ICompany $ICompany,ICompanyContact $Icontact);
    public function RemoveCompany($id);        
    public function GetCompanyById($id);
    public function GetAllActiveCompanies();
    public function GetAllInActiveCompanies();
    public function GetAllCompanis();
    public function GetCompaniesList($results);
    public function GetCompanyByName($countryName);
}

?>
