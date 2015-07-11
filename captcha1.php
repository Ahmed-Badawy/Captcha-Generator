<?php
// header("Content-Type: image/jpg");//this tells the page that it's an image

$text = (isset($_GET['text'])) ? $_GET['text'] : "no text";

//$im = @imagecreate(400, 100)//( width , height )
//or die("Cannot Initialize new GD image stream");
//we can allocate the width dynamically from the name in the header by putting the wiedth like this
$length=strlen($text)*11;
$im = @imagecreate($length, 30) or die("Cannot Initialize new GD image stream");

$background_color = imagecolorallocate($im, 50, 50, 50);//000 means that it has a black background 
$text_color = imagecolorallocate($im, 255, 255, 255);//white

imagestring($im, 5, 5, 5,  $text, $text_color);//this edit the text color & size

header('Content:img/jpeg');
imagejpeg($im);// this tells it that the image type is jpeg
// imagedestroy($im); //destroy the image


?>