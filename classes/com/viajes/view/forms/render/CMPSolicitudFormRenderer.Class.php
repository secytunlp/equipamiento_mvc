<?php

/**
 * Implementación para renderizar un formulario de solicitud 
 *
 * @author Marcos
 * @since 11-12-2013
 *
 */
class CMPSolicitudFormRenderer extends DefaultFormRenderer {

	 protected function getXTemplate() {
    	return new XTemplate( CYT_TEMPLATE_SOLICITUD_FORM );
    }
	
	
	protected function renderFieldset(CMPForm $form, XTemplate $xtpl){
		$xtpl->assign("titulo_domicilio", CYT_MSG_SOLICITUD_DOMICILIO_TITULO);
		foreach ($form->getFieldsets() as $fieldset) {
			
			//legend
			$legend = $fieldset->getLegend();
			if(!empty($legend)){
				$xtpl->assign("value", $legend);
				$xtpl->parse("main.fieldset.legend");
			}
			
			
			$fields = $fieldset->getFields();
			$fieldInvestigador = $fields['ds_investigador'];		
			$input = $fieldInvestigador->getInput();
			$label = $fieldInvestigador->getLabel();	
			$this->renderLabel( $label, $input, $xtpl );
			$this->renderInput( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldInvestigador->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.fieldset.column.ds_investigador");
			
			$fieldCUIL = $fields['nu_cuil'];		
			$input = $fieldCUIL->getInput();
			$label = $fieldCUIL->getLabel();	
			$this->renderLabel( $label, $input, $xtpl );
			$this->renderInput( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldCUIL->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.fieldset.column.nu_cuil");
			
			
			
			$xtpl->parse("main.fieldset.column");
			
			
			$xtpl->parse("main.fieldset");
			$xtpl->assign("domicilio_tab", CYT_MSG_SOLICITUD_TAB_DOMICILIO);
			$fieldCalle = $fields['ds_calle'];		
			$input = $fieldCalle->getInput();
			$label = $fieldCalle->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldCalle->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.ds_calle");
			
			$fieldNro = $fields['nu_nro'];		
			$input = $fieldNro->getInput();
			$label = $fieldNro->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldNro->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.nu_nro");
			
			$fieldPiso = $fields['nu_piso'];		
			$input = $fieldPiso->getInput();
			$label = $fieldPiso->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldPiso->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.nu_piso");
			
			$fieldDepto = $fields['ds_depto'];		
			$input = $fieldDepto->getInput();
			$label = $fieldDepto->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldDepto->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.ds_depto");
			
			$fieldCP = $fields['nu_cp'];		
			$input = $fieldCP->getInput();
			$label = $fieldCP->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldCP->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.nu_cp");
			$fieldMail = $fields['ds_mail'];		
			$input = $fieldMail->getInput();
			$label = $fieldMail->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldMail->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.ds_mail");
			$fieldNotificacion = $fields['bl_notificacion'];		
			$input = $fieldNotificacion->getInput();
			$label = $fieldNotificacion->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldNotificacion->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.bl_notificacion");
			$fieldTelefono = $fields['nu_telefono'];		
			$input = $fieldTelefono->getInput();
			$label = $fieldTelefono->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldTelefono->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.nu_telefono");
			
			
			
			$xtpl->assign("universidad_tab", CYT_MSG_SOLICITUD_TAB_UNIVERSIDAD);
			
			
			
			
			
			
			$fieldLugarTrabajo = $fields['solicitud_filter_lugarTrabajo_oid'];		
			$input = $fieldLugarTrabajo->getInput();
			$label = $fieldLugarTrabajo->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldLugarTrabajo->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.solicitud_filter_lugarTrabajo_oid");
			
						
			$fieldCargo = $fields['cargo_oid'];		
			$input = $fieldCargo->getInput();
			$label = $fieldCargo->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldCargo->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.cargo_oid");
			
			$fieldDedDoc = $fields['deddoc_oid'];		
			$input = $fieldDedDoc->getInput();
			$label = $fieldDedDoc->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldDedDoc->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.deddoc_oid");
			
			$fieldFacultad = $fields['facultad_oid'];		
			$input = $fieldFacultad->getInput();
			$label = $fieldFacultad->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldFacultad->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.facultad_oid");
			
			$fieldDisciplina = $fields['ds_disciplina'];		
			$input = $fieldDisciplina->getInput();
			$label = $fieldDisciplina->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldDisciplina->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.ds_disciplina");
			
			
			
			$xtpl->assign("becario_tab", CYT_MSG_SOLICITUD_TAB_BECARIO);
			
			
			$fieldOrgBeca = $fields['ds_orgbeca'];		
			$input = $fieldOrgBeca->getInput();
			$label = $fieldOrgBeca->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldOrgBeca->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.ds_orgbeca");
			
			$fieldTipoBeca = $fields['ds_tipobeca'];		
			$input = $fieldTipoBeca->getInput();
			$label = $fieldTipoBeca->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldTipoBeca->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.ds_tipobeca");
			
			$field = $fields['dt_becadesde'];		
			$input = $field->getInput();
			$label = $field->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $field->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.dt_becadesde");
			
			$field = $fields['dt_becahasta'];		
			$input = $field->getInput();
			$label = $field->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $field->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.dt_becahasta");
			
			$fieldLugarTrabajoBeca = $fields['solicitud_filter_lugarTrabajoBeca_oid'];		
			$input = $fieldLugarTrabajoBeca->getInput();
			$label = $fieldLugarTrabajoBeca->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldLugarTrabajoBeca->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.solicitud_filter_lugarTrabajoBeca_oid");
			
			$xtpl->assign("carrerainv_tab", CYT_MSG_SOLICITUD_TAB_CARRERAINV);
			
			$fieldInstitucion = $fields['organismo_oid'];		
			$input = $fieldInstitucion->getInput();
			$label = $fieldInstitucion->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldInstitucion->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.organismo_oid");
			
			$fieldCarreraInv = $fields['carrerainv_oid'];		
			$input = $fieldCarreraInv->getInput();
			$label = $fieldCarreraInv->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldCarreraInv->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.carrerainv_oid");
			
			$fieldIngreso = $fields['dt_ingreso'];		
			$input = $fieldIngreso->getInput();
			$label = $fieldIngreso->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldIngreso->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.dt_ingreso");
			
			$fieldLugarTrabajoCarrerainv = $fields['solicitud_filter_lugarTrabajoCarrerainv_oid'];		
			$input = $fieldLugarTrabajoCarrerainv->getInput();
			$label = $fieldLugarTrabajoCarrerainv->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldLugarTrabajoCarrerainv->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.solicitud_filter_lugarTrabajoCarrerainv_oid");
			
			$xtpl->assign("proyectos_tab", CYT_MSG_SOLICITUD_TAB_PROYECTOS);
			
			$HTMLProyectos = $this->getHTMLProyectos($xtpl);
			$xtpl->assign("HTMLProyectos", $HTMLProyectos);
			
			$xtpl->assign("descripcion_tab", CYT_MSG_SOLICITUD_TAB_DESCRIPCION);
			$fieldFacultadplanilla = $fields['facultadplanilla_oid'];		
			$input = $fieldFacultadplanilla->getInput();
			$label = $fieldFacultadplanilla->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldFacultadplanilla->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.facultadplanilla_oid");
			
			
			
			$field = $fields['ds_investigadores'];		
			$input = $field->getInput();
			$label = $field->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $field->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.ds_investigadores");
			
		
			$field = $fields['ds_logros'];		
			$input = $field->getInput();
			$label = $field->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $field->getMinWidth());					
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');	
			}
			else $xtpl->assign("display", 'none');
			$xtpl->parse("main.ds_logros");
			
			$field = $fields['ds_produccion'];		
			$input = $field->getInput();
			$label = $field->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $field->getMinWidth());					
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');	
			}
			else $xtpl->assign("display", 'none');
			$xtpl->parse("main.ds_produccion");
			
			
			$field = $fields['ds_justificacion'];		
			$input = $field->getInput();
			$label = $field->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $field->getMinWidth());					
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');	
			}
			else $xtpl->assign("display", 'none');
			$xtpl->parse("main.ds_justificacion");
			
			$fieldMonto = $fields['nu_monto'];		
			$input = $fieldMonto->getInput();
			$label = $fieldMonto->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $fieldMonto->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.nu_monto");
			
			$field = $fields['tipo_equipo_oid'];		
			$input = $field->getInput();
			$label = $field->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $field->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.tipo_equipo_oid");
			
			
			$field = $fields['ds_denominacionequipo'];		
			$input = $field->getInput();
			$label = $field->getLabel();	
			$this->renderLabelTab( $label, $input, $xtpl );
			$this->renderInputTab( $input, $xtpl );
			$xtpl->assign("minWidth", $field->getMinWidth());					
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');	
			}
			else $xtpl->assign("display", 'none');
			$xtpl->parse("main.ds_denominacionequipo");
			
			$xtpl->assign("value", CYT_LBL_SOLICITUD_A_CURRICULUM );
			$xtpl->assign("required", "*" );
			$xtpl->parse("main.ds_curriculum.label");
			$xtpl->assign("actionFile", "doAction?action=add_file_session" );
			$xtpl->parse("main.ds_curriculum.input");
			$xtpl->assign("display", 'block');
			$xtpl->assign("label_curriculum", CYT_LBL_SOLICITUD_A_CURRICULUM_SIGEVA);
			$hiddens = $form->getHiddens();
			$hiddenDs_curriculum = $hiddens['ds_curriculum'];	
				
			if ($hiddenDs_curriculum->getInputValue()) {
				$xtpl->assign("ds_curriculum_cargado", '<span style="color:#009900; font-weight:bold">'.CYT_MSG_FILE_UPLOAD_EXITO.$hiddenDs_curriculum->getInputValue().'</span>');
			}
			$xtpl->parse("main.ds_curriculum");
			
			$xtpl->assign("value", CYT_LBL_SOLICITUD_PRESUPUESTO );
			$xtpl->assign("required", "*" );
			$xtpl->parse("main.ds_presupuesto.label");
			$xtpl->assign("actionFile", "doAction?action=add_file_session" );
			$xtpl->parse("main.ds_presupuesto.input");
			$xtpl->assign("display", 'block');
			$hiddens = $form->getHiddens();
			$hiddenDs_presupuesto = $hiddens['ds_presupuesto'];	
				
			if ($hiddenDs_presupuesto->getInputValue()) {
				$xtpl->assign("ds_presupuesto_cargado", '<span style="color:#009900; font-weight:bold">'.CYT_MSG_FILE_UPLOAD_EXITO.$hiddenDs_presupuesto->getInputValue().'</span>');
			}
			$xtpl->parse("main.ds_presupuesto");
			
			
		} 
	}

	
	
	
	/**
	 * renderizamos en el formulario de solicitud los proyectos que tiene en ejecucion.
	 
	 *
	 * @param CMPForm $form
	 * @param XTemplate $xtpl
	 */
	protected function getHTMLProyectos(XTemplate $xtpl){
	
		$xtpl_proyectos = new XTemplate( CYT_TEMPLATE_SOLICITUD_EDIT_PROYECTOS );
	
		//mostrar las proyectos actuales.
		//$xtpl_proyectos->assign('proyectos_title', CYT_MSG_UNIDAD_FACULTAD );
	
		//TODO parsear labels.
		$this->parseProyectosLabels($xtpl_proyectos);
		 
		//recuperamos las proyectos de la unidad desde la sesión.
		$manager = new SolicitudProyectoSessionManager();
		$proyectos = $manager->getEntities( new CdtSearchCriteria() );
		 
		//parseamos los proyectos.
		$this->parseProyectos($proyectos, $xtpl_proyectos);
		 
		
		$xtpl_proyectos->parse("main");
	
		return $xtpl_proyectos->text("main");
	
	}
	

	
	
	protected function renderLabel( $label, CMPFormInput $input, XTemplate $xtpl ){
		
		$xtpl->assign("value", $label );
		
		if( $input->getIsRequired() && $input->getIsEditable() ){
			$xtpl->assign("required", $input->getRequiredLabel() );
		}else{
			$xtpl->assign("required", "" );
		}
		
		$xtpl->assign("input_name", $input->getId() );
		$xtpl->parse("main.fieldset.column.".$input->getId().".label");
	}
	
	protected function renderInput( CMPFormInput $input, XTemplate $xtpl ){
		
		$xtpl->assign("input", $input->show() );
		
		$xtpl->parse("main.fieldset.column.".$input->getId().".input");
		
	}
	
	protected function renderLabelTab( $label, CMPFormInput $input, XTemplate $xtpl ){
		
		$xtpl->assign("value", $label );
		
		if( $input->getIsRequired() && $input->getIsEditable() ){
			$xtpl->assign("required", $input->getRequiredLabel() );
		}else{
			$xtpl->assign("required", "" );
		}
		
		$xtpl->assign("input_name", $input->getId() );
		$xtpl->parse("main.".$input->getId().".label");
	}
	
	protected function renderInputTab( CMPFormInput $input, XTemplate $xtpl ){
		
		$xtpl->assign("input", $input->show() );
		
		$xtpl->parse("main.".$input->getId().".input");
		
	}
	
	
	
	
	
	/**
	 * armamos un array con los datos del proyecto.
	 * @param Proyecto $solicitudProyecto
	 */
	public function buildArrayProyecto(SolicitudProyecto $solicitudProyecto){
	
		$array_proyecto = array();
	
		$array_proyecto["item_oid"] = $solicitudProyecto->getProyecto()->getOid();
		
		/*$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('cd_proyecto', $solicitudProyecto->getOid(), '=');
		$oCriteria->addFilter('DIR.cd_tipoinvestigador', CYT_INTEGRANTE_DIRECTOR, '=');
		$managerProyecto =  CYTSecureManagerFactory::getProyectoManager();
		$oProyecto = $managerProyecto->getEntity($oCriteria);*/
		$array_proyecto["bl_elegido"] = $solicitudProyecto->getBl_elegido();
		$array_proyecto["ds_codigo"] = $solicitudProyecto->getProyecto()->getDs_codigo();
		$array_proyecto["ds_director"] = $solicitudProyecto->getProyecto()->getDirector()->getDs_apellido().', '.$solicitudProyecto->getProyecto()->getDirector()->getDs_nombre();
		$array_proyecto["ds_titulo"] = $solicitudProyecto->getProyecto()->getDs_titulo();
		$array_proyecto["dt_inicio"] = CYTSecureUtils::formatDateToView($solicitudProyecto->getDt_alta());
		$array_proyecto["dt_fin"] = CYTSecureUtils::formatDateToView($solicitudProyecto->getDt_baja());
		$array_proyecto["ds_estado"] = $solicitudProyecto->getProyecto()->getTipoEstadoProyecto()->getDs_estado();
	
		return $array_proyecto;
	
	}
	/**
	 * columnas para el listado de proyectos
	 * @return multitype:string
	 */
	public function getProyectoColumns(){
		return array( "bl_elegido","ds_codigo","ds_titulo","ds_director","dt_inicio","dt_fin","ds_estado");
	}
	
	/**
	 * labels para el listado de proyectos
	 * @return multitype:string
	 */
	public function getProyectoColumnsLabels(){
		return array( CYT_LBL_SOLICITUD_PROYECTOS_ELEGIDO,CYT_LBL_SOLICITUD_PROYECTOS_CODIGO,CYT_LBL_SOLICITUD_PROYECTOS_TITULO,CYT_LBL_SOLICITUD_PROYECTOS_DIRECTOR,CYT_LBL_SOLICITUD_PROYECTOS_INICIO,CYT_LBL_SOLICITUD_PROYECTOS_FIN,CYT_LBL_SOLICITUD_PROYECTOS_ESTADO);
	}
	
	/**
	 * aligns para las columnas del listado de facultades.
	 * @return multitype:string
	 */
	public function getProyectoColumnsAlign(){
		return array( "center","center","left","left","center","center","left");
	}
		
	/**
	 * parseamos los labels para el listado de proyectos.
	 * @param XTemplate $xtpl_facultades
	 */
	protected function parseProyectosLabels(XTemplate $xtpl_proyectos){
	
		$aligns = $this->getProyectoColumnsAlign();
	
		$index=0;
		foreach ( $this->getProyectoColumnsLabels() as $label) {
	
			$xtpl_proyectos->assign('proyecto_label', $label );
			$xtpl_proyectos->assign('align', $aligns[$index]);
			$xtpl_proyectos->parse('main.proyecto_th');
	
			$index++;
		}
	}
	
	
	/**
	 * parseamos el listado de proyectos.
	 * @param ItemCollection $proyectos
	 * @param CMPForm $form
	 * @param XTemplate $xtpl_proyectos
	 */
	protected function parseProyectos(ItemCollection $proyectos=null, XTemplate $xtpl_proyectos){
	
		if( $proyectos!= null ){
			foreach ($proyectos as $proyecto) {
				 
				$this->parseProyecto($proyecto, $xtpl_proyectos);
				 
				/*if( $form->getIsEditable() ){
					$xtpl_proyectos->assign('item_oid', $proyecto->getFacultad()->getOid() );
					$xtpl_proyectos->parse("main.proyecto.editar_proyecto");
				}*/
				 
				$xtpl_proyectos->parse("main.proyecto");
			}
		}
	}
	
	/**
	 * parseamos un proyecto.
	 * @param UnidadFacultad $proyecto
	 * @param XTemplate $xtpl_proyectos
	 */
	protected function parseProyecto(SolicitudProyecto $solicitudProyecto, XTemplate $xtpl_proyectos){
	
		$columns = $this->getProyectoColumns();
		$aligns = $this->getProyectoColumnsAlign();
		$array_proyecto = $this->buildArrayProyecto($solicitudProyecto);
	
		$index=0;
		foreach ($columns as $column) {
			$checked = (($column=='bl_elegido')&&($array_proyecto[$column]==1))?' checked ':'';
			$data=($column=='bl_elegido')?"<input type='radio' name='bl_elegido' value=''".$checked." onclick='javascript: seleccionar_proyecto(encodeURI(".$array_proyecto['item_oid']."));'>":$array_proyecto[$column];  
			$xtpl_proyectos->assign('data', $data );
			$xtpl_proyectos->assign('align', $aligns[$index]);
			$xtpl_proyectos->parse('main.proyecto.proyecto_data');
	
			$index++;
		}
	
	}
	

	
	
}