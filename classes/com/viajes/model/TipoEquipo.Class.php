<?php

/**
 * TipoEquipo
 *  
 * @author Marcos
 * @since 27-06-2016
 */


class TipoEquipo  extends Entity{

    //variables de instancia.

    private $nombre;
    

    public function __construct(){
    	
    	$this->nombre = "";
    }
    
    
  


    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}
?>