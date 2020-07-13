<?php 
class DBConnection
{
    private $servername ;
    private $user ;
    private $password ; 
    private $databaseName ;

    public function getConnection()
    {
        $this->servername="localhost";
        $this->user = "root";
        $this->password = "";
        $this->databaseName = "nails_salon";

        $connection = mysqli_connect($this->servername,$this->user,$this->password,$this->databaseName);
        if($connection->error){
            die($connection->error->getMessage());
        }
        return $connection;
    }
}


