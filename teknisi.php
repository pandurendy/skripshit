<?php				
include 'header.php' ;				
echo '<h4 class="text-primary">Data Teknisi</h4>';				
$table_name = 'tabel_teknisi' ;				
$dataPerPage =  10 ;				
$this_url = 'teknisi.php' ;				
include 'pagging.php' ;				
?>				
<table><tr><td> <a href="teknisi_iud.php" class="btn btn-warning btn-sm" ><i class="fa  fa-plus-square"></i> Entry Baru</a></td></tr></table><br>				
<div class="table-responsive" > 				
	<table class="table table-bordered">			
		<thead>		
			<tr>	
				<th width=15>Pilih </th>
				<th>Kode Teknisi</th>
				<th>Nama Teknisi</th>
				<th>Alamat Teknisi</th>
				<th>Tanggal Bergabung</th>
				<th>No Telpon</th>
			</tr>	
		</thead>		
		<?php		
		while ($data = mysql_fetch_array($result))		
		{		
			echo '<tr>' ;	
				echo '<td> <a href="teknisi_iud.php?kode_teknisi='.$data['kode_teknisi'].'" class="btn btn-sm btn-info"> <i class="fa fa-edit"> </i> Select </a></td>' ;
				echo '<td>'.$data['kode_teknisi'].'</td>' ;
				echo '<td>'.$data['nama_teknisi'].'</td>' ;
				echo '<td>'.$data['alamat_teknisi'].'</td>' ;
				echo '<td>'.$data['tgl_gabung'].'</td>' ;
				echo '<td>'.$data['no_telpon'].'</td>' ;
			echo '</tr>' ;	
		}		
		?>		
	</table>			
</div>				
<?php include 'footer.php' ;?>				
