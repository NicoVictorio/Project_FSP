<?php
require_once("data.php");
class ParentClass
{
    protected $mysqli;

    public function __construct(){
        $this->mysqli = new mysqli(SERVER, USERID, PASSWORD, DATABASE);
    }

    function __destruct(){
        $this->mysqli->close();
    }
}
