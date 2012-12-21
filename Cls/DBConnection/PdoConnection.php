<?php

ini_set('memory_limit', '-1');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PdoConnection
 *
 * @author zohaib
 */
class PdoConnection {

    protected static $db;
    private $con;
    private $m_Result;
    private static $objConn = null;
    public $debug;

    private function __construct() {

        try {
            $this->con = new PDO('mysql:host=' . ApplicationSetting::DATABASE_HOST . ';dbname=' . ApplicationSetting::DATABASE_NAME, ApplicationSetting::DATABASE_USER, ApplicationSetting::DATABASE_PASSWORD);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->con->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error in Database Connection: " . $e->getMessage();
            throw $e;
        }
    }

    public static function Connect() {
        try {
            if (!isset(self::$objConn)) {
                $objConn = new PdoConnection();
            }
            return $objConn;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function StartTransaction() {
        $this->con->beginTransaction();
    }

    public function CommitTransaction() {
        $this->con->commit();
    }

    public function RollBackTransaction() {
        $this->con->rollBack();
    }

    function ExecuteQuery($statement) {
        if ($this->debug) {
            echo '<h4>Query</h4>';
            echo '<div class="info">';
            echo $statement;
            echo '</div>';
        }
        try {
            $this->m_Result = $this->con->exec($statement); //Return the number of effected rows
            if ($this->m_Result <= 0) {
                throw new Exception("Could not run query: " . $this->errorInfo());
            } 
        } catch (Exception $e) {
            throw $e;
        }
        return true;
    }

    function Query($statement) {

        if ($this->debug) {
            echo '<h4>Query</h4>';
            echo '<div class="info">';
            echo $statement;
            echo '</div>';
        }
        try {

            $this->m_Result = $this->con->query($statement); // Return result Set                       
            if (!$this->m_Result) {
                throw new Exception("Could not run query: " . $this->errorInfo());
            }
        } catch (PDOException $e) {
            echo "Could not run query: " .$this->errorInfo();
            return false;
        } catch (Exception $e) {
            throw $e;
            return false;
        }
        return true;
    }

    function fetchRow() {
        //$this->m_Result = $this->con->query($statement); // Return result Set
        if ($this->m_Result->rowCount() > 0) {
            return $this->m_Result->fetch();
        } else {
            throw new Exception("No Recored Found");
        }
    }

    public function fetchAll() {
        if ($this->m_Result->rowCount() > 0) {
            return $this->m_Result->fetchAll();
        } else {
            throw new Exception("No Recored Found");
        }
    }

    /**
     * Fetch the SQLSTATE associated with the last operation on the database handle
     * 
     * @return string 
     */
    public function errorCode() {
        return $this->con->errorCode();
    }

    /**
     * Fetch extended error information associated with the last operation on the database handle
     *
     * @return array
     */
    public function errorInfo() {
        return $this->con->errorInfo();
    }

    function getLastEffectedId() {
        return $this->con->lastInsertId();
    }

    public function queryFetchAllAssoc($statement) {
        return $this->con->query($statement)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Execute query and return one row in assoc array
     *
     * @param string $statement
     * @return array
     */
    public function queryFetchRowAssoc($statement) {
        return $this->con->query($statement)->fetch(PDO::FETCH_ASSOC);
    }

}

?>
