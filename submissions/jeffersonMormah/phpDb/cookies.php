<?php
require_once("connected.php");

class DbQuery extends Connected
{

     function saveData($name, $value, $expire)
    {
        setcookie($name, serialize($value), $expire);
    }

     function delData($name)
    {
        setcookie($name, "", time() - 60);
    }

     function getAllCustomers()
    {
        try {
            $sql = "SELECT * FROM customerz";
            $stmt  = $this->connect()->query($sql);
            $results = $stmt->fetchAll();

            // save session in cookie
            $this->saveData('customerz', $results, time() + 7200);
            return $results;
        } catch (PDOException $e) {
            die("ERROR: Could not execute $sql. " . $e->getMessage());
        }
    }

}; 
?> 