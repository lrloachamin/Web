<?php
if(!empty($_POST)){
		$captcha = $_POST['g-recaptcha-response'];
		
		$secret = '6Le2UM0UAAAAAN01DY0TDVxxuPOsSEpuNixkrztb';
		
		if(!$captcha){
 
			echo "Por favor verifica el captcha";
			
			} else {	
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
			
			$arr = json_decode($response, TRUE);
			
			if($arr['success'])
			{
				header("Location: Mensaje.php");
				} else {
				echo '<h3>Error al comprobar Captcha </h3>';
			}
		}
	}

?>