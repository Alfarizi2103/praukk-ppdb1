<?php 
	include "config/konek.php";
	include "library/controller.php";
	$go = new controller();
    $tabel = "register";

	@$where = "id = $_GET[id]";
    @$data = $go->cetak($con, $tabel, $where);
?>



<html>
<head>
	<title>Download Data Seluruh Peserta Didik</title>
</head>
<body>
 
	<center>
 
		<h2>DATA SELURUH PPDB SMK SEMANGAT 45</h2>
 
	</center>
 
	<table border="1" style="text-align:center" align="center">
		<tr>
			<th>No</th>
			<th>No Daftar</th>
        	<th>Nama Lengkap</th> 
        	<th>Jenis Kelamin</th> 
        	<th>Alamat Lengkap</th> 
        	<th>Agama</th>
        	<th>Asal SMP</th>
        	<th>Jurusan</th>
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
		</tr>
		<?php 
		} }
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>