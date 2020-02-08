<?php
include './../../../mainBack/dbh.php';
include './../../../mainBack/ins.php';
include './../../../mainBack/sel.php';

$change = $_POST['change'];
$pos = $_POST['pos'];

$validChange = [0,1,2];


$validId = new sqlQuery("select faculty_id from mitaoe.exam_allocation", []);
$validId = $validId->data('get_rows');

// if(in_array($change, $validChange) && $id <= $validId && $id > 0) {
// 	echo "sent";
// }

for ($i=0; $i < count($pos); $i++) { 
	$sql = new sqlQuery("UPDATE mitaoe.exam_allocation SET exam_allocation.status = ? WHERE exam_allocation.faculty_id = ?", [$change[$i], $pos[$i]]);
	$sql->data('put_data');
	if ($change[$i] == 0 || $change[$i] == 1) {
		// $sql1 = new sqlQuery("DELETE FROM mitaoe.fac_add WHERE fac_add. = ?", [$pos[$i]]);
		// $sql1->data('put_data');
	}
}



