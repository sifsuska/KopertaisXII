<?php 
$title = "Data Institusi";
include_once "header.php";
include_once "koneksi.php"; ?>
<style type="text/css">
.row .col-md-12 .panel.panel-info.panel-dashboard .panel-body .table.table-bordered.table-striped.table-admin tbody tr td {
	text-align: center;
}
.row .col-md-12 .panel.panel-info.panel-dashboard .panel-body .table.table-bordered.table-striped.table-admin tbody tr td {
	text-align: left;
}
.row .col-md-12 .panel.panel-info.panel-dashboard .panel-body .table.table-bordered.table-striped.table-admin tbody tr td {
	text-align: center;
}
.row .col-md-12 .panel.panel-info.panel-dashboard .panel-body .table.table-bordered.table-striped.table-admin tbody tr td {
	text-align: left;
}
</style>


      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - <?php echo $title ?> - </strong></h2>
            </div>
            <div class="panel-body">
              <table class="table table-bordered table-striped table-admin">
              <thead>
                <tr>
                  <th width="5%">No.</th>
                  <th width="20%">Nama Institusi</th>
                  <th width="10%">Jenjang</th>
                  <th width="25%">Alamat</th>
                  <th width="10%">Kota/Kab</th>
                  <th width="10%">Akreditasi PTAIS</th>
                  <th width="20%">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                include("koneksi.php");
		$query = mysql_query("SELECT * FROM data_ptais ORDER BY id_ptais DESC") or die(mysql_error());
		if(mysql_num_rows($query) == 0){ ?>
		<?php }
		else{ 
			$no = 1;
			while($data = mysql_fetch_assoc($query)){
			?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama_ptais'] ?></td>
                <td><?php echo $data['jenjang'] ?></td>
                <td><?php echo $data['alamat_ptais'] ?></td>
                <td><?php echo $data['kabupaten'] ?></td>
                <td><?php echo $data['akreditasi_ptais'] ?></td>
                <td class="ctr">
                  <div class="btn-group">
    				<a target="_blank" class="btn btn-info btn-lg" href="detail.php?id=<?php echo $data['id_ptais'] ?>" rel="tooltip" data-original-title="Lihat File" data-placement="top" class="btn btn-primary">
                    <i class="fa fa-pencil-square-o" aria-hidden="true" >&nbsp Detail</i> </a>&nbsp;
                  </div>
                </td>
              </tr>
              <?php 
		$no++;
	} 
}
		?>
              </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
		<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Bagian heading modal</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>bagian body modal.</p>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
				</div>
			</div>
		</div>
	</div>
   </div>
<?php include_once "footer.php" ?>
