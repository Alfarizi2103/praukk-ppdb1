<?php
include "config/konek.php";
include "library/controller.php";

$go = new controller();
$tabel = "register";
$redirect = "hasil.php?menu=index";
@$field = array('no_daftar'=>$_POST['no_daftar'],
                    'nama'=>$_POST['nama'],
                    'jk'=>$_POST['jk'],
                    'alamat'=>$_POST['alamat'],
                    'agama'=>$_POST['agama'],
                    'asal_smp'=> $_POST['asal_smp'],
                    'jurusan'=> $_POST['jurusan']
                );
@$where = "id = $_GET[id]";
            
        if(isset($_POST['simpan'])){
            $go->simpan($con, $tabel, $field, $redirect);
        }
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
<h1 align="center">PENDAFTARAN PPDB SMK SEMANGAT 45</h1>

<div class="container">
<form method="POST" class="mt-4"> 
        <table align="center">
            <div class="d-flex justify-content-center">
                <tr>
                    <td>No Daftar</td>
                    <td>:</td>
                    <td><input type="number" name="no_daftar" id="no_daftar" value="<?php echo @$edit['no_daftar'] ?>" required></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><input type="text" name="nama" id="nama" value="<?php echo @$edit['nama'] ?>" required></td>
                </tr>
                <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><select name="jk" value="<?php echo @$edit['jk'] ?>" class="form-control m-1" required>
                        <!-- <option selected disabled>Jenis Kelamin</option> -->
                        <option disabled selected>Pilih Jenis Kelamin</option>
                        <option value="perempuan" <?php if(@$edit['jk'] == 'perempuan'){ echo 'selected';}?>>perempuan</option>
                        <option value="laki-laki" <?php if(@$edit['jk'] == 'laki-laki'){ echo 'selected';}?>>laki-laki</option>
                    </select>
                </td>
            </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td>:</td>
                    <td><input type="text" name="alamat" id="alamat" value="<?php echo @$edit['alamat'] ?>" required></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><input type="text" name="agama"  id="agama" value="<?php echo @$edit['agama'] ?>" required></td>
                </tr>
                <tr>
                    <td>Asal SMP</td>
                    <td>:</td>
                    <td><input type="text" name="asal_smp" id="asal_smp" value="<?php echo @$edit['asal_smp'] ?>" required></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td><select name="jurusan" value="<?php echo @$edit['jurusan'] ?>" class="form-control m-1" required>
                        <!-- <option selected disabled>Jenis Kelamin</option> -->
                        <option disabled selected>Pilih Jurusan</option>
                        <option value="Rekayasa Perangkat Lunak" <?php if(@$edit['jurusan'] == 'Rekayasa Perangkat Lunak'){ echo 'selected';}?>>Rekayasa Perangkat Lunak</option>
                        <option value="Tata Boga" <?php if(@$edit['jurusan'] == 'Tata Boga'){ echo 'selected';}?>>Tata Boga</option>
                        <option value="Tata Busana" <?php if(@$edit['jurusan'] == 'Tata Busana'){ echo 'selected';}?>>Tata Busana</option>
                        <option value="Multimedia" <?php if(@$edit['jurusan'] == 'Multimedia'){ echo 'selected';}?>>Multimedia</option>
                    </select>
                    </td>
                </tr>
                <tr>
                <td></td>
                <td></td>
                <td>
                    <?php if(@$_GET['id']==""){ ?>
                        <input type="submit" class="btn" name="simpan" value="SIMPAN">
                    <?php }else{ ?>
                        <a href="hasil.php">
                        <input type="submit" class="btn" name="ubah" value="UBAH" >
                        </a>
                    <?php } ?>
                </td>
            </tr>
            
        </table>
    </form>
    
    
</div>
