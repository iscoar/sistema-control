<?php

class Document {
	private $id;
	public $user_id;
	public $name;
	public $type;
	public $created_at;
	public $deleted_at;
	private $db;

	public function __construct() {
		$this->db = Database::connect();
	}

	public function save() {
		$date = date('Y-m-d H:i:s');
		$sql = "insert into documents(user_id, name, type, created_at) 
						values('{$this->user_id}', '{$this->name}', '{$this->type}', '{$date}');";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
				$result = true;
		}
		return $result;
	}
	
	public function destroy($id) {
		$sql = "DELETE FROM documents WHERE id = {$id};";
		$delete = $this->db->query($sql);
	}
}