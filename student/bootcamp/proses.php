<?php
include("class/Student.php");
$data = $_POST;
$mhs = new Student($data['txtNim'],$data['txtNama'],$data['txtProdi'],$data['txtHP'],$data['txtEmail']);
if($data['hddId']==''){
    $mhs->insertMhs();
}else {
    $mhs->updateMhs($data['hddId']);
}

header("Location:index.php");
?>