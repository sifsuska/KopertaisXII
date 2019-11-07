<?php
if(isset($_GET['id'])){
		include("koneksi.php");

		$id = $_GET['id'];

		$cek = mysql_query("SELECT id_ptais FROM data_ptais WHERE id_ptais = '$id'") or die(mysql_error());

		if(mysql_num_rows($cek) == 0){
			echo "<script>window.history.back()</script>";
		}
		else{
			$del = mysql_query("DELETE FROM data_ptais WHERE id_ptais = '$id'");

			if ($del){
echo "<script languange='javascript'>
			alert('Data Berhasil Dihapus!');
			window.open('data.php','_top');
			</script>";
} else { echo "Data gagal dihapus
	<meta http-equiv='refresh' content='2; url= add.php'/> ";
}
		}
	}
?>