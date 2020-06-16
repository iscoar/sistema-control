<?php
session_start();
date_default_timezone_set('America/Mexico_City');
require_once 'config/parameters.php';
require_once 'config/db.php';
require_once 'autoload.php';
require_once 'helpers/Utils.php';
Utils::disableSystem();



function showError() {
    $error = new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controllador = $_GET['controller'].'Controller';  
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controllador = controller_default;
} else {
    showError();
    exit();
}

if (class_exists($nombre_controllador)) {
    $controlador = new $nombre_controllador();
    
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        showError();
    }
} else {
    showError();
}