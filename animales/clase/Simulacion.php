<?php

/**
 * Description of Simulacion
 *
 * @author daw207
 */
require_once 'Gato.php';
require_once 'Perro.php';
require_once 'Elefante.php';
require_once 'Parque.php';

class Simulacion {

    function __construct() {
        
    }

    function crearParque() {
        $pa = new Parque();
        return $pa;
    }

    /**
     * metodo para que aparerezca un animal en una poscion libre
     * probabilidad 50%
     * cada 10seg
     * @param type $pa
     * @param type $ve
     * @return type
     */
    function aparecePosicion($pa, &$ve) {
        sleep(10);
        $j = $this->probabilidad($pa->getTam());
        for ($i = 0; $i < $pa->getTam(); $i++) {
            if ($ve[$i] == null && $i == $j) {
                $va = $pa->meterAnimales($j,$ve);
            }
        }
        return $va;
    }

    /**
     * metodo para cambiar de posicion
     * probabilidad 50%
     * cada 15seg
     * @param type $animal
     * @param type $pa
     * @param type $ve
     */
    function cambiaPosicion($animal, $pa, &$ve) {
        sleep(15);
        $j = $this->probabilidad($pa->getTam());
        for ($i = 0; $i < $pa->getTam(); $i++) {
            if ($ve[$i] == $animal) {
                $pos = $i;
            }
        }
        for ($i = 0; $i < $pa->getTam(); $i++) {
            if ($ve[$i] == null && $i == $j) {
                $ve[$j] = $animal;
                $ve[$pos] = null;
            }
        }
        $va = $animal->getNombre().' ha cambiado de posición.'.'<br>';
        return $va;
    }

    /**
     * Metodo para elegir un animal que realice las acciones del index
     * @param type $pa instancia de la clase Parque
     * @param type $ve vector de animales
     * @return type un animal
     */
    function elegirAnimal($pa, &$ve) {
        $j = $this->probabilidad($pa->getTam());
        $sa = null;
        for ($i = 0; $i < $pa->getTam(); $i++) {
            if ($ve[$i] != null && $i == $j) {
                $sa = $ve[$i];
            }
        }
        return $sa;
    }

    /**
     * metodo de accion habitual
     * cada 2seg
     * @param type $animal instancia de clase animal
     * @return type $va
     */
    function accionHabitual($animal) {
        sleep(2);
        $accionHabitual = $this->probabilidad(2);
        $va = '';
        switch ($accionHabitual) {
            case 0:
                $va = $animal->comer();
                break;
            case 1:
                $va = $animal->dormir();
                break;
            case 2:
                $va = $animal->hacerRuido();
                break;
        }
        return $va;
    }

    /**
     * Metodo de probabilidad 
     * devuelve una probabilidad, que es un nº al azar  
     * @param type $w
     * @return type
     */
    private function probabilidad($w) {
        return rand(0, $w);
    }

    /**
     * metodo para bandonar el parque
     * probabilidad 50%
     * cada 20seg
     * @param type $animal
     * @return string
     */
    function abandonaParque($animal, &$ve) {
        sleep(20);
        $i = $this->probabilidad(100);
        $n = '';
        if ($i <= 50) {
            for ($j = 0; $j < count($ve); $j++) {
                if ($ve[$j] == $animal) {
                    $ve[$j] = null;
                }
            }
            $n = $animal->getNombre().' ha abandonado el parque.'.'<br>';
        }
        return $n;
    }

}
