<?php 
$db_user = 'root' ;
$db_pass = '' ;
$database = "progres_db";
$db = mysql_connect("localhost", $db_user, $db_pass ) or die("Gak Bisa Koneksi.");
if(!$db)
	die("Gak Ada Databasenya");
if(!mysql_select_db($database,$db))
	die("Gak Ada Databasenya.");



function  select_db($nama,$jenis_pihan,$pilihan)
{
$loc_sql = 'select isi_pilihan from tabel_pilihan where jenis_pilihan =  "' . $jenis_pihan. '" order by nomor_pilihan' ;
$loc_query = mysql_query($loc_sql) ;
echo '<select 	class="form-control" name="'.$nama.'"  id="'.$nama.'"  > ' ;
echo '<option value="">Pilih....</option>';
While ($loc_data = mysql_fetch_object($loc_query)){
	if ($pilihan == $loc_data->isi_pilihan){
	  	echo '<option value="'.$loc_data->isi_pilihan.'" selected="selected">'.$loc_data->isi_pilihan.'</option>';
	}	else {
		echo '<option value="'.$loc_data->isi_pilihan.'" >'.$loc_data->isi_pilihan.'</option>';
	}
}	
echo '</select>';
}

function get_id_by_name($tabel, $where_row, $name) {
	$query = 'SELECT kode_teknisi from ' . $tabel . ' WHERE ' . $where_row . ' = "' . $name . '";';
	// echo $query;
	$execute = mysql_query($query);
	$result = mysql_fetch_assoc($execute);
	$id = $result['kode_teknisi'];
	return $id;
}

function  select_2db($nama_table,$nama_field,$desc_field,$pilihan)
{
	$loc_sql = 'select * from '.$nama_table.' order by '.$nama_field ;
	$loc_query = mysql_query($loc_sql) ;
	echo '<select 	class="form-control" name="'.$nama_field.'"  id="'.$nama_field.'"  > ' ;
	echo '<option value="">Pilih....</option>';
	While ($loc_data = mysql_fetch_object($loc_query)){
		echo $loc_data->$nama_field;
		if ($pilihan == $loc_data->$nama_field){
				echo $loc_data->$nama_field;
				echo '<option value="'.$loc_data->$nama_field.'" selected="selected">'.$loc_data->$desc_field.'</option>';
		}	else {
			echo '<option value="'.$loc_data->$nama_field.'" >'.$loc_data->$desc_field.'</option>';
		}
	}
	
echo '</select>';
}

function  select_2db_option($nama_table,$nama_field,$desc_field,$pilihan)
{
	$loc_sql = 'select * from '.$nama_table.' order by '.$nama_field ;
	$loc_query = mysql_query($loc_sql) ;
	echo '<option value="">Pilih....</option>';
	While ($loc_data = mysql_fetch_object($loc_query)){
		echo $loc_data->$nama_field;
		if ($pilihan == $loc_data->$nama_field){
				echo $loc_data->$nama_field;
				echo '<option value="'.$loc_data->$nama_field.'" selected="selected">'.$loc_data->$desc_field.'</option>';
		}	else {
			echo '<option value="'.$loc_data->$nama_field.'" >'.$loc_data->$desc_field.'</option>';
		}
	}
	
}

function get_progress( $group_progres, $kode_order, $revisi_progres){	
	if ($group_progres == 'PEKERJAAN') {
		$query_progres = "SELECT a.*, day(a.update_progres) as tanggal FROM tabel_progres a where a.kode_pekerjaan = '".$kode_order."'
						and a.group_progres = '".$group_progres."' and revisi_progres = '".$revisi_progres."'" ;
	} else {
		$query_progres = "SELECT a.*, day(a.update_progres) as tanggal FROM tabel_progres a where a.kode_order = '".$kode_order."'
						and a.group_progres = '".$group_progres."' and revisi_progres = '".$revisi_progres."'" ;
	
	}

	$result_progres = mysql_query($query_progres) or die('Error');
	$cProgress = '<div class="progress"> ' ;
	
	$nilai_awal =  0 ;
	while ($data_progres = mysql_fetch_array($result_progres))	{
		$cProgress .= '<div class="progress-bar progress-bar-day'.$data_progres['tanggal'].'" role="progressbar" aria-valuenow="60" aria-valuemin="'.$nilai_awal.'" aria-valuemax="100" style="width:'.($data_progres['nilai_progres'] - $nilai_awal).'%;">'. $data_progres['nilai_progres'].'</div> ';
		$nilai_awal = $data_progres['nilai_progres']  ;
	}
	$cProgress .= '</div> '	;	
	return $cProgress ;
}
?> 
