<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IApplicationManager {
    //put your code here
    
    public function AddApplication(IApplication $IApplication);
    public function EditApplication(IApplication $IApplication);
    public function RemoveApplication($id);        
    public function GetApplicationById($id);
    public function GetAllActiveApplications();
    public function GetAllInActiveApplications();
    public function GetAllApplications();
    public function GetApplicationList($results);
}

?>
