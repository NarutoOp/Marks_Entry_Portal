<?php
include_once 'ins.php';

class sqlQuery extends ins {

	
	function __construct($query, $param) {
		$this->param = $param;
		$this->getInp($query, $param);
		// $this->init();
	}

	public function data($type) {
		if ($type === "get_data" ) {
			$data = $this->get();
			return $data;
		} else if ($type === "get_rows") {
			$rows =  $this->rowCount();
			return $rows;

		}else if($type === "put_data") {
			$this->put();
		}
	}

	// get data
	private function get() {
		$exec = $this->put();
		$data = [];
		while($row = $exec->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}

		return $data;
	}
	// get rows
	private function rowCount() {
		$exec = $this->put();
		$rc = $exec->rowCount();
		return $rc;
	}
}