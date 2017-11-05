<?php 
require_once('koneksi.php');
 ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;

}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
}
if (isset($_POST['Username'])) {
  $loginUsername=$_POST['Username'];
  $password= md5 ($_POST['Password']);

  if ($loginUsername == 'admin') {
    $_SESSION['username'] = $loginUsername;
    $_SESSION['level'] = 'admin';
    header("Location: index.php" );
  } else if ($loginUsername == 'kadiv') {
    $_SESSION['username'] = $loginUsername;
    $_SESSION['level'] = 'kadiv';
    header("Location: index.php" );
  }


//   $MM_fldUserAuthorization = "";

//   $MM_redirectLoginFailed = "gagal.php";
//   $MM_redirecttoReferrer = false;
//   mysql_select_db($database_db, $db);
  
//   $LoginRS__query=sprintf("SELECT username, password, stt FROM `user` WHERE username=%s AND password=%s",
//     GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
//   $LoginRS = mysql_query($LoginRS__query, $db) or die(mysql_error());
//   $tb = mysql_fetch_assoc($LoginRS);
//   $loginFoundUser = mysql_num_rows($LoginRS);
//   if ($loginFoundUser) {
//      $loginStrGroup = "";
    
// 	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
//     //declare two session variables and assign them
//     $_SESSION['MM_Username'] = $loginUsername;
//     $_SESSION['MM_UserGroup'] = $loginStrGroup;	
// 	$_SESSION['status'] = $tb['stt'];  
	
// 	  if ($_SESSION['status'] == 1) {
//   $MM_redirectLoginSuccess = "index.php";
//     }else if ($_SESSION['status'] == 2) {
//   $MM_redirectLoginSuccess = "monitoring.php";    
// }
//     if (isset($_SESSION['PrevUrl']) && false) {
//       $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
//     }
//     header("Location: " . $MM_redirectLoginSuccess );
//   }
//   else {
//     header("Location: ". $MM_redirectLoginFailed );
//   }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Progress Monitoring</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body> 
  	
<div class = "container">
  <div class="wrapper">
    <form method="POST" action="<?php echo $loginFormAction; ?>" class="form-signin">       
        <h3 class="form-signin-heading">PT. Bangun Anugrah Hanjaya</h3>
        <h5 class="form-signin-heading">Monitoring Progress Pekerjaan Teknisi</h5>
        <hr class="colorgraph"><br>
        
        <input type="text" class="form-control" name="Username" placeholder="Username" required autofocus />
        <hr>
        <input type="password" class="form-control" name="Password" placeholder="Password" required/>          
       
        <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>        
    </form>     
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</head>
</html>