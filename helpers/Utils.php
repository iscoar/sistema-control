<?php
require_once 'models/System.php';

class Utils {
    public static function deleteSession($name) {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isAdmin() {
        if (!isset($_SESSION['admin'])) {
            header("Location: ".base_url."Usuario/subir");
        } else {
            return true;
        }
    }

    public static function isLogged() {
        if (!isset($_SESSION['identity'])) {
            return false;
        } else {
            return true;
        }
    }

    public static function checkSystem() {
        $system = new System();
        $status = $system->getLast();

        if($status) {
            return $status;
        } else {
            return false;
        }
    }

    public static function disableSystem() {
        $system = new System();
        $status = $system->disable();
    }
}