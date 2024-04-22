<?php

/**
 * Description of parque
 *
 * @author daw207
 */
require_once 'Gato.php';
require_once 'Perro.php';
require_once 'Elefante.php';

class parque {

    /**
     *vector de animales que estan en el parque
     * @var type 
     */
    private $v;
    /**
     * tamaño del vector de los amimales del parque
     * @var type 
     */
    private $tam;
    
    /**
     * constructor 
     */
    function __construct() {
        $this->tam = 10;
        $this->inicializarVector();
    }

    /**
     * get tamaño
     * @return \type
     */
    function getTam() {
        return $this->tam;
    }

    /**
     * set tamaño
     * @param type $tam
     */
    function setTam($tam) {
        $this->tam = $tam;
    }
        
    /**
     * 
     * @return type
     */
    function getV() {
        return $this->v;
    }

    /**
     * 
     * @param type $v
     */
    function setV($v) {
        $this->v = $v;
    }

    /**
     * Metodo para inicar el vector 
     */
    private function inicializarVector(){
        $j = $this->probabilidad($this->tam);
        for ($i = 0; $i < $this->tam; $i++) {
            if($j==$i){
                $this->meterAnimales($j);
            }else{
                $this->v[$i]=null;
            }
        }
    }
    /**
     * Metodo para meter a los animales aleatoriamente
     * @param type $j
     * @return string
     */
    function meterAnimales($j) {
        $a = $this->probabilidad(5);
        $va='';
        switch ($a) {
            case 0:
                $g1 = new Gato("Fufu", "siames", 10, "marron");
                $this->v[$j] = $g1;
                $va = $g1->getNombre().' ha aparecido en el parque.'.'<br>';
                break;
            case 1:
                $g2 = new Gato("Misifu", "egipcio", 30, "sin pelo");
                $this->v[$j] = $g2;
                $va = $g2->getNombre().' ha aparecido en el parque.'.'<br>';
                break;
            case 2:
                $p1 = new Perro("Pinpon", "labrador", 40, "dorado");
                $this->v[$j] = $p1;
                $va = $p1->getNombre().' ha aparecido en el parque.'.'<br>';
                break;
            case 3:
                $p2 = new Perro("Manu", "Salchicha", 15, "verde");
                $this->v[$j] = $p2;
                $va = $p2->getNombre().' ha aparecido en el parque.'.'<br>';
                break;
            case 4:
                $e1 = new Elefante("Ron", "elefante", 500, "gris");
                $this->v[$j] = $e1;
                $va = $e1->getNombre().' ha aparecido en el parque.'.'<br>';
                break;
            case 5:
                $e2 = new Elefante("Rinron", "elefante", 550, "gris");
                $this->v[$j] = $e2;
                $va = $e2->getNombre().' ha aparecido en el parque.'.'<br>';
                break;
        }
        return $va;
    }

    /**
     * Metodo de probabilidad 
     * devuelve una probabilidad, que es un nº al azar   
     * @return type
     */
    private function probabilidad($w) {
        return rand(0, $w);
    }
}