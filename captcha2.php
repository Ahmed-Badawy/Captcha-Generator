<?php



$text = (isset($_GET['text'])) ? $_GET['text'] : "no text";
$font = (isset($_GET['font'])) ? $_GET['font'] : "fonts/tahoma.ttf";


// Set the content-type
header('Content-Type: image/png');

$img_hieght = 100;
$img_width = 200;

// this is the image size
$im = imagecreatetruecolor($img_width, $img_hieght);

// Colors
$background_color = imagecolorallocate($im, 30, 30, 30);
$first_layer_color = imagecolorallocate($im, 100, 100, 100);
$second_layer_color = imagecolorallocate($im, 150, 150, 150);
$third_layer_color = imagecolorallocate($im, 250, 250, 250);

// background placement
imagefilledrectangle($im, 0, 0, $img_width, $img_hieght, $background_color);


// Replace path by your own font path
// $font = 'TAHOMABD.TTF';


// imagettftext($image , $font_size , $skew , $x_placement , $y_placement,$color,$font,$text)
//layer 1: 
imagettftext($im, rand(30,45), rand(-20,20), rand(20,40), rand(40,60), $first_layer_color, $font, $text);
//layer 2:
imagettftext($im, 25, rand(-20,20), rand(20,40), rand(40,60), $second_layer_color, $font, $text);
//layer 3:
imagettftext($im, 30, rand(-20,20), rand(10,30), rand(50,70), $third_layer_color, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);

?>