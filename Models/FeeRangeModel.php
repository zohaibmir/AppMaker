<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FeeRangeModel
 *
 * @author zohaib
 */
class FeeRangeModel {
    /*
     * Fee Range Properties
      $_id  = id
      $_lowerAmount = lower_amount;
      $_upperAmount = upper_amount;
      $_description = description;
      $_status = status;
      $_creationDate = creation_date;
      $_updationDate = updation_date;
     */

    private $dbConnection;
    private $m_Result;

    public function __construct() {
        $this->dbConnection = Connection::Connect();
    }

    public function AddFeeRange(IFeeRange $IFeeRange) {
        try {            
            $query = "INSERT INTO feerange (lower_amount, upper_amount, creation_date, status, updation_date, description) VALUES (" . $IFeeRange->getFeeLowerAmount() . "," . $IFeeRange->getFeeUpperAmount() . ",'" . $IFeeRange->getFeeCreationDate() . "'," . $IFeeRange->getFeeStatus() . ",'" . $IFeeRange->getFeeUpdationDate() . "','" . $IFeeRange->getFeeDescription() . "')";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $e) {
            throw $e;
        }
        return $this->m_Result;
    }

    public function EditFeeRange(IFeeRange $IFeeRange) {
        try {            
            $query = "UPDATE feerange SET lower_amount = " . $IFeeRange->getFeeLowerAmount() . ",upper_amount = " . $IFeeRange->getFeeUpperAmount() . ",status = " . $IFeeRange->getFeeStatus() . ",updation_date = '" . $IFeeRange->getFeeUpdationDate() . "',description = '" . $IFeeRange->getFeeDescription() . "'  WHERE Id = " . $IFeeRange->getFeeId() . "";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $e) {
            throw $e;
        }
        return $this->m_Result;
    }

    public function RemoveFeeRange($id) {
     try {
            $query = "DELETE FROM Feerange WHERE Id=" . $id;
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;   
    }
    public function GetFeeRangeById($id) {
     try {
            $query = "SELECT * FROM Feerange where id =" . $id;
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchRow();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;   
    }
    public function GetAllActiveFeeRange() {
        try {
            $query = "SELECT * FROM Feerange where status = 1";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetAllInActiveFeeRange() {
        try {
            $query = "SELECT * FROM Feerange where status = 0";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }

    public function GetAllFeeRange() {
        try {
            $query = "SELECT * FROM Feerange where 1 = 1";
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
        } catch (Exception $exc) {
            throw $exc;
        }
        return $this->m_Result;
    }
}

?>
