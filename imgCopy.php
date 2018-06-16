<?php
$imgurl = "https://scontent.xx.fbcdn.net/v/t31.0-1/c0.120.720.720/p720x720/19055308_1683882168307617_3672803569469132320_o.jpg?oh=98e35456c3e73959b90959dcf2fd928d&oe=59F023E5";
//$imgurl = "https://www.startrishta.com/upload/photo/1500984971_y9_Fg_Zi_Z_b_G8.jpg";
echo getcwd();
$dir = "/home/startrishta/public_html/beta-dev/upload/photo/";
//file_put_contents($dir, file_get_contents($imgurl));

system("wget --accept .jpg,.jpeg --cookies=on -p \"$imgurl\" -O \"image_new.jpg\" ");
$file = 'image_new.jpg';
$newfile = $dir.'image_new_fb.jpg';

if (!copy($file, $newfile)) {
    echo "failed to copy";
}
else{
	echo "yes!";
}
//copy("image_new.jpg", $dir."image_new_fb.jpg");
?>