<?php				
include 'header.php' ;				
echo '<h4 class="text-primary">Data sales</h4>';				
$table_name = 'tabel_sales' ;				
$dataPerPage =  10 ;				
$this_url = 'sales.php' ;				
include 'pagging.php' ;				
?>				
<table><tr><td> <a href="sales_iud.php" class="btn btn-warning btn-sm" ><i class="fa  fa-plus-square"></i> Entry Baru</a></td></tr></table><br>				
<div class="table-responsive" > 				
	<table class="table table-bordered">			
		<thead>		
			<tr>	
				<th width=15>Pilih </th>
				<th>Kode sales</th>
				<th>Nama sales</th>
				<th>Alamat sales</th>
				<th>No Telpon</th>
				<th>Email</th>
				<th>Tanggal Gabung</th>
			</tr>	
		</thead>		
		<?php		
		while ($data = mysql_fetch_array($result))		
		{		
			echo '<tr>' ;	
				echo '<td> <a href="sales_iud.php?kode_sales='.$data['kode_sales'].'" class="btn btn-sm btn-info"> <i class="fa fa-edit"> </i> Select </a></td>' ;
				echo '<td>'.$data['kode_sales'].'</td>' ;
				echo '<td>'.$data['nama_sales'].'</td>' ;
				echo '<td>'.$data['alamat_sales'].'</td>' ;
				echo '<td>'.$data['no_telpon'].'</td>' ;
				echo '<td>'.$data['email'].'</td>' ;
				echo '<td>'.$data['tanggal_gabung'].'</td>' ;
			echo '</tr>' ;	
		}		
		?>		
	</table>			
</div>				
<?php include 'footer.php' ;?>				
