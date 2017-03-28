<?php 
	
	$img = imagecreatetruecolor(75, 25);
	$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
	$green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
	$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
	imagefill($img, 0, 0, $white);
	$code = '';
	for ($i=0; $i < 4; $i++) {
	$code .= rand(0,9);
	}
	imagestring($img, 5, rand(0, 35), rand(0, 10), $code, $black);
	for ($i=0; $i < 50; $i++) {
	imagesetpixel($img, rand(0, 100), rand(0, 40), $black);
	imagesetpixel($img, rand(0 ,100), rand(0, 40), $green);
	}
	for ($j=0; $j < 4; $j++) {
	imageline($img, rand(0, 100), rand(0, 40), rand(0, 100), rand(0, 40), $black);
	imageline($img, rand(0, 100), rand(0, 40), rand(0, 100), rand(0, 40), $green);
	}
	session_start();
	$_SESSION['code'] = $code;
	header("content-type: image/png");
	imagepng($img);
	imagedestroy($img);
	
 ?>