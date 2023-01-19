<html>
<?php 
include("header.php");
include("class/Student.php");
?>
<h1>Profil Anggota</h1>
<div id="div_form">
    <form id="form_cari" name = "form_cari" action="profil.php" method="GET">
        <input type="text" name="txt_cari" placeholder="cari nama"/>
        <button id="btn_cari" name="btn_cari">Cari</button>
    </form>
</div>
<?php
$cari = filter_var((@$_GET['txt_cari']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// $cari = @$_GE['txt_cari'];
if($cari){
    // var_dump($cari);
    $hasil = Student::getMhsByName($cari);
    // echo "<pre>";
    // var_dump($hasil);
    // echo "</pre>";

?>
<div>
    <ol>
        <?php foreach(@$hasil as $row):?>
        <li><a href="profil.php?id=<?php echo $row['id'];?>"><?php echo $row['nama']."-".$row['nim'];?></a></li>
        <?php endforeach;?>
    </ol>
</div>
<?php
}
$id = @$_GET['id'];
if($id!=''){
    $data = Student::getMhsById($id);
    if($data!=null){
        echo "<table>";
        echo "<tr>";
        echo "<td>NIM</td>";
        echo "<td>:</td>";
        echo "<td>".$data['nim']."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Nama</td>";
        echo "<td>:</td>";
        echo "<td>".$data['nama']."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Prodi</td>";
        echo "<td>:</td>";
        echo "<td>".$data['prodi']."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>No HP</td>";
        echo "<td>:</td>";
        echo "<td>".$data['hp']."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Email</td>";
        echo "<td>:</td>";
        echo "<td>".$data['email']."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Operasi</td>";
        echo "<td>:</td>";
        echo "<td>
        <a href='profil.php?hapusID=".$data['id']."'>HAPUS</a>
        <a href='profil.php?ubahID=".$data['id']."'>UBAH</a>
        </td>";
        echo "</tr>";

        echo "</table>";
    }
}
$hapusID = @$_GET['hapusID'];
if($hapusID!=''){
    $hapus = Student::deleteMhsById($hapusID);
    echo @$hapus;
}
?>
<?php include("footer.php") ?>
