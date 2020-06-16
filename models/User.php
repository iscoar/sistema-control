<?php

class User {
    private $id;
    public $username;
    public $password;
    public $name;
    public $address;
    public $phone;
    public $rol;
    public $work_area;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function getAll() {
        $sql = "SELECT * FROM users WHERE rol = 'user' AND ISNULL(deleted_at);";
        $users = $this->db->query($sql);

        return $users;
    }

    public function getOne($id) {
        $sql = "SELECT * FROM users WHERE rol = 'user' AND id = {$id} AND ISNULL(deleted_at);";
        $user = $this->db->query($sql);

        return $user->fetch_object();
    }

    public function getFiles($id) {
        $files = $this->db->query("SELECT d.id, d.name, d.`type` FROM documents d, users u WHERE d.user_id = u.id AND d.user_id = {$id} AND u.deleted_at IS NULL;");
        
        return $files;
    }

    public function encryptPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);;
    }
    

    public function save() {
        $date = date('Y-m-d H:i:s');
        $sql = "insert into users(username, password, name, address, phone, work_area, rol, created_at) 
                values('{$this->username}', '{$this->password}', '{$this->name}', '{$this->address}', {$this->phone}, '{$this->work_area}', 'user', '{$date}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function update($id) {
        $sql = "UPDATE users SET username = '{$this->username}', name = '{$this->name}', address = '{$this->address}', phone = {$this->phone}, work_area = '{$this->work_area}' WHERE id = {$id};";
        $update = $this->db->query($sql);

        $result = false;
        if ($update) {
            $result = true;
        }
        return $result;
    }

    public function destroy($id) {
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE users SET deleted_at = '{$date}' WHERE id = {$id};";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function login() {
        $result = false;
        $username = $this->username; 
        $password = $this->password;

        $sql = "select * from users where username = '$username' AND ISNULL(deleted_at);";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $user = $login->fetch_object();
            
            // Comprobar la contraseña
            if ($password == $user->password) {
                $result = $user;
            }
        }
        return $result;
    }
}