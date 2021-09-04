<?php

/**
 * Acción para actualizar una solicitud
 *
 * @author Marcos
 * @since 04-02-2014
 *
 */
class UpdateSolicitudAction extends UpdateEntityAction{

	protected function getEntity() {
		if (date('Y-m-d')>CYT_FECHA_CIERRE) {
			throw new GenericException( CYT_MSG_FIN_PERIODO );
		}
		$entity =  parent::getEntity();
		
		
	
		$error = '';
		$dir = CYT_PATH_PDFS.'/';
		if (!file_exists($dir)) mkdir($dir, 0777); 
		$dir .= CYT_PERIODO_YEAR.'/';
		if (!file_exists($dir)) mkdir($dir, 0777); 
		$oUser = CdtSecureUtils::getUserLogged();
        $separarCUIL = explode('-',trim($oUser->getDs_username()));
		$dir .= $separarCUIL[1].'/';
		if (!file_exists($dir)) mkdir($dir, 0777);
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('nu_documento', $separarCUIL[1], '=');
		
		$oDocenteManager =  CYTSecureManagerFactory::getDocenteManager();
		$oDocente = $oDocenteManager->getEntity($oCriteria);
		$entity->setDocente($oDocente);
		/*$oPeriodoManager = CYTSecureManagerFactory::getPeriodoManager();
		$oPerioActual = $oPeriodoManager->getPeriodoActual(CYT_PERIODO_YEAR);*/
		
		$entity->setBl_becario(($entity->getDs_orgbeca()||($entity->getLugarTrabajoBeca()->getOid())||($entity->getDs_tipobeca())||($entity->getDt_becadesde())||($entity->getDt_becahasta()))?1:0);
		$entity->setBl_carrera((($entity->getDt_ingreso())||($entity->getLugarTrabajoCarrera()->getOid())||($entity->getOrganismo()->getOid())||($entity->getCarrerainv()->getOid()))?1:0);
		
		$entity->setDt_fecha(date(DB_DEFAULT_DATETIME_FORMAT));
		
		$solicitudProyectosManager = new SolicitudProyectoSessionManager();
		$entity->setProyectos( $solicitudProyectosManager->getEntities(new CdtSearchCriteria()) );
		
		if(isset($_SESSION['archivos'])){
			$archivos = unserialize( $_SESSION['archivos'] );
			
			foreach ($archivos as $key => $archivo) {
				CdtUtils::log("FILE: "   . $key.' - '.$archivo['name']);
			switch ($key) {
            		case 'ds_curriculum':
            		$nombre = CYT_LBL_SOLICITUD_A_CURRICULUM;
            		$sigla = CYT_LBL_SOLICITUD_A_CURRICULUM_SIGLA;
            		
            		break;
            		case 'ds_presupuesto':
            		$nombre = CYT_LBL_SOLICITUD_PRESUPUESTO;
            		$sigla = CYT_LBL_SOLICITUD_PRESUPUESTO_SIGLA;
            		
            		break;
        
            	}
				$explode_name = explode('.', $archivo['name']);
	            //Se valida así y no con el mime type porque este no funciona par algunos programas
	            $pos_ext = count($explode_name) - 1;
	            if (in_array(strtolower($explode_name[$pos_ext]), explode(",",CYT_EXTENSIONES_PERMITIDAS))) {
	            	
	            	
	            	if (is_file($dir.$archivo['nuevo'])){
	            		rename ($dir.$archivo['nuevo'],$dir.str_replace('TMP_'.$sigla, $sigla, $archivo['nuevo'])); 
	            	}
	            	CdtReflectionUtils::doSetter( $entity, $key, str_replace('TMP_'.$sigla, $sigla, $archivo['nuevo']) );
	            	
	            }
	            else {
	            	
	            	$error .=CYT_MSG_FORMATO_INVALIDO.$nombre.'<br />';
	            }
			}
		}
		unset($_SESSION['archivos']);
		$handle=opendir($dir);
		while ($archivo = readdir($handle)){
	        if ((is_file($dir.$archivo))&&(strchr($archivo,'TMP_'))){
	         	unlink($dir.$archivo);
			}
		}
		closedir($handle);
		if ($error) {
			throw new GenericException( $error );
		}
		//agregamos los ambitos relacionados a la solicitud.
		
		
		return $entity;
	}
	
	public function getNewFormInstance(){
		return new CMPSolicitudForm();
	}

	public function getNewEntityInstance(){
		$oSolicitud = new Solicitud();
		
		return $oSolicitud;
	}

	protected function getEntityManager(){
		return ManagerFactory::getSolicitudManager();
	}



	



}
