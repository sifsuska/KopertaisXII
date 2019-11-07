<?php
	if(isset($_POST['program_studi']) 
	&& isset($_POST['akreditasi']))
	{
		include('koneksi.php');

		$id = $_POST['id'];
		$program_studi = $_POST['program_studi'];
		$akreditasi = $_POST['akreditasi'];
		
		$input = mysql_query("UPDATE data_ps SET 
		program_studi = '$program_studi', 
		akreditasi = '$akreditasi'  
		WHERE id_ps = '$id'")
		or die (mysql_error());

		//ambil id untuk link proses sesudah aksi edit dipilih.
		$show = mysql_query("SELECT * FROM data_ps WHERE id_ps = '$id'");
			while ($data = mysql_fetch_assoc($show)) {
				$get = $data['id_ptais'];
			}
	
if($input){
			echo "<script languange='javascript'>
			alert('Data Berhasil Disimpan!');
			window.open('detail.php?id=$get');
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
	}	
?>