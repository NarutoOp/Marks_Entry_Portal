<?php

	$currTable = $_POST['tabel'];
		$sel = $_POST['selection'];

			include './../../../mainBack/dbh.php';
			include './../../../mainBack/ins.php';
			include './../../../mainBack/sel.php';

	$msg = array(

		"heading" => "",
		"data" => []

	);

	if ($currTable > 0 && $currTable <=9) {
		if ($currTable == 1) {

			$msg["heading"] = "Please Select The Program";
			$msg['data'][] = "B.Tech";				
			$msg['data'][] = "B.E.";				
			$msg['data'][] = "M.Tech";						

		}
		else if ($currTable == 2) {

			if ($sel[0] === "B.Tech") {
				// if b tech is selected
				$msg["heading"] = "Please Select The Department";

				$depts = new sqlQuery("select name from mitaoe.department", []);
				$getDepts = $depts->data('get_data');
				foreach ($getDepts as $getDept) {
					$msg['data'][] = $getDept['name'];
				}
			} else if ($sel[0] == "B.E.") {
				// if be is selected
			} else if ($sel[0] == "M.Tech") {
				// if mtech is selected
			}
			
			unset($depts);
			unset($getDepts);
		} else if ($currTable == 3){

			$msg["heading"] = "Please Select The Exam";
			
			$exam = new sqlQuery("select name from mitaoe.exam", []);
			$getExams = $exam->data('get_data');
			foreach ($getExams as $getExam) {
				$msg['data'][] = $getExam['name'];
			}

			unset($exam);
			unset($getExams);


		} else if ($currTable == 4) {
			$msg["heading"] = "Please Select The Subject Id";
			
			$sub = new sqlQuery("select sub_id from mitaoe.subject", []);
			$getSubs = $sub->data('get_data');
			foreach ($getSubs as $getSub) {
				$msg['data'][] = $getSub['sub_id'];
			}

			unset($sub);
			unset($getSubs);
		} else if ($currTable == 5) {
			

			$msg["heading"] = "Please Select The Block Id";


			$msg['data'][] = "B1";				
			$msg['data'][] = "B2";
			$msg['data'][] = "B3";
			$msg['data'][] = "B4";
			$msg['data'][] = "B5";
			$msg['data'][] = "B6";
			


		} else if ($currTable == 6){
			$msg["heading"] = "Please Select The Role of Faculty";

			$msg['data'][] = "Internal";
			$msg['data'][] = "External";
			
		} else if ($currTable == 7) {
			// heading
			$msg["heading"] = "Please Select The Exam Type";

			// data
			if ($sel[5] == "Internal") {
				$msg['data'][] = "Internal Assessment";
			}else if($sel[5] == "External") {
				$msg['data'][] = "External Assessment";
			}

		} else if($currTable == 8) {

			$msg["heading"] = "Please Select The Faculty";
			
			// $msg['data'][] = "S. K. Mahajan";
			// $msg['data'][] = "C. C. Sonkamble";

			$email = new sqlQuery("SELECT distinct email from mitaoe.exam_allocation",[]);
			$emails = $email->data('get_data');

			foreach ($emails as $email0) {
				$msg['data'][] = $email0['email'];
			}

			// var_dump($emails);			
		} else {
			$msg["heading"] = "Would you like to send mail<span class='select'></span>";
		}
	}

		



echo json_encode($msg);
















