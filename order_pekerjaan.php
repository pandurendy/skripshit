<?php				
include 'header.php' ;				
echo '<h4 class="text-primary">Data Pekerjaan</h4>';				
$table_name = 'tabel_order_pekerjaan' ;				
$dataPerPage =  10 ;				
$this_url = 'order_pekerjaan.php' ;				
include 'pagging.php' ;				
?>				
<table><tr><td> <a href="order_pekerjaan_iud.php?id=0" class="btn btn-warning btn-sm" ><i class="fa  fa-plus-square"></i> Entry Baru</a></td></tr></table><br>				
<div class="table-responsive" > 				
	<table class="table table-bordered">			
		<thead>		
			<tr>	
				<th width=15>Pilih </th>
				<th>Kode Customer</th>
        <th>Nama Proyek</th>
				<th>Nama Customer</th>
				<th>Alamat Proyek</th>
				<th>Tanggal Spk</th>
				<th>Kode Sales</th>
				<th>Isi Spk</th>
			</tr>	
		</thead>		
		<?php		
		while ($data = mysql_fetch_array($result))	
		// print_r($data);
		{		
			echo '<tr>' ;	
				echo '<td> <a href="order_pekerjaan_iud.php?id='.$data['id'].'" class="btn btn-sm btn-info"> <i class="fa fa-edit"> </i> Select </a></td>' ;
        echo '<td>'.$data['kode_pekerjaan'].'</td>' ;
        echo '<td>'.$data['nama_proyek'].'</td>' ;
				echo '<td>'.$data['kode_customer'].'</td>' ;
				echo '<td>'.$data['alamat_proyek'].'</td>' ;
				echo '<td>'.$data['tgl_progres'].'</td>' ;
				echo '<td>'.$data['kode_sales'].'</td>' ;
				echo '<td>';
				if($data['isi_spk'] != null || $data['isi_spk'] != '') {
				echo '<a class="btn btn-sm btn-info" href="uploads/' . $data['isi_spk'] . '" target="_blank">Download SPK</a></td>' ;
				} else {
					echo '-';
				}
			echo '</tr>' ;	
		}		
		?>		
	</table>			
</div>				
<?php include 'footer.php' ;?>				
