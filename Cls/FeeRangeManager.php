<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FeeRangeManager
 *
 * @author zohaib
 */
class FeeRangeManager implements IFeeRangeManager {

    //put your code here
    public function AddFeeRange(IFeeRange $IFeeRange) {
        try {
            $objFeeModel = new FeeRangeModel();
            return $objFeeModel->AddFeeRange($IFeeRange);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function EditFeeRange(IFeeRange $IFeeRange) {
        try {
            $objFeeModel = new FeeRangeModel();
            return $objFeeModel->EditFeeRange($IFeeRange);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function RemoveFeeRange($id) {
        try {
            $objFeeModel = new FeeRangeModel();
            return $objFeeModel->RemoveFeeRange($id);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetFeeRangeById($id) {
        try {
            $objFeeModel = new FeeRangeModel();
            $objFee = new FeeRange();
            $results =  $objFeeModel->GetFeeRangeById($id);
            $objFee->setFeeId($results["id"]);
            $objFee->setFeeLowerValue($results["lower_amount"]);
            $objFee->setFeeUpperValue($results["upper_amount"]);
            $objFee->setFeeStatus($results["status"]);
            $objFee->setFeeDescription($results["description"]);
            $objFee->setFeeCreationDate($results["creation_date"]);
            $objFee->setFeeUpdationDate($results["updation_date"]);            
        } catch (Exception $exc) {
            throw $exc;
        }
        return $objFee;
    }

    public function GetAllActiveFeeRange() {
        try {
            $objFeeModel = new FeeRangeModel();
            $results = $objFeeModel->GetAllActiveFeeRange();
            return $this->GetFeeRangeList($results);            
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetAllInActiveFeeRange() {
        try {
            $objFeeModel = new FeeRangeModel();
            $results = $objFeeModel->GetAllInActiveFeeRange();
            return $this->GetFeeRangeList($results);            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function GetAllFeeRange() {
        try {
            $objFeeModel = new FeeRangeModel();
            $results = $objFeeModel->GetAllFeeRange();
            return $this->GetFeeRangeList($results);            
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function GetFeeRangeList($results) {        
        for ($i = 0; $i < count($results); $i++) {
           $objFee = new FeeRange();
            $objFee->setFeeId($results[$i]["id"]);
            $objFee->setFeeLowerValue($results[$i]["lower_amount"]);
            $objFee->setFeeUpperValue($results[$i]["upper_amount"]);
            $objFee->setFeeStatus($results[$i]["status"]);
            $objFee->setFeeDescription($results[$i]["description"]);
            $objFee->setFeeCreationDate($results[$i]["creation_date"]);
            $objFee->setFeeUpdationDate($results[$i]["updation_date"]);            
           $feeList[] = $objFee;
       }
       return $feeList;
        
    }
}

?>
