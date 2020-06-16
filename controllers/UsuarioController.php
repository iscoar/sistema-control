<?php
require_once 'models/User.php';

class UsuarioController {
    public function index() {
        Utils::isAdmin();
        $user = new User();
        $users = $user->getAll();
                
        require_once 'views/layout/header.php';
        require_once 'views/layout/navbar-admin.php';
        require_once 'views/usuarios/index.php';
        require_once 'views/layout/footer-deleteU.php';
    }

    public function subir() {
        if(Utils::isLogged()) {
            require_once 'views/layout/header-subirA.php';
            require_once 'views/layout/navbar.php';
            $system = Utils::checkSystem();
            if($system) {
                if($system->status == 'Activo') {
                    require_once 'views/usuarios/subir-archivo.php';
                    require_once 'views/layout/footer-subirA.php';
                } else {
                    require_once 'views/system/down.php';
                    require_once 'views/layout/footer.php';
                }
            } else {
                require_once 'views/system/down.php';
                require_once 'views/layout/footer.php';
            }
        } else {
            header("Location: ".base_url);
        }
    }

    public function archivos() {
        Utils::isAdmin();
        $id = $_GET['id'];
        $user = new User();
        $files = $user->getFiles($id);
        
        require_once 'views/layout/header.php';
        require_once 'views/layout/navbar-admin.php';
        require_once 'views/usuarios/archivos.php';
        require_once 'views/layout/footer-deleteF.php';
    }

    public function nuevo() {
        Utils::isAdmin();
        require_once 'views/layout/header.php';
        require_once 'views/layout/navbar-admin.php';
        require_once 'views/usuarios/nuevo.php';
        require_once 'views/layout/footer.php';
    }

    public function edit() {
        Utils::isAdmin();
        $id = $_GET['id'];
        $user = new User();
        $edit = $user->getOne($id);

        require_once 'views/layout/header.php';
        require_once 'views/layout/navbar-admin.php';
        require_once 'views/usuarios/editar.php';
        require_once 'views/layout/footer.php';
    }

    public function save () {
        if (isset($_POST)) {
            $username = isset($_POST['username']) ? $_POST['username'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : false;
            $work_area = isset($_POST['work_area']) ? $_POST['work_area'] : false;
            
            $errores = array();

            if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
                $name_validado = true;
            } else {
                $name_validado = false;
                $errores['name'] = "El Nombre solo debe contener letras";
            }

            if (!empty($address)) {
                $address_validado = true;
            } else {
                $address_validado = false;
                $errores['address'] = "La Dirección no puede estar vacía";
            }

            if (!empty($username)) {
                $username_validado = true;
            } else {
                $username_validado = false;
                $errores['username'] = "El Usuario no puede estar vacío";
            }

            if (!empty($password)) {
                $password_validado = true;
            } else {
                $password_validado = false;
                $errores['password'] = "La Contraseña no pude estar vacía";
            }

            if (!empty($phone) && is_numeric($phone) && preg_match("/[0-9]/", $phone)) {
                $phone_validado = true;
            } else {
                $phone_validado = false;
                $errores['phone'] = "El Teléfono solo debe contener numeros";
            }

            if (!empty($work_area) && !is_numeric($work_area) && !preg_match("/[0-9]/", $work_area)) {
                $work_area_validado = true;
            } else {
                $work_area_validado = false;
                $errores['work_area'] = "El Área solo debe contener letras";
            }
            

            if(count($errores) == 0) {
                $user = new User();

                $user->username     = $username;
                $user->password     = $password;
                $user->name         = $name;
                $user->address      = $address;
                $user->phone        = $phone;
                $user->work_area    = $work_area;
                
                $save = $user->save();
                if ($save) {
                    $_SESSION['register'] = "complete";
                    header("Location: ".base_url."Usuario/index");
                } else {
                    $_SESSION['register'] = "failed";
                    header("Location: ".base_url."Usuario/index");
                }
            } else {
                $_SESSION['errores'] = $errores;
                $_SESSION['register'] = "failed";
                header("Location: ".base_url."Usuario/nuevo");
            }
        } else {
            $_SESSION['register'] = "failed";
            header("Location: ".base_url."Usuario/nuevo");
        }
    }

    public function update () {
        if (isset($_POST)) {
            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $username = isset($_POST['username']) ? $_POST['username'] : false;
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : false;
            $work_area = isset($_POST['work_area']) ? $_POST['work_area'] : false;
            
            $errores = array();

            if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
                $name_validado = true;
            } else {
                $name_validado = false;
                $errores['name'] = "El Nombre no es valido";
            }

            if (!empty($address)) {
                $address_validado = true;
            } else {
                $address_validado = false;
                $errores['address'] = "La Dirección no puede estar vacía";
            }

            if (!empty($username)) {
                $username_validado = true;
            } else {
                $username_validado = false;
                $errores['username'] = "El Usuario no es valido";
            }

            if(count($errores) == 0) {
                $user = new User();

                $user->username     = $username;
                $user->name         = $name;
                $user->address      = $address;
                $user->phone        = $phone;
                $user->work_area    = $work_area;
                
                $save = $user->update($id);
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    var_dump('No se pudo guardar');
                    die();
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['errores'] = $errores;
                var_dump($errores);
                die();
                $_SESSION['register'] = "failed";
            }
        } else {
            var_dump('No se envio nada');
            die();
            $_SESSION['register'] = "failed";
        }
        header("Location: ".base_url."Usuario/index");
    }

    public function destroy() {
        $id = $_POST['id'];
        $user = new User();
        $destroy = $user->destroy($id);

        if($destroy) {
            echo "Usuario eliminado";
        } else {
            echo "No se pudo eliminar";
        }
    }

    public function login() {
        if(isset($_POST)) {
            $user = new User();
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            
            $identity = $user->login();
            
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Usuario y/o contraseña incorrectos';
            }
        }
        header("Location: ".base_url."Home/inicio");
    }

    public function logout() {
        if(isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header("Location: ".base_url);
    }
}