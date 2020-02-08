<?php

// include db
include './../../mainBack/dbh.php';
include './../../mainBack/ins.php';
include './../../mainBack/sel.php';
// include validation
include './../validate/examAlloc.php';

$datas = $_POST['selection'];

for ($i=0; $i<7; $i++) {
	if (in_array($datas[$i], $valid)) {
		continue;
	} else {
		echo "Invalid Data Found ($data) !!! <br>Unable To Send Mail <br>Where Would You Like To Go ?";
		die();
	}
}


if (filter_var($datas[7], FILTER_VALIDATE_EMAIL)) {

	$deptId = new sqlQuery("SELECT department.id from mitaoe.department where department.name = ?", [$datas[1]]);
	$deptId = $deptId->data('get_data');

	$examId = new sqlQuery("SELECT exam.id from mitaoe.exam where exam.name = ?", [$datas[2]]);
	$examId = $examId->data('get_data');

	$saveData = new sqlQuery("INSERT INTO mitaoe.exam_allocation(`email`, `program`, `dept_id`, `exam_id`, `sub_id`, `block_id`, `role`, `exam_type`, `status`) VALUES (?,?,?,?,?,?,?,?,?);", [$datas[7], $datas[0], $deptId[0]['id'], $examId[0]['id'], $datas[3], $datas[4], $datas[5], $datas[6], 1 ]);
	$saveData->data('put_data');

	$randPass = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);

	
	$saveData = new sqlQuery("INSERT INTO mitaoe.fac_add(`email`, `pass`) VALUES (?,?);", [$datas[7], $randPass] );
	$saveData->data('put_data');
	
	// $sub = "Alloted As $datas[5] Examiner";
	// $message = " 
	// Hello $datas[7], <br>
	// <p>   You are been alloted for <b> 
	//  ";
	require 'PHPMailer-master/PHPMailerAutoload.php';
	$mail = new PHPMailer();
	$mail ->IsSmtp();
	$mail ->SMTPDebug = 0;
	$mail ->SMTPAuth = true;
	$mail ->SMTPSecure ='ssl';
	$mail ->Host = "smtp.gmail.com";
	$mail ->Port = 465;
	$mail -> IsHTML(true);
	$mail ->Username = "youremail@gmail.com";
	$mail ->Password = "Your password";
	$mail -> SetFrom("youremail@gmail.com");
	$mail ->Subject = "Login password";
	$mail ->Body = "You are been alloted and Your Password is : ".$randPass;
	$mail -> AddAddress($datas[7]);

	if(!$mail->	Send())
	{
		echo "Mail Not Sent";
	}
	else
	{
		echo "Mail Sent";
		
	}

	//if(/*mail($email, $sub , $message)*/ 1) {
		//echo "Message Sent Successfully !!!<br>Where Would You Like To Go ?";
		//die();
	//} else {
		//echo "Unable To Send Mail <br>Where Would You Like To Go ?";
		//die();
	//}

} else {
	echo "Invalid Email Found ($email) !!! <br>Unable To Send Mail <br>Where Would You Like To Go ?";
	die();
}
?>






