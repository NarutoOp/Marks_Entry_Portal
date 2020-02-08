<?php 
include './../../mainBack/dbh.php';
include './../../mainBack/ins.php';
include './../../mainBack/sel.php';

include './../validate/examAlloc.php';

$datas = $_POST['selection'];

for ($i=0; $i<7; $i++) {
	if (in_array($datas[$i], $valid)) {
		continue;
	} else {
		header("Location: ./../index.php");
		die();
	}
}


	$deptId = new sqlQuery("SELECT department.id from mitaoe.department where department.name = ?", [$datas[1]]);
	$deptId = $deptId->data('get_data');

	$examId = new sqlQuery("SELECT exam.id from mitaoe.exam where exam.name = ?", [$datas[2]]);
	$examId = $examId->data('get_data');

	$saveData = new sqlQuery("INSERT INTO mitaoe.exam_allocation(`email`, `program`, `dept_id`, `exam_id`, `sub_id`, `block_id`, `role`, `exam_type`, `status`) VALUES (?,?,?,?,?,?,?,?,?);", [$datas[7], $datas[0], $deptId[0]['id'], $examId[0]['id'], $datas[3], $datas[4], $datas[5], $datas[6], 0 ]);
	$saveData->data('put_data');
	

	echo "Data Saved Successfully! <br>Where Would You Like To Go?";
die();








