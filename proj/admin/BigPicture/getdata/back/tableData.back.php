<?php

include_once "./../../../../mainBack/dbh.php";
include_once "./../../../../mainBack/ins.php";
include_once "./../../../../mainBack/sel.php";
 
$data = new sqlQuery("select exam_allocation.faculty_id as id, exam_allocation.email, exam_allocation.program, exam_allocation.sub_id, exam_allocation.block_id, exam_allocation.role, exam_allocation.exam_type, exam_allocation.status, department.name as dept_name, exam.name as exam_name from mitaoe.exam_allocation, mitaoe.exam, mitaoe.department where exam_allocation.dept_id = department.id and exam_allocation.exam_id = exam.id", []);
$rows = $data->data('get_data');
$totalRows = $data->data('get_rows');

$start = $_POST['start'];
$limit = $_POST['limit'];
$start = ($start-1)*($limit);
$end = $start+$limit;

// if (is_int($start) && is_int($limit)) {
	$op = [$totalRows, []];
	for ($i = $start; $i < $end; $i++) {
		$op[1][] =  $rows[$i];
		if ($i == $totalRows-1) {
			break;
		}
	}

	echo json_encode($op);
// }