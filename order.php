<?php				
include 'header.php' ;				
echo '<h4 class="text-primary">Data Order</h4>';				
$table_name = 'view_order' ;				
$dataPerPage =  10 ;				
$this_url = 'order.php' ;				
include 'pagging.php' ;				
?>				
<table><tr><td> <a href="order_iud.php?id=0" class="btn btn-warning btn-sm" ><i class="fa  fa-plus-square"></i> Entry Baru</a></td></tr></table><br>				
<div class="table-responsive" > 				
	<table class="table table-bordered">			
		<thead>		
			<tr>	
				<th width=15>Pilih </th>
				<th>Kode Order</th>
				<th>Tgl Order</th>
				<th>Nama Proyek</th>
				<th>Alamat Proyek</th>
				<th>Kode Customer</th>
				<th>Kode Sales</th>
			</tr>	
		</thead>		
		<?php		
		while ($data = mysql_fetch_array($result))		
		{		
			echo '<tr>' ;	
				echo '<td> <a href="order_iud.php?id='.$data['id'].'" class="btn btn-sm btn-info"> <i class="fa fa-edit"> </i> Select </a></td>' ;
				echo '<td>'.$data['kode_order'].'</td>' ;
				echo '<td>'.$data['tgl_order'].'</td>' ;
				echo '<td>'.$data['nama_proyek'].'</td>' ;
				echo '<td>'.$data['alamat_proyek'].'</td>' ;
				echo '<td>'.$data['nama_customer'].'</td>' ;
				echo '<td>'.$data['nama_sales'].'</td>' ;
			echo '</tr>' ;	
		}		
		?>		
	</table>			
</div>				
<?php include 'footer.php' ;?>				
