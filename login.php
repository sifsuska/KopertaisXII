<?php 
$title = "Sistem Informasi Geografis Jasa Web";
session_start();
//cek if user was login or not
if(isset($_SESSION['admin']) && ($_SESSION['level']=="admin") ){
echo "<script>document.location.href=\"index.php\"</script>";
}else{
include_once "header.php"; ?>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info panel-dashboard">
         <div class="panel-heading centered">
              <h2 class="panel-title"><strong>Selamat Datang di Sistem Informasi Geografis KOPERTAIS WILAYAH XII</strong></h2>
              <h4 class="panel-title"><strong>Silahkan Login Untuk Masuk Sebagai Admin</strong></h4>
            </div>
            <div class="panel-body">
              <div class="tile-body">
                                    <form method="POST" class="form-horizontal" name="form1" role="form" id="form1" action="cek_login.php"
                                    data-parsley-validate>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda" required=""
                                                       required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required=""
                                                       required>
                                            </div>
                                        </div>
<div align="center">							
			                        <!-- SUBMIT BUTTON -->
             <button name="login" type="submit" class="btn btn-success" >Login</button>
                                							

               </div>
               </div>
               </div>

        
        </div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
	<?php } ?>
	<?php		
		switch((isset($_GET['aks'])? $_GET['aks']:''))
{
case "error1":
echo "<script language=\"javascript\">
    		alert(\"Terjadi kesalahan, periksa kembali username dan password Anda!.\");
   		  </script>";
break;

case "mess2":
	echo "<script language=\"javascript\">
    		alert(\"Selamat Datang Kembali\");
   		  </script>";
break;

case "error3":
	echo "<script language=\"javascript\">
    		alert(\"Tidak bisa di akses tanpa login!\");
   		  </script>";
break;

}
?>