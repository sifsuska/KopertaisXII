<?php
include('koneksi.php');
if(isset($_POST['login'])){
	$user = mysql_real_escape_string(htmlentities($_POST['username']));
	$pass = mysql_real_escape_string(htmlentities(md5($_POST['password'])));
 
	$sql = mysql_query("SELECT * FROM user WHERE username='$user' AND password='$pass'") or die(mysql_error());
	if(mysql_num_rows($sql) == 0){
		header('location:index.php?aks=error1');
		
	}else{
		$row = mysql_fetch_assoc($sql);
		if($row['level'] == 1){
			$_SESSION['admin']=$user;
			echo '<script language="javascript">document.location="admin/index.php";</script>';
		}else{
			$_SESSION['user']=$user;
			echo '<script language="javascript">document.location="user/index.php";</script>';
		}
	}
}
?>
