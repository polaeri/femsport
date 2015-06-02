<?php

/*
 * Classe que defineix un fitxer
 */

class Fichero {
   

    function __construct($nombreFichero) {        
       
       
       
    }

  
    //retornem el fitxer
    function getFitxer() {
        return $this->fichero;
    }

    //SUBIR IMAGEN
    
   function nombreFichero($nombre){
        $rutaPadre = "style/avatars/" ;
        $var = explode(".", $_FILES['avatar']['name']);        
        $extension =end($var);
        $rutaPadre = $rutaPadre.$nombre.".".$extension;
        return $rutaPadre;
       
   }
    
    function subirFichero($nombre) {
       
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $nombre)) {
          
        } else {
           
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


    //Mètode per eliminar un fitxer
    function eliminarFitxer() {
        unlink($this->fichero)or die("<p>El fitxer $this->fichero no s'ha pogut eliminar</p>");
    }

}

?>
