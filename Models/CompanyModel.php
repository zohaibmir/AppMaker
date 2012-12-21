<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyModel
 *
 * @author zohaib
 */
class CompanyModel {

    private $dbConnection; // Connection Class Object
    private $m_Result; // Result returned from the Database;
    private $PdoConnection;

    public function __construct() {
        $this->dbConnection = Connection::Connect();
        $this->PdoConnection = PdoConnection::Connect();
    }

    public function AddCompany(ICompany $ICompany, ICompanyContact $IContact) {
        try {
            $query = "Insert Into companycontact (name, email, creation_date, updation_date) VALUES ('" . $IContact->getCompanyContactName() . "','" . $IContact->getCompanyContactEmail() . "','" . $IContact->getCompanyContactCreationDate() . "','" . $IContact->getCompanyContactModificationDate() . "')";
            $this->PdoConnection->StartTransaction();
            if ($this->PdoConnection->ExecuteQuery($query)) {
                $ICompany->setCompanyContactId($this->PdoConnection->getLastEffectedId());
                $query = "Insert Into companies(name, description, company_url, facebook_url,twitter_url, is_sponsored, status, fee_id, ccontact_id, user_id, creation_date, updation_date, country_id, sponsor_expirey) VALUES ('" . $ICompany->getCompanyName() . "','" . $ICompany->getCompanyDescription() . "','" . $ICompany->getCompanyUrl() . "','" . $ICompany->getCompanyFacebookUrl() . "','" . $ICompany->getCompanyTwitterUrl() . "','" . $ICompany->getCompanyIsSponsored() . "','" . $ICompany->getCompanyStatus() . "','" . $ICompany->getCompanyFeeRangeId() . "','" . $ICompany->getCompanyContactId() . "','" . $ICompany->getCompanyUserId() . "','" . $ICompany->getCompanyCreationnDate() . "','" . $ICompany->getCompanyModificationDate() . "','" . $ICompany->getCompanyCountryId() . "','" . $ICompany->getCompanySponsorExpireyDate() . "')";
                if ($this->PdoConnection->ExecuteQuery($query)) {
                    $company_id = $this->PdoConnection->getLastEffectedId();
                    $this->InsertCompanyPlatform($company_id, $ICompany->getCompanyPlateforms());
                }
            }
            $this->PdoConnection->CommitTransaction();
            return true;
        } catch (Exception $exc) {
            $this->PdoConnection->RollBackTransaction();
            throw $exc;
        }
    }

    public function EditCompany(ICompany $ICompany, ICompanyContact $IContact) {

        try {
            $this->PdoConnection->debug = true;
            $query = "UPDATE Companycontact SET name = '" . $IContact->getCompanyContactName() . "',email = '" . $IContact->getCompanyContactEmail() . "',updation_date = '" . $IContact->getCompanyContactModificationDate() . "'  WHERE Id = " . $IContact->getCompanyContactId() . "";
            $this->PdoConnection->StartTransaction();
            if ($this->PdoConnection->ExecuteQuery($query)) {
                $query = "UPDATE Companies SET name = '" . $ICompany->getCompanyName() . "',description = '" . $ICompany->getCompanyName() . "',company_url = '" . $ICompany->getCompanyUrl() . "',facebook_url = '" . $ICompany->getCompanyFacebookUrl() . "',twitter_url = '" . $ICompany->getCompanyTwitterUrl() . "',is_sponsored = '" . $ICompany->getCompanyIsSponsored() . "',status = '" . $ICompany->getCompanyStatus() . "',fee_id = '" . $ICompany->getCompanyFeeRangeId() . "',updation_date = '" . $ICompany->getCompanyModificationDate() . "'  WHERE Id = " . $ICompany->getCompanyId() . "";
                if ($this->PdoConnection->ExecuteQuery($query)) {
                    $this->RemoveCompanyPlatforms($ICompany->getCompanyId());
                    $this->InsertCompanyPlatform($ICompany->getCompanyId(), $ICompany->getCompanyPlateforms());
                }
            }
            $this->PdoConnection->CommitTransaction();
            return true;
        } catch (Exception $exc) {
            $this->PdoConnection->RollBackTransaction();
            throw $exc;
        }
        
    }
    
    public function RemoveCompany($companyId,$contactId) {
        try {
            $this->PdoConnection->StartTransaction();
            $query = "Delete from Companies where 1 = 1 and id = " . $companyId;
            if ($this->PdoConnection->ExecuteQuery($query)) {
                if($this->RemoveCompanyPlatforms($companyId)) {
                    if($this->RemoveCompanyContact($contactId)) {
                        $this->PdoConnection->CommitTransaction();
                    }
                }
            }
        } catch (Exception $exc) {
            $this->PdoConnection->RollBackTransaction();
            throw  $exc;
        }
    }
    
    public function GetCompanyById($id) {
     try {
         $query = "SELECT c1.id as companyId, c1.name as companyName, c1.description as companyDescription, c1.company_url as companyUrl,
                   c1.facebook_url as fbUrl, c1.twitter_url as twitterUrl, c1.fee_id as feeId, c1.is_sponsored as sposoredCompany,
                   c1.status as companyStatus, c1.country_id as countryId, c1.ccontact_id as companyContactId,
                   c2.name as contactName, c2.email as ContactEmail
                   FROM companies as c1
                   Inner join companycontact as c2 on c1.ccontact_id = c2.id
                   having c1.id =".$id."
                   order by c1.id asc";
            $this->PdoConnection->Query($query);
            $this->m_Result = $this->PdoConnection->fetchRow();            
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;   
    }
    
     public function GetCompanyByUserId($id) {
     try {
         
         $query = "SELECT c1.id as companyId, c1.name as companyName, c1.user_id as userId, c1.description as companyDescription, c1.company_url as companyUrl,
                   c1.facebook_url as fbUrl, c1.twitter_url as twitterUrl, c1.fee_id as feeId, c1.is_sponsored as sposoredCompany,
                   c1.status as companyStatus, c1.country_id as countryId, c1.ccontact_id as companyContactId,
                   c2.name as contactName, c2.email as ContactEmail
                   FROM companies as c1
                   Inner join companycontact as c2 on c1.ccontact_id = c2.id
                   having c1.user_id =".$id."
                   order by c1.id asc";
            $this->PdoConnection->Query($query);
            $this->m_Result = $this->PdoConnection->fetchRow();            
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;   
    }
    
    protected function RemoveCompanyContact($contactId) {
        try {
            $query = "Delete FROM companycontact where 1 = 1 and id = " . $contactId;
            $this->m_Result = $this->PdoConnection->ExecuteQuery($query);
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }    
    
    protected function InsertCompanyPlatform($company_id, $platforms) {
        try {
            foreach ($platforms as $os_id) {
                $query = "Insert Into companies_platform (company_id, os_id) VALUES (" . $company_id . "," . $os_id . ")";
                $this->PdoConnection->ExecuteQuery($query);
            }
        } catch (Exception $exc) {
            throw $exc;
        }
        return true;
    }

    protected function RemoveCompanyPlatforms($companyId) {
        try {
            $query = "Delete from companies_platform where 1 = 1 and company_id = " . $companyId;
            $this->m_Result = $this->PdoConnection->ExecuteQuery($query);
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }
    
    public function GetAllCompanis() {
        try {        
        $query = "SELECT c1.id as companyId, c1.name as companyName, c1.company_url as Url,
                  c1.is_sponsored as sposoredComnay, c1.status as companyStatus, c3.lower_amount as LowLimit,
                  c3.upper_amount as upperAmount, c2.name as contactName, c2.email as ContactEmail
                  FROM companies as c1 
                  Inner join companycontact as c2 on c1.ccontact_id = c2.id
                  inner join feerange as c3 on c1.fee_id = c3.id
                  order by c1.id desc";
        if ($this->PdoConnection->Query($query)) {
            $this->m_Result = $this->PdoConnection->fetchAll();
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->m_Result;
    }
    
     public function GetAllActiveCompanis() {
         try {
        $query = "SELECT c1.id as companyId, c1.name as companyName, c1.company_url as Url,
                  c1.is_sponsored as sposoredComnay, c1.status as companyStatus, c3.lower_amount as LowLimit,
                  c3.upper_amount as upperAmount, c2.name as contactName, c2.email as ContactEmail
                  FROM companies as c1 
                  Inner join companycontact as c2 on c1.ccontact_id = c2.id
                  inner join feerange as c3 on c1.fee_id = c3.id
                  having status = 1
                  order by c1.id asc";
        if ($this->PdoConnection->Query($query)) {
            $this->m_Result = $this->PdoConnection->fetchAll();
        }
        
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }
    
     public function GetAllInActiveCompanis() {
         try {
        $query = "SELECT c1.id as companyId, c1.name as companyName, c1.company_url as Url,
                  c1.is_sponsored as sposoredComnay, c1.status as companyStatus, c3.lower_amount as LowLimit,
                  c3.upper_amount as upperAmount, c2.name as contactName, c2.email as ContactEmail
                  FROM companies as c1 
                  Inner join companycontact as c2 on c1.ccontact_id = c2.id
                  inner join feerange as c3 on c1.fee_id = c3.id
                  having status = 0
                  order by c1.name";
        if ($this->PdoConnection->Query($query)) {
            $this->m_Result = $this->PdoConnection->fetchAll();
        }
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }    
    
    public function getCompanyoperatingSystem($companyId) {
        try {
            $query = "select * from companies_platform where 1 = 1 and company_id = " . $companyId;            
            if ($this->PdoConnection->Query($query)) {
                $this->m_Result = $this->PdoConnection->fetchAll();
            }
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

}

?>
