<?php
include "config/konek.php";
include "library/controller.php";

$go = new controller();
$tabel = "register";
$redirect = "?menu=index";
@$field = array('no_daftar'=>$_POST['no_daftar'],
                    'nama'=>$_POST['nama'],
                    'jk'=>$_POST['jk'],
                    'alamat'=>$_POST['alamat'],
                    'agama'=>$_POST['agama'],
                    'asal_smp'=> $_POST['asal_smp'],
                    'jurusan'=> $_POST['jurusan']
                );
@$where = "id = $_GET[id]";
            
        if(isset($_GET['hapus'])){
            $go->hapus($con, $tabel, $where, $redirect);
        }
        if(isset($_GET['edit'])){
            $edit = $go->edit($con, $tabel, $where);
        }
        if(isset($_POST['ubah'])){
            $go->ubah($con, $tabel, $field, $where, $redirect);
        }
?>
<!-- Navbar -->
<nav class="container" align="center">
        <a href="index.php">Pendaftaran</a>
        ||
        <a href="hasil.php">Hasil</a>
</nav>
<!-- End navbar -->
<h1 align="center">DAFTAR PPDB SMK SEMANGAT 45</h1>

<table align="center" border="1">
        <tr class="table-secondary">
            <th>No</th>
            <th>No Daftar</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Alamat Lengkap</th>
            <th>Agama</th>
            <th>Asal SMP</th>
            <th>Jurusan</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php 
            $data = $go->tampil($con, $tabel);
            $no = 0;
            if($data ==""){
                echo "<tr><td colspan='5'>No Record</td></tr>";
            }else{
                foreach($data as $r){
                    $no++
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $r['no_daftar']; ?></td>
            <td><?php echo $r['nama']; ?></td>
            <td><?php echo $r['jk']; ?></td>
            <td><?php echo $r['alamat']; ?></td>
            <td><?php echo $r['agama']; ?></td>
            <td><?php echo $r['asal_smp']; ?></td>
            <td><?php echo $r['jurusan']; ?></td>
            <td><a href="?menu=user&hapus&id=<?php echo $r['id'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger btn-sm">HAPUS</a></td>
            <td><a href="index.php?menu=user&edit&id=<?php echo $r['id'] ?>" class="btn btn-secondary btn-sm">EDIT</a></td>
            <td><a href="print-perorang.php?id=<?php echo $r['id'] ?>" class="btn btn-secondary btn-sm" target="_blank">CETAK</a></td>
        </tr>
        <?php } } ?>
    </table>
    <br>
    <br>
    <center>
    <a href="print.php"><button type="button" class="btn">Cetak Semua Data</button></a>
    </center>
