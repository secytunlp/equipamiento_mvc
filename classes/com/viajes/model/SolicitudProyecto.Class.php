<?php

/**
 * Solicitud Proyecto
 *
 * @author Marcos
 * @since 20-11-2013
 */

class SolicitudProyecto extends Entity{

	//variables de instancia.
	
	private $solicitud;
	
	private $proyecto;
	
	private $director;
	
	private $estado;
	
	private $dt_alta;
	
	private $dt_baja;
	
	private $bl_elegido;
	
	


	public function __construct(){
		 
		$this->solicitud = new Solicitud();
		
		$this->proyecto = new Proyecto();
		
		$this->director = new Docente();
		
		$this->estado = new TipoEstadoProyecto();
		
		$this->dt_alta = "";
		
		$this->dt_baja = "";
		
		$this->bl_elegido = 0;
		
		
		
		
	}




	

	 

	

	public function getSolicitud()
	{
	    return $this->solicitud;
	}

	public function setSolicitud($solicitud)
	{
	    $this->solicitud = $solicitud;
	}

	public function getProyecto()
	{
	    return $this->proyecto;
	}

	public function setProyecto($proyecto)
	{
	    $this->proyecto = $proyecto;
	}

	public function getDirector()
	{
	    return $this->director;
	}

	public function setDirector($director)
	{
	    $this->director = $director;
	}

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getDt_alta()
	{
	    return $this->dt_alta;
	}

	public function setDt_alta($dt_alta)
	{
	    $this->dt_alta = $dt_alta;
	}

	public function getDt_baja()
	{
	    return $this->dt_baja;
	}

	public function setDt_baja($dt_baja)
	{
	    $this->dt_baja = $dt_baja;
	}

	public function getBl_elegido()
	{
	    return $this->bl_elegido;
	}

	public function setBl_elegido($bl_elegido)
	{
	    $this->bl_elegido = $bl_elegido;
	}
}
?>