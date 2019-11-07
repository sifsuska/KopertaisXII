<?php
	if(isset($_POST['nama_ptais']) 
	&& isset($_POST['kabupaten']) 
	&& isset($_POST['akreditasi_ptais']) 
	&& isset($_POST['jenjang'])
	&& isset($_POST['alamat_ptais']) 
	&& isset($_POST['latitude']) 
	&& isset($_POST['longitude']))
	{
		include('koneksi.php');

		$id = $_POST['id'];
		$nama_ptais = $_POST['nama_ptais'];
		$kabupaten = $_POST['kabupaten'];
		$akreditasi_ptais = $_POST['akreditasi_ptais'];
		$jenjang = $_POST['jenjang'];
		$alamat_ptais = $_POST['alamat_ptais'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];

		// var_dump($_POST);
		/*
		
Dataarray(8) {
  ["id"]=>string(2) "22"
  ["nama_ptais"]=>string(58) "UIN                                                       "
  ["kabupaten"]=>string(59) "DURI                                                       "
  ["akrediasi_ptais"]=>string(1) "B"
  ["jenjang"]=>string(2) "S2"
  ["alamat_ptais"]=>string(25) "jalan sukakarya pekanbaru"
  ["latitude"]=>string(9) "0.4617148"
  ["longitude"]=>string(18) "101.38800960000003"
}		
		
*/		
		
/*
UPDATE `data_ptais` 
SET `id_ptais`=[value-1],`nama_ptais`=[value-2]
,`alamat_ptais`=[value-3],`kabupaten`=[value-4]
,`akreditasi_ptais`=[value-5],`jenjang`=[value-6]
,`latitude`=[value-7],`longitude`=[value-8] WHERE 1		
*/		
		$input = mysql_query("UPDATE data_ptais SET 
		nama_ptais = '$nama_ptais', 
		kabupaten = '$kabupaten', 
		akreditasi_ptais = '$akreditasi_ptais', 
		jenjang = '$jenjang', 
		alamat_ptais = '$alamat_ptais', 
		latitude = '$latitude',  
		longitude = '$longitude'  
		WHERE id_ptais = '$id'")
		or die (mysql_error());
	
if($input){
			echo "<script languange='javascript'>
			alert('Data Berhasil Disimpan!');
			window.open('data.php','_top');
			</script>";
		}
		else{
			echo "GAGAL MENGUPDATE DATA";
			echo "<a href='data.php'>Back</a>";
		}
	}
	else
	{
		echo "Data gagal disimpan
	<meta http-equiv='refresh' content='2; url= edit.php'/>";
	}	?>
