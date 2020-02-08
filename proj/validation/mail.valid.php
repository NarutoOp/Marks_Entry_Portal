<?php

	if (isset($_POST['mail'])) {
		$err = [];

		$mail = $_POST['mail'];
		if (empty($mail)) {
			$err[0] = "empty";
			$err[1] = "E-mail should not be empty";
		} else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
			$err[0] = "invalid";
			$err[1] = "Please Enter Valid E-mail";
		} else {
			unset($mail);
		}
	} 

	if (isset($_POST['pass'])) {
		$err = [];
		$pass = $_POST['pass'];
		if (empty($pass)) {
			$err[0] = "empty";
			$err[1] = "Password should not be empty";
		} else if(strlen($pass) < 4){
			$err[0] = "small";
			$err[1] = "Password is too small";
		}
	}
	
	echo json_encode($err);

?>