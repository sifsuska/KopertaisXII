<?php
	include('koneksi.php');
	$nama_ptais = $_POST['nama_ptais'];
	$alamat_ptais = $_POST['alamat_ptais'];
	$kabupaten = $_POST['kabupaten'];
	$akreditasi_ptais = $_POST['akreditasi_ptais'];
	$jenjang = $_POST['jenjang'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	
	$query="INSERT INTO data_ptais VALUES ('','$nama_ptais','$alamat_ptais','$kabupaten','$akreditasi_ptais','$jenjang','$latitude','$longitude')" ;

$hasil=mysql_query($query);

if ($hasil){
//header ('location:view.php');
echo "<script languange='javascript'>
			alert('Data Berhasil Disimpan!');
			window.open('data.php','_top');
			</script>";
} else { echo "Data gagal disimpan
	<meta http-equiv='refresh' content='2; url= add.php'/> ";
}
?>