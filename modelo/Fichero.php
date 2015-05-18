<?php


class fichero {

    private $fichero; 
    private $ficheroAbierto; 
    
   

    function __construct($rutaFichero) {
		
        $this->setFitxer($rutaFichero);
        $this->ficheroAbierto=null;
    }
    
 
    function obrirFitxer($modificador){
        
        $this->ficheroAbierto = fopen($this->fichero, $modificador) or die("Fichero no abierto");
    }    
    
    //retornem el fitxer
    function getFitxer() {
        return $this->fichero;
    }

    //Modifiquem el fitxer
    function setFitxer($rutaFitxer) {
        $this->fichero = $rutaFitxer; //assignació valor a l'atribut
        
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
    function tancarFitxer() {
        fclose($this->ficheroAbierto);
    }

       
    //Mètode per eliminar un fitxer
    function eliminarFitxer(){
        unlink($this->fichero)or die("<p>El fitxer $this->fichero no s'ha pogut eliminar</p>");
    }
    
    
}
?>
