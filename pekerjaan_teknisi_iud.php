<?php 
include 'header.php' ;
$vid = $_GET['id'];
$target_dir = "uploads/pekerjaan/";
$sql = "select * from view_progres_pekerjaan where id_progres = '$vid' " ;
$query = mysql_query($sql );
$jml_data = mysql_num_rows($query)  ;
if  ($jml_data != 0){ $data = mysql_fetch_array($query); }
// $data = array();
// echo $jml_data;
// print_r($data);
?>
<!--
<div class='panel panel-danger hide'>
<div class='panel-heading'>
<h2 class='panel-title'>Data Marking</h2>
</div>
<div class='panel-body'>
<form method='post' class='form-horizontal' role='form' enctype="multipart/form-data">
<div class='row'>
<div class='form-group col-md-12  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nilai</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input type="range" min="0" max="100 %" id='nilai_progres' name='nilai_progres' value="<?php  echo $jml_data == 0 ? '' : $data['nilai_progres'] ;?>" onchange="rangePrimary.value=value">
<input class='form-control' id='id_progres' name='id_progres' type='hidden' placeholder='Masukanan No SPK ' value='<?php  echo $jml_data == 0 ? '' : $data['id_progres'] ;?>'>

</div>
</div>
<div class='form-group col-md-6  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>No SPK</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input class='form-control' id='kode_order' name='kode_order' type='text'  value='<?php  echo $jml_data == 0 ? '' : $data['kode_order'] ;?>' readonly>
</div>
</div>
<div class='form-group col-md-6  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nama Proyek</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input class='form-control' id='nama_proyek' name='nama_proyek' type='text'  value='<?php  echo $jml_data == 0 ? '' : $data['nama_proyek'] ;?>' readonly>
</div>
</div>
<div class='form-group col-md-6  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>No Telepon</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input class='form-control' id='kontak_person' name='kontak_person' type='text'  value='<?php  echo $jml_data == 0 ? '' : $data['no_telpon'] ;?>' readonly>
</div>
</div>
<div class='form-group col-md-6  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Alamat</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input class='form-control summernote' rows='3'  id='alamat_proyek'  name = 'alamat_proyek'  value="<?php  echo $jml_data == 0 ? '' : $data['alamat_proyek'] ;?>" readonly />
</div>
</div>
<div class='form-group col-md-6  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Customer</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input class='form-control' id='nama_customer' name='nama_customer' type='text' value='<?php  echo $jml_data == 0 ? '' : $data['nama_customer'] ;?>' readonly>
</div>
</div>
<div class='form-group col-md-6  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nama Sales</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input class='form-control' id='nama_sales' name='nama_sales' type='text' value='<?php  echo $jml_data == 0 ? '' : $data['nama_sales'] ;?>' readonly>
</div>
</div>
<div class='form-group col-md-6  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Tanggal Marking</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input class='form-control' id='tgl_order' name='tgl_order' type='text'  value='<?php  echo $jml_data == 0 ? '' : $data['tgl_order'] ;?>' readonly>
</div>
</div>
<div class='form-group col-md-6  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Tanggal Marking</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input class='form-control' id='tgl_order' name='tgl_order' type='text'  value='<?php  echo $jml_data == 0 ? '' : $data['tgl_order'] ;?>' readonly>
</div>
</div>
<div class='form-group col-md-6  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Revisi</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input class='form-control' id='revisi_progres' name='revisi_progres' type='text' placeholder='Masukanan Revisi ' value='<?php  echo $jml_data == 0 ? '' : $data['revisi_progres'] ;?>'>
</div>
</div>
<div class='form-group col-md-6  '>
<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Catatan Marking</label>
<div class='col-sm-8 col-md-8 col-xs-8' >
<input class='form-control' id='catatan_marking' name='catatan_marking' type='text'  value='<?php  echo $jml_data == 0 ? '' : $data['catatan_marking'] ;?>'>
</div>
</div>
</div>

<div class='row'>
<div class='form-group  col-md-6'>
<label class='col-sm-4 col-md-4 control-label'></label>
<div class='col-sm-8 col-md-8'>
<button type='submit' name='cancel' class='btn btn-sm btn-warning'>Close</button>
<button type='submit' name='add' class='btn btn-sm btn-primary'>Update</button>
</div>
</div>
</div>
</form>
</div>
</div>

-->
<div class="col-lg-12">
	<div class="panel panel-primary ">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-user"></i> Progres Monitoring </h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<form  method="post" name="form1" id="form1" enctype="multipart/form-data">
				<input class='form-control' id='id_progres' name='id_progres' type='hidden' placeholder='Masukanan No SPK ' value='<?php  echo $jml_data == 0 ? '' : $data['id_progres'] ;?>'>
				
				<table class="table table-condensed">
					<div class="col-xs-6">
						<div class="range range-primary">
							<tr valign="baseline">
								<td><label for="id">Drag untuk mengisi Progres Pekerjaan:</label></td>
								<td>
								<input type="range" min="0" max="100 %" name="nilai_progres" value="<?php  echo $jml_data == 0 ? '' : $data['nilai_progres'] ;?>" onchange="rangePrimary.value=value + '%'"></td>
							</tr>
							<tr>
								<td><label for="id" > Progres Pekerjaan:</label></td>
								<td><output id="rangePrimary"><?php  echo $jml_data == 0 ? '0' : $data['nilai_progres'] ;?>%</output></td>
							</tr>   
						</div>
						<br>
					</div>
				</table>
				<hr>
				<ul id="tabs" data-tabs="tabs" class="nav nav-tabs">
					<li role="presentation" class="active"><a data-toggle="tab" href="#infoDetail"> Info Detail</a></li>
					<li role="presentation"><a data-toggle="tab" href="#hasilDataPekerjaan"> Data Progres Pekerjaan</a></li>
					<li role="presentation"><a data-toggle="tab" href="#GambarPekerjaan"> Gambar Pekerjaan</a></li>
				</ul>
				<br>
				<div id="my-tabs-content" class="tab-content">
					<div id="infoDetail" class="tab-pane fade in active">
						<table class="table table-condensed">
						<tr valign="baseline">
							<input type="hidden" value="<?php echo $jml_data == 0 ? '' : $data['id']; ?>" />
							<td><label for="id"> No SPK :</label></td>
							<td><input type="text" class="form-control"  name="kode_pekerjaan" value="<?php echo $jml_data == 0 ? '' : $data['kode_pekerjaan']; ?>" size="32" readonly /></td>
						</tr>
						<tr valign="baseline">
							<td><label for="id"> Nama Proyek :</label></td>
							<td><input type="text" class="form-control" name="nama_proyek" value="<?php echo $jml_data == 0 ? '' : $data['nama_proyek']; ?>" size="32"  readonly/></td>
						</tr>
						<tr valign="baseline">
							<td><label for="id"> Nama Sales:</label></td>
							<td><input type="text" class="form-control" name="nama_sales" value="<?php echo $jml_data == 0 ? '' : $data['nama_sales']; ?>" size="32"  readonly/></td>
						</tr>
						<tr valign="baseline">
							<td><label for="id"> Tanggal SPK:</label></td>
							<td><input type="text" class="form-control" name="tgl_progres" value="<?php echo $jml_data == 0 ? '' : $data['tgl_progres']; ?>" size="32" readonly/></td>
						</tr>
						<tr valign="baseline">
						   <td><label for="id"> Nama Customer:</label></td>
						   <td><input type="text" class="form-control" name="nama_customer" value="<?php echo $jml_data == 0 ? '' : $data['nama_customer']; ?>" size="32"  readonly/></td>
						</tr>
						<tr valign="baseline">
							<td><label for="id"> Alamat Proyek :</label></td>
							<td><input type="text" class="form-control" name="alamat_proyek" value="<?php echo $jml_data == 0 ? '' : $data['alamat_proyek']; ?>" size="32"  readonly/></td>
						</tr>
						<tr valign="baseline">
							<td><label for="id"> No Telephone :</label></td>
							<td><input type="text" class="form-control" name="no_tlp" size="32" value="<?php echo $jml_data == 0 ? '' : $data['no_telpon']; ?>" readonly/></td>
						</tr>
						<tr valign="baseline">
							<td><label for="id"> Revisi :</label></td>
							<td><input type="text" class="form-control" name="revisi_progres" size="32" value="<?php echo $jml_data == 0 ? '' : $data['revisi_progres']; ?>" /></td>
						</tr>
						<tr valign="baseline">
							<td><label for="id"> Isi Spk :</label></td>
							<td><input type="file" class="form-control" name="isi_spk" size="32" value="<?php echo $jml_data == 0 ? '' : $data['isi_spk']; ?>" readonly/></td>
						</tr>
						</table>
					</div> <!--infoDetail-->

					<div id="hasilDataPekerjaan" class="tab-pane fade">
						<table class="table table-condensed">
						
					
						<tr valign="baseline">
						<td><label for="nama_teknisi1"> Nama Teknisi 1 :</label></td>
						<!-- <td><input type="text" class="form-control" name="catatan" value='<?php  echo $jml_data == 0 ? '' : $data['nama_teknisi1'] ;?>' size="32" /></td> -->

						<td><select name="teknisi_1" class="form-control" <?php echo $editable ? '' : 'disabled' ?> >
							<?php select_2db_option('tabel_teknisi','kode_teknisi','nama_teknisi',get_id_by_name('tabel_teknisi', 'nama_teknisi', $data['nama_teknisi1'])); ?></td>
							</select>
						</td>

					</tr>
					<tr valign="baseline">
						<td><label for="nama_teknisi2"> Nama Teknisi 2 :</label></td>
						<td> <select name="teknisi_2" class="form-control" <?php echo $editable ? '' : 'disabled' ?>>
						<?php select_2db_option('tabel_teknisi','kode_teknisi','nama_teknisi',get_id_by_name('tabel_teknisi', 'nama_teknisi', $data['nama_teknisi2'])); ?>
						</select>
						</td>
					</tr>
						<tr valign="baseline">
							<td><label for="catatan_teknisi"> Catatan Teknisi :</label></td>
							<td><input type="text" class="form-control" name="catatan_progres" value='<?php  echo $jml_data == 0 ? '' : $data['catatan_progres'] ;?>' size="32" /></td>
						</tr>
						<tr valign="baseline">
							<td><label for="tgl_pengerjaan"> Tanggal Pengerjaan</label></td>
							<td><input type="text" class="form-control" id="tgl_pengerjaan" placeholder='Masukanan Tanggal Pengerjaan' name="tgl_pengerjaan" value="<?php  echo $jml_data == 0 ? '' : $data['tgl_pengerjaan'] ;?>" size="32" /></td>
						</tr>
						<tr valign="baseline">
							<td><label for="tgl_penyelesaian"> Tanggal Penyelesaian</label></td>
							<td><input type="text" class="form-control" id="tgl_penyelesaian" name="tgl_penyelesaian" value="<?php  echo $jml_data == 0 ? '' : $data['tgl_penyelesaian'] ;?>" size="32" /></td>
						</tr>
						<tr valign="baseline">
							<td><label for="file_memo_pdf"> Data Form Memo PDF 
								<?php if (file_exists($target_dir."pdf/$vid.pdf") ) { echo "(Re-Upload) "; ?>
								<i class="fa fa-download" onclick="window.open('<?php echo $target_dir."pdf/$vid.pdf";?>','new','toolbar=no,location=no,status=no,resizable=yes=width=800,height=600');"> </i>
								<?php } ?>
								</label>
							</td>
							<td><input type="file" class="form-control" name="file_memo_pdf" value="" size="32" /></td>
						</tr>
            <tr valign="baseline">
							<td><label for="file_complain_pdf"> Data Form Complain PDF 
								<?php if (file_exists($target_dir."pdf/$vid.pdf") ) { echo "(Re-Upload) "; ?>
								<i class="fa fa-download" onclick="window.open('<?php echo $target_dir."pdf/$vid.pdf";?>','new','toolbar=no,location=no,status=no,resizable=yes=width=800,height=600');"> </i>
								<?php } ?>
								</label>
							</td>
							<td><input type="file" class="form-control" name="file_complain_pdf" value="" size="32" /></td>
						</tr>
            <tr valign="baseline">
							<td><label for="file_ba_ceklis_pdf"> Data Form B.A & Ceklis PDF 
								<?php if (file_exists($target_dir."pdf/$vid.pdf") ) { echo "(Re-Upload) "; ?>
								<i class="fa fa-download" onclick="window.open('<?php echo $target_dir."pdf/$vid.pdf";?>','new','toolbar=no,location=no,status=no,resizable=yes=width=800,height=600');"> </i>
								<?php } ?>
								</label>
							</td>
							<td><input type="file" class="form-control" name="file_ba_ceklis_pdf" value="" size="32" /></td>
						</tr>
						</table>
						<?php

						$file_ba_ceklis_pdf = $target_dir . "pdf/" . $data['file_ba_ceklis_pdf'] . ".pdf";
						$file_complain_pdf =  $target_dir . "pdf/". $data['file_complain_pdf'] . ".pdf";
						$file_memo_pdf =  $target_dir."pdf/".$data['file_memo_pdf'].".pdf";

						if (file_exists($file_memo_pdf)) {
							echo "<h3> File Memo PDF</h3><br/>";
							echo "<object data='".$file_memo_pdf."' width='100%' height='500'> 	</object>";
						} else {
							echo "<div class='alert alert-info'> File Memo PDF belum tersedia</div><br/>";
						}

						if (file_exists($file_complain_pdf)) {
							echo "<h3> File Complain PDF</h3><br/>";
							echo "<object data='".$file_complain_pdf."' width='100%' height='500'> 	</object>";
						} else {
							echo "<div class='alert alert-info'> File Complain PDF belum tersedia</div><br/>";
						}

						if (file_exists($file_ba_ceklis_pdf)) {
							echo "<h3> File BA Ceklis PDF</h3><br/>";
							echo "<object data='".$file_ba_ceklis_pdf."' width='100%' height='500'> 	</object>";
						} else {
							echo "<div class='alert alert-info'> File BA Ceklis PDF belum tersedia</div><br/>";
						}
			
					?>
					</div>

					<div id="GambarPekerjaan" class="tab-pane fade">
						<div class='row col-md-12'>

						<table class="table table-condensed">
				 
						<tr valign="baseline">
							<td><label for="foto_pekerjaan_jpg"> Foto Pekerjaan JPG 
								<?php if (file_exists($target_dir."photo/$vid.jpg") ) { echo "(Re-Upload) "; ?>
								<i class="fa fa-download" onclick="window.open('<?php echo $target_dir."photo/$vid.jpg";?>','new','toolbar=no,location=no,status=no,resizable=yes=width=800,height=600');"> </i>
								<?php } ?>
								</label>
							</td>
							<td><input class="form-control" type="file" name="foto_pekerjaan_jpg" type="file" size="32" /></td>
						</tr>
						</table>
						
						</div>

						
						<?php
						$garis = 0 ;
						for ($i = 1; $i <= 30; $i++) {
							
							if (file_exists($target_dir."photo/".$vid."_".$i.".jpg") ){
								 if ($garis == 0){ echo "<div class='row col-md-12'>";}
								echo "<img src='".$target_dir."photo/".$vid."_".$i.".jpg' class='col-md-4 img-resposive' >";
								$garis ++ ;
								if ($garis == 3){ echo "</div>"; $garis = 0 ;}
							}
							
						}
						?>
						<div class='row col-md-12'></div>
						
					</div> <!-- GambarPekerjaan -->

				
					
			</div> <!-- my-tabs-content --> 
				<div>
					<input type="submit" name="add" value="Simpan Data"  class="btn btn-sm btn-primary"/>
					</div>
				</form>
		</div>  <!-- table-responsive -->
		
    </div> <!-- panel-body -->

</div><!-- /.row --> 


<script>
$(function(){

$('#tgl_pengerjaan').datepicker({ format: 'yyyy-mm-dd' });
$('#tgl_penyelesaian').datepicker({ format: 'yyyy-mm-dd' });
$('#tgl_progress').datepicker({ format: 'yyyy-mm-dd' });


}); 
</script>

<?php

if ((isset($_POST['add'])) or (isset($_POST['delete'])) or (isset($_POST['update'])) ) {
	
	$vkode_pekerjaan = $data['kode_pekerjaan'] ;
	$vid_progres = $_POST['id_progres'];
	$vnilai_progres = $_POST['nilai_progres'];
	// $vdoc_referensi = $_POST['doc_referensi'];
	$vrevisi_progres = $_POST['revisi_progres'];
	$vtgl_progres = $_POST['tgl_progres'];
	$vtgl_pengerjaan = $_POST['tgl_pengerjaan'];
	$vtgl_penyelesaian = $_POST['tgl_penyelesaian'];
	$vteknisi_1 = $_POST['teknisi_1'];
	$vteknisi_2 = $_POST['teknisi_2'];
	$vcatatan_progres = $_POST['catatan_progres'];
	$vfile_memo_pdf = $_FILES['file_memo_pdf']['name'];
	$vfile_complain_pdf = $_FILES['file_complain_pdf']['name'];
	$vfile_ba_ceklis_pdf = $_FILES['file_ba_ceklis_pdf']['name'];
	$vfoto_pekerjaan_jpg = $_FILES['foto_pekerjaan_jpg']['name'];
	
	if ($vrevisi_progres > $data['revisi_progres']){ $vnilai_progres = 0;}

}
if (isset($_POST['cancel'])) {
	echo '<script>window.location.href="pekerjaan_teknisi.php"</script>';
}

if (isset($_POST['add'])) {

	if (($vnilai_progres <> $data['nilai_progres']) or ($vnilai_progres == 0)){
		$cSQL ="insert into tabel_progres set 
		id_progres =  '$vid_progres' , 
		group_progres =  'PEKERJAAN' , 
		kode_pekerjaan =  '$vkode_pekerjaan' , 
		nilai_progres =  '$vnilai_progres' , 
		revisi_progres =  $vrevisi_progres,
		catatan_progres = '$vcatatan_progres',
		 = '$vtgl_pengerjaan',
		
		tgl_pengerjaan = '$vtgl_pengerjaan',
		tgl_penyelesaian = '$vtgl_penyelesaian',
		file_memo_pdf = '$vfile_memo_pdf',
		file_complain_pdf = '$vfile_complain_pdf',
		file_ba_ceklis_pdf = '$vfile_ba_ceklis_pdf',
		foto_pekerjaan_jpg = '$vfoto_pekerjaan_jpg'";

		//tgl_progres = '$vtgl_progres',
		$result1 =  mysql_query($cSQL) ;
	} else {
		$cSQL ="update tabel_progres set 
		catatan_progres = '$vcatatan_progres',
		
		tgl_pengerjaan = '$vtgl_pengerjaan',
		tgl_penyelesaian = '$vtgl_penyelesaian',
		revisi_progres =  '$vrevisi_progres',
		file_memo_pdf = '$vfile_memo_pdf',
		file_complain_pdf = '$vfile_complain_pdf',
		file_ba_ceklis_pdf = '$vfile_ba_ceklis_pdf',
		foto_pekerjaan_jpg = '$vfoto_pekerjaan_jpg'
		where id_progres =  '$vid_progres' and 
		group_progres =  'PEKERJAAN' and
		nilai_progres =  '$vnilai_progres'";

		$result1 =  mysql_query($cSQL) ;
	}

	// echo $cSQL;

	echo mysql_error();

	$cSQL ="update tabel_order_pekerjaan 
			set kode_teknisi_1 = '$vteknisi_1', kode_teknisi_2 = '$vteknisi_2'
			where id = $vid ";
	$result1 =  mysql_query($cSQL) ;
	$nama_jpg = "" ;
	for ($i = 1; $i <= 30; $i++) {
		if (!file_exists($target_dir."photo/".$vid."_".$i.".jpg") ){
			$nama_jpg = "photo/".$vid."_".$i.".jpg" ;
			$i = 30 ;
		}
	}

	
	
	If ( isset($_FILES['foto_pekerjaan_jpg']) ) {
		$target_file_foto = $target_dir . $nama_jpg;
		move_uploaded_file($_FILES['foto_pekerjaan_jpg']['tmp_name'],$target_file_foto);
	}
	
	If (isset($_FILES['file_memo_pdf']) ) {
		$target_file_memo_pdf = $target_dir . "pdf/$vid.pdf";
		move_uploaded_file($_FILES['file_memo_pdf']['tmp_name'],$target_file_pekerjaan);
	}
	If (isset($_FILES['file_complain_pdf']) ) {
		$target_file_complain_pdf = $target_dir . "pdf/$vid.pdf";
		move_uploaded_file($_FILES['file_complain_pdf']['tmp_name'],$target_file_pekerjaan);
	}
	If (isset($_FILES['file_ba_ceklis_pdf']) ) {
		$target_file_ba_ceklis_pdf = $target_dir . "pdf/$vid.pdf";
		move_uploaded_file($_FILES['file_ba_ceklis_pdf']['tmp_name'],$target_file_pekerjaan);
	}
	// echo '<script>window.location.href="marking.php"</script>';

	echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'"</script>';
}

include 'footer.php' ;  
?>
