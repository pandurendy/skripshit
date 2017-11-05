<?php				
include 'header.php' ;				
echo '<h4 class="text-primary">Progres Marking</h4>';				
$table_name = 'view_progres_marking' ;				
$dataPerPage =  10 ;				
$this_url = 'marking.php' ;				
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
				echo '<td> <a href="marking_iud.php?id='.$data['id_progres'].'" class="btn btn-sm btn-info"> <i class="fa fa-edit"> </i> Select </a></td>' ;
				echo '<td>'.$data['kode_order'].'</td>' ;
				echo '<td>'.$data['nama_proyek'].'</td>' ;
				echo '<td>'.get_progress('MARKING',$data['kode_order'],$data['revisi_progres']).'</td>' ;
			echo '</tr>' ;	
		}		
		?>		
	</table>			
</div>				
<?php include 'footer.php' ;?>				
