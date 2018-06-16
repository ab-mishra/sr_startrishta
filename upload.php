<?php
require_once('classes/resizeclass.php');
$file_formats = array("jpg","jpeg","png","gif");

$filepath = "upload/photo";
$thumbfilepath = "upload/photo/thumb";
$thumbfilepath200 = "upload/photo/200X200";
$preview_width = "200";
$preview_height = "200";


if ($_POST['submitbtn']=="Upload") {

	$name = $_FILES['imagefile']['name']; // filename to get file's extension
	$size = $_FILES['imagefile']['size'];
	$tmp = $_FILES['imagefile']['tmp_name'];

 if (strlen($name)) {
 	$filename = explode(".",$name);
	$file_ext =  strtolower(end($filename));
	$imgname = substr($name,0,-(strlen($file_ext)+1));
	$filename = str_replace(" ","_",$imgname);    
	$profile_image = time().'_'.$filename.'.'.$file_ext;
 	
	if (in_array($file_ext, $file_formats)) { // check it if it's a valid format or not
 		if ($size < (2048 * 1024)) { // check it if it's bigger than 2 mb or no
 			
 			//echo $profile_image;die;
 				if (move_uploaded_file($tmp, $thumbfilepath .'/'. $profile_image)) {
					
					/* Resize image*/
					$resizeObj = new resize($thumbfilepath."/".$profile_image);
					
					$resizeObj -> resizeImage(387, 387, 'auto');
					$resizeObj -> saveImage($filepath.'/'.$profile_image, 100);
					
					$resizeObj -> resizeImage(200, 200, 'auto');
					$resizeObj -> saveImage($thumbfilepath200.'/'.$profile_image, 100);
					echo $profile_image;
 				} else {
 					echo "Could not move the file";
 				}
 		} else {
 			echo "Your image size is bigger than 2MB";
 		}
 	} else {
 			echo "Invalid file format";
 	}
 } else {
 	echo "Please select image!";
 }
 exit();
}
 
?>