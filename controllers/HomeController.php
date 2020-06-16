<?php
require_once 'models/User.php';

class HomeController {
	public function index() {
		require_once 'views/layout/header.php';
		require_once 'views/home/login.php';
		require_once 'views/layout/footer.php';
	}

	public function inicio() {
		if(Utils::isLogged()) {
			if(Utils::isAdmin()) {
				$user = new User();
				$users = $user->getAll();
				
				require_once 'views/layout/header.php';
				require_once 'views/layout/navbar-admin.php';
				require_once 'views/home/inicio.php';
				require_once 'views/layout/footer.php';
			} else {
				header("Location: ".base_url."Usuario/subir");
			}
		} else {
			header("Location: ".base_url);
		}
		
	}
	
	public function misArchivos() {
		$currentUser = $_SESSION['identity'];

		$user = new User();
		$files = $user->getFiles($currentUser->id);

		require_once 'views/layout/header.php';
		require_once 'views/layout/navbar.php';
		require_once 'views/home/mis-archivos.php';
		require_once 'views/layout/footer.php';
	}
}