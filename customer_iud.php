<?php 					
include 'header.php' ;					
$sql = 'select * from tabel_customer ';
if(!isset($_GET['kode_customer'])) $_GET['kode_customer'] = 0;					
$sql .= 'where kode_customer = "'.$_GET['kode_customer'].'"';					
$query = mysql_query($sql );					
$jml_data = mysql_num_rows($query)  ;					
if  ($jml_data != 0){ $data = mysql_fetch_array($query); }

// get kode_customer terakhir dari database;
$kode_terakhir = mysql_fetch_array(mysql_query("SELECT MAX(kode_customer) AS kode_terakhir FROM tabel_customer"));
$kode_terakhir = $kode_terakhir['kode_terakhir']; // e.g : C005

$kode = preg_match('!\d+!', $kode_terakhir, $match); // extract angka dari string ; 005
$kode_terakhir = strval($match[0] + 1); // 6

// formating kode
$len_kode = strlen($kode_terakhir);
switch($len_kode){
	case 1:
		$kode_terakhir = "C00" . $kode_terakhir;
		break;
	case 2:
		$kode_terakhir = "C0" . $kode_terakhir;
		break;
	case 3:
		$kode_terakhir = "C" . $kode_terakhir;
		break;
}

?>					
<div class='panel panel-danger'>					
	<div class='panel-heading'>				
		<h2 class='panel-title'>Data Customer</h2>			
	</div>				
	<div class='panel-body'>				
		<form method='post' class='form-horizontal' role='form'>			
			<div class='row'>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Kode Customer</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input disabled="disabled" class='form-control' id='kode_customer' type='text' placeholder='Masukanan Kode Customer ' value='<?php  echo $jml_data == 0 ? $kode_terakhir : $data['kode_customer'] ;?>'>
					<input name='kode_customer' type='hidden' placeholder='Masukanan Kode Customer ' value='<?php  echo $jml_data == 0 ? $kode_terakhir : $data['kode_customer'] ;?>'>
					
				</div>	

			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nama Customer</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='nama_customer' name='nama_customer' type='text' placeholder='Masukanan Nama Customer ' value='<?php  echo $jml_data == 0 ? '' : $data['nama_customer'] ;?>'>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Alamat Customer</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<textarea class='form-control summernote' rows='3'  id='alamat_customer'  name = 'alamat_customer'  placeholder='Entry Alamat Customer'><?php  echo $jml_data == 0 ? '' : $data['alamat_customer'] ;?></textarea>
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
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Website</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='website' name='website' type='text' placeholder='Masukanan Website ' value='<?php  echo $jml_data == 0 ? '' : $data['website'] ;?>'>
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
	}); 				
</script>					
					
<?php					
if ((isset($_POST['add'])) or (isset($_POST['delete'])) or (isset($_POST['update'])) ) {							
	$vkode_customer = $_POST['kode_customer'];				
	$vnama_customer = $_POST['nama_customer'];				
	$valamat_customer = $_POST['alamat_customer'];								
	$vno_telpon = $_POST['no_telpon'];				
	$vemail = $_POST['email'];				
	$vwebsite = $_POST['website'];				
					
}					
 if (isset($_POST['cancel'])) {					
	echo '<script>window.location.href="customer.php"</script>';				
}					
					
 if (isset($_POST['add'])) {					
	$cSQL ="insert into tabel_customer set 				
			kode_customer =  '$vkode_customer' , 		
			nama_customer =  '$vnama_customer' , 		
			alamat_customer =  '$valamat_customer' , 			
			no_telpon =  '$vno_telpon' , 		
			email =  '$vemail' , 		
			website =  '$vwebsite'" ;		

	 $result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="customer.php"</script>';				
}					
					
 if (isset($_POST['delete'])) {					
	$cSQL ="delete from tabel_customer where 				
			kode_customer =  '$vkode_customer'" ;		
					
	$result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="customer.php"</script>';				
}					
					
 if (isset($_POST['update'])) {					
	$cSQL ="update tabel_customer set  				 		
			nama_customer =  '$vnama_customer' , 		
			alamat_customer =  '$valamat_customer' , 				
			no_telpon =  '$vno_telpon' , 		
			email =  '$vemail' , 		
			website =  '$vwebsite'	
			where kode_customer='$vkode_customer';" ;		
					
	$result1 =  mysql_query($cSQL) ;			
	// echo mysql_error();
	// echo $cSQL;	
	echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?kode_customer='.$vkode_customer.'"</script>';				
}					
					
include 'footer.php' ;  					
?>					
