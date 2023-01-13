<?php
    include("header.php");
    include("class/Student.php");
?>
    <h1>Daftar Anggota</h1>
    <table class="tabel">
        <tr>
            <td>ID</td>
            <td>NIM</td>
            <td>Prodi</td>
            <td>Nama</td>
            <td>No HP</td>
            <td>Email</td>
        </tr>
        <?php
            foreach(Student::getMhs() as $row):
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['nim'];?></td>
            <td><?php echo $row['nama'];?></td>
            <td><?php echo $row['prodi'];?></td>
            <td><?php echo $row['hp'];?></td>
            <td><?php echo $row['email'];?></td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
    <?php include("footer.php");?>