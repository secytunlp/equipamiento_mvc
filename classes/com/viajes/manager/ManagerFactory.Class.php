<?php

/**
 * Factory para Managers
 *  
 * @author Marcos
 * @since 13-11-2013
 */
class ManagerFactory{

	
	public static function getSolicitudManager(){
		return new SolicitudManager();
	}
	
	public static function getSolicitudProyectoManager(){
		return new SolicitudProyectoManager();
	}
	
	public static function getTipoEquipoManager(){
		return new TipoEquipoManager();
	}
}

?>