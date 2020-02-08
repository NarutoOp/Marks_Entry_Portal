<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	function validData($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}

	if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
		$mail = validData($_POST["user"]);
		$pass = validData($_POST["pass"]);
		$desig = validData($_POST["desig"]);
		$mail = $mail."@mitaoe.ac.in";
		
		if (!empty($mail) && !empty($pass) && !empty($desig)) {
			if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
				header("Location: ./../index.php?err=invalidMail");
				exit();
			} else if (strlen($pass) < 4) {
				header("Location: ./../index.php?err=smallPass");
				exit();
			} else if($desig !== "an Admin" && $desig !== "a Teacher") {
				header("Location: ./../index.php?err=invalidDesig");
				exit();
			} else {
				// valid

				include './../mainBack/dbh.php';
				include './../mainBack/ins.php';
				include './../mainBack/sel.php';

				if ($desig === "an Admin") {
					$hd = new sqlQuery("select * from mitaoe.admin where admin_email=? and admin_pass=?", [$mail, $pass]);					
				} else if ($desig === "a Teacher") {
					$hd = new sqlQuery("select * from mitaoe.fac_add where email=? and pass=?", [$mail, $pass]);
				} else {
					header("Location: ./../index.php?err=invalidDesig");
					exit();
				}

				$rows = $hd->data('get_rows');

				if ($rows === 1) {
					$user = $hd->data('get_data');

					session_start();
					session_regenerate_id();

					if ($desig === 'a Teacher') {
						$_SESSION['email'] =  $user[0]['email'];
						$_SESSION['tid'] = $user[0]['id'];
						header("Location: ./../teacher/index.php");

					} else if ($desig === 'an Admin') {
						$_SESSION['email'] = $user[0]['admin_email'];
						$_SESSION['aid'] = $user[0]['admin_id'];
						header("Location: ./../admin/BigPicture/index.php");
					}


				} else {
					header("Location: ./../index.php?err=invalidLogin");
					exit();
				}

				

				// header("Location: ./../admin/index.php");
			}

		} else {
			header("Location: ./../index.php?err=empty");
			exit();
		}

	} else {
		header("Location: ./../index.php?err=pressSubmit");
		exit();
	}
 
?>


























