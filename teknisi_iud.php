<?php 					
include 'header.php' ;					
$sql = 'select * from tabel_teknisi ';					
if(!isset($_GET['kode_teknisi'])) $_GET['kode_teknisi'] = 0;					
$sql .= 'where kode_teknisi = "'.$_GET['kode_teknisi'].'"';				
$query = mysql_query($sql );					
$jml_data = mysql_num_rows($query)  ;					
if  ($jml_data != 0) $data = mysql_fetch_array($query);

// get kode_customer terakhir dari database;
$kode_terakhir = mysql_fetch_array(mysql_query("SELECT MAX(kode_teknisi) AS kode_terakhir FROM tabel_teknisi"));
$kode_terakhir = $kode_terakhir['kode_terakhir']; // e.g : C005

$kode = preg_match('!\d+!', $kode_terakhir, $match); // extract angka dari string ; 005
$kode_terakhir = strval($match[0] + 1); // 6

// formating kode
$len_kode = strlen($kode_terakhir);
switch($len_kode){
	case 1:
		$kode_terakhir = "T00" . $kode_terakhir;
		break;
	case 2:
		$kode_terakhir = "T0" . $kode_terakhir;
		break;
	case 3:
		$kode_terakhir = "T" . $kode_terakhir;
		break;
}
			
?>					
<div class='panel panel-danger'>					
	<div class='panel-heading'>				
		<h2 class='panel-title'>Data Teknisi</h2>			
	</div>				
	<div class='panel-body'>				
		<form method='post' class='form-horizontal' role='form'>			
			<div class='row'>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Kode Teknisi</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' disabled="disabled" id='kode_teknisi' name='kode_teknisi' type='text' placeholder='Masukanan Kode teknisi ' value='<?php  echo $jml_data == 0 ?$kode_terakhir : $data['kode_teknisi'] ;?>'>
					<input name='kode_teknisi' type='hidden' placeholder='' value='<?php  echo $jml_data == 0 ? $kode_terakhir : $data['kode_teknisi'] ;?>'>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nama Teknisi</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='nama_teknisi' name='nama_teknisi' type='text' placeholder='Masukanan Nama Customer ' value='<?php  echo $jml_data == 0 ? '' : $data['nama_teknisi'] ;?>'>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Alamat Teknisi</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<textarea class='form-control summernote' rows='3'  id='alamat_teknisi'  name = 'alamat_teknisi'  placeholder='Entry Alamat Teknisi'><?php  echo $jml_data == 0 ? '' : $data['alamat_teknisi'] ;?></textarea>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Tanggal Gabung</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='tgl_gabung' name='tgl_gabung' type='text' placeholder='Masukanan Tanggal Gabung ' value='<?php  echo $jml_data == 0 ? '' : $data['tgl_gabung'] ;?>'>
				</div>	
			</div>
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>No Telepon</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='no_telpon' name='no_telpon' type='text' placeholder='Masukanan Kontak Person ' value='<?php  echo $jml_data == 0 ? '' : $data['no_telpon'] ;?>'>
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
		$('#tgl_gabung').datepicker({ format: 'yyyy-mm-dd' });			
		$('#tanggal_masuk').datepicker({ format: 'yyyy-mm-dd' });			
	}); 				
</script>					
					
<?php					
if ((isset($_POST['add'])) or (isset($_POST['delete'])) or (isset($_POST['update'])) ) {					
	$vkode_teknisi = $_GET['kode_teknisi'];				
	$vkode_teknisi = $_POST['kode_teknisi'];				
	$vnama_teknisi = $_POST['nama_teknisi'];				
	$valamat_teknisi = $_POST['alamat_teknisi'];	
	$vtgl_gabung = $_POST['tgl_gabung'];				
	$vno_telpon = $_POST['no_telpon'];							
					
}					
 if (isset($_POST['cancel'])) {					
	echo '<script>window.location.href="teknisi.php"</script>';				
}					
					
 if (isset($_POST['add'])) {					
	$cSQL ="insert into tabel_teknisi set 				
			kode_teknisi =  '$vkode_teknisi' , 		
			nama_teknisi =  '$vnama_teknisi' , 		
			alamat_teknisi =  '$valamat_teknisi' , 
			tgl_gabung =  '$vtgl_gabung' , 		
			no_telpon =  '$vno_telpon' "; 			
					
	 $result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="teknisi.php"</script>';				
}					
					
 if (isset($_POST['delete'])) {					
	$cSQL ="delete from tabel_teknisi where 				
			kode_teknisi =  '$vkode_teknisi'" ;		
					
	$result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="teknisi.php"</script>';				
}					
					
 if (isset($_POST['update'])) {					
	$cSQL ="update tabel_teknisi set  				
			kode_teknisi =  '$vkode_teknisi' , 		
			nama_teknisi =  '$vnama_teknisi' , 		
			alamat_teknisi =  '$valamat_teknisi' , 	
			tgl_gabung =  '$vtgl_gabung' , 	 		
			no_telpon =  '$vno_telpon' 				
			where kode_teknisi =  '$vkode_teknisi'" ;		
					
	$result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="teknisi.php"</script>';				
}					
					
include 'footer.php' ;  					
?>					
