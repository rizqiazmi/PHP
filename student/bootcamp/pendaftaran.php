<?php 
include("header.php");
include("class/Student.php");

$ubahID = @$_GET['ubahID'];
if($ubahID!=''){
    $data = Student::getMhsById($ubahID);
    // var_dump($data);
}
    
?>    
    <h1>Pendaftaran Anggota</h1>

    <div id="div_form">
        <form id="formDaftar" name="formDaftar" action="proses.php" method="POST">
            <div class="inputGroup">
                <label>NIM:</label><br>
                <input type="text" id="txtNim" name="txtNim" value="<?php echo (@$data!=null?$data['nim']:'');?>"/>
            </div>
            <div class="inputGroup">
                <label>Nama Lengkap:</label>
                <input type="text" id="txtNama" name="txtNama" value="<?php echo (@$data!=null?$data['nama']:'');?>"/>
            </div>
            <div class="inputGroup">
                <label>Program Studi:</label>
                <input type="text" id="txtProdi" name="txtProdi" value="<?php echo (@$data!=null?$data['prodi']:'');?>"/>
            </div>
            <div class="inputGroup">
                <label>No HP:</label>
                <input type="text" id="txtHP" name="txtHP" value="<?php echo (@$data!=null?$data['hp']:'');?>"/>
            </div>
            <div class="inputGroup">
                <label>Email:</label><br>
                <input type="text" id="txtEmail" name="txtEmail" value="<?php echo (@$data!=null?$data['email']:'');?>"/>
            </div>
            <div class="inputGroup"><br>
                <input type="hidden" id="hddId" name="hddId" value="<?php echo (@$data!=null?$data['id']:'');?>"/>
                <button type="submit"><?php echo (@$data!=null?'Simpan Perubahan':'Daftar');?></button>
            </div>
        </form>


</div>
<?php include("footer.php");?>