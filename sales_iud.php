<?php 					
include 'header.php' ;					
$sql = 'select * from tabel_sales ';
if(!isset($_GET['kode_sales'])) $_GET['kode_sales'] = 0;					
$sql .= 'where kode_sales = "'.$_GET['kode_sales'].'"';					
$query = mysql_query($sql );					
$jml_data = mysql_num_rows($query)  ;					
if  ($jml_data != 0) $data = mysql_fetch_array($query);

// get kode_customer terakhir dari database;
$kode_terakhir = mysql_fetch_array(mysql_query("SELECT MAX(kode_sales) AS kode_terakhir FROM tabel_sales"));
$kode_terakhir = $kode_terakhir['kode_terakhir']; // e.g : C005

$kode = preg_match('!\d+!', $kode_terakhir, $match); // extract angka dari string ; 005
$kode_terakhir = strval($match[0] + 1); // 6

// formating kode
$len_kode = strlen($kode_terakhir);
switch($len_kode){
	case 1:
		$kode_terakhir = "S00" . $kode_terakhir;
		break;
	case 2:
		$kode_terakhir = "S0" . $kode_terakhir;
		break;
	case 3:
		$kode_terakhir = "S" . $kode_terakhir;
		break;
}


?>					
<div class='panel panel-danger'>					
	<div class='panel-heading'>				
		<h2 class='panel-title'>Data sales</h2>			
	</div>				
	<div class='panel-body'>				
		<form method='post' class='form-horizontal' role='form'>			
			<div class='row'>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Kode sales</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' disabled="disabled" id='kode_sales'  type='text' placeholder='Masukanan Kode sales ' value='<?php  echo $jml_data == 0 ? $kode_terakhir : $data['kode_sales'] ;?>'>
					<input name='kode_sales' type='hidden' placeholder='' value='<?php  echo $jml_data == 0 ? $kode_terakhir : $data['kode_sales'] ;?>'>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nama sales</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='nama_sales' name='nama_sales' type='text' placeholder='Masukanan Nama sales ' value='<?php  echo $jml_data == 0 ? '' : $data['nama_sales'] ;?>'>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Alamat sales</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<textarea class='form-control summernote' rows='3'  id='alamat_sales'  name = 'alamat_sales'  placeholder='Entry Alamat sales'><?php  echo $jml_data == 0 ? '' : $data['alamat_sales'] ;?></textarea>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>No Telpon</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='no_telpon' name='no_telpon' type='text' placeholder='Masukanan No Telpon ' value='<?php  echo $jml_data == 0 ? '' : $data['no_telpon'] ;?>'>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Email</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='email' name='email' type='text' placeholder='Masukanan Email ' value='<?php  echo $jml_data == 0 ? '' : $data['email'] ;?>'>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Tanggal Gabung</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='tanggal_gabung' name='tanggal_gabung' type='text' placeholder='Masukanan Tanggal Gabung ' value='<?php  echo $jml_data == 0 ? '' : $data['tanggal_gabung'] ;?>'>
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
		$('#tanggal_gabung').datepicker({ format: 'yyyy-mm-dd' });			
	
	}); 				
</script>					
					
<?php					
if ((isset($_POST['add'])) or (isset($_POST['delete'])) or (isset($_POST['update'])) ) {					
	$vkode_sales = $_POST['kode_sales'];								
	$vnama_sales = $_POST['nama_sales'];				
	$valamat_sales = $_POST['alamat_sales'];				
	$vno_telpon = $_POST['no_telpon'];				
	$vemail = $_POST['email'];				
	$vtanggal_gabung = $_POST['tanggal_gabung'];				
					
}					
 if (isset($_POST['cancel'])) {					
	echo '<script>window.location.href="sales.php"</script>';				
}					
					
 if (isset($_POST['add'])) {					
	$cSQL ="insert into tabel_sales set
			kode_sales =  '$vkode_sales' ,			
			nama_sales =  '$vnama_sales' , 		
			alamat_sales =  '$valamat_sales' , 		
			no_telpon =  '$vno_telpon' , 		
			email =  '$vemail' , 		
			tanggal_gabung =  '$vtanggal_gabung'" ;		
					
	 $result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="sales.php"</script>';				
}					
					
 if (isset($_POST['delete'])) {					
	$cSQL ="delete from tabel_sales where 				
			kode_sales =  '$vkode_sales'" ;		
					
	$result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="sales.php"</script>';				
}					
					
 if (isset($_POST['update'])) {					
	$cSQL ="update tabel_sales set  						
			nama_sales =  '$vnama_sales' , 		
			alamat_sales =  '$valamat_sales' , 		
			no_telpon =  '$vno_telpon' , 		
			email =  '$vemail' , 		
			tanggal_gabung =  '$vtanggal_gabung' 		
			where kode_sales =  '$vkode_sales'" ;		
					
	$result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="sales.php"</script>';				
}					
					
include 'footer.php' ;  					
?>					
