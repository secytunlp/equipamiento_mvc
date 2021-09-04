<?php

/**
 * DAO para TipoEquipo
 *  
 * @author Marcos
 * @since 28-06-2016
 */
class TipoEquipoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_TIPO_EQUIPO;
	}
	
	public function getEntityFactory(){
		return new TipoEquipoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}	
	
}
?>