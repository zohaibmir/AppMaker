<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyManager
 *
 * @author zohaib
 */
class CompanyManager implements ICompanyManager {

    //put your code here

    public function AddCompany(ICompany $ICompany, ICompanyContact $IContact) {
        //$ICompany->printCompanyInfo();
        //$IContact->printCompanyContactInfo();
        try {
            $objCompanyModel = new CompanyModel();
            return $objCompanyModel->AddCompany($ICompany, $IContact);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function EditCompany(ICompany $ICompany, ICompanyContact $IContact) {
        try {
            $objCompanyModel = new CompanyModel();            
            return $objCompanyModel->EditCompany($ICompany, $IContact);
        } catch (Exception $exc) {
            throw $exc;
        }
        }

    public function RemoveCompany($id) {
        
    }

    public function GetCompanyById($id) {
        try {
            $objCompanyModel = new CompanyModel();
            $objCompany = new Company();
            $objCContact = new CompanyContact();
            $results = $objCompanyModel->GetCompanyById($id);
            $objCompany->setCompanyId($results["companyId"]);
            $objCompany->setCompanyName($results["companyName"]);
            $objCompany->setCompanyCountryId($results["countryId"]);
            $objCompany->setCompanyDescription($results["companyDescription"]);
            $objCompany->setCompanyUrl($results["companyUrl"]);
            $objCompany->setCompanyFacebooUrl($results["fbUrl"]);
            $objCompany->setCompanyTwiiterUrl($results["twitterUrl"]);
            $objCompany->setCompanyFeeRangeId($results["feeId"]);
            $objCompany->setCompanyStatus($results["companyStatus"]);
            $objCompany->setCompanyStatus($results["companyStatus"]);
            $objCompany->setCompanyIsSponsored($results["sposoredCompany"]);
            $objCompany->setCompanyContactId($results["companyContactId"]);
            $objCContact->setCompanyContactId($results["companyContactId"]);
            $objCContact->setCompanyContactName($results["contactName"]);
            $objCContact->setCompanyContactEmail($results["ContactEmail"]);
            $CompanyList["ObjCompany"] = $objCompany;
            $CompanyList["ObjCompanyContact"] = $objCContact;
        } catch (Exception $exc) {
            throw $exc;
        }
        return $CompanyList;
    }
    
     public function GetCompanyByUserId($id) {
        try {
            $objCompanyModel = new CompanyModel();
            $objCompany = new Company();
            $objCContact = new CompanyContact();
            $results = $objCompanyModel->GetCompanyByUserId($id);
            $objCompany->setCompanyId($results["companyId"]);
            $objCompany->setCompanyName($results["companyName"]);
            $objCompany->setCompanyCountryId($results["countryId"]);
            $objCompany->setCompanyDescription($results["companyDescription"]);
            $objCompany->setCompanyUrl($results["companyUrl"]);
            $objCompany->setCompanyFacebooUrl($results["fbUrl"]);
            $objCompany->setCompanyTwiiterUrl($results["twitterUrl"]);
            $objCompany->setCompanyFeeRangeId($results["feeId"]);
            $objCompany->setCompanyStatus($results["companyStatus"]);
            $objCompany->setCompanyStatus($results["companyStatus"]);
            $objCompany->setCompanyIsSponsored($results["sposoredCompany"]);
            $objCompany->setCompanyContactId($results["companyContactId"]);
            $objCompany->setCompanyUserId($results["userId"]);
            $objCContact->setCompanyContactId($results["companyContactId"]);
            $objCContact->setCompanyContactName($results["contactName"]);
            $objCContact->setCompanyContactEmail($results["ContactEmail"]);
            
            $CompanyList["ObjCompany"] = $objCompany;
            $CompanyList["ObjCompanyContact"] = $objCContact;
        } catch (Exception $exc) {
            throw $exc;
        }
        return $CompanyList;
    }

    public function GetAllActiveCompanies() {
        try {
            $objCompanyModel = new CompanyModel();            
            $results = $objCompanyModel->GetAllActiveCompanis();
            return $this->GetCompaniesList($results);
        } catch (Exception $exc) {
            throw  $exc;
        }
        }

    public function GetAllInActiveCompanies() {
        
    }

    public function GetAllCompanis() {
        $objCompanyModel = new CompanyModel();
        $results = $objCompanyModel->GetAllCompanis();
        return $results;
    }

    public function GetCompaniesList($results) {
        try {
            foreach ($results as $value) {
            $objCompany = new Company();            
            $objCompany->setCompanyId($value["companyId"]);
            $objCompany->setCompanyName($value["companyName"]);            
            $objlist[] = $objCompany;
            }
        } catch (Exception $exc) {
            throw  $exc;
        }
        return $objlist;
        }

    public function GetCompanyByName($countryName) {
        
    }
    public function getCompanyoperatingSystem($companyId) {
        try {
            $objCompanyModel = new CompanyModel();
            $oslist[] = array();
            $results = $objCompanyModel->getCompanyoperatingSystem($companyId);
            foreach ($results as $value) {
                $oslist[] = $value["os_id"];
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $oslist;
    }

}

?>
