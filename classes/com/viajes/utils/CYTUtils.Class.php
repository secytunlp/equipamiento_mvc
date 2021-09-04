<?php

/**
 * Utilidades para el sistema.
 *
 * @author Marcos
 * @since 28-06-2016
 */
class CYTUtils {
	

	public static function getTipoEquiposItems() {

		return CYTSecureUtils::getFilterOptionItems( ManagerFactory::getTipoEquipoManager(), "oid", "nombre");

	}
	
	
	
	
	
	
}
