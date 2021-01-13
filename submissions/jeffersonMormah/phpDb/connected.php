<?php 

class Connected {

     $host = "localhost";
     $user = "root";
     $pwd = "mysql";
     $dbName = "ebekelchemicalz";

     function connect()  {

       try {
        $dbase = 'mysql:host=' . $this->host . ';dbname=' .  $this->dbName;
        $pdo = new PDO($dbase, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
       } catch (PDOException $e) {
           die("ERROR: Could not connect. " . $e->getMessage());
       }

       unset($pdo);
    }

}
?>