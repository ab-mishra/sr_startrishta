<?php 
ini_set("display_errors",1);

	$txt = "data".time().".txt";
	$fh = fopen($txt, 'a');  
if(isset($_POST))
{
 // check if both fields are set
	echo $var = 'Post called';
	$txts=$var;
	foreach($_POST as $key => $value)
	{
	$txts.=$var.' - '.$key.' - '.$value.'\n'; 	
	}
//	echo $txts;
    fwrite($fh,$txts); // Write information to the file
    fclose($fh); // Close the file
}
else
{
	echo $var = 'Post not called';
	
	 fwrite($fh,$var); // Write information to the file
    fclose($fh); // Close the file
}