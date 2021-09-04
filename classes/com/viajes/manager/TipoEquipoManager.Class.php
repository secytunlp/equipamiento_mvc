<?php

/**
 * Manager para TipoEquipo
 *  
 * @author Marcos
 * @since 28-06-2016
 */
class TipoEquipoManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getTipoEquipoDAO();
	}

}
?>
