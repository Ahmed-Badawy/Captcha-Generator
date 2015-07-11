<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>

<?php 	

function generate_rand_string($length) {
    $str = '';
    $small = "abcdefghijklmnopqrstuvwxyz";
    $possible = $small;
    $i = 0;
    while ($i < $length) {
        $str .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
        $i++;
    }   
    return $str; 
}

$text = generate_rand_string(6);

function dir_to_array($dir) {
   $result = array();
   $cdir = scandir($dir);
   foreach ($cdir as $key => $value){
      if (!in_array($value,array(".",".."))){
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value)){
            $result[$value] = dir_to_array($dir . DIRECTORY_SEPARATOR . $value);
         }
         else $result[] = $value;
      }
   }
   return $result;
} 

// $font_array = dir_to_array("fonts");
$font_array = dir_to_array("good-fonts-for-implementation");
// print_r($arr);


?>
	<h1><?php echo $text; ?></h1>
	<img src="captcha1.php?text=<?php echo $text; ?>">
	<?php foreach($font_array as $font){ ?>
	<img src="captcha2.php?text=<?php echo $text; ?>&font=fonts/<?php echo $font; ?>">
   <b><?php
    echo $font; 
    ?></b>
	<?php } ?>

</body>
</html>