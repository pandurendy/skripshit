<?php 					
include 'header.php' ;					
$sql = 'select * from tabel_order_pekerjaan ';					
$sql .= 'where id = "'.$_GET['id'].'"';					
$query = mysql_query($sql );					
$jml_data = mysql_num_rows($query)  ;					
if  ($jml_data != 0){ $data = mysql_fetch_array($query); }					
?>					
<div class='panel panel-danger'>					
	<div class='panel-heading'>				
		<h2 class='panel-title'>Data Customer Pekerjaan</h2>			
	</div>				
	<div class='panel-body'>				
		<form method='post' class='form-horizontal' role='form' enctype="multipart/form-data">			
			<div class='row'>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Kode Pekerjaan</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='kode_pekerjaan' name='kode_pekerjaan' type='text' placeholder='Masukanan Kode Customer ' value='<?php  echo $jml_data == 0 ? '' : $data['kode_pekerjaan'] ;?>'>
				</div>	
			</div>	
      <div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nama Proyek</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='nama_proyek' name='nama_proyek' type='text' placeholder='Masukanan Nama Proyek ' value='<?php  echo $jml_data == 0 ? '' : $data['nama_proyek'] ;?>'>
				</div>	
			</div>	
			<div class='form-group col-md-6  '>		
			<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nama Customer</label>	
			<div class='col-sm-8 col-md-8 col-xs-8' >	
				<?php select_2db('tabel_customer','kode_customer','nama_customer',$jml_data == 0 ? '' : $data['kode_customer']) ?>
			</div>
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Alamat Proyek</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<textarea class='form-control summernote' rows='3'  id='alamat_proyek'  name = 'alamat_proyek'  placeholder='Entry Alamat Customer'><?php  echo $jml_data == 0 ? '' : $data['alamat_proyek'] ;?></textarea>
				</div>	
			</div>	
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Tanggal Turun Spk</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='tgl_progres' name='tgl_progres' type='text' placeholder='Masukanan Tanggal Turun Spk ' value='<?php  echo $jml_data == 0 ? '' : $data['tgl_progres'] ;?>'>
				</div>	
			</div>			
				<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nama Sales</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<?php select_2db('tabel_sales','kode_sales','nama_sales',$jml_data == 0 ? '' : $data['kode_sales']) ?>
				</div>	
			</div>					
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Isi Spk</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >
					<?php
						// if (!isset($data['isi_spk'])){
							echo "<input class='form-control' id='isi_spk' name='isi_spk' type='file' placeholder='Masukanan Isi Spk '>";
						// } else {
							// echo '<a class="btn btn-sm btn-info" href="uploads/' . $data['isi_spk'] . '" target="_blank">Download SPK</a>';
						// }
						?>
				</div>	
			</div>		
			</div>		

			<div class='row'>		
			<div class='form-group  col-md-6'>		
				<label class='col-sm-4 col-md-4 control-label'></label>	
				<div class='col-sm-8 col-md-8'>	
					<button type='submit' name='cancel' class='btn btn-sm btn-warning'>Close</button>
					<button type='submit' name='add' class='btn btn-sm btn-primary'>Tambah</button>
					<button type='submit' name='update' class='btn btn-sm btn-info'>Edit</button>
					<button type='submit' name='delete' class='btn btn-sm btn-danger'>Hapus</button>
				</div>	
			</div>		
			</div>		
					
		</form>			
	</div>				
</div>					
<script>					
	$(function(){				
		$('#tanggal_lahir').datepicker({ format: 'yyyy-mm-dd' });			
		$('#tanggal_masuk').datepicker({ format: 'yyyy-mm-dd' });
		$('#tgl_progres').datepicker({ format: 'yyyy-mm-dd' });			
	}); 				
</script>					
					
<?php					
if ((isset($_POST['add'])) or (isset($_POST['delete'])) or (isset($_POST['update'])) ) {					
	$vid = $_GET['id'];				
	$vkode_pekerjaan = $_POST['kode_pekerjaan'];				
  $vnama_proyek = $_POST['nama_proyek'];			
  $vkode_customer = $_POST['kode_customer'];	
	$valamat_proyek = $_POST['alamat_proyek'];								
	$vkode_sales = $_POST['kode_sales'];	
	$vtgl_progres = $_POST['tgl_progres'];								
  // $visi_spk = $_POST['isi_spk'];
	$visi_spk = 'test';		
	// print_r ($_FILES)		;
					
}					
 if (isset($_POST['cancel'])) {					
	echo '<script>window.location.href="order_pekerjaan.php"</script>';				
}					
					
 if (isset($_POST['add'])) {		
	 $visi_spk = $_FILES["isi_spk"]["name"];			
	$cSQL ="insert into tabel_order_pekerjaan set 				
      kode_pekerjaan =  '$vkode_pekerjaan' ,
      nama_proyek =  '$vnama_proyek' , 		
      kode_customer =  '$vkode_customer' ,		
			alamat_proyek =  '$valamat_proyek' , 
			tgl_progres =  '$vtgl_progres' , 				
      kode_sales =  '$vkode_sales' , 			
			isi_spk =  '$visi_spk'" ;		
					
	$result1 =  mysql_query($cSQL);	
	// echo $result1;
	if($result1) {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["isi_spk"]["name"]);
		$uploadOk = 1;
		$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// echo $target_file;
		// Cek file nya pdf atau bukan
		if ($uploadOk == 0) {
			// gagal
			echo "Gagal Upload SPK File";
		} else {
			if(move_uploaded_file($_FILES["isi_spk"]["tmp_name"], $target_file)){
				echo "File berhasil ditambahkan";
			} else {
				echo "File gagal ditambahkan";
			}
		}


	}
	// echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?id='.mysql_insert_id().'"</script>';				
}					
					
 if (isset($_POST['delete'])) {					
	$cSQL ="delete from tabel_order_pekerjaan where 				
			id =  '$vid'" ;		
					
	$result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="order_pekerjaan.php"</script>';				
}					
					
 if (isset($_POST['update'])) {					
	$cSQL ="update tabel_order_pekerjaan set  				
      kode_pekerjaan =  '$vkode_pekerjaan' , 
      nama_proyek =  '$vnama_proyek' ,		
			kode_customer =  '$vkode_customer' , 		
			alamat_proyek =  '$valamat_proyek' , 	
			tgl_progres =  '$vtgl_progres' ,				
      kode_sales =  '$vkode_sales' ,		
			isi_spk =  '$visi_spk' 		
			where id =  '$vid'" ;		
					
	$result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?id='.$vid.'"</script>';				
}					
					
include 'footer.php' ;  					
?>					
