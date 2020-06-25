<?php			
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	if(strtolower($_SERVER['HTTP_HOST']) == 'unet.shirazmetro.ir')
	{		
		$uri .= $_SERVER['HTTP_HOST'];
		header('Location: '.$uri.'/unet/');
	}
	else if(strtolower($_SERVER['HTTP_HOST']) == 'mas.shirazmetro.ir')
	{
		$uri .= $_SERVER['HTTP_HOST'];
		header('Location: '.$uri.'/wikinet/');
	}
	else{
	
	exit;
	}
?>
<!--Something is wrong with the XAMPP installation :-(-->
