<?php
require_once("connection.php");
class Cms extends Connection{
	function __construct()
	{
	   $this->createConnection();
	}   	                                      
    /*#########################################START CMS SECTION##################################################*/
	
	function addCms()
	{	
	  if(isset($_REQUEST['title'],$_REQUEST['page'],$_REQUEST['description'],$_SESSION['admin']['user_id']) and !empty($_REQUEST['title']) and !empty($_SESSION['admin']['user_id']))
		{
			$admin=$_SESSION['admin']['user_id'];
            $title = mysql_real_escape_string($_REQUEST['title']);                     
            $page = mysql_real_escape_string($_REQUEST['page']);                                  
            $descriptions = mysql_real_escape_string($_REQUEST['description']);  
			$status = $_REQUEST['status'];  
			$sql = "insert into  sr_cms set title='".$title."',description='".$descriptions."',page='".$page."',status='".$status."', created_on='".date('Y-m-d::H:i:s')."',updated_on='".date('Y-m-d::H:i:s')."',created_by='".$admin."',updated_by='".$admin."'"; 
			$resp = mysql_query($sql);
            if($resp==true)
			{
                return 5; //#####  ADDED SUCCESS
            }
			else
			{
                 return 1; //##### FAILED SQL ERROR
            }
	    }
		else
		{
            return 0;  //##### REQUIRED PARAMETER MISSING
        }
            

}

/*############################################## UPDATE ANATOMY SECTIONS ###################################################*/

	function UpdateCms()
	{	
	  if(isset($_REQUEST['title'],$_REQUEST['cms_id'],$_REQUEST['page'],$_REQUEST['description'],$_SESSION['admin']['user_id']) and !empty($_REQUEST['title']) and !empty($_SESSION['admin']['user_id']) and !empty($_REQUEST['cms_id']))
		{
			$admin=$_SESSION['admin']['user_id'];
			$cms_id=$_REQUEST['cms_id'];
            $title = mysql_real_escape_string($_REQUEST['title']);                     
            $page = mysql_real_escape_string($_REQUEST['page']);                                  
            $descriptions = mysql_real_escape_string($_REQUEST['description']);  
			$status = $_REQUEST['status'];  
			$sql = "update sr_cms set title='".$title."',description='".$descriptions."',page='".$page."',status='".$status."',updated_on='".date('Y-m-d::H:i:s')."',updated_by='".$admin."'  where id='".$cms_id."'"; 
			$resp = mysql_query($sql);
            if($resp==true)
			{
                return 5; //#####  ADDED SUCCESS
            }
			else
			{
                 return 1; //##### FAILED SQL ERROR
            }
	    }
		else
		{
            return 0;  //##### REQUIRED PARAMETER MISSING
        }

 }
    /*############################################ END CMS SECTIONS #######################################################*/
	
	function addFaq()
	{	
	  if(isset($_REQUEST['question'],$_REQUEST['faq_type'],$_REQUEST['answer'],$_SESSION['admin']['user_id']) and !empty($_REQUEST['question']) and !empty($_REQUEST['faq_type']) and !empty($_SESSION['admin']['user_id']))
		{
			$admin=$_SESSION['admin']['user_id'];
            $question = mysql_real_escape_string($_REQUEST['question']);                     
            $faq_type =$_REQUEST['faq_type'];                     
            $answer = mysql_real_escape_string($_REQUEST['answer']);  
			$status = $_REQUEST['status']; 
			$sql = "insert into  sr_faq set question='".$question."',answer='".$answer."',faq_type_id='".$faq_type."',status='".$status."', created_on='".date('Y-m-d::H:i:s')."',updated_on='".date('Y-m-d::H:i:s')."',created_by='".$admin."',updated_by='".$admin."'"; 
			$resp = mysql_query($sql);
            if($resp==true)
			{
                return 5; //#####  ADDED SUCCESS
            }
			else
			{
                 return 1; //##### FAILED SQL ERROR
            }
	    }
		else
		{
            return 0;  //##### REQUIRED PARAMETER MISSING
        }
            

	}
	
	function UpdateFaq()
	{	
	  if(isset($_REQUEST['question'],$_REQUEST['faq_type'],$_REQUEST['faq_id'],$_REQUEST['answer'],$_SESSION['admin']['user_id']) and !empty($_REQUEST['faq_type']) and !empty($_REQUEST['question']) and !empty($_SESSION['admin']['user_id']) and !empty($_REQUEST['faq_id']))
		{
			$admin=$_SESSION['admin']['user_id'];
			$faq_id=$_REQUEST['faq_id'];
			$faq_type =$_REQUEST['faq_type'];                     
            $question = mysql_real_escape_string($_REQUEST['question']);                     
            $descriptions = mysql_real_escape_string($_REQUEST['answer']);  
			$status = $_REQUEST['status'];  
			$sql = "update sr_faq set question='".$question."',faq_type_id='".$faq_type."',answer='".$descriptions."',status='".$status."',updated_on='".date('Y-m-d::H:i:s')."',updated_by='".$admin."'  where faq_id='".$faq_id."'"; 
			$resp = mysql_query($sql);
            if($resp==true)
			{
                return 5; //#####  ADDED SUCCESS
            }
			else
			{
                 return 1; //##### FAILED SQL ERROR
            }
	    }
		else
		{
            return 0;  //##### REQUIRED PARAMETER MISSING
        }

 }
}
?>