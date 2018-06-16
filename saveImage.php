<?php
define('DIRECTORY', 'upload/photo/');
$server = 'https://scontent.xx.fbcdn.net/v/t1.0-0/s130x130/20620866_1467309280014545_6916939720930823709_n.jpg?oh=ccd60d4b57fe13800516f1e57a1540dc&oe=5A2369CB';
$img = parse_url($server);
$path = explode('/', $img['path']);
echo $filename = end($path);

/*shell_exec("cp -r $server, DIRECTORY.$filename");*/
//file_put_contents(DIRECTORY . '/image.jpg', $content);

/*function grab_image($url,$saveto){
	$url='https://scontent.xx.fbcdn.net/v/t1.0-0/s130x130/20620866_1467309280014545_6916939720930823709_n.jpg?oh=ccd60d4b57fe13800516f1e57a1540dc&oe=5A2369CB';
    $saveto = 'upload/photo/';
    $ch = curl_init ($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($0)){
        unlink($saveto);
    }
    $fp = fopen($saveto,'x');
    fwrite($fp, $raw);
    fclose($fp);
}*/

$cmd = "wget -q \"$server\" -O 'upload/photo/'.$filename";
exec($cmd);
echo file_get_contents($filename);
?>