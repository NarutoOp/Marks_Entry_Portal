<?php

include_once 'dbh.php';

class ins extends dbh {

	private $query;
	private $param;

	protected function getInp($query, $param=[]){
		$this->query = $query;
		$this->param = $param;
	}

	protected function put() {
		$exec = $this->init()->prepare($this->query);
		
		$exec->execute($this->param);

		return $exec;
	}
}