<?php

/*
 * Classe que defineix un fitxer
 */

class Fichero {
    private $rutaPadre = "style/avatars/" ;
    private $fichero;
   

    function __construct($nombreFichero) {        
        $this->setFitxer($nombreFichero);
       
       
    }

  
    //retornem el fitxer
    function getFitxer() {
        return $this->fichero;
    }

    //SUBIR IMAGEN
    function validacionImg(){
        
        
        
        
    }
    function subirFichero($nombre) {
        $var = explode(".", $_FILES['uploadedfile']);
        
        $extennsion =end($var);
        $rutaPadre = $rutaPadre.$nombre.".".$extension;
        if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $rutaPadre)) {
            echo "El archivo " . basename($_FILES['uploadedfile']['name']) . " ha sido subido";
        } else {
            echo "Ha ocurrido un error, trate de nuevo!";
        }
    }

    //Modifiquem el fitxer
    function setFitxer($rutaFitxer) {
        $this->fichero = $rutaFitxer;

        if (!file_exists($this->fichero)) { //Si el fitxer no existeix...
            //la funció touch comprova si existeix un fitxer. Si no existeix el crea.
            //Per poder crear-lo, el directori on s'ha de guardar el fitxer ha d'existir.
            //Creem el fitxer. Si no es pot crear per qualsevol problema, avisem i sortim del sistema.
            touch($this->fichero)or die("El fitxer no s'ha creat.");
            echo "<p>El fitxer s'ha creat amb exit</p>";
        } else { //Si el fitxer existeix...
            echo "<p>El fitxer ja existeix</p>";
        }
    }

    //Mètode que tanca el fitxer obert.
    function cerrarFichero() {
        fclose($this->ficheroAbierto);
    }

    //Mètode que mostra les propietats del fitxer assignat a l'atribut
    function mostrarPropietats() {
        if (!file_exists($this->fichero)) {
            echo "<p>$this->fichero no exiteix</p>";
            return;
        }
        echo "<p>$this->fichero " . (is_file($this->fichero) ? "" : "no ") . "és un fitxer.</p>";
        echo "<p>$this->fichero " . (is_dir($this->fichero) ? "" : "no ") . "és un directori.</p>";
        echo "<p>$this->fichero " . (is_readable($this->fichero) ? "" : "no ") . "és de lectura</p>";
        echo "<p>$this->fichero " . (is_writable($this->fichero) ? "" : "no ") . "és d'escriptura</p>";
        echo "<p>$this->fichero " . (is_executable($this->fichero) ? "" : "no ") . "és executable</p>";
        echo "<p>$this->fichero té una grandària de " . (filesize($this->fichero)) . " bytes</p>";
        echo "<p>L'últim accés a $this->fichero ha estat el " . date("D d M Y g:i A", fileatime($this->fichero)) . "</p>";
        echo "<p>L'última modificació del contingut de $this->fichero ha estat el " . date("D d M Y g:i A", filemtime($this->fichero)) . "</p>";
        echo "<p>L'últim canvi en els permisos de $this->fichero ha estat el " . date("D d M Y g:i A", filectime($this->fichero)) . "</p>";
    }

    //Mètode per eliminar un fitxer
    function eliminarFitxer() {
        unlink($this->fichero)or die("<p>El fitxer $this->fichero no s'ha pogut eliminar</p>");
    }

}

?>
