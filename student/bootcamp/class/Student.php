<?php
require("Database.php");
class Student extends Database{
    private $nim;
    private $nama;
    private $prodi;
    private $hp;
    private $email;

    public function __construct($nim,$nama,$prodi,$hp,$email){

        parent::__construct();
        $this->nim=$nim;
        $this->nama=$nama;
        $this->prodi=$prodi;
        $this->hp=$hp;
        $this->email=$email;
    }

    public function insertMhs(){

        $query = "INSERT INTO `student` (`id`,`nim`,`nama`,`prodi`,`hp`,`email`) VALUES (NULL,?,?,?,?,?)";
        $statement = $this->db->prepare($query);
        $parameters = [$this->nim,$this->nama,$this->prodi,$this->hp,$this->email];
        if ($statement->execute($parameters)){
            echo "Insert Success!";
        } else {
            echo $this->db->errorInfo();
        }
    }

    public static function getMhs(){

        $database = new Database();
        $query = "SELECT * FROM `student`";
        $statement = $database->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function getMhsByName($nama){

        $database = new Database();
        $query = "SELECT * FROM `student` WHERE nama LIKE ?";
        $statement = $database->db->prepare($query);
        $parameters = ["%".$nama."%"];
        $statement->execute($parameters);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMhsById($id){

        $database = new Database();
        $query = "SELECT * FROM `student` WHERE id = ?";
        $statement = $database->db->prepare($query);
        $parameters = [$id];
        $statement->execute($parameters);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteMhsById($id){

        $database = new Database();
        $query = "DELETE FROM `student` WHERE id = ?";
        $statement = $database->db->prepare($query);
        $parameters = [$id];
        if ($statement->execute($parameters)){
            echo "Delete Success!";
        } else {
            echo $this->db->errorInfo();
        }
    }

    public function updateMhs($id){
        
        $query = "UPDATE `student` SET nim=?, nama=?, prodi=?, hp=?, email=? WHERE id=?";
        $statement = $this->db->prepare($query);
        $parameters = [$this->nim,$this->nama,$this->prodi,$this->hp,$this->email,$id];
        if ($statement->execute($parameters)){
            echo "Update Success!";
        } else {
            echo $this->db->errorInfo();
        }
    }
}
?>