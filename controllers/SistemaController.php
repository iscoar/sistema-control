<?php
require_once 'models/System.php';

class SistemaController {
	public function index() {
		Utils::isAdmin();
		$system = Utils::checkSystem();

		require_once 'views/layout/header.php';
		require_once 'views/layout/navbar-admin.php';
		if ($system) {
			if ($system->status == 'Activo') {
				setlocale(LC_TIME, 'es_MX.UTF-8');
				$tmp = strtotime($system->stop_date);
				$date = strftime("%A, %d de %B de %Y a las %T", $tmp);
				require_once 'views/system/up.php';
			} else {
				require_once 'views/system/index.php';
			}
		}
		require_once 'views/layout/footer.php';
	}

	public function up() {
		if (isset($_POST)) {
			$stop_date = new DateTime($_POST['stop_date']);

			$system = new System();
			$system->start_date = date('Y-m-d H:i:s');
			$system->stop_date = $stop_date->format('Y-m-d H:i:s');

			$save = $system->save();
			if ($save) {
				header("Location: ".base_url."Sistema/index");
			} else {
				var_dump("No se guardo");
				die();
			}
		} else {
			var_dump("No se recibio nada");
			die();
		}
	}
}