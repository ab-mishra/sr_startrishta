<?php 
include('mailerClass.php');


if(isset($_POST['submit'])){


	$first_name=$_POST['first_name']; //new line
	$last_name=$_POST['last_name']; //new line
	$user_email=$_POST['user_email'];
	$user_no=$_POST['user_no'];
	$subject=$_POST['subject']; //new line
	$message=$_POST['message'];

//line 22 and 23
/******************EMAIL*******************/
	$mail=new PHPmailer;
	$mail->IsHTML(true);
	$mail->From = 'shilpisingh064@gmail.com';
	$mail->FromName = 'Shilpi singh';
	$mail->AddAddress($user_email);
	$mail->Subject = "$subject";
	$mail->Body.="Dear ".$first_name.",<br>
				<br/><br/><b>User Email : </b>".$user_email."
				<br/><br/><b>User Number : </b>".$user_no."
				<br/><br/><b>Message : </b>".$message."
				<br/><br/>";

	$mail->WordWrap=50;
	$mail->Send();
}
?>

<html>
<head><script src="https://code.jquery.com/jquery-2.1.4.min.js"></script></head>
<body>


<form method="post" action="index.php" onsubmit ="return validate();">
	<input type="text" name="first_name" /> <br/><br/>
	<input type="text" name="last_name" /> <br/><br/>
	<input type="text" name="user_email" /> <br/><br/>
	<input type="text" name="user_no" /><br/><br/>
	<input type="text" name="subject" /><br/><br/>
	<textarea name="message"></textarea><br/><br/>
	<input type="submit" name="submit" />
</form>
</body>


<script>
function validate(){
	
	if($('input[name="first_name"]').val() == ''){
		alert('please enter first name.');
		$('input[name="first_name"]').focus();
		return false;
	}
	if($('input[name="last_name"]').val() == ''){
		alert('please enter last name.');
		$('input[name="last_name"]').focus();
		return false;
	}
	if($('input[name="subject"]').val() == ''){
		alert('please enter subject.');
		$('input[name="subject"]').focus();
		return false;
	}
	if($('input[name="user_email"]').val() == ''){
		alert('please enter email.');
		$('input[name="user_email"]').focus()
		return false;
	}
	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test($('input[name="user_email"]').val()))){
		alert("Invalid Email ID. Please enter the correct ID.");
		$('input[name="user_email"]').focus()
		return false;
	} 
	if($('input[name="user_no"]').val() == ''){
		alert('please enter Mobile number.');
		$('input[name="user_no"]').focus()
		return false;
	}
	if (!(/^[1-9]{1}[0-9]{9}$/.test($('input[name="user_no"]').val()))){
		alert("Invalid Mobile Number.");
		$('input[name="user_no"]').focus()
		return false;
	} 
	if($('textarea[name="message"]').val() == ''){
		alert('please enter Message.');
		$('textarea[name="message"]').focus()
		return false;
	}
	return true;
}

</script>
</html>

