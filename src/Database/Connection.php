<?php

class Connection{
    private $host = '51.178.152.213';
    private $dbname = 'oasiao_agenda_db';
    private $username= 'oasiao_usr';
    private $password = 'abc123.';


    public function getConnection(){
        try{
            return new PDO("pgsql:host=$this->host;port=5432;dbname=$this->dbname;user=$this->username;password=$this->password;");
        }
        catch (PDOException $e){
            echo "ERROR EN LA CONEXIÓN!";
            die();
        }
    }
}
