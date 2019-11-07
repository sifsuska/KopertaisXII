<?php 
$title = "Sistem Informasi Geografis KOPERTAIS WILAYAH XII";
include_once "header.php"; ?>
<?php 
	include("koneksi.php");
	$id = $_GET['id'];
	$show = mysql_query("SELECT * FROM data_ptais WHERE id_ptais = '$id'");
	if(mysql_num_rows($show) == 0){
		echo "<script>window.history.back()</script>";
	}
	else{
		$data = mysql_fetch_assoc($show);
	}

	?>
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong>Input Data</strong></h2>
            </div>
            <div class="panel-body">
              <div class="tile-body">


                                    <form method="POST" class="form-horizontal" name="form1" role="form" id="form1" action="add_studi_proses.php"
                                    data-parsley-validate>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Program Studi</label>
                                            <div class="col-sm-10">
                                                <input type="textbook" name="program_studi" class="form-control" placeholder="Program Studi"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Akreditasi</label>
                                            <div class="col-sm-10">
                                               
												<select type="text" name="akreditasi" required>
												<option value="Belum terakreditasi">- Pilih akreditasi - </option>
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>

												</select>
                                            </div>
                                        </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id_ptais" value="<?php echo $id; ?>">
                                            </div>
                                        </div>
                                        <hr class="line-dashed line-full" />
                                         </div> 

                                 <div class="tile-footer text-right bg-tr-black lter dvd dvd-top">
                                    <!-- SUBMIT BUTTON -->
                                    <button type="submit" class="btn btn-success" id="form1Submit" >Submit</button>
                                    <button type="reset" class="btn btn-danger"> Reset</button>
                                </div>
<br>
    <?php include_once "footer.php"; ?>