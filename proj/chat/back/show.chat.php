<?php

if(isset($_POST['to'])) {
	include $_SERVER['DOCUMENT_ROOT']."/proj/mainBack/dbh.php";
	include $_SERVER['DOCUMENT_ROOT']."/proj/mainBack/ins.php";
	include $_SERVER['DOCUMENT_ROOT']."/proj/mainBack/sel.php";

	session_start();
	session_regenerate_id();

	$me = substr( $_SESSION['email'], 0, strpos( $_SESSION['email'], '@'));;
	$to = $_POST['to'];

	if(isset($_SESSION['aid'])) {
		$verifyTo = new sqlQuery("SELECT distinct exam_allocation.email from mitaoe.exam_allocation where exam_allocation.email = ?", [$to."@mitaoe.ac.in"]);
	} else if (isset($_SESSION['tid'])) {
		$verifyTo = new sqlQuery("SELECT distinct admin.admin_email as `email` from mitaoe.admin where admin.admin_email = ?", [$to."@mitaoe.ac.in"]);
	} else {
		header("Location: http://localhost/proj/admin/BigPicture/index.php");
		die();
	}

	$rows=$verifyTo->data('get_rows');
	unset($verifyTo);

	if($rows==1) {
		$show = new sqlQuery("SELECT chat.sender, chat.reciver, chat.msg, chat.sentat from mitaoe.chat where (chat.sender = ? and chat.reciver = ?) or (chat.sender = ? and chat.reciver = ?);", [$me, $to, $to, $me]);
		$disp = json_encode($show->data('get_data'));
		echo $disp;
		die();
	} else {
		header("Location: http://localhost/proj/admin/BigPicture/index.php");
		die();
	}



}


















