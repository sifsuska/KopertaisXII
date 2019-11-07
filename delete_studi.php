<?php
if(isset($_GET['id'])){
		include("koneksi.php");

		$id = $_GET['id'];

		//ambil id untuk link proses sesudah aksi edit dipilih.
		$show = mysql_query("SELECT * FROM data_ps WHERE id_ps = '$id'");
			while ($data = mysql_fetch_assoc($show)) {
				$get = $data['id_ptais'];
			}
		
		$cek = mysql_query("SELECT id_ps FROM data_ps WHERE id_ps = '$id'") or die(mysql_error());

		if(mysql_num_rows($cek) == 0){
			echo "<script>window.history.back()</script>";
		}
		else{
			$del = mysql_query("DELETE FROM data_ps WHERE id_ps = '$id'");

			

			if ($del){
echo "<script languange='javascript'>
			alert('Data Berhasil Dihapus!');
			window.open('detail.php?id=$get');
			</script>";
} else { echo "Data gagal dihapus
	<meta http-equiv='refresh' content='2; url= add.php'/> ";
}
		}
	}
?>