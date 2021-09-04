<?php

/**
 * Solicitud
 *
 * @author Marcos
 * @since 27-06-2016
 */

class Solicitud extends Entity{

	//variables de instancia.

	private $estado;
	
	private $docente;
	private $periodo;
	private $ds_investigador;
	private $nu_cuil;
  	private $ds_mail;
  	private $nu_telefono;
  	private $dt_fecha;
  	private $ds_calle;
  	private $nu_nro;
  	private $nu_piso;
  	private $ds_depto;
  	private $nu_cp;
  	private $dt_nacimiento;
  	private $titulo;
  	private $ds_titulogrado;
  	private $dt_egresogrado;
  	private $tituloposgrado;
  	private $ds_tituloposgrado;
  	private $dt_egresoposgrado;
  	
  	private $lugarTrabajo;	
   	private $cargo;	
  	private $deddoc;	
  	private $facultad;	
  	private $bl_becario;
	private $bl_unlp;
	private $ds_tipobeca;
  	private $ds_orgbeca;
  	private $lugarTrabajoBeca;	
  	private $dt_becadesde;
  	private $dt_becahasta;
	private $facultadplanilla;	
	private $bl_carrera;
	private $carrerainv;	
	private $organismo;	
	private $lugarTrabajoCarrera;	
	private $dt_ingreso;	
	private $categoria;
	private $nu_monto;	
	private $ds_investigadores;
	private $ds_curriculum;
	private $ds_presupuesto;
	private $ds_justificacion;
	private $ds_logros;
	private $ds_produccion;
	private $nu_puntaje;
	private $nu_diferencia;	
	private $tipo_equipo;
	private $ds_denominacionequipo;
	
	private $ds_observaciones;
	private $bl_notificacion;
	
	private $cat;
	
	private $proyectos;
	
	
	
	private $ds_disciplina;	
	
	public function __construct(){
		 
		
		  $this->docente = new Docente();
		  
		  $this->periodo = new Periodo();
		  
		   $this->cat = new Cat();
		  
		   $this->ds_investigador = '';
		   
		   $this->nu_cuil = '';
		   
		  $this->ds_mail = '';
		  $this->nu_telefono = '';
		  $this->dt_fecha = '';
		  $this->dt_nacimiento = '';
		  
		  $this->ds_calle = '';
		  $this->nu_nro = '';
		  $this->nu_piso = '';
		  $this->ds_depto = '';
		  $this->nu_cp = '';
		  $this->ds_titulogrado = '';
		  $this->titulo = new Titulo();
		  $this->dt_grado = '';
		  $this->tituloposgrado = new Titulo();
		  $this->ds_tituloposgrado = '';
	  	  $this->dt_posgrado = '';
	  	  $this->bl_doctorado = 0;
	  	  $this->lugarTrabajo = new LugarTrabajo();	
		  
	  	  $this->lugarTrabajoBeca = new LugarTrabajo();	
		  $this->lugarTrabajoCarrera = new LugarTrabajo();	
		  
		  
		  $this->cargo = new Cargo();	
		  
		  $this->deddoc = New DedDoc();	
		 	
		  $this->facultad = new Facultad();	
		  $this->facultadplanilla = new Facultad();	
		  
		  $this->bl_becario = 0;
		  $this->bl_unlp = 0;
		  $this->ds_tipobeca = '';
		  $this->ds_orgbeca = '';
		 
		  $this->dt_becadesde = '';
		  $this->dt_becahasta = '';
		  $this->bl_carrera = 0;
		  $this->carrerainv = new CarreraInv();	
		 
		  $this->organismo = new Organismo();	
		  
		 
		  $this->dt_ingreso = '';	
		  $this->categoria = new Categoria();
		  
		 $this->ds_produccion = '';
		  
		  $this->ds_investigadores = '';
		  
		  $this->ds_justificacion = '';
		  
		  $this->tipo_equipo= new TipoEquipo();
		  
		  $this->ds_denominacionequipo = '';
		 
		  $this->ds_logros = '';
		  $this->bl_notificacion = 0;
		  
		  
		  $this->proyectos= new ItemCollection();
		  
		  
		  $this->ds_disciplina = "";	
	}




	

	


		

	

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getDocente()
	{
	    return $this->docente;
	}

	public function setDocente($docente)
	{
	    $this->docente = $docente;
	}

	public function getPeriodo()
	{
	    return $this->periodo;
	}

	public function setPeriodo($periodo)
	{
	    $this->periodo = $periodo;
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

	public function getDt_fecha()
	{
	    return $this->dt_fecha;
	}

	public function setDt_fecha($dt_fecha)
	{
	    $this->dt_fecha = $dt_fecha;
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

	public function getDt_nacimiento()
	{
	    return $this->dt_nacimiento;
	}

	public function setDt_nacimiento($dt_nacimiento)
	{
	    $this->dt_nacimiento = $dt_nacimiento;
	}

	public function getTitulo()
	{
	    return $this->titulo;
	}

	public function setTitulo($titulo)
	{
	    $this->titulo = $titulo;
	}

	public function getDs_titulogrado()
	{
	    return $this->ds_titulogrado;
	}

	public function setDs_titulogrado($ds_titulogrado)
	{
	    $this->ds_titulogrado = $ds_titulogrado;
	}

	public function getDt_egresogrado()
	{
	    return $this->dt_egresogrado;
	}

	public function setDt_egresogrado($dt_egresogrado)
	{
	    $this->dt_egresogrado = $dt_egresogrado;
	}

	public function getTituloposgrado()
	{
	    return $this->tituloposgrado;
	}

	public function setTituloposgrado($tituloposgrado)
	{
	    $this->tituloposgrado = $tituloposgrado;
	}

	public function getDs_tituloposgrado()
	{
	    return $this->ds_tituloposgrado;
	}

	public function setDs_tituloposgrado($ds_tituloposgrado)
	{
	    $this->ds_tituloposgrado = $ds_tituloposgrado;
	}

	public function getDt_egresoposgrado()
	{
	    return $this->dt_egresoposgrado;
	}

	public function setDt_egresoposgrado($dt_egresoposgrado)
	{
	    $this->dt_egresoposgrado = $dt_egresoposgrado;
	}

	public function getBl_doctorado()
	{
	    return $this->bl_doctorado;
	}

	public function setBl_doctorado($bl_doctorado)
	{
	    $this->bl_doctorado = $bl_doctorado;
	}

	public function getLugarTrabajo()
	{
	    return $this->lugarTrabajo;
	}

	public function setLugarTrabajo($lugarTrabajo)
	{
	    $this->lugarTrabajo = $lugarTrabajo;
	}

	public function getCargo()
	{
	    return $this->cargo;
	}

	public function setCargo($cargo)
	{
	    $this->cargo = $cargo;
	}

	public function getDeddoc()
	{
	    return $this->deddoc;
	}

	public function setDeddoc($deddoc)
	{
	    $this->deddoc = $deddoc;
	}

	public function getFacultad()
	{
	    return $this->facultad;
	}

	public function setFacultad($facultad)
	{
	    $this->facultad = $facultad;
	}

	public function getBl_becario()
	{
	    return $this->bl_becario;
	}

	public function setBl_becario($bl_becario)
	{
	    $this->bl_becario = $bl_becario;
	}

	public function getBl_unlp()
	{
	    return $this->bl_unlp;
	}

	public function setBl_unlp($bl_unlp)
	{
	    $this->bl_unlp = $bl_unlp;
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

	public function getLugarTrabajoBeca()
	{
	    return $this->lugarTrabajoBeca;
	}

	public function setLugarTrabajoBeca($lugarTrabajoBeca)
	{
	    $this->lugarTrabajoBeca = $lugarTrabajoBeca;
	}

	public function getDt_becadesde()
	{
	    return $this->dt_becadesde;
	}

	public function setDt_becadesde($dt_becadesde)
	{
	    $this->dt_becadesde = $dt_becadesde;
	}

	public function getDt_becahasta()
	{
	    return $this->dt_becahasta;
	}

	public function setDt_becahasta($dt_becahasta)
	{
	    $this->dt_becahasta = $dt_becahasta;
	}

	public function getFacultadplanilla()
	{
	    return $this->facultadplanilla;
	}

	public function setFacultadplanilla($facultadplanilla)
	{
	    $this->facultadplanilla = $facultadplanilla;
	}

	public function getBl_carrera()
	{
	    return $this->bl_carrera;
	}

	public function setBl_carrera($bl_carrera)
	{
	    $this->bl_carrera = $bl_carrera;
	}

	public function getCarrerainv()
	{
	    return $this->carrerainv;
	}

	public function setCarrerainv($carrerainv)
	{
	    $this->carrerainv = $carrerainv;
	}

	public function getOrganismo()
	{
	    return $this->organismo;
	}

	public function setOrganismo($organismo)
	{
	    $this->organismo = $organismo;
	}

	public function getLugarTrabajoCarrera()
	{
	    return $this->lugarTrabajoCarrera;
	}

	public function setLugarTrabajoCarrera($lugarTrabajoCarrera)
	{
	    $this->lugarTrabajoCarrera = $lugarTrabajoCarrera;
	}

	public function getDt_ingreso()
	{
	    return $this->dt_ingreso;
	}

	public function setDt_ingreso($dt_ingreso)
	{
	    $this->dt_ingreso = $dt_ingreso;
	}

	public function getCategoria()
	{
	    return $this->categoria;
	}

	public function setCategoria($categoria)
	{
	    $this->categoria = $categoria;
	}

	public function getBl_director()
	{
	    return $this->bl_director;
	}

	public function setBl_director($bl_director)
	{
	    $this->bl_director = $bl_director;
	}

	public function getDs_objetivo()
	{
	    return $this->ds_objetivo;
	}

	public function setDs_objetivo($ds_objetivo)
	{
	    $this->ds_objetivo = $ds_objetivo;
	}

	public function getDs_curriculum()
	{
	    return $this->ds_curriculum;
	}

	public function setDs_curriculum($ds_curriculum)
	{
	    $this->ds_curriculum = $ds_curriculum;
	}

	public function getDs_justificacion()
	{
	    return $this->ds_justificacion;
	}

	public function setDs_justificacion($ds_justificacion)
	{
	    $this->ds_justificacion = $ds_justificacion;
	}

	public function getNu_puntaje()
	{
	    return $this->nu_puntaje;
	}

	public function setNu_puntaje($nu_puntaje)
	{
	    $this->nu_puntaje = $nu_puntaje;
	}

	public function getNu_diferencia()
	{
	    return $this->nu_diferencia;
	}

	public function setNu_diferencia($nu_diferencia)
	{
	    $this->nu_diferencia = $nu_diferencia;
	}



	public function getDs_observaciones()
	{
	    return $this->ds_observaciones;
	}

	public function setDs_observaciones($ds_observaciones)
	{
	    $this->ds_observaciones = $ds_observaciones;
	}

	public function getBl_notificacion()
	{
	    return $this->bl_notificacion;
	}

	public function setBl_notificacion($bl_notificacion)
	{
	    $this->bl_notificacion = $bl_notificacion;
	}

	public function getCat()
	{
	    return $this->cat;
	}

	public function setCat($cat)
	{
	    $this->cat = $cat;
	}

	public function getProyectos()
	{
	    return $this->proyectos;
	}

	public function setProyectos($proyectos)
	{
	    $this->proyectos = $proyectos;
	}

	

	public function __toString(){
		
		return $this->getDocente()->getDs_apellido().' '.$this->getDocente()->getDs_nombre();
	}

	

	public function getDs_disciplina()
	{
	    return $this->ds_disciplina;
	}

	public function setDs_disciplina($ds_disciplina)
	{
	    $this->ds_disciplina = $ds_disciplina;
	}

	public function getDs_investigadores()
	{
	    return $this->ds_investigadores;
	}

	public function setDs_investigadores($ds_investigadores)
	{
	    $this->ds_investigadores = $ds_investigadores;
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

	public function getTipo_equipo()
	{
	    return $this->tipo_equipo;
	}

	public function setTipo_equipo($tipo_equipo)
	{
	    $this->tipo_equipo = $tipo_equipo;
	}

	public function getDs_denominacionequipo()
	{
	    return $this->ds_denominacionequipo;
	}

	public function setDs_denominacionequipo($ds_denominacionequipo)
	{
	    $this->ds_denominacionequipo = $ds_denominacionequipo;
	}

	public function getNu_monto()
	{
	    return $this->nu_monto;
	}

	public function setNu_monto($nu_monto)
	{
	    $this->nu_monto = $nu_monto;
	}

	public function getDs_presupuesto()
	{
	    return $this->ds_presupuesto;
	}

	public function setDs_presupuesto($ds_presupuesto)
	{
	    $this->ds_presupuesto = $ds_presupuesto;
	}
}
?>