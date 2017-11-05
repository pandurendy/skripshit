<?php				
include 'header.php' ;				
echo '<h4 class="text-primary">Data Customer</h4>';				
$table_name = 'tabel_customer' ;				
$dataPerPage =  10 ;				
$this_url = 'customer.php' ;				
include 'pagging.php' ;				
?>				
<table><tr><td> <a href="customer_iud.php" class="btn btn-warning btn-sm" ><i class="fa  fa-plus-square"></i> Entry Baru</a></td></tr></table><br>				
<div class="table-responsive" > 				
	<table class="table table-bordered">			
		<thead>		
			<tr>	
				<th width=15>Pilih </th>
				<th>Kode Customer</th>
				<th>Nama Customer</th>
				<th>Alamat Customer</th>
				<th>No Telpon</th>
				<th>Email</th>
				<th>Website</th>
			</tr>	
		</thead>		
		<?php		
		while ($data = mysql_fetch_array($result))		
		{		
			echo '<tr>' ;	
				echo '<td> <a href="customer_iud.php?kode_customer='.$data['kode_customer'].'" class="btn btn-sm btn-info"> <i class="fa fa-edit"> </i> Select </a></td>' ;
				echo '<td>'.$data['kode_customer'].'</td>' ;
				echo '<td>'.$data['nama_customer'].'</td>' ;
				echo '<td>'.$data['alamat_customer'].'</td>' ;
				echo '<td>'.$data['no_telpon'].'</td>' ;
				echo '<td>'.$data['email'].'</td>' ;
				echo '<td>'.$data['website'].'</td>' ;
			echo '</tr>' ;	
		}		
		?>		
	</table>			
</div>				
<?php include 'footer.php' ;?>				
