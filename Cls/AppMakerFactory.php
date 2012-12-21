<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppMakerFactory
 * Factory of Objcts.
 * It Generats the objects of all the classes
 * @author zohaib
 */
class AppMakerFactory implements IAppMakerFactory {

    private function __construct() {
        
    }

    public static function CreateObject($type) {

        $class = $type . 'Manager';        
        if (!class_exists($class)) {
            throw new Exception("$type Not a valid class");
        }
        return new $class;
    }

}

?>
