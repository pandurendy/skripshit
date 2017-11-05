<?php				
include 'header.php' ;	
	
echo '<h4 class="text-primary">Progres Pekerjaan Teknisi</h4>';				
$table_name = 'view_progres_pekerjaan' ;				
$dataPerPage =  10 ;				
$this_url = 'pekerjaan_teknisi.php' ;				
include 'pagging.php' ;				
?>							
<div class="table-responsive" > 				
	<table class="table table-bordered">			
		<thead>		
			<tr>	
				<th width=50>Pilih </th>
				<th width=150>No SPK</th>
				<th width=200>Nama Proyek</th>
				<th>Nilai Progres</th>
			</tr>	
		</thead>		
		<?php		
		while ($data = mysql_fetch_array($result))		
		{		
			echo '<tr>' ;	
				echo '<td> <a href="pekerjaan_teknisi_iud.php?id='.$data['id_progres'].'" class="btn btn-sm btn-info"> <i class="fa fa-edit"> </i> Select </a></td>' ;
				echo '<td>'.$data['kode_pekerjaan'].'</td>' ;
				echo '<td>'.$data['nama_proyek'].'</td>' ;
				echo '<td>'.get_progress('PEKERJAAN',$data['kode_pekerjaan'],$data['revisi_progres']).'</td>' ;
			echo '</tr>' ;	
		}		
		?>		
	</table>			
</div>				
<?php include 'footer.php' ;?>				
