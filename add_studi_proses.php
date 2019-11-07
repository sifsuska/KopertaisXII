<?php
	include('koneksi.php');
	$program_studi = $_POST['program_studi'];
	$akreditasi = $_POST['akreditasi'];
	$id_ptais = $_POST['id_ptais'];
	
	$query="INSERT INTO data_ps VALUES ('','$id_ptais','$program_studi','$akreditasi')" ;

$hasil=mysql_query($query);


if ($hasil){
//header ('location:view.php');
echo "<script languange='javascript'>
			alert('Data Berhasil Disimpan!');
			window.open('data.php');
			</script>";
} else { echo "Data gagal disimpan
	<meta http-equiv='refresh' content='2; url= data.php'/> ";
}
?>