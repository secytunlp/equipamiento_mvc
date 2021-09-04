<?php

/**
 * Formulario para Solicitud
 *
 * @author Marcos
 * @since 11-12-2013
 */
class CMPSolicitudForm extends CMPForm{

	
	
	public function getRenderer(){
		return new CMPSolicitudFormRenderer();
	}
	
	/**
	 * se construye el formulario para editar el encomienda
	 */
	public function __construct($action="", $id="edit_solicitud") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CYT_LBL_SOLICITUD_SOLICITANTE, "ds_investigador", ""  ) );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CYT_LBL_SOLICITUD_CUIL, "nu_cuil", ""  ) );
		
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_SOLICITUD_CALLE, "ds_calle") );
		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_SOLICITUD_CALLE_NRO, "nu_nro", "","",10) );
		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_SOLICITUD_PISO, "nu_piso","","",10 ) );
		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_SOLICITUD_DEPTO, "ds_depto","", "",10) );
		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_SOLICITUD_CP, "nu_cp", "","",10) );
		$fieldset->addField( FieldBuilder::buildFieldEmail ( CYT_LBL_SOLICITUD_MAIL, "ds_mail", "","",40) );
		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_SOLICITUD_TELEFONO, "nu_telefono","","",10) );
		$fieldset->addField( FieldBuilder::buildFieldCheckbox ( CYT_LBL_SOLICITUD_MAIL_ACEPTO, "bl_notificacion", "bl_notificacion") );
		
		//$fieldTitulo = FieldBuilder::buildFieldEntityAutocomplete(CYT_LBL_SOLICITUD_TITULO, new CMPTituloAutocomplete(),"ds_titulogrado",CYT_MSG_SOLICITUD_TITULO_REQUIRED,"",60);
		
		/*$fieldTitulo = CYTSecureComponentsFactory::getFindTituloWithAdd(new Titulo(), CYT_LBL_SOLICITUD_TITULO, "", "solicitud_filter_titulo_oid", "titulo.oid","solicitud_filter_titulo_change");
		$fieldTitulo->getInput()->setInputSize(5,80);
		$fieldset->addField( $fieldTitulo );
		
		$fieldset->addField( FieldBuilder::buildFieldDate ( CYT_LBL_SOLICITUD_EGRESO_GRADO, "dt_egresogrado") );
		
		$fieldTitulo = CYTSecureComponentsFactory::getFindTituloPosgradoWithAdd(new Titulo(), CYT_LBL_SOLICITUD_TITULO_POSGRADO, "", "solicitud_filter_tituloposgrado_oid", "tituloposgrado.oid","solicitud_filter_tituloposgrado_change");
		$fieldTitulo->getInput()->setInputSize(5,80);
		$fieldset->addField( $fieldTitulo );
		
		$fieldset->addField( FieldBuilder::buildFieldDate ( CYT_LBL_SOLICITUD_EGRESO_POSGRADO, "dt_egresoposgrado") );
		$fieldset->addField( FieldBuilder::buildFieldCheckbox ( CYT_LBL_SOLICITUD_DOCTORADO, "bl_doctorado", "bl_doctorado") );*/
		
		$findLugarTrabajo = CYTSecureComponentsFactory::getFindLugarTrabajo(new LugarTrabajo(), CYT_LBL_SOLICITUD_LUGAR_TRABAJO, "", "solicitud_filter_lugarTrabajo_oid", "lugarTrabajo.oid","solicitud_filter_lugarTrabajo_change");
		$findLugarTrabajo->getInput()->setInputSize(5,80);
		//$findLugarTrabajo->getInput()->setFunctionCallback("editSolicitud_lugarTrabajoCallback");
		$fieldset->addField( $findLugarTrabajo );
		
		
		
		//$fieldset->addField( FieldBuilder::buildFieldDate ( CYT_LBL_SOLICITUD_NACIMIENTO, "dt_nacimiento") );
		
		$fieldCargo = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_CARGO, "cargo.oid", CYTSecureUtils::getCargosItems(), "", null, null, "--seleccionar--", "cargo_oid" );
		$fieldset->addField( $fieldCargo );
	
	  	$fieldDeddoc = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_DEDICACION, "deddoc.oid", CYTSecureUtils::getDeddocsItems('1,2,3,4'), "", null, null, "--seleccionar--", "deddoc_oid" );
		$fieldset->addField( $fieldDeddoc );
	
	  	$fieldFacultad = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_FACULTAD, "facultad.oid", CYTSecureUtils::getFacultadesItems(), "", null, null, "--seleccionar--", "facultad_oid" );
		$fieldset->addField( $fieldFacultad );
		
	
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_SOLICITUD_ORGANISMO_BECA, "ds_orgbeca") );
		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_SOLICITUD_TIPO_BECA, "ds_tipobeca") );
		$fieldset->addField( FieldBuilder::buildFieldDate ( CYT_LBL_SOLICITUD_BECA_DESDE, "dt_becadesde") );
		$fieldset->addField( FieldBuilder::buildFieldDate ( CYT_LBL_SOLICITUD_BECA_HASTA, "dt_becahasta") );
		
		$findLugarTrabajo = CYTSecureComponentsFactory::getFindLugarTrabajo(new LugarTrabajo(), CYT_LBL_SOLICITUD_LUGAR_TRABAJO_BECA, "", "solicitud_filter_lugarTrabajoBeca_oid", "lugarTrabajoBeca.oid","solicitud_filter_lugarTrabajoBeca_change");
		$findLugarTrabajo->getInput()->setInputSize(5,80);
		$fieldset->addField( $findLugarTrabajo );
		
		$fieldOrganismo = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_INSTITUCION_CARRERAINV, "organismo.oid", CYTSecureUtils::getOrganismosItems(CYT_ORGANISMO_MOSTRADAS), "", null, null, "--seleccionar--", "organismo_oid" );
		$fieldset->addField( $fieldOrganismo );
		
		$fieldCarreraInv = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_CATEGORIA_CARRERAINV, "carrerainv.oid", CYTSecureUtils::getCarreraInvsItems(CYT_CARRERAINV_MOSTRADAS), "", null, null, "--seleccionar--", "carrerainv_oid" );
		$fieldset->addField( $fieldCarreraInv );
		
		$fieldset->addField( FieldBuilder::buildFieldDate ( CYT_LBL_SOLICITUD_INGRESO_CARRERAINV, "dt_ingreso") );
		
		$findLugarTrabajo = CYTSecureComponentsFactory::getFindLugarTrabajo(new LugarTrabajo(), CYT_LBL_SOLICITUD_LUGAR_TRABAJO_CARRERAINV, "", "solicitud_filter_lugarTrabajoCarrerainv_oid", "lugarTrabajoCarrera.oid","solicitud_filter_lugarTrabajoCarrerainv_change");
		$findLugarTrabajo->getInput()->setInputSize(5,80);
		$fieldset->addField( $findLugarTrabajo );
		
		$fieldFacultadplanilla = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_FACULTAD_PLANILLA, "facultadplanilla.oid", CYTSecureUtils::getFacultadesItems(), "", null, null, "--seleccionar--", "facultadplanilla_oid" );
		$fieldset->addField( $fieldFacultadplanilla );
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_SOLICITUD_DISCIPLINA, "ds_disciplina") );
		
		
		//$fieldset->addField( FieldBuilder::buildFieldCheckbox ( CYT_LBL_SOLICITUD_BL_DIRECTOR, "bl_director", "bl_director") );
			
		$fieldset->addField( FieldBuilder::buildFieldNumber ( CYT_LBL_SOLICITUD_MONTO_SOLICITADO, "nu_monto", "", "", 10 ) );
		
		$input = FieldBuilder::buildFieldTextArea ( CYT_LBL_SOLICITUD_JUSTIFICACION, "ds_justificacion","","",8,110);
		$fieldset->addField( $input );
		
		$input = FieldBuilder::buildFieldTextArea ( CYT_LBL_SOLICITUD_INVESTIGADORES, "ds_investigadores","","",8,110);
		$fieldset->addField( $input );
		
		$input = FieldBuilder::buildFieldTextArea ( CYT_LBL_SOLICITUD_PRODUCCION, "ds_produccion","","",8,110);
		$fieldset->addField( $input );
		
		$input = FieldBuilder::buildFieldTextArea ( CYT_LBL_SOLICITUD_LOGROS, "ds_logros","","",8,110);
		$fieldset->addField( $input );
		
		$fieldFacultadplanilla = FieldBuilder::buildFieldSelect (CYT_LBL_SOLICITUD_TIPO_EQUIPO, "tipo_equipo.oid", CYTUtils::getTipoEquiposItems(), "", null, null, "--seleccionar--", "tipo_equipo_oid" );
		$fieldset->addField( $fieldFacultadplanilla );
		
		$input = FieldBuilder::buildFieldTextArea ( CYT_LBL_SOLICITUD_DENOMINACION_EQUIPO, "ds_denominacionequipo","","",8,110);
		$fieldset->addField( $input );
		
		$this->addFieldset($fieldset);
	
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );
		$this->addHidden( FieldBuilder::buildInputHidden ( "bl_unlp", "") );
		$this->addHidden( FieldBuilder::buildInputHidden ( "categoria.oid", "") );
		$this->addHidden( FieldBuilder::buildInputHidden ( "ds_curriculum", "") );
		$this->addHidden( FieldBuilder::buildInputHidden ( "ds_presupuesto", "") );
		

		//properties del form.
		$this->addProperty("method", "POST");
		$this->addProperty("enctype", "multipart/form-data");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_solicitudes';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
		
	}


}
?>
