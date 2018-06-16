<?php 
/* -----------------------------------------------------------------------------------------
 
   -----------------------------------------------------------------------------------------
*/

/* $host     = "startrishta.db.10691417.hostedresource.com";
$username = "startrishta"; 
$password = "St#A!r@1T32"; 
$database = "startrishta"; */
$host     = "localhost";
$username = "startris_usersr"; 
$password = "Q}9f=SRyiV^m"; 
$database = "startris_namesr";
 
mysql_connect($host , $username , $password);
mysql_select_db($database);


require 'Social.php'; 
	$Social_obj= new Social();
$Social_resp='';	
if(isset($_GET['facebook'])){
	$Social_resp = $Social_obj->facebook();
}
if(isset($_GET['fbConnect'])){
	$Social_resp = $Social_obj->fbConnect();
}
if(isset($_GET['fbDisconnect'])){
	$Social_resp = $Social_obj->fbDisconnect();
}
if(isset($_GET['importFb'])){
	$Social_resp = $Social_obj->importFb();
}

?>
<!-- after authentication close the popup -->
<script type="text/javascript">
window.close();
</script>