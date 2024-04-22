<?php
/**
 * Description of Animal
 *
 * @author daw207
 */
class Animal {
    protected $nombre;
    protected $raza;
    protected $peso;
    protected $color;

    /**
     * Constructor
     * @param type $nombre
     * @param type $raza
     * @param type $peso
     * @param type $color
     */
    function __construct($nombre, $raza, $peso, $color) {
        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->peso = $peso;
        $this->color = $color;
    }
    
    /**
     * to string
     * @return type
     */
    public function __toString() {
        return 'Nombre: '.$this->nombre.', raza: '.$this->raza.', peso: '.$this->peso.', color: '.$this->color.'<br>';
    }
    /**
     * metodo vacunar
     * @return string
     */
    public function vacunar(){
        return $this->nombre.' se ha vacunado.'.'<br>';
    }
    /**
     * metodo comer
     * @return string
     */
    public function  comer(){
        return $this->nombre.' está comiendo.'.'<br>';
    }
    /**
     * metodo dormir
     */
    public function dormir(){
        return $this->nombre.' se ha duermido.'.'<br>';
    }
    /**
     * metodo vacunar get nombre
     * @return type
     */
    function getNombre() {
        return $this->nombre;
    }

    /**
     * metodo get raza
     * @return type
     */
    function getRaza() {
        return $this->raza;
    }

    /**
     * metodo GET PESO
     * @return type
     */
    function getPeso() {
        return $this->peso;
    }

    /**
     * metodo get color
     * @return type
     */
    function getColor() {
        return $this->color;
    }

    /**
     * metodo set nombre
     * @param type $nombre
     */
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * metodo  set raza
     * @param type $raza
     */
    function setRaza($raza) {
        $this->raza = $raza;
    }

    /**
     * metodo  set peso
     * @param type $peso
     */
    function setPeso($peso) {
        $this->peso = $peso;
    }

    /**
     * metodo  set color
     * @param type $color
     */
    function setColor($color) {
        $this->color = $color;
    }
    
    /**
     * Metodo de probabilidad 
     * devuelve una probabilidad, que es un nº al azar   
     * @return type
     */
    protected function probabilidad($w){
        return rand(0, $w);
    }
}