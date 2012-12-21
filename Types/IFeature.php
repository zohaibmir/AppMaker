<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IFeature {
    
    public function getFeatureId();
    public function setFeatureId($id);
    public function getFeatureName();
    public function setFeatureName($name);
    public function getFeatureDescription();
    public function setFeatureDescription($description = "");
    public function getFeatureStatus();
    public function setFeatureStatus($status = 0);
    public function getFeatureCreationDate();
    public function setFeatureCreationDate($date = "");
    public function getFeatureModificationDate();
    public function setFeatureModificationDate($date = "");
}

?>
