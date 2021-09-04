<?php

/**
 * Acción para inicializar el contexto
 * para editar una solicitud.
 *
 * @author Marcos
 * @since 11-12-2013
 *
 */

class AddSolicitudInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = new CMPSolicitudForm($action);
		$bl_notificacion = $form->getInput("bl_notificacion");
		$bl_notificacion->setIsChecked(true);
		return $form;
		
	}
	
 	

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		if (date('Y-m-d')>CYT_FECHA_CIERRE) {
			throw new GenericException( CYT_MSG_FIN_PERIODO );
		}
		
		$oSolicitud = new Solicitud();
		$oUser = CdtSecureUtils::getUserLogged();
		
		if ($oUser->getCd_usergroup()==CYT_CD_GROUP_SOLICITANTE) {
            $separarCUIL = explode('-',trim($oUser->getDs_username()));
            $oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('nu_documento', $separarCUIL[1], '=');
			
			$oDocenteManager =  CYTSecureManagerFactory::getDocenteManager();
			$oDocente = $oDocenteManager->getEntity($oCriteria);
           
			$oCriteria = new CdtSearchCriteria();
			$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
			$oCriteria->addFilter("$tDocente.cd_docente", $oDocente->getOid(), '=');
			
			$oPeriodoManager = CYTSecureManagerFactory::getPeriodoManager();
			$oPerioActual = $oPeriodoManager->getPeriodoActual(CYT_PERIODO_YEAR);
			$tPeriodo = CYTSecureDAOFactory::getPeriodoDAO()->getTableName();
			$oCriteria->addFilter("$tPeriodo.cd_periodo", $oPerioActual->getOid(), '=');
			
			$oSolicitudManager =  ManagerFactory::getSolicitudManager();
			$oSolicitudAux = $oSolicitudManager->getEntity($oCriteria);
			
			if(!empty($oSolicitudAux)){
				throw new GenericException( CYT_MSG_SOLICITUD_CREADA );
			}
			
			$error = '';
			
			$oCriteria = new CdtSearchCriteria();
			$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
			$oCriteria->addFilter("$tDocente.nu_documento", $oDocente->getNu_documento(), '=');
			
			$oNoRendidasManager =  CYTSecureManagerFactory::getNoRendidasManager();
			$oNoRendidas = $oNoRendidasManager->getEntities($oCriteria);
			foreach ($oNoRendidas as $oNoRendida) {
				$error .= CYT_MSG_SOLICITUD_NO_RENDIDAS.$oNoRendida->getNu_year()."<br>";
			}
			
			/*$twoYear = intval(CYT_PERIODO_YEAR)-2;
			
			for ($i = $twoYear; $i > CYT_PERIODO_INICIAL; $i--) {
				
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter("ds_periodo", $i, "=", new CdtCriteriaFormatStringValue());
				$oPeriodoManager = CYTSecureManagerFactory::getPeriodoManager();
				$oPeriodoAnterior = $oPeriodoManager->getEntity($oCriteria);
				
				if ($oPeriodoAnterior) {
					$oCriteria = new CdtSearchCriteria();
					$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
					$oCriteria->addFilter("$tDocente.cd_docente", $oDocente->getOid(), '=');
					
					
					$tPeriodo = CYTSecureDAOFactory::getPeriodoDAO()->getTableName();
					$oCriteria->addFilter("$tPeriodo.cd_periodo", $oPeriodoAnterior->getOid(), '=');
					
					$oSolicitudManager =  ManagerFactory::getSolicitudManager();
					$oSolicitudAnterior = $oSolicitudManager->getEntity($oCriteria);
					
					if ($oSolicitudAnterior) {
						$oCriteria = new CdtSearchCriteria();
						$oCriteria->addFilter('solicitud_oid', $oSolicitudAnterior->getOid(), '=');
						$oCriteria->addNull('fechaHasta');
						$managerSolicitudEstado =  CYTSecureManagerFactory::getSolicitudEstadoManager();
						$oSolicitudEstado = $managerSolicitudEstado->getEntity($oCriteria);
						if (($oSolicitudEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_OTORGADA)) {
							$error .= CYT_MSG_SOLICITUD_NO_RENDIDAS.$i."<br>";
							
						}
					}	
				}
				
				
				
			}*/
			
			if($error){
				throw new GenericException( $error );
			}
			
            $oSolicitud->setDs_investigador($oDocente->getDs_apellido().', '.$oDocente->getDs_nombre());
            $oSolicitud->setNu_cuil($oUser->getDs_username());
            $oSolicitud->setDs_calle($oDocente->getDs_calle());
            $oSolicitud->setNu_nro($oDocente->getNu_nro());
            $oSolicitud->setNu_piso($oDocente->getNu_piso());
            $oSolicitud->setDs_depto($oDocente->getDs_depto());
            $oSolicitud->setNu_cp($oDocente->getNu_cp());
            $oSolicitud->setDs_mail($oDocente->getDs_mail());
            $oSolicitud->setNu_telefono($oDocente->getNu_telefono());
            
            /*$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_titulo', $oDocente->getTitulo()->getOid(), '=');
            $oTituloManager =  CYTSecureManagerFactory::getTituloManager();
			$oTitulo = $oTituloManager->getEntity($oCriteria);
			$oSolicitud->setDs_titulogrado($oTitulo->getDs_titulo());*/
			$oSolicitud->setTitulo($oDocente->getTitulo());
			$oSolicitud->setTituloposgrado($oDocente->getTitulopost());
			
			/*if ($oDocente->getLugarTrabajo()->getOid()) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('cd_unidad', $oDocente->getLugarTrabajo()->getOid(), '=');
	            $oLugarTrabajoManager =  CYTSecureManagerFactory::getLugarTrabajoManager();
				$oLugarTrabajo = $oLugarTrabajoManager->getEntity($oCriteria);
				$oSolicitud->setLugarTrabajo($oDocente->getLugarTrabajo());
			}*/
			
			
			$oSolicitud->setCargo($oDocente->getCargo());
			$oSolicitud->setDeddoc($oDocente->getDeddoc());
			$oSolicitud->setFacultad($oDocente->getFacultad());
			$oSolicitud->setCategoria($oDocente->getCategoria());
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_docente', $oDocente->getOid(), '=');
			$oCriteria->addFilter('dt_hasta', CYT_PERIODO_YEAR.CYT_DIA_MES_BECA, '>', new CdtCriteriaFormatStringValue());
			$oBecaManager =  CYTSecureManagerFactory::getBecaManager();
			$oBeca = $oBecaManager->getEntity($oCriteria);
			if (!empty($oBeca)) {
				$oSolicitud->setBl_unlp(($oBeca->getBl_unlp()?1:0));
				$oSolicitud->setDs_orgbeca(($oBeca->getBl_unlp()?'U.N.L.P.':''));
				$oSolicitud->setDs_tipobeca($oBeca->getDs_tipobeca());
				$oSolicitud->setDt_becadesde($oBeca->getDt_desde());
				$oSolicitud->setDt_becahasta($oBeca->getDt_hasta());
			}
			$oSolicitud->setOrganismo($oDocente->getOrganismo());
			$oSolicitud->setCarrerainv($oDocente->getCarrerainv());
			
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
			$proyectosManager = CYTSecureManagerFactory::getProyectoManager();
			$proyectos = $proyectosManager->getEntities($oCriteria);
			$elegido=($proyectos->size()==1)?1:0;
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
				$oSolicitudProyecto = new SolicitudProyecto();
				$oSolicitudProyecto->setDirector($oProyecto->getDirector()->getDs_apellido().', '.$oProyecto->getDirector()->getDs_nombre());
				$oSolicitudProyecto->setBl_elegido($elegido);
				$oSolicitudProyecto->setDt_alta($oProyecto->getDt_ini());
				$oSolicitudProyecto->setDt_baja($oProyecto->getDt_fin());
				$oSolicitudProyecto->setEstado($oProyecto->getTipoEstadoProyecto());
				$oSolicitudProyecto->setProyecto($oProyecto);
				$proyectosArray->addItem($oSolicitudProyecto);
			}
			
			$oSolicitud->setProyectos( $proyectosArray );
			
			
			$proyectoActual = 0;
			if($oSolicitud->getProyectos()->size()){
					$proyectoActual=1;
			}
			
			
			if(!$oSolicitud->getBl_unlp() && !$proyectoActual){
				throw new GenericException( CYT_MSG_SOLICITUD_SIN_PROYECTO_ACTUAL );
			}
			
			$manager = new SolicitudProyectoSessionManager();
			$manager->setEntities( $oSolicitud->getProyectos() );
			
			
			
			
        }
		
		return $oSolicitud;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CYT_MSG_SOLICITUD_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_solicitud";
	}


}
