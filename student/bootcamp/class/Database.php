<?php
class Database{
    protected $host="localhost";
    protected $userdb="root";
    protected $passdb="";
    protected $namedb="bootcamp";
    public $db;

    public function __construct(){

        $koneksi = "mysql:host=".$this->host.";dbname=".$this->namedb.";charsetutf8";
        $this->db = new PDO($koneksi,$this->userdb,$this->passdb);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    }
}
?>