<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IOperatingSystemManager {
    //put your code here
    public function AddOperatingSystem(IOperatingSystem $Ios);
    public function EditOperatingSystem(IOperatingSystem $ios);
    public function RemoveOperatingSystem($id);
    public function GetAllOperatingSystems();
    public function GetAllActiveOperatingSystems();
    public function GetAllInActiveOperatingSystems();
    public function GetOperatingSystemById($id);
    public function GetApplicationswithSameOs($id);
    public function GetCompanieswithSameOs($id);
}

?>
