<?php 
include("classes/connection.php"); 
$obj = new Connection();
include("classes/mailerClass.php");

if(isset($_REQUEST['Submit']) and $_REQUEST['Submit']=='general'){
	$contact_name=$_POST['name'];
	$contact_email=$_POST['email'];
	$contact_type="1";
	$contact_message=mysql_real_escape_string($_POST['message']);
	//$target_path='';
	$sql = "insert into sr_contact_us set contact_name ='".$contact_name."',contact_email = '".$contact_email."',contact_type ='".$contact_type."',message='".$contact_message."',created_on='".date('Y-m-d::H:i:s')."'";	
	$result = mysql_query($sql) or die(mysql_error());
	$id=mysql_insert_id();
	for ($i = 0; $i < count($_FILES['attach_img']['name']); $i++) 
	{			
		$dir_name = "doc/screenshot";
		if($_FILES["attach_img"]["name"][$i]!=''){
		 
			$fsize = $_FILES["attach_img"]["size"][$i];
			/*########################## CHECK SIZE FOR IMAGE ###################*/                
			if($fsize > FILESIZE){
				return 7; //##### file is greater then 2 MB
			}                 
			$filename = explode(".",$_FILES["attach_img"]["name"][$i]);
			$file_ext =  strtolower(end($filename));
			$imgname = substr($_FILES["attach_img"]["name"][$i],0,-(strlen($file_ext)+1));
			$filename = str_replace(" ","_",$imgname);
			/*################### CHECK EXTENTION FOR IMAGE ######################*/                
			$allExtarray = array("jpg","jpeg","png");
			if(!in_array($file_ext,$allExtarray)){                
				return 8; //##### file extension not accepted
			}   
			//$attach_img = time().'_'.$filename.'.'.$file_ext;
			$attach_img = $filename.'.'.$file_ext;
			if(!file_exists($dir_name))
			{
				$flag = mkdir($dir_name, 0777,true);                    
			}
			if(file_exists($dir_name."/".$attach_img))
			{                    
				@unlink($dir_name."/".$attach_img);
			}
			$movefile=move_uploaded_file($_FILES["attach_img"]["tmp_name"][$i],$dir_name."/".$attach_img);
			//$target_path[$i]="doc/screenshot/".$attach_img;
		}
		$sql = "insert into sr_contact_attachment set contact_id='".$id."',attachment='".$attach_img."'"; 
		$resp = mysql_query($sql);
	}
	
	if($result==true ||  $resp==true)
	{
		
		$success = sendMailAdmin($contact_message,$contact_type);
		echo "<script>window.location.href='contacts.php?q=1'</script>";
	}else{
		echo "<script>window.location.href='contacts.php?q=5'</script>";// error
	}		
}


//##########################################CONTACT BILLING#########################################
if(isset($_REQUEST['Submit']) and $_REQUEST['Submit']=='billing')
{
	$contact_name=$_POST['name'];
	$contact_email=$_POST['email'];
	$payment_type=$_POST['payment_type'];
	$payment_method=$_POST['payment_method'];
	$date1=$_POST['date'];
	$date = date('Y-m-d', strtotime(str_replace('-', '/', $date1)));
	$contact_type="2";
	$contact_message=mysql_real_escape_string($_POST['message']);
	//$target_path='';
	$sql = "insert into sr_contact_us set contact_name ='".$contact_name."',contact_email = '".$contact_email."',payment_date='".$date."', payment_type='".$payment_type."',payment_method='".$payment_method."',contact_type ='".$contact_type."',message='".$contact_message."',created_on='".date('Y-m-d::H:i:s')."'";	
	$result = mysql_query($sql) or die(mysql_error());
	$id=mysql_insert_id();
	for ($i = 0; $i < count($_FILES['attach_img']['name']); $i++) 
	{			
		$dir_name = "doc/screenshot";
		if($_FILES["attach_img"]["name"][$i]!=''){
		 
			$fsize = $_FILES["attach_img"]["size"][$i];
			/*########################## CHECK SIZE FOR IMAGE ###################*/                
			if($fsize > FILESIZE){
				return 7; //##### file is greater then 2 MB
			}                 
			$filename = explode(".",$_FILES["attach_img"]["name"][$i]);
			$file_ext =  strtolower(end($filename));
			$imgname = substr($_FILES["attach_img"]["name"][$i],0,-(strlen($file_ext)+1));
			$filename = str_replace(" ","_",$imgname);
			/*################### CHECK EXTENTION FOR IMAGE ######################*/                
			$allExtarray = array("jpg","jpeg","png");
			if(!in_array($file_ext,$allExtarray)){                
				return 8; //##### file extension not accepted
			}   
			//$attach_img = time().'_'.$filename.'.'.$file_ext;
			$attach_img = $filename.'.'.$file_ext;
			if(!file_exists($dir_name))
			{
				$flag = mkdir($dir_name, 0777,true);                    
			}
			if(file_exists($dir_name."/".$attach_img))
			{                    
				@unlink($dir_name."/".$attach_img);
			}
			$movefile=move_uploaded_file($_FILES["attach_img"]["tmp_name"][$i],$dir_name."/".$attach_img);
			//$target_path[$i]="doc/screenshot/".$attach_img;
		}
		$sql = "insert into sr_contact_attachment set contact_id='".$id."',attachment='".$attach_img."'"; 
		$resp = mysql_query($sql);
	}
	if($result==true ||  $resp==true)
	{
		$success = sendMailAdmin($contact_message,$contact_type,$date);
		echo "<script>window.location.href='contacts.php?q=1'</script>";
	}else{
		echo "<script>window.location.href='contacts.php?q=5'</script>";// error
	}
		
}

//#######################################CONTACT BUG#################################################
if(isset($_REQUEST['Submit']) and $_REQUEST['Submit']=='bug')
{
	$contact_name=$_POST['name'];
	$contact_email=$_POST['email'];
	$bug_type=$_POST['option'];
	$contact_type="3";
	$contact_message=mysql_real_escape_string($_POST['message']);
	$sql = "insert into sr_contact_us set contact_name ='".$contact_name."',contact_email='".$contact_email."',bug_type='".$bug_type."',contact_type ='".$contact_type."',message='".$contact_message."',created_on='".date('Y-m-d::H:i:s')."'";	
	$resp = mysql_query($sql) or die(mysql_error());
	$id=mysql_insert_id();
	if($_FILES['attach_img']['name']!='')
	{
		for ($i = 0; $i < count($_FILES['attach_img']['name']); $i++) 
		{			
			$dir_name = "doc/screenshot";
			if($_FILES["attach_img"]["name"][$i]!=''){
			 
				$fsize = $_FILES["attach_img"]["size"][$i];
				/*########################## CHECK SIZE FOR IMAGE ###################*/                
				if($fsize > FILESIZE){
					return 7; //##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["attach_img"]["name"][$i]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["attach_img"]["name"][$i],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				/*################### CHECK EXTENTION FOR IMAGE ######################*/                
				$allExtarray = array("jpg","jpeg","png");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; //##### file extension not accepted
				}   
				$attach_img = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$attach_img))
				{                    
					@unlink($dir_name."/".$attach_img);
				}
				$movefile=move_uploaded_file($_FILES["attach_img"]["tmp_name"][$i],$dir_name."/".$attach_img);
			}
			$sql = "insert into sr_contact_attachment set contact_id='".$id."',attachment='".$attach_img."'"; 
			$resp = mysql_query($sql);
		}
	}
	if($resp==true)
	{
		$success = sendMailAdmin($contact_message,$contact_type,$bug_type);
		echo "<script>window.location.href='contacts.php?q=1'</script>";
	}else{
		echo "<script>window.location.href='contacts.php?q=5'</script>"; // error
	}
		
}

//#################################CONTACT FEATURE#############################################
if(isset($_REQUEST['Submit']) and $_REQUEST['Submit']=='suggest')
{
	$contact_name=$_POST['name'];
	$contact_email=$_POST['email'];
	$contact_type="4";
	$contact_message=mysql_real_escape_string($_POST['message']);
	$sql = "insert into sr_contact_us set contact_name ='".$contact_name."',contact_email='".$contact_email."',contact_type ='".$contact_type."',message='".$contact_message."',created_on='".date('Y-m-d::H:i:s')."'";	
	$resp = mysql_query($sql) or die(mysql_error());
	$id=mysql_insert_id();
	if($_FILES['attach_img']['name']!='')
	{
		for ($i = 0; $i < count($_FILES['attach_img']['name']); $i++) 
		{			
			$dir_name = "doc/screenshot";
			if($_FILES["attach_img"]["name"][$i]!=''){
			 
				$fsize = $_FILES["attach_img"]["size"][$i];
				/*########################## CHECK SIZE FOR IMAGE ###################*/                
				if($fsize > FILESIZE){
					return 7; //##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["attach_img"]["name"][$i]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["attach_img"]["name"][$i],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				/*################### CHECK EXTENTION FOR IMAGE ######################*/                
				$allExtarray = array("jpg","jpeg","png");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; //##### file extension not accepted
				}   
				$attach_img = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$attach_img))
				{                    
					@unlink($dir_name."/".$attach_img);
				}
				$movefile=move_uploaded_file($_FILES["attach_img"]["tmp_name"][$i],$dir_name."/".$attach_img);
			}
			$sql = "insert into sr_contact_attachment set contact_id='".$id."',attachment='".$attach_img."'"; 
			$resp = mysql_query($sql);
		}
	}
	if($resp==true)
	{
		$success = sendMailAdmin($contact_message,$contact_type);
		echo "<script>window.location.href='contacts.php?q=1'</script>";
	}else{
		echo "<script>window.location.href='contacts.php?q=5'</script>";// error
	}
	
} 								
function sendMailAdmin($contact_message,$contact_type, $bug_type='', $date='')
{	
	$dir_name = "doc/screenshot/";
	$names =  $_FILES['attach_img']['name'];
	$i =0;
	$image_link ='';
	foreach($names as $name){
		$target_file = SITEURL.$dir_name . basename($name);
		move_uploaded_file($_FILES["attach_img"]["tmp_name"][$i], $target_file);        
		$image_link .= "<a href='$target_file' target='_blank' >$name</a><br/>";
		$i++;
	}
	$addContent="";
	if($bug_type != ''){
	
		$addContent .= "<tr>
		<td width='35%' style='padding: 3px 3px 3px 3px;'>Where was the bug found:</td><td style='padding: 3px 3px 3px 3px;'>".$bug_type."</td>
		</tr>";
	}
	if($date != ''){
		$addContent .= "<tr>
		<td width='35%' style='padding: 3px 3px 3px 3px;'>Payment Type:</td><td style='padding: 3px 3px 3px 3px;'>".$_POST['payment_type']."</td>
		</tr>
		<tr>
		<td width='35%' style='padding: 3px 3px 3px 3px;'>Payment Method:</td><td style='padding: 3px 3px 3px 3px;'>".$_POST['payment_method']."</td>
		</tr>
		<tr>
		<td width='35%' style='padding: 3px 3px 3px 3px;'>Payment Date:</td><td style='padding: 3px 3px 3px 3px;'>".$date."</td>
		</tr>";
	}	
	$mail=new PHPmailer;
	$mail->IsHTML(true);
	$mail->From='info@startrishta.com';
	$mail->FromName='Start Rishta';
	$mail->AddAddress(ADMINMAIL);   
	$mail->AddBCC('shilpi.singh@vibescom.in');
	$mail->Subject="Contact:-Start Rishta Questions";
	$mail->Body.="<b>Dear Startrishta Team,"."</b>"."<br/><br/>"."A visitor has tried to contact Start Rishta through website contact form."."<br/><br/>".
	"<table width='50%' style='padding:0 0 10px 5px; border-collapse:collapse; background-color:#E6E6E6;' valign='top' border='1' cellsapacing='0' cellpadding='0'>
		<tr><td width='35%' style='padding: 3px 3px 3px 3px;'>Contact Type:</td><td style='padding: 3px 3px 3px 3px;'>General questions</td></tr>
		<tr><td width='35%' style='padding: 3px 3px 3px 3px;'>Name:</td><td style='padding: 3px 3px 3px 3px;'>".$_POST['name']."</td></tr>
		<tr><td width='35%' style='padding: 3px 3px 3px 3px;'>Email:</td><td style='padding: 3px 3px 3px 3px;'>".$_POST['email']."</td></tr>".$addContent."
		<tr><td width='35%' style='padding: 3px 3px 3px 3px;'>Message:</td><td style='padding: 3px 3px 3px 3px;'>".$contact_message."</td></tr>
		<tr><td width='35%' style='padding: 3px 3px 3px 3px;'>Uploaded Screen Shots:</td><td style='padding: 3px 3px 3px 3px;'>".$image_link."</td></tr>
	</table>"."<br/><br/>"."Thanks,<br/> ".ucwords($_POST['name'])."";
	$mail->WordWrap=50;
	//print_r($mail);die;
	if(!$mail->Send())
	{
		return $success=0;
	}
	else
	{   
		return $success=1;
	}
}

?>