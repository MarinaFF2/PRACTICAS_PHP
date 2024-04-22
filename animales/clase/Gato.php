<?php
/**
 * Description of Gato
 *
 * @author daw207
 */
require_once 'interfaz/Metodos.php';
require_once 'Animal.php';
class Gato  extends Animal implements Metodos {
    
    /**
     * metodo constructor
     * @param type $nombre
     * @param type $raza
     * @param type $peso
     * @param type $color
     */
    function __construct($nombre, $raza, $peso, $color) {
        parent::__construct($nombre, $raza, $peso, $color);
    }
    
    /**
     * metodo comer
     */
    public function comer() {
        parent::comer();
    }

    /**
     * metodo dormir
     */
    public function dormir() {
        parent::dormir();
    }

    /**
     * metodo get color
     * @return type
     */
    public function getColor() {
        return parent::getColor();
    }

    /**
     * metodo get nombre
     * @return type
     */
    public function getNombre() {
        return parent::getNombre();
    }

    /**
     * metodo get peso
     * @return type
     */
    public function getPeso() {
        return parent::getPeso();
    }

    /**
     * metodo get raza
     * @return type
     */
    public function getRaza() {
        return parent::getRaza();
    }

    /**
     * metodo set color
     * @param type $color
     */
    public function setColor($color) {
        parent::setColor($color);
    }

    /**
     * metodo set nombre
     * @param type $nombre
     */
    public function setNombre($nombre) {
        parent::setNombre($nombre);
    }

    /**
     * metodo set peso
     * @param type $peso
     */
    public function setPeso($peso) {
        parent::setPeso($peso);
    }

    /**
     * metodo set raza
     * @param type $raza
     */
    public function setRaza($raza) {
        parent::setRaza($raza);
    }

    /**
     * metodo vacunar
     */
    public function vacunar() {
        parent::vacunar();
    }

    /**
     * metodo toString
     */
    public function __toString() {
        parent::__toString();
    }

    public function hacerRuido(){
        return $this->nombre.' maulla'.'<br>';
    }
    
    /**
     * hace caso 5% de las veces
     * @return type 
     */
    public function hacerCaso(){
        return $this->nombre.' hace caso'.'<br>';
    }
    
    public function toserBolaPelo(){
        return $this->nombre.' tose bolas de pelo'.'<br>';
    }
}