<?php

//namespace AppMaker\Cls\Config;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationSetting
 * The Purpose of this class is to keep the application level configuration Information 
 * 
 * @author zohaib
 */
class ApplicationSetting {
    // APplication Name

    const APPLICATION_NAME = "APP MAKER";
    const APPLICATION_ROUTE = "http://localhost/AppMaker/";

    //DataBase Configuration
    const DATABASE_HOST = "localhost";
    const DATABASE_NAME = "appmaker";
    const DATABASE_USER = "root";
    const DATABASE_PASSWORD = "root";

    // Application Setting


    public static function js_sc($str) {
        $pattern[0] = '/script/';
        $pattern[1] = '/on/';
        $replacement[0] = 'scr<b></b>ipt';
        $replacement[1] = 'o<b></b>n';
        $string = preg_replace($pattern, $replacement, $str);
        return $string;
    }

}

?>
