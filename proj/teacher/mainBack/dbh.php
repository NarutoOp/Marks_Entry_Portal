<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

class dbh {
	private $dbHost;
	private $dbName;
	private $dbUser;
	private $dbPass;

	protected function init() {
		$this->dbHost = "localhost";
		$this->dbName = "mitaoe";
		$this->dbUser = "root";
		$this->dbPass = "";

		$handel = "mysql:host=".$this->dbHost."; dbName=".$this->dbName.";";

		try {
			$con = new PDO($handel, $this->dbUser, $this->dbPass);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $con;
		} catch(PDOException $e) {
			echo "error";
			echo $e->getMessage();
		} finally {
			$con = NULL;
		}

	}
}
?>