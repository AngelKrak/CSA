<?php
/**
* 
*/
class CSA {
	public function AgregarFormCSA() {
		$form = '<form action="php/CSA.php" enctype="multipart/form-data" method="POST" id="FormCSA">
		<input type="file" name="archivoCSA[]" multiple>
		<input type="submit" name="subirCSA" value="Subir Archivos">
		</form>';
		echo $form;
	}

	public function SubirArchivosCSA($files = array()) {
		//inicializamos un contador para recorrer los archivos
    $i = 0;
    $directorio = "../files/";

    //si no existe la carpeta files la creamos
    if(!is_dir($directorio)) 
      mkdir($directorio, 0777);
         
    foreach($files as $file) {
      if($_FILES['archivoCSA']['tmp_name'][$i]) {
      	$archivoCSA = $_FILES["archivoCSA"]["name"];
    		$archivoCSATMP = $_FILES['archivoCSA']['tmp_name'];
       	//separamos los trozos del archivo, nombre extension
       	$trozos[$i] = explode(".", $archivoCSA[$i]);
        //obtenemos la extension
        $extension[$i] = end($trozos[$i]);

        //si la extensión es una de las permitidas
        if($this->checkExtension($extension[$i]) === TRUE) {
          //si el archivo no existe
          if($this->checkExists($directorio.$archivoCSA[$i]) === TRUE) {         
            //comprobamos si el archivo ha subido
            if(move_uploaded_file($archivoCSATMP[$i], $directorio.$archivoCSA[$i])) {  
              echo "el archivo <strong>$archivoCSA[$i]</strong> ha sido subido";
            }
          } else {
            echo "el archivo <strong>$archivoCSA[$i]</strong> ya existe";
          }
          //si la extension no es una de las permitidas
        } else {
          echo "la extension no esta permitida";
        }
        //si ese input file no ha sido cargado con un archivo
      } else {
        echo "debes seleccionar un archivo";
      }
      echo "<br />";
      //en cada pasada por el loop incrementamos i para acceder al siguiente archivo
      $i++;     
    } //Termina Foreach
	} // Termina la Funcion de Subir Archivos

	private function checkExtension($extension) {
    //aqui podemos añadir las extensiones que deseemos permitir
    $extensiones = array("jpg","png","gif","pdf",'mp3','ogg','wav','webm','mp4');
    if(in_array(strtolower($extension), $extensiones)) {
      return TRUE;
    }else{
      return FALSE;
    }
 	}

  private function checkExists($file) {
    if(!file_exists($file)) {
      return TRUE;
    } else {
    	return FALSE;
    }
  }
} // Termina la Clase

if (isset($_REQUEST['subirCSA'])) {
	$archivos = $_FILES['archivoCSA']['name'];
	$subirAC = new CSA();
	$subirAC->SubirArchivosCSA($archivos);
}
?>
