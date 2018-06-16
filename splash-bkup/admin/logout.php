<?php
    include("../classes/connection.php");
    $obj = new Connection();
		session_destroy();
	 //unset($_SESSION['admin']['user_name']);
     echo "<script>window.location.href='index.php'</script>";
	//echo '<script>window.location="index.php"</script>';
?>