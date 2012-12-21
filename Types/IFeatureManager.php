<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IFeatureManager {
    public function AddFeature(IFeature $IFeature);
    public function EditFeature(IFeature $IFeature);
    public function RemoveFeature($id);        
    public function GetFeatureById($id);
    public function GetAllActiveFeatures();
    public function GetAllInActiveFeatures();
    public function GetAllFeatures();
    public function GetFeatureList($results);
}

?>
