<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2/8/18
 * Time: 5:04 PM
 */

class DatabaseConnection
{
    public $databaseHost;
    public $databaseName;
    public $databaseUser;
    public $databasePassword;

    public function __construct($databaseHost, $databaseName, $databaseUser, $databasePassword)
    {
        //echo "This method is called while creating the instance (object) of this class<br>";
        //echo "now this property is not assigned with any value =>".$this->databaseUser."<br>";
        $this->databaseHost = $databaseHost;
        $this->databaseName = $databaseName;
        $this->databaseUser = $databaseUser;
        $this->databasePassword = $databasePassword;

        //echo "now this property is assigned with a value =>".$this->databaseUser."<br>";
    }

    public function connectDb()
    {
        try {
            $pdo = new PDO("mysql:host=".$this->databaseHost.";dbname=".$this->databaseName,
                $this->databaseUser, $this->databasePassword);
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage(); exit;
        }

        return $pdo;
    }
}