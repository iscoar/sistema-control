<?php

class System  {
	private $id;
	public $start_date;
	public $stop_date;
	public $status;
	private $db;

	public function __construct() {
		$this->db = Database::connect();
	}

	public function getLast() {
		$sql = "SELECT * FROM system_status ORDER BY id DESC LIMIT 1;";
		$system = $this->db->query($sql);

		return $system->fetch_object();
	}

	public function save() {
		$sql = "INSERT INTO system_status(start_date, stop_date, status) values('{$this->start_date}', '{$this->stop_date}' ,'Activo');";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
				$result = true;
		}
		return $result;
	}

	public function disable() {
		$system = $this->getLast();
		if($system) {
			if ($system->status == 'Inactivo') {
				$result = true;
			} else {
				$currentDate = date('Y-m-d H:i:s');
				if ($currentDate > $system->stop_date) {
					$sql = "UPDATE system_status SET status = 'Inactivo' WHERE id = {$system->id}";
					$this->db->query($sql);
				}
			}
		}
	}
}