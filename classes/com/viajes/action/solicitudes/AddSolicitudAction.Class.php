<?php

/**
 * Acción para dar de alta una solicitud
 *
 * @author Marcos
 * @since 02-01-2014
 *
 */
class AddSolicitudAction extends AddEntityAction{

	
	protected function getEntity() {
		if (date('Y-m-d')>CYT_FECHA_CIERRE) {
			throw new GenericException( CYT_MSG_FIN_PERIODO );
		}
		
		$entity =  parent::getEntity();
		/*if ($entity->getTitulo()->getOid()) {
			$managerTitulo = CYTSecureManagerFactory::getTituloManager();
			$oTitulo = $managerTitulo->getObjectByCode($entity->getTitulo()->getOid());
			$entity->setDs_titulogrado($oTitulo->getDs_titulo());
		}	
		if ($entity->getTituloposgrado()->getOid()) {
			$managerTitulo = CYTSecureManagerFactory::getTituloManager();
			$oTitulo = $managerTitulo->getObjectByCode($entity->getTituloposgrado()->getOid());
			$entity->setDs_tituloposgrado($oTitulo->getDs_titulo());
		}*/
		
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
		$oPeriodoManager = CYTSecureManagerFactory::getPeriodoManager();
		$oPerioActual = $oPeriodoManager->getPeriodoActual(CYT_PERIODO_YEAR);
		$entity->setPeriodo($oPerioActual);
		$entity->setBl_becario(($entity->getDs_orgbeca()||($entity->getLugarTrabajoBeca()->getOid())||($entity->getDs_tipobeca())||($entity->getDt_becadesde())||($entity->getDt_becahasta()))?1:0);
		$entity->setBl_carrera((($entity->getDt_ingreso())||($entity->getLugarTrabajoCarrera()->getOid())||($entity->getOrganismo()->getOid())||($entity->getCarrerainv()->getOid()))?1:0);
		$entity->setDt_fecha(date(DB_DEFAULT_DATETIME_FORMAT));
		if(isset($_SESSION['archivos'])){
			$archivos = unserialize( $_SESSION['archivos'] );
			
			foreach ($archivos as $key => $archivo) {
				
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
	            	//CdtUtils::log("FILE: "   . $key.' - '.$archivo['name']);
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
		
		
		
		
		$oCriteria = new CdtSearchCriteria();
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		$tIntegrante = CYTSecureDAOFactory::getIntegranteDAO()->getTableName();
		$tProyecto = CYTSecureDAOFactory::getProyectoDAO()->getTableName();
		$oCriteria->addFilter("$tDocente.cd_docente", $oDocente->getOid(), '=');
		$oCriteria->addFilter('DIR.cd_tipoinvestigador', CYT_INTEGRANTE_DIRECTOR, '=');
		$oCriteria->addFilter("$tIntegrante.cd_tipoinvestigador", CYT_INTEGRANTE_COLABORADOR, '<>');
		//$oCriteria->addFilter("$tIntegrante.cd_estado", CYT_ESTADO_INTEGRANTE_ADMITIDO, '=');
		
		//$filter = new CdtSimpleExpression("(".$tProyecto.".cd_estado =".CYT_ESTADO_PROYECTO_ADMITIDO." OR ".$tProyecto.".cd_estado=".CYT_ESTADO_PROYECTO_ACREDITADO." OR ".$tProyecto.".cd_estado=".CYT_ESTADO_PROYECTO_EN_EVALUACION." OR ".$tProyecto.".cd_estado=".CYT_ESTADO_PROYECTO_EVALUADO.") AND (".$tIntegrante.".dt_baja > '".date('Y-m-d')."' OR ".$tIntegrante.".dt_baja IS NULL OR ".$tIntegrante.".dt_baja = '0000-00-00')");
		$filter = new CdtSimpleExpression("(".$tProyecto.".cd_estado=".CYT_ESTADO_PROYECTO_ACREDITADO.") AND (".$tIntegrante.".cd_estado = ".CYT_ESTADO_INTEGRANTE_ADMITIDO." OR ".$tIntegrante.".cd_estado = ".CYT_ESTADO_INTEGRANTE_BAJA_CREADA." OR ".$tIntegrante.".cd_estado = ".CYT_ESTADO_INTEGRANTE_BAJA_RECIBIDA." OR ".$tIntegrante.".cd_estado = ".CYT_ESTADO_INTEGRANTE_CAMBIO_HS_CREADO." OR ".$tIntegrante.".cd_estado = ".CYT_ESTADO_INTEGRANTE_CAMBIO_HS_RECIBIDO.") AND ((".$tIntegrante.".cd_estado != ".CYT_ESTADO_INTEGRANTE_BAJA_CREADA." AND ".$tIntegrante.".cd_estado != ".CYT_ESTADO_INTEGRANTE_BAJA_RECIBIDA." AND ".$tIntegrante.".dt_baja > '".date('Y-m-d')."') OR ".$tIntegrante.".cd_estado = ".CYT_ESTADO_INTEGRANTE_BAJA_CREADA." OR ".$tIntegrante.".cd_estado = ".CYT_ESTADO_INTEGRANTE_BAJA_RECIBIDA." OR ".$tIntegrante.".dt_baja IS NULL OR ".$tIntegrante.".dt_baja = '0000-00-00')");
		$oCriteria->setExpresion($filter);
		$oneYearAgo = intval(CYT_PERIODO_YEAR)-1;
		$oCriteria->addFilter('dt_fin', $oneYearAgo.CYT_DIA_MES_PROYECTO_FIN, '>', new CdtCriteriaFormatStringValue());
		
		//proyectos.
		/*$proyectosManager = CYTSecureManagerFactory::getProyectoManager();
		$proyectos = $proyectosManager->getEntities($oCriteria);
		$proyectosArray = new ItemCollection();
		foreach ($proyectos as $oProyecto) {
				$oCriteriaIntegrante = new CdtSearchCriteria();
				$oCriteriaIntegrante->addFilter("$tDocente.cd_docente", $oDocente->getOid(), '=');
				$oCriteriaIntegrante->addFilter("cd_proyecto", $oProyecto->getOid(), '=');
				$integrantesManager = CYTSecureManagerFactory::getIntegranteManager();
				$oIntegrante = $integrantesManager->getEntity($oCriteriaIntegrante);
				$oProyecto->setDt_ini($oIntegrante->getDt_alta());
				$dt_hasta = (($oIntegrante->getDt_baja()=='0000-00-00')||($oIntegrante->getDt_baja()=='')||(!$oIntegrante->getDt_baja())||($oIntegrante->getCd_estado()==CYT_ESTADO_INTEGRANTE_BAJA_CREADA)||($oIntegrante->getCd_estado()==CYT_ESTADO_INTEGRANTE_BAJA_RECIBIDA))?$oProyecto->getDt_fin():$oIntegrante->getDt_baja();
				$oProyecto->setDt_fin($dt_hasta);
				$proyectosArray->addItem($oProyecto);
		}
		$entity->setProyectos( $proyectosArray );*/
		
		$solicitudProyectosManager = new SolicitudProyectoSessionManager();
		$entity->setProyectos( $solicitudProyectosManager->getEntities(new CdtSearchCriteria()) );
		

		
		
		return $entity;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		$form = new CMPSolicitudForm();
		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oSolicitud = new Solicitud();
		
		return $oSolicitud;
	}

	protected function getEntityManager(){
		return ManagerFactory::getSolicitudManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_solicitud_success';
	
	}
	


}
