<?php

/**
 * Factory para DAOs
 *
 * @author Marcos
 * @since 13-11-2013
 */
class DAOFactory{

	
	
	public static function getSolicitudDAO(){
		return new SolicitudDAO();
	}
	
	public static function getSolicitudProyectoDAO(){
		return new SolicitudProyectoDAO();
	}
	
	public static function getTipoEquipoDAO(){
		return new TipoEquipoDAO();
	}
	
	
	
	
}
?>
