<?php

if(isset($_POST['faculty'])) {

	$faculty = $_POST['faculty'];

	if (preg_match('/^[a-zA-Z0-9.]+$/', $faculty)) {
		include_once $_SERVER['DOCUMENT_ROOT'].'/proj/mainBack/dbh.php';
		include_once $_SERVER['DOCUMENT_ROOT'].'/proj/mainBack/ins.php';
		include_once $_SERVER['DOCUMENT_ROOT'].'/proj/mainBack/sel.php';

		session_start();
		session_regenerate_id();
		
		if (isset($_SESSION['aid'])) {
			$getFac = new sqlQuery("SELECT distinct exam_allocation.email from mitaoe.exam_allocation where exam_allocation.email like ?", ["%".$faculty."%"]);
		} else if (isset($_SESSION['tid'])) {
			$getFac = new sqlQuery("SELECT distinct admin.admin_email as `email` from mitaoe.admin where admin.admin_email like ?", ["%".$faculty."%"]);
		}
		$getFac = $getFac->data('get_data');
		$main=[];
		foreach ($getFac as $val) {
			$val = substr($val['email'], 0, strpos($val['email'], '@'));
			$main[] = $val;
		}
		echo json_encode($main);
	} else {
		// echo "hi";
	}
}
?>