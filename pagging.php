<?php
if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} else {
    $noPage = 1;
}
$showPage = 0;
$offset = ($noPage - 1) * $dataPerPage;

$query = "SELECT * FROM ".$table_name."  LIMIT $offset, $dataPerPage";

$result = mysql_query($query) or die('Error');

$query      = "SELECT COUNT(*) AS jumData FROM ".$table_name;
$hasil      = mysql_query($query);
$data       = mysql_fetch_array($hasil);

$jumData     = $data['jumData'];

// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
$jumPage = ceil($jumData/$dataPerPage);


echo '<ul class="pagination">' ;
if ($noPage > 1)  { 
        // menampilkan link previous 
		echo '<li class="previous"><a href="'.$_SERVER['PHP_SELF'].'?page='.($noPage-1).'"> &laquo; </a></li> ';
}
       // memunculkan nomor halaman dan linknya
for($page = 1; $page <= $jumPage; $page++)
{
	if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
    {  
        if (($showPage == 1) && ($page != 2)) 
		{ 
			echo '<li>...</li>';                           
               
        }
        if (($showPage != ($jumPage - 1)) && ($page == $jumPage)) 
		{ 
            echo '<li>...</li>';  
        }
        if ($page == $noPage) 
		{ 
			echo '<li class="active"><a href="#">'.$page.'<span class="sr-only">(current)</span></a></li>' ;
		} 
		else 
		{                                                            
            echo '<li><a href="'.$_SERVER['PHP_SELF'].'?page='.$page.'">'.$page.'</a></li>';
        }    
        $showPage = $page;         
    }
}
if ($noPage < $jumPage)
{                                                         
        echo '<li class="next" ><a href="'.$_SERVER['PHP_SELF'].'?page='.($noPage+1).'">&raquo </a></li>' ;
}    
echo '</ul>';   
