<?php 
include("classes/connection.php"); 
$obj = new Connection();
include("classes/mailerClass.php");
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
		if($result==true || $resp==true)
		{
			$success = sendMailAdmin($contact_message,$contact_type,$bug_type);
			echo "<script>window.location.href='contacts.php?q=1'</script>";
			// if($resp==true || $success==1)
			// {
				// echo "<script>alert('Your query has been sent successfully. Start Rishta team will contact you soon');</script>";
				// echo "<script>window.location.href='index.php'</script>";
			// }
			// else
			// {
				// echo "<script>alert('Some thing goes wrong! Please try again later.');</script>";
				// echo "<script>window.location.href='contacts.php'</script>";
			// }
		}else{
			echo "<script>window.location.href='contacts.php?q=5'</script>"; // error
		}
		
    } 
									
	function sendMailAdmin($contact_message,$contact_type,$bug_type)
	{	
		$mail=new PHPmailer;
		$mail->IsHTML(true);
		$mail->From='info@startrishta.com';
		$mail->FromName='Start Rishta';
		$mail->AddAddress('webcontact@startrishta.com ');   
		$mail->AddBCC('gulshan.kumar@vibescom.in'); 
		//Client mailId
		//$mail->AddAddress('info@thegoldcoast.in');
		//$bcc= 'clients@vibescom.com';
		//$mail->AddBCC($bcc);
		//$mail->AddAttachment($target_path);
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
		$mail->Subject="Contact:-Start Rishta Questions";
		$mail->Body.="<b>"."Dear ".ucwords($_POST['name']).", "."</b>"."<br/><br/>"."A visitor has tried to contact Start Rishta through website contact form."."<br/><br/>".
		"<table width='50%' style='padding:0 0 10px 5px; border-collapse:collapse; background-color:#E6E6E6;' valign='top' border='1' cellsapacing='0' cellpadding='0'>
		<tr>
		<td width='35%' style='padding: 3px 3px 3px 3px;'>Contact Type:</td><td style='padding: 3px 3px 3px 3px;'>Report a bug</td>
		</tr>
		<tr>
		<td width='35%' style='padding: 3px 3px 3px 3px;'>Name:</td><td style='padding: 3px 3px 3px 3px;'>".$_POST['name']."</td>
		</tr>
		<tr>
		<td width='35%' style='padding: 3px 3px 3px 3px;'>Email:</td><td style='padding: 3px 3px 3px 3px;'>".$_POST['email']."</td>
		</tr>
		<tr>
		<td width='35%' style='padding: 3px 3px 3px 3px;'>Where was the bug found:</td><td style='padding: 3px 3px 3px 3px;'>".$bug_type."</td>
		</tr>
		<tr>
		<td width='35%' style='padding: 3px 3px 3px 3px;'>Message:</td><td style='padding: 3px 3px 3px 3px;'>".$contact_message."</td>
		</tr>
		<tr>
		<td width='35%' style='padding: 3px 3px 3px 3px;'>Uploaded Screen Shots:</td><td style='padding: 3px 3px 3px 3px;'>".$image_link."</td>
		</tr>
		 
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