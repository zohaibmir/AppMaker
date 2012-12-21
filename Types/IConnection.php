<?php
//namespace FaceTimeBlog\Types;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IConnection {
        public static function Connect();
        public function Query($query);
        public function fetchRow();
        public function fetchAll();
        public  function getNumRows();     
        public function Close();
	public function Error();
}

?>
