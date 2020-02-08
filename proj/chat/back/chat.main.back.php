<?php
// allow_url_include=On;
if (isset($_POST['chat']) && isset($_POST['to']) && ($_POST['chat'] != "" || $_POST['chat'] != " ")) {
// Insert Data ////////////////////////////////////////////////////////////////////////////////////////////////
	// curr time
	$time = date("H:i");
	// start session
	session_start();
	session_regenerate_id();
	// include conn
		include $_SERVER['DOCUMENT_ROOT'].'/proj/mainBack/dbh.php';
		include $_SERVER['DOCUMENT_ROOT'].'/proj/mainBack/ins.php';
		include $_SERVER['DOCUMENT_ROOT'].'/proj/mainBack/sel.php';
	// take data from post
		$chat = $_POST['chat'];
		$to = $_POST['to'];
		$me = substr( $_SESSION['email'], 0, strpos( $_SESSION['email'], '@'));;
// valiate '$to'
	if(isset($_SESSION['aid'])) {
		$verifyTo = new sqlQuery("SELECT distinct exam_allocation.email from mitaoe.exam_allocation where exam_allocation.email = ?", [$to."@mitaoe.ac.in"]);			
	} else if (isset($_SESSION['tid'])) {
		$verifyTo = new sqlQuery("SELECT distinct admin.admin_email as `email` from mitaoe.admin where admin.admin_email = ?", [$to."@mitaoe.ac.in"]);			
	} else {
		header("Location: http://localhost/proj/admin/BigPicture/index.php");
		die();
	}
	$toRows = $verifyTo->data('get_rows');
// if logged in and have valid credentials
	if ( (isset($_SESSION['aid']) || isset($_SESSION['tid'] )) &&  $toRows === 1 ) {
		// insert data
		$send = new sqlQuery("INSERT into mitaoe.chat(`sender`, `reciver`, `msg`, `sentat`) values (?, ?, ?, ?)",[$me, $to, $chat, $time]);
		$send->data('put_data');
	} 


}