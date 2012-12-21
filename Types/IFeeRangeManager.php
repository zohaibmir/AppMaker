<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IFeeRangeManager {
    //put your code here
    public function AddFeeRange(IFeeRange $IFeeRange);
    public function EditFeeRange(IFeeRange $IFeeRange);
    public function RemoveFeeRange($id);        
    public function GetFeeRangeById($id);
    public function GetAllActiveFeeRange();
    public function GetAllInActiveFeeRange();
    public function GetAllFeeRange();
    public function GetFeeRangeList($results);
}

?>
