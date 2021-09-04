<?php

/**
 * PDF de Solicitud
 * 
 * @author Marcos
 * @since 19/11/2103
 */
class ViewSolicitudPDF extends CdtPDFPrint{
	
	private $maxWidth = "";	

	
	private $periodo_oid = "";
	
	private $estado_oid = "";
	private $facultadplanilla_oid = "";
	private $categoria_oid = "";
	private $ds_categoria = "";	
	private $year = "";
	private $ds_investigador = "";
	private $nu_cuil = "";
	private $ds_calle = "";
	private $nu_nro = "";
	private $nu_piso = "";
	private $ds_depto = "";
	private $nu_cp = "";
	private $ds_mail = "";
	private $nu_telefono = "";
	private $bl_notificacion = "";

	private $ds_lugarTrabajo = "";
	
	private $ds_cargo = "";
	private $ds_deddoc = "";
	private $ds_facultad = "";
	private $ds_facultadplanilla = "";
	private $bl_becario = "";
	private $bl_carrera = "";
	private $ds_tipobeca = "";
  	private $ds_orgbeca = "";
  	private $ds_lugarTrabajoBeca = "";	
  	private $ds_periodobeca = "";
  	
  	private $ds_carrerainv = "";	
	private $ds_organismo = "";	
	private $ds_lugarTrabajoCarrera = "";	
	private $dt_ingreso = "";	
		
	
	private $proyectos;	

	private $ds_tipoequipo= "";	
	private $ds_denominacionequipo= "";
	
	private $nu_monto= "";
	private $ds_justificacion= "";	
	private $ds_logros= "";	
	private $ds_produccion= "";	
	private $ds_investigadores= "";	

	
	private $ds_disciplina = "";
	  
	public function __construct(){
		
		parent::__construct();
		$this->setProyectos(new ItemCollection());
		
	}
	
	function printSolicitud(  ){
		$this->NyAp();
		$this->separador((CYT_MSG_SOLICITUD_SEPARADOR_DOMICILIO));
		$this->domicilio();
		$this->mail();
		if ($this->getYear() > 2012 ) {		
			$ds_notificacion=($this->getBl_notificacion())?CDT_UI_LBL_YES:CDT_UI_LBL_NO;			
			$ds_notificacion = CYT_MSG_SOLICITUD_RECIBIR_POR_MAIL.$ds_notificacion;
			$this->MultiCell( $this->getMaxWidth(), 4, $this->encodeCharacters($ds_notificacion));
		}
		//$this->titulo();
		//$this->unidad();
		$this->cargo();
		if ($this->getBl_becario()){
			$this->separador(CYT_MSG_SOLICITUD_BECARIO);
			$this->becario();	
		} 
		if ($this->getBl_carrera()){
			$this->separador(CYT_MSG_SOLICITUD_INVESTIGADOR_CARRERA);
			$this->carrera();	
		} 
		$this->categoria();
		$this->separador(CYT_MSG_SOLICITUD_PROYECTOS_ACTUALES);
		foreach ($this->getProyectos() as $thisProyecto) {
			$this->proyecto($thisProyecto->getProyecto()->getDs_titulo(), $thisProyecto->getDirector()->getDs_apellido().', '.$thisProyecto->getDirector()->getDs_nombre(), $thisProyecto->getProyecto()->getDs_codigo(), CYTSecureUtils::formatDateToView($thisProyecto->getDt_alta()), CYTSecureUtils::formatDateToView($thisProyecto->getDt_baja()), $thisProyecto->getEstado()->getDs_estado(), $thisProyecto->getProyecto()->getDs_abstract1());
		}
		$this->separadorNegro(CYT_MSG_SOLICITUD_TIPO_EQUIPAMINETO);

		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		
		$this->Cell ( $this->getMaxWidth()-150, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_TIPO_EQUIPO));
		$this->SetFillColor(225,225,225);
	//	$this->Cell ( 145, 8, stripslashes($ds_titulotrabajo), 'LTBR',0,'L',1);
		$this->MultiCell( $this->getMaxWidth()-40, 8, $this->encodeCharacters($this->getDs_tipoequipo()), 'LTBR','L',1);
		
		$this->separadorM(CYT_LBL_SOLICITUD_DENOMINACION_EQUIPO);
		$this->texto($this->getDs_denominacionequipo());
			
		$this->monto();
		
		$this->separadorNegro(CYT_MSG_SOLICITUD_JUSTIFICACION);
		$this->separadorM(CYT_LBL_SOLICITUD_JUSTIFICACION);
		$this->texto($this->getDs_justificacion());
		
		$this->separadorM(str_replace('<br>', '',CYT_LBL_SOLICITUD_INVESTIGADORES));
		$this->texto($this->getDs_investigadores());
		
		$this->separadorM(CYT_LBL_SOLICITUD_PRODUCCION);
		$this->texto($this->getDs_produccion());
		
		$this->separadorM(CYT_LBL_SOLICITUD_LOGROS);
		$this->texto($this->getDs_logros());
       
        
		$this->firma1();
		
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtPDFPrint#Header()
	 */
	function Header(){
		
		$this->SetTextColor(100, 100, 100);
		/*$this->SetDrawColor(1,1,1);
		$this->SetLineWidth(.1);*/
		$this->SetFont('Arial','B',36);
		if ($this->getEstado_oid()==CYT_ESTADO_SOLICITUD_CREADA) {
			$this->RotatedText($this->lMargin, $this->h - 10, $this->encodeCharacters('      '.CYT_MSG_SOLICITUD_PDF_PRELIMINAR_TEXT.'       '.CYT_MSG_SOLICITUD_PDF_PRELIMINAR_TEXT), 60);
		}
			
		
		$this->SetY(13);
		
		$this->SetTextColor(0, 0, 0);
		$this->Image(WEB_PATH . 'css/images/unlp.png',12,16,85,16);
	
		$this->SetFont ( 'Arial', '', 13 );
		
		
		
		$this->Cell ( $this->getMaxWidth(), 10, $this->encodeCharacters(CYT_MSG_SOLICITUD_PDF_HEADER_TITLE)." ".$this->getYear(), 'LRT',0,'R');
		$this->ln(5);
		
		$this->SetFont ( 'Arial', '', 12 );
		$this->Cell ( $this->getMaxWidth(), 10, $this->encodeCharacters(CYT_MSG_SOLICITUD_PDF_HEADER_TITLE_2), 'LR',0,'R');
		$this->ln(5);
		
		$this->SetFont ( 'Arial', '', 12 );
		$this->Cell ( $this->getMaxWidth(), 10, "", 'LRB',0,'R');
		
		
		//Line break
		$this->Ln(15);
	}
	
	function categoria() {
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-130, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_CATEGORIA_PDF).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-175, 8, $this->getDs_categoria(), 'LTBR',0,'L',1);
		/*$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-165, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_POSTULANTE).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-100, 8, $this->getDs_tipoInvestigador(), 'LTBR',0,'L',1);*/
		$this->ln(10);
		
	}
	
		
	function proyecto($ds_titulo, $ds_director, $ds_codigo, $dt_ini, $dt_fin, $ds_estado, $ds_abstract1) {
		$this->SetFont ( 'Arial', '', 10 );
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_PROYECTO_TITULO).":"); 
		$this->SetFillColor(225,225,225);
		$this->MultiCell ( $this->getMaxWidth()-20, 5, $this->encodeCharacters($ds_titulo), 'LTBR','L',1);
		$this->ln(2);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_PROYECTO_DIRECTOR).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-80, 8, $this->encodeCharacters($ds_director), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_PROYECTO_ESTADO).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-150, 8, $this->encodeCharacters($ds_estado), 'LTBR',0,'L',1);
		$this->ln(10);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_PROYECTO_CODIGO).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-150, 8, $ds_codigo, 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_PROYECTO_DESDE).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-145, 8, $dt_ini, 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_PROYECTO_HASTA).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-145, 8, $dt_fin, 'LTBR',0,'L',1);
		
		$this->ln(10);
		$this->separador(CYT_MSG_PROYECTO_RESUMEN.':');
		$this->SetFillColor(225,225,225);
		$this->MultiCell( $this->getMaxWidth(), 4, $this->encodeCharacters($ds_abstract1), 'LTBR','L',1);
		
		$this->separador(CYT_LBL_SOLICITUD_LUGAR_TRABAJO.':');
		$this->SetFillColor(225,225,225);
		$this->MultiCell( $this->getMaxWidth(), 4, $this->encodeCharacters($this->getDs_lugarTrabajo()), 'LTBR','L',1);
		
		$this->ln(10);
	}
	
	function monto() {
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-108, 8, $this->encodeCharacters(CYT_MSG_SOLICITUD_PDF_MONTO).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-150, 8, CYTSecureUtils::formatMontoToView($this->getNu_monto()), 'LTBR',0,'L',1);
		
		$this->ln(10);
		
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtPDFPrint#Footer()
	 */
	function Footer(){
		
		$this->SetY(-15);
		
		
		$this->SetFont('Arial','I',8);

		$this->Cell(0,10,$this->encodeCharacters(CYT_MSG_SOLICITUD_PDF_PAGINA).' '.$this->PageNo().' '.CYT_MSG_SOLICITUD_PDF_PAGINA_DE.' {nb}',0,0,'C');
		
	}

	
	
	function NyAp() {
		
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-155, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_APELLIDO_NOMBRE).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-80, 8, $this->encodeCharacters($this->getDs_investigador()), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-175, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_CUIL).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-160, 8, $this->encodeCharacters($this->getNu_cuil()), 'LTBR',0,'L',1);
		$this->ln(10);
	}

	function separadorM($ds_texto, $style='') {
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', $style, 10 );
		$this->MultiCell( $this->getMaxWidth(), 6, $this->encodeCharacters($ds_texto),0, 'L');
		$this->ln(6);
	}
	
	function separador($ds_texto, $style='', $align='L') {
		
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', $style, 10 );
		$this->Cell ( $this->getMaxWidth(), 6, $this->encodeCharacters($ds_texto),0,0,$align);
		$this->ln(6);
	}
	
	function separadorNegro($ds_texto) {
		
		$this->SetTextColor(255,255,255);
		$this->SetFillColor(0,0,0);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth(), 6, $ds_texto,0,0,'',1);
		$this->ln(6);
		$this->SetTextColor(0,0,0);
	}
	
	function domicilio() {
		
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-175, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_CALLE).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-115, 8, $this->encodeCharacters($this->getDs_calle()), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-180, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_NRO).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-175, 8, $this->encodeCharacters($this->getNu_nro()), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-180, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_PISO).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-178, 8, $this->encodeCharacters($this->getNu_piso()), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-175, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_DEPTO).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-178, 8, $this->encodeCharacters($this->getDs_depto()), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-180, 8,  $this->encodeCharacters(CYT_LBL_DOCENTE_CP).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-174, 8, $this->encodeCharacters($this->getNu_cp()), 'LTBR',0,'L',1);
		$this->ln(10);
	}
	
	function mail() {
		
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-175, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_MAIL).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-70, 8, $this->encodeCharacters($this->getDs_mail()), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_TELEFONO).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-155, 8, $this->encodeCharacters($this->getNu_telefono()), 'LTBR',0,'L',1);
		$this->ln(10);
	}
	
	
	
	function unidad() {
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-130, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_LUGAR_TRABAJO_UNLP).":");
		$this->SetFillColor(225,225,225);
		$this->MultiCell( $this->getMaxWidth()-60, 4, $this->encodeCharacters($this->getDs_lugarTrabajo()), 'LTBR','L',1);
		
		$this->ln(6);
		/*$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_LUGAR_TRABAJO_DIRECCION).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-85, 8, $this->encodeCharacters($this->getDs_lugarTrabajoDireccion()), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_TELEFONO).":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-145, 8, $this->encodeCharacters($this->getDs_lugarTrabajoTelefono()), 'LTBR',0,'L',1);
		$this->ln(10);*/
	}
	
	function cargo() {
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-150, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_CARGO).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-105, 8, $this->encodeCharacters($this->getDs_cargo()), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_DEDDOC).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-145, 8, $this->encodeCharacters($this->getDs_deddoc()), 'LTBR',0,'L',1);
		$this->ln(10);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_DOCENTE_FACULTAD).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-20, 8, $this->encodeCharacters($this->getDs_facultad()), 'LTBR',0,'L',1);
		/*$this->ln(10);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_DISCIPLINA).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-20, 8, $this->encodeCharacters($this->getDs_disciplina()), 'LTBR',0,'L',1);*/

		$this->ln(10);
	}
	
function becario() {
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_BECA_INSTIUTCION).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-20, 8, $this->encodeCharacters($this->getDs_orgbeca()), 'LTBR',0,'L',1);
		$this->ln(10);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-160, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_BECA_NIVEL).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-105, 8, $this->encodeCharacters($this->getDs_tipobeca()), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-175, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_BECA_PERIODO).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-130, 8, $this->getDs_periodobeca(), 'LTBR',0,'L',1);
		$this->ln(10);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-160, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_BECA_LUGAR_TRABAJO).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-30, 8, $this->encodeCharacters($this->getDs_lugarTrabajoBeca()), 'LTBR',0,'L',1);

		$this->ln(10);
	}
	
	function carrera() {
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_CARRERA_ORGANISMO).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-20, 8, $this->encodeCharacters($this->getDs_organismo()), 'LTBR',0,'L',1);
		$this->ln(10);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-170, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_CARRERA_CATEGORIA).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-95, 8, $this->encodeCharacters($this->getDs_carrerainv()), 'LTBR',0,'L',1);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-175, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_CARRERA_INGRESO).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-130, 8, $this->getDt_ingreso(), 'LTBR',0,'L',1);
		$this->ln(10);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-160, 8, $this->encodeCharacters(CYT_LBL_SOLICITUD_CARRERA_LUGAR_TRABAJO).":"); 
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-30, 8, $this->getDs_lugarTrabajoCarrera(), 'LTBR',0,'L',1);

		$this->ln(10);
	}
	
	

	function texto($ds_texto) {
		
		$this->SetFillColor(225,225,225);
		$this->MultiCell( $this->getMaxWidth(), 4, $this->encodeCharacters($ds_texto), 'LTBR','L',1);
		
		
		$this->ln(10);
	}
	
	
	
function firma1() {
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', 'I', 11 );
		$this->MultiCell( $this->getMaxWidth(), 8, $this->encodeCharacters(CYT_MSG_SOLICITUD_DECLARACION_JURADA));
		$this->ln(6);
		$this->SetFont ( 'Arial', 'B', 10 );
		$this->Cell ( $this->getMaxWidth()-180, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, '', 'B');
		$this->Cell ( $this->getMaxWidth()-160, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, '', 'B');
		$this->ln(8);
		$this->Cell ( $this->getMaxWidth()-180, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, CYT_MSG_SOLICITUD_FIRMA_LUGAR, '', 0, 'C');
		$this->Cell ( $this->getMaxWidth()-160, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, $this->encodeCharacters(CYT_MSG_SOLICITUD_FIRMA_ACLARACION), '', 0, 'C');
		$this->ln(10);
		$this->SetFont ( 'Arial', 'B', 10 );
		$this->Cell ( $this->getMaxWidth()-195, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, '', 'B');
		$this->Cell ( $this->getMaxWidth()-175, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, '', 'B');
		$this->Cell ( $this->getMaxWidth()-180, 8);
		$this->Cell ( $this->getMaxWidth()-135, 8, '', 'B');
		$this->ln(8);
		$this->Cell ( $this->getMaxWidth()-195, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, CYT_MSG_SOLICITUD_FIRMA_DIRECTOR_BECA, '', 0, 'C');
		$this->Cell ( $this->getMaxWidth()-175, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, $this->encodeCharacters(CYT_MSG_SOLICITUD_FIRMA_AVAL), '', 0, 'C');
		$this->Cell ( $this->getMaxWidth()-185, 8);
		$this->Cell ( $this->getMaxWidth()-135, 8, $this->encodeCharacters(CYT_MSG_SOLICITUD_FIRMA_AVAL_DECANO), '', 0, 'C');
		$this->ln(10);
		
	}
	
	function firma2() {
		$this->ln(10);
		
		$this->SetFillColor(255,255,255);
		
		$this->SetFont ( 'Arial', 'B', 10 );
		$this->Cell ( $this->getMaxWidth()-180, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, '', 'B');
		$this->Cell ( $this->getMaxWidth()-160, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, '', 'B');
		$this->ln(8);
		$this->Cell ( $this->getMaxWidth()-180, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, CYT_MSG_SOLICITUD_FIRMA_LUGAR, '', 0, 'C');
		$this->Cell ( $this->getMaxWidth()-160, 8);
		$this->Cell ( $this->getMaxWidth()-130, 8, $this->encodeCharacters(CYT_MSG_SOLICITUD_FIRMA_ACLARACION), '', 0, 'C');
		
		
	}
	
	function firma3() {
		$this->SetFillColor(255,255,255);
		
		//$this->MultiCell( 185, 8, "Declaración Jurada (Sólo en caso de haber sido adjudicatario de subsidios anteriores).");
		$this->Cell($this->getMaxWidth()-158,8,$this->encodeCharacters(CYT_MSG_SOLICITUD_DECLARACION_JURADA_2));
		$this->SetFont ( 'Arial', 'B', 10 );
		$this->Cell($this->getMaxWidth()-90,8,$this->encodeCharacters(CYT_MSG_SOLICITUD_DECLARACION_JURADA_3));
		$this->SetFont ( 'Arial', 'I', 11 );
		$this->ln(6);
		$msg = CYT_MSG_SOLICITUD_DECLARACION_JURADA_4;
		$year = $this->getYear();
		$yearP = $year-2;
    	$params = array ($year,$yearP );		
		
		$this->MultiCell( $this->getMaxWidth(), 8, $this->encodeCharacters(CdtFormatUtils::formatMessage( $msg, $params )));
		

		$this->ln(6);
		$this->SetFont ( 'Arial', 'B', 10 );
		$this->Cell ( 10, 8);
		$this->Cell ( 60, 8, '', '');
		$this->Cell ( 30, 8);
		$this->Cell ( 60, 8, '', 'B');
		$this->ln(8);
		$this->Cell ( 10, 8);
		$this->Cell ( 60, 8, '', '', 0, 'C');
		$this->Cell ( 30, 8);
		$this->Cell ( 60, 8, CYT_MSG_SOLICITUD_FIRMA, '', 0, 'C');
		$this->ln(10);
		
	}
	
	function Apellido() {
		$this->SetFillColor(255,255,255);
		$this->SetFont ( 'Arial', '', 10 );
		$this->Cell ( $this->getMaxWidth()-155, 8, CYT_LBL_DOCENTE_APELLIDO_NOMBRE.":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-35, 8, $this->encodeCharacters($this->getDs_investigador()), 'LTBR',0,'L',1);
		$this->ln(10);
		$this->SetFillColor(255,255,255);
		$this->Cell ( $this->getMaxWidth()-155, 8, CYT_LBL_FACULTAD.":");
		$this->SetFillColor(225,225,225);
		$this->Cell ( $this->getMaxWidth()-35, 8, $this->getDs_facultadplanilla(), 'LTBR',0,'L',1);
		$this->ln(10);
	}
	
	


	public function getMaxWidth()
	{
	    return $this->maxWidth;
	}

	public function setMaxWidth($maxWidth)
	{
	    $this->maxWidth = $maxWidth;
	}

	public function getPeriodo_oid()
	{
	    return $this->periodo_oid;
	}

	public function setPeriodo_oid($periodo_oid)
	{
	    $this->periodo_oid = $periodo_oid;
	}

	public function getEstado_oid()
	{
	    return $this->estado_oid;
	}

	public function setEstado_oid($estado_oid)
	{
	    $this->estado_oid = $estado_oid;
	}

	public function getFacultadplanilla_oid()
	{
	    return $this->facultadplanilla_oid;
	}

	public function setFacultadplanilla_oid($facultadplanilla_oid)
	{
	    $this->facultadplanilla_oid = $facultadplanilla_oid;
	}

	public function getYear()
	{
	    return $this->year;
	}

	public function setYear($year)
	{
	    $this->year = $year;
	}

	public function getDs_investigador()
	{
	    return $this->ds_investigador;
	}

	public function setDs_investigador($ds_investigador)
	{
	    $this->ds_investigador = $ds_investigador;
	}

	public function getNu_cuil()
	{
	    return $this->nu_cuil;
	}

	public function setNu_cuil($nu_cuil)
	{
	    $this->nu_cuil = $nu_cuil;
	}

	public function getDs_calle()
	{
	    return $this->ds_calle;
	}

	public function setDs_calle($ds_calle)
	{
	    $this->ds_calle = $ds_calle;
	}

	public function getNu_nro()
	{
	    return $this->nu_nro;
	}

	public function setNu_nro($nu_nro)
	{
	    $this->nu_nro = $nu_nro;
	}

	public function getNu_piso()
	{
	    return $this->nu_piso;
	}

	public function setNu_piso($nu_piso)
	{
	    $this->nu_piso = $nu_piso;
	}

	public function getDs_depto()
	{
	    return $this->ds_depto;
	}

	public function setDs_depto($ds_depto)
	{
	    $this->ds_depto = $ds_depto;
	}

	public function getNu_cp()
	{
	    return $this->nu_cp;
	}

	public function setNu_cp($nu_cp)
	{
	    $this->nu_cp = $nu_cp;
	}

	public function getDs_mail()
	{
	    return $this->ds_mail;
	}

	public function setDs_mail($ds_mail)
	{
	    $this->ds_mail = $ds_mail;
	}

	public function getNu_telefono()
	{
	    return $this->nu_telefono;
	}

	public function setNu_telefono($nu_telefono)
	{
	    $this->nu_telefono = $nu_telefono;
	}

	public function getBl_notificacion()
	{
	    return $this->bl_notificacion;
	}

	public function setBl_notificacion($bl_notificacion)
	{
	    $this->bl_notificacion = $bl_notificacion;
	}

	

	public function getDs_lugarTrabajo()
	{
	    return $this->ds_lugarTrabajo;
	}

	public function setDs_lugarTrabajo($ds_lugarTrabajo)
	{
	    $this->ds_lugarTrabajo = $ds_lugarTrabajo;
	}

	public function getDs_cargo()
	{
	    return $this->ds_cargo;
	}

	public function setDs_cargo($ds_cargo)
	{
	    $this->ds_cargo = $ds_cargo;
	}

	public function getDs_deddoc()
	{
	    return $this->ds_deddoc;
	}

	public function setDs_deddoc($ds_deddoc)
	{
	    $this->ds_deddoc = $ds_deddoc;
	}

	public function getDs_facultad()
	{
	    return $this->ds_facultad;
	}

	public function setDs_facultad($ds_facultad)
	{
	    $this->ds_facultad = $ds_facultad;
	}

	public function getDs_facultadplanilla()
	{
	    return $this->ds_facultadplanilla;
	}

	public function setDs_facultadplanilla($ds_facultadplanilla)
	{
	    $this->ds_facultadplanilla = $ds_facultadplanilla;
	}

	public function getBl_becario()
	{
	    return $this->bl_becario;
	}

	public function setBl_becario($bl_becario)
	{
	    $this->bl_becario = $bl_becario;
	}

	public function getBl_carrera()
	{
	    return $this->bl_carrera;
	}

	public function setBl_carrera($bl_carrera)
	{
	    $this->bl_carrera = $bl_carrera;
	}

	public function getDs_tipobeca()
	{
	    return $this->ds_tipobeca;
	}

	public function setDs_tipobeca($ds_tipobeca)
	{
	    $this->ds_tipobeca = $ds_tipobeca;
	}

	public function getDs_orgbeca()
	{
	    return $this->ds_orgbeca;
	}

	public function setDs_orgbeca($ds_orgbeca)
	{
	    $this->ds_orgbeca = $ds_orgbeca;
	}

	public function getDs_lugarTrabajoBeca()
	{
	    return $this->ds_lugarTrabajoBeca;
	}

	public function setDs_lugarTrabajoBeca($ds_lugarTrabajoBeca)
	{
	    $this->ds_lugarTrabajoBeca = $ds_lugarTrabajoBeca;
	}

	public function getDs_periodobeca()
	{
	    return $this->ds_periodobeca;
	}

	public function setDs_periodobeca($ds_periodobeca)
	{
	    $this->ds_periodobeca = $ds_periodobeca;
	}

	public function getDs_carrerainv()
	{
	    return $this->ds_carrerainv;
	}

	public function setDs_carrerainv($ds_carrerainv)
	{
	    $this->ds_carrerainv = $ds_carrerainv;
	}

	public function getDs_organismo()
	{
	    return $this->ds_organismo;
	}

	public function setDs_organismo($ds_organismo)
	{
	    $this->ds_organismo = $ds_organismo;
	}

	public function getDs_lugarTrabajoCarrera()
	{
	    return $this->ds_lugarTrabajoCarrera;
	}

	public function setDs_lugarTrabajoCarrera($ds_lugarTrabajoCarrera)
	{
	    $this->ds_lugarTrabajoCarrera = $ds_lugarTrabajoCarrera;
	}

	public function getDt_ingreso()
	{
	    return $this->dt_ingreso;
	}

	public function setDt_ingreso($dt_ingreso)
	{
	    $this->dt_ingreso = $dt_ingreso;
	}

	public function getProyectos()
	{
	    return $this->proyectos;
	}

	public function setProyectos($proyectos)
	{
	    $this->proyectos = $proyectos;
	}

	

	public function getDs_denominacionequipo()
	{
	    return $this->ds_denominacionequipo;
	}

	public function setDs_denominacionequipo($ds_denominacionequipo)
	{
	    $this->ds_denominacionequipo = $ds_denominacionequipo;
	}

	

	public function getDs_justificacion()
	{
	    return $this->ds_justificacion;
	}

	public function setDs_justificacion($ds_justificacion)
	{
	    $this->ds_justificacion = $ds_justificacion;
	}

	

	public function getDs_disciplina()
	{
	    return $this->ds_disciplina;
	}

	public function setDs_disciplina($ds_disciplina)
	{
	    $this->ds_disciplina = $ds_disciplina;
	}

	public function getDs_tipoequipo()
	{
	    return $this->ds_tipoequipo;
	}

	public function setDs_tipoequipo($ds_tipoequipo)
	{
	    $this->ds_tipoequipo = $ds_tipoequipo;
	}

	public function getDs_logros()
	{
	    return $this->ds_logros;
	}

	public function setDs_logros($ds_logros)
	{
	    $this->ds_logros = $ds_logros;
	}

	public function getDs_produccion()
	{
	    return $this->ds_produccion;
	}

	public function setDs_produccion($ds_produccion)
	{
	    $this->ds_produccion = $ds_produccion;
	}

	public function getDs_investigadores()
	{
	    return $this->ds_investigadores;
	}

	public function setDs_investigadores($ds_investigadores)
	{
	    $this->ds_investigadores = $ds_investigadores;
	}

	public function getCategoria_oid()
	{
	    return $this->categoria_oid;
	}

	public function setCategoria_oid($categoria_oid)
	{
	    $this->categoria_oid = $categoria_oid;
	}

	public function getDs_categoria()
	{
	    return $this->ds_categoria;
	}

	public function setDs_categoria($ds_categoria)
	{
	    $this->ds_categoria = $ds_categoria;
	}

	public function getNu_monto()
	{
	    return $this->nu_monto;
	}

	public function setNu_monto($nu_monto)
	{
	    $this->nu_monto = $nu_monto;
	}
}