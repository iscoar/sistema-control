<?php

class Database {
    public static function connect() {
        $db = new mysqli("localhost", "mili_cflo", "uSTQZwYPORvD", "seguridad_respaldo");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
