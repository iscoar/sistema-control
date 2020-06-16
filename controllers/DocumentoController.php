<?php
require_once 'models/Document.php';

class DocumentoController {

	public function upload() {
		$currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";

    $errors = [];

    $fileExtensionsAllowed = ['pdf'];

    $fileName = $_FILES['archivo']['name'];
    $fileSize = $_FILES['archivo']['size'];
    $fileTmpName  = $_FILES['archivo']['tmp_name'];
		$fileType = $_FILES['archivo']['type'];
		$fileExtension = explode('.', $fileName);
		$fileExtension = end($fileExtension);
    $fileExtension = strtolower($fileExtension);

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "Esta extensión no está permitida";
      }

      if ($fileSize > 512000000) {
        $errors[] = "El archivo excede el límite de tamaño (512MB)";
      }

      if (file_exists($uploadPath)) {
        $errors[] = "Este archivo ya exite";
      }

      if (empty($errors)) {
        if (!is_dir($currentDirectory.$uploadDirectory)) {
          mkdir($currentDirectory.$uploadDirectory, 0777, true);
        }
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
					$identity = $_SESSION['identity'];

					$document = new Document();
					$document->user_id 	= $identity->id;
					$document->name 		= $fileName;
					$document->type			= $fileExtension;

					$document->save();
          echo "El archivo " . basename($fileName) . " fue subido exitosamente";
        } else {
          echo "Ocurrió un error. Por favor contacte con el Administrador.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "\n";
        }
      }

    }
  }
  
  public function download() {
    if (isset($_GET['archivo'])) {
      $currentDirectory = getcwd();
      $uploadDirectory = "/uploads/";
      $file_name = $_GET['archivo'];

      $file = $currentDirectory . $uploadDirectory . $file_name;
      if (file_exists($file)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename='.basename($file));
        header("Location: ".base_url."uploads/".$file_name);
      }
      else {
          echo 'Archivo no disponible.';
      }
  }
  }
  
  public function destroy() {
    if (isset($_POST['id']) && isset($_POST['archivo'])) {
      $currentDirectory = getcwd();
      $uploadDirectory = "/uploads/";
      $file_name = $_POST['archivo'];
      $id = $_POST['id'];
      $file = $currentDirectory . $uploadDirectory . $file_name;
      
      if (file_exists($file)) {
        $document = new Document();
        $document->destroy($id);
        unlink($file);
        echo "Archivo eliminado";
      } else {
        echo 'Este archivo ya no existe.';
      }
    }
  }
  
  
  public function pdf() {
    $pdf = $_GET['archivo'];
    require_once 'views/home/pdf.php';
  }
}