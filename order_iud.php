<?php 					
include 'header.php' ;					
$sql = 'select * from tabel_order ';					
$sql .= 'where id = "'.$_GET['id'].'"';					
$query = mysql_query($sql );					
$jml_data = mysql_num_rows($query)  ;					
if  ($jml_data != 0){ $data = mysql_fetch_array($query); }					
?>					
<div class='panel panel-danger'>					
	<div class='panel-heading'>				
		<h2 class='panel-title'>Data Order</h2>			
	</div>				
	<div class='panel-body'>				
		<form method='post' class='form-horizontal' role='form'>			
			<div class='row'>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Kode Order</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='kode_order' name='kode_order' type='text' placeholder='Masukanan Kode Order ' value='<?php  echo $jml_data == 0 ? '' : $data['kode_order'] ;?>'>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Tgl Order</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='tgl_order' name='tgl_order' type='text' placeholder='Masukanan Tgl Order ' value='<?php  echo $jml_data == 0 ? '' : $data['tgl_order'] ;?>'>
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nama Proyek</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control' id='nama_proyek' name='nama_proyek' type='text' placeholder='Masukanan Nama Proyek ' value='<?php  echo $jml_data == 0 ? '' : $data['nama_proyek'] ;?>'>
				
				</div>	
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Alamat Proyek</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control summernote' rows='3'  id='alamat_proyek'  name = 'alamat_proyek'  value="<?php  echo $jml_data == 0 ? '' : $data['alamat_proyek'] ;?>" placeholder='Entry Alamat Proyek' />
				</div>	
			</div>
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Kode Customer</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<?php select_2db('tabel_customer','kode_customer','nama_customer',$jml_data == 0 ? '' : $data['kode_customer']) ?>
				</div>		
			</div>		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Nama Sales</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<?php select_2db('tabel_sales','kode_sales','nama_sales',$jml_data == 0 ? '' : $data['kode_sales']) ?>
				</div>	
			</div>		
		
			<div class='form-group col-md-6  '>		
				<label class='col-sm-4 col-md-4 col-xs-4 control-label'>Catatan Marking</label>	
				<div class='col-sm-8 col-md-8 col-xs-8' >	
					<input class='form-control summernote' rows='3'  id='catatan_progres'  name = 'catatan_progres'  value="<?php  echo $jml_data == 0 ? '' : $data['catatan_progres'] ;?>" placeholder='Entry Alamat Proyek' />
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
		$('#tgl_order').datepicker({ format: 'yyyy-mm-dd' });			
	}); 				
</script>					
					
<?php					
if ((isset($_POST['add'])) or (isset($_POST['delete'])) or (isset($_POST['update'])) ) {					
	$vid = $_GET['id'];				
	$vkode_order = $_POST['kode_order'];				
	$vtgl_order = $_POST['tgl_order'];				
	$vnama_proyek = $_POST['nama_proyek'];				
	$valamat_proyek = $_POST['alamat_proyek'];				
	$vkode_customer = $_POST['kode_customer'];				
	$vkode_sales = $_POST['kode_sales'];				
					
}					
 if (isset($_POST['cancel'])) {					
	echo '<script>window.location.href="order.php"</script>';				
}					
					
 if (isset($_POST['add'])) {					
	$cSQL ="insert into tabel_order set 				
			kode_order =  '$vkode_order' , 		
			tgl_order =  '$vtgl_order' , 		
			nama_proyek =  '$vnama_proyek' , 		
			alamat_proyek =  '$valamat_proyek' , 		
			kode_customer =  '$vkode_customer' , 		
			kode_sales =  '$vkode_sales'" ;		
					
	 $result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?id='.mysql_insert_id().'"</script>';				
}					
					
 if (isset($_POST['delete'])) {					
	$cSQL ="delete from tabel_order where 				
			id =  '$vid'" ;		
					
	$result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="order.php"</script>';				
}					
					
 if (isset($_POST['update'])) {					
	$cSQL ="update tabel_order set  				
			kode_order =  '$vkode_order' , 		
			tgl_order =  '$vtgl_order' , 		
			nama_proyek =  '$vnama_proyek' , 		
			alamat_proyek =  '$valamat_proyek' , 		
			kode_customer =  '$vkode_customer' , 		
			kode_sales =  '$vkode_sales' 		
			where id =  '$vid'" ;		
					
	$result1 =  mysql_query($cSQL) ;				
	echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?id='.$vid.'"</script>';				
}					
					
include 'footer.php' ;  					
?>					
