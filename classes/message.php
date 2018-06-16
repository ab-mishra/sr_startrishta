<?php
require_once('user_class.php');

class Message extends User{
	function __construct(){
	   $this->createConnection();
	}
}
?>