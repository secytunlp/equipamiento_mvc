<?php

/**
 * se definen los mensajes del sistema en espaÃ±ol.
 *
 * @author modelBuilder
 *
 */


include_once('messages_labels_es.php');

/* SOLICITUDES */

define('CYT_MSG_SOLICITUD_TITLE_LIST', 'Solicitudes', true);
define('CYT_MSG_SOLICITUD_TITLE_ADD', 'Agregar ' . CYT_LBL_SOLICITUD, true);
define('CYT_MSG_SOLICITUD_TITLE_UPDATE', 'Modificar ' . CYT_LBL_SOLICITUD , true);
define('CYT_MSG_SOLICITUD_TITLE_VIEW', 'Visualizar ' . CYT_LBL_SOLICITUD , true);
define('CYT_MSG_SOLICITUD_TITLE_DELETE', 'Borrar ' . CYT_LBL_SOLICITUD , true);
define('CYT_MSG_SOLICITUD_TITLE_EVALUAR', 'Evaluar ' . CYT_LBL_SOLICITUD, true);

define('CYT_MSG_SOLICITUD_CALLE_REQUIRED', CYT_LBL_SOLICITUD_CALLE . ' es requerido', true);
define('CYT_MSG_SOLICITUD_CALLE_NRO_REQUIRED', CYT_LBL_SOLICITUD_CALLE_NRO . ' es requerido', true);
define('CYT_MSG_SOLICITUD_CP_REQUIRED', CYT_LBL_SOLICITUD_CP . ' es requerido', true);
define('CYT_MSG_SOLICITUD_MAIL_REQUIRED', CYT_LBL_SOLICITUD_MAIL . ' es requerido', true);
define('CYT_MSG_SOLICITUD_TITULO_REQUIRED', CYT_LBL_SOLICITUD_TITULO . ' es requerido', true);
define('CYT_MSG_SOLICITUD_LUGAR_TRABAJO_REQUIRED', CYT_LBL_SOLICITUD_LUGAR_TRABAJO . ' es requerido', true);
define('CYT_MSG_SOLICITUD_CARGO_REQUIRED', CYT_LBL_SOLICITUD_CARGO . ' es requerido', true);
define('CYT_MSG_SOLICITUD_DEDICACION_REQUIRED', CYT_LBL_SOLICITUD_DEDICACION . ' es requerido', true);
define('CYT_MSG_SOLICITUD_FACULTAD_REQUIRED', CYT_LBL_SOLICITUD_FACULTAD . ' es requerido', true);




define('CYT_MSG_SOLICITUD_TAB_DOMICILIO', "Personales", true);
define('CYT_MSG_SOLICITUD_DOMICILIO_TITULO', "Domicilio de notificación (Dentro del Radio Urbano de La Plata, Art. 20 Ord. 101)", true);
define('CYT_MSG_SOLICITUD_TAB_UNIVERSIDAD', "Universidad", true);
define('CYT_MSG_SOLICITUD_TAB_BECARIO', "Becario", true);
define('CYT_MSG_SOLICITUD_TAB_CARRERAINV', "Carrera Inv.", true);
define('CYT_MSG_SOLICITUD_TAB_PROYECTOS', "Proy. Actuales", true);
define('CYT_MSG_SOLICITUD_TAB_DESCRIPCION', "Equipamiento", true);


define('CYT_MSG_SOLICITUD_SIN_YEAR_PROYECTO', 'Debe contar al menos con un año de antigüedad en proyectos en ejecución o ser becario UNLP.', true);
define('CYT_MSG_SOLICITUD_SIN_PROYECTO_ACTUAL', 'Debe contar al menos con un proyecto en ejecución o ser becario UNLP.', true);
define('CYT_MSG_SOLICITUD_SIN_PROYECTO_ELEGIDO', 'Debe seleccionar un proyecto de la pestaña', true);
define('CYT_MSG_SOLICITUD_PROYECTO_YA_ELEGIDO', 'Existe otra solicitud de equipamiento para el proyecto que ud. elegió', true);

define('CYT_MSG_SOLICITUD_CREADA', 'Sólo se puede crear una solicitud por período', true);
define('CYT_MSG_SOLICITUD_LUGAR_TRABAJO_BECA_NO_UNLP', 'Si tiene dedicación simple el lugar de trabajo de la beca debe ser en la U.N.L.P..', true);
define('CYT_MSG_SOLICITUD_LUGAR_TRABAJO_CARRERA_NO_UNLP', 'Si tiene dedicación simple el lugar de trabajo de la carrera de investigador debe ser en la U.N.L.P..', true);
define('CYT_MSG_SOLICITUD_DOCTORADO_ANTERIOR', 'Doctorado anterior al ', true);
define('CYT_MSG_SOLICITUD_INGRESO_A_LA_CARRERA_ANTERIOR', 'Ingreso a la carrera anterior al ', true);
define('CYT_MSG_SOLICITUD_INGRESO_A_LA_CARRERA', 'Ingreso a la carrera posterior a la fecha de cierre de la convocatoria', true);
define('CYT_MSG_SOLICITUD_MENOR_YEAR', 'Menos de $1 años de participación en proyectos UNLP / Beca UNLP', true);
define('CYT_MSG_SOLICITUD_MONTO_MAXIMO', 'El monto máximo es de', true);
define('CYT_MSG_SOLICITUD_TAB_CAMPOS_REQUERIDOS', "Complete todos los campos de la pestaña", true);

/* BECAS*/
define('CYT_MSG_BECA_TIPO_REQUIRED', CYT_LBL_SOLICITUD_TIPO_BECA . ' es requerido', true);


define('CYT_MSG_BECA_DESDE_REQUIRED', CYT_LBL_SOLICITUD_BECA_DESDE . ' es requerido', true);
define('CYT_MSG_BECA_HASTA_REQUIRED', CYT_LBL_SOLICITUD_BECA_HASTA . ' es requerido', true);

define('CYT_MSG_BECA_DESDE_MAYOR', CYT_LBL_SOLICITUD_BECA_DESDE . ' es mayor que '.CYT_LBL_SOLICITUD_BECA_HASTA, true);
define('CYT_MSG_BECA_NO_VIGENTE', 'Beca no vigente', true);






//PDF

define('CYT_MSG_SOLICITUD_PDF_HEADER_TITLE', 'SOLICITUD DE SUBSIDIOS', true);
define('CYT_MSG_SOLICITUD_PDF_HEADER_TITLE_2', 'Adquisición o Mejora de Equipamientos', true);

define('CYT_MSG_SOLICITUD_PDF_MES_1', 'Junio', true);
define('CYT_MSG_SOLICITUD_SEPARADOR_DOMICILIO', 'Domicilio de notificación (Dentro del Radio Urbano de La Plata, Art. 20 Ord. 101)', true);
define('CYT_MSG_SOLICITUD_PROYECTOS_ACTUALES', 'DATOS DEL PROYECTO ACREDITADO', true);
define('CYT_MSG_SOLICITUD_TIPO_EQUIPAMINETO', 'DATOS DEL EQUIPAMIENTO SOLICITADO', true);
define('CYT_MSG_SOLICITUD_PDF_MONTO', 'COSTO TOTAL', true);
define('CYT_MSG_SOLICITUD_JUSTIFICACION', 'JUSTIFICACION Y ANTECEDENTES', true);
define('CYT_MSG_SOLICITUD_PDF_LUGAR', 'Lugar', true);
define('CYT_MSG_SOLICITUD_PDF_FECHA', 'Fecha', true);
define('CYT_MSG_SOLICITUD_DECLARACION_JURADA', 'La presente tiene carácter de declaración jurada.', true);
define('CYT_MSG_SOLICITUD_DECLARACION_JURADA_2', 'Declaración Jurada', true);
define('CYT_MSG_SOLICITUD_FIRMA_DIRECTOR_BECA', 'Aval del Dir. de Proy. Acreditado', true);

define('CYT_MSG_SOLICITUD_FIRMA_LUGAR', 'Lugar y Fecha', true);
define('CYT_MSG_SOLICITUD_FIRMA_ACLARACION', 'Firma y Aclaración', true);
define('CYT_MSG_SOLICITUD_FIRMA_AVAL', 'Aval del responsable U. de Investigación', true);
define('CYT_MSG_SOLICITUD_FIRMA_AVAL_DECANO', 'Aval del Decano', true);
define('CYT_MSG_SOLICITUD_FIRMA', 'Firma', true);
define('CYT_MSG_SOLICITUD_UNIVERSIDAD', 'UNIVERSIDAD', true);





//PDF evaluaciÃ³n

define('CYT_MSG_EVALUACION_PDF_HEADER_TITLE', 'PLANILLA DE EVALUACION', true);
define('CYT_MSG_EVALUACION_ANTEDENTES_ACADEMICOS', 'ANTECEDENTES ACADÃ‰MICOS DEL SOLICITANTE', true);
define('CYT_MSG_EVALUACION_SEPARADOR_NEGRO_1_1', 'P. Max/ITEM', true);
define('CYT_MSG_EVALUACION_SEPARADOR_NEGRO_1_2', 'DETALLE Y PUNTAJE', true);
define('CYT_MSG_EVALUACION_SEPARADOR_NEGRO_1_3', 'P. OTORGADO', true);
define('CYT_MSG_EVALUACION_PLAN_TRABAJO', 'PLAN DE TRABAJO', true);
define('CYT_MSG_EVALUACION_MAX', 'Max.', true);
define('CYT_MSG_EVALUACION_PT', 'pt.', true);
define('CYT_MSG_EVALUACION_CV_VISITANTE', 'Y CV DEL VISITANTE', true);
define('CYT_MSG_EVALUACION_CATEGORIA', 'CATEGORIA', true);
define('CYT_MSG_EVALUACION_CARGO', 'CARGO DOCENTE', true);
define('CYT_MSG_EVALUACION_CARGO_ACTUAL', 'ACTUAL EN LA UNLP', true);
define('CYT_MSG_EVALUACION_CANT', 'Cant.', true);
define('CYT_MSG_EVALUACION_CV_SOLICITANTE', 'DEL SOLIC.', true);
define('CYT_MSG_EVALUACION_5_YEARS', '5 AÃ‘OS', true);
define('CYT_MSG_EVALUACION_SUBTOTAL', 'Subtotal', true);
define('CYT_MSG_EVALUACION_PROD_ULTIMOS', 'PROD. ULTIMOS', true);
define('CYT_MSG_EVALUACION_HASTA', 'Hasta', true);
define('CYT_MSG_EVALUACION_C_U', 'c/u', true);
define('CYT_MSG_EVALUACION_FORMACION', 'FORMACION', true);
define('CYT_MSG_EVALUACION_RR_HH', 'RECURSOS HUMANOS', true);
define('CYT_MSG_EVALUACION_TOTAL', 'TOTAL', true);
define('CYT_MSG_EVALUACION_OBSERVACIONES', 'Observaciones', true);
define('CYT_MSG_EVALUACION_FIRMA', 'Firma Evaluador', true);
define('CYT_MSG_EVALUACION_ACLARACION', 'AclaraciÃ³n', true);
define('CYT_MSG_EVALUACION_ANTEDENTES_DOCENTES', 'ANTECEDENTES DOCENTES', true);
define('CYT_MSG_EVALUACION_ANTEDENTES_DOCENTES_DESCRIPCION', 'Se asignarÃ¡ el puntaje correspondiente a la mÃ¡xima categorÃ­a alcanzada.', true);
define('CYT_MSG_EVALUACION_OTROS_ANTEDENTES', 'OTROS ANTECEDENTES', true);
define('CYT_MSG_EVALUACION_PRODUCCION_CIENTIFICA', 'FORMACIÃ“N DE RR.HH. Y PRODUCCIÃ“N CIENTÃ�FICA EN LOS ULTIMOS 5 AÑOS', true);
define('CYT_MSG_EVALUACION_JUSTIFICACION', 'JUSTIFICACIÃ“N TÃ‰CNICA DEL SUBSIDIO SOLICITADO ', true);
define('CYT_MSG_EVALUACION_FACTOR_DESCRIPCION_1', 'Se aplicarÃ¡ un "factor de eficiencia" F que multiplicarÃ¡ al resultado de la suma de los puntajes correspondientes a A.1), A.2) y A.3): Llamando G al nÃºmero de aÃ±os transcurridos desde la obtenciÃ³n del tÃ­tulo de grado.', true);
define('CYT_MSG_EVALUACION_FACTOR_DESCRIPCION_2', 'Si ya obtuvo el grado acadÃ©mico superior de la especialidad, o G<6 entonces F=1', true);
define('CYT_MSG_EVALUACION_FACTOR_DESCRIPCION_3', 'Si aÃºn no obtuvo el grado acadÃ©mico superior de la especialidad y G>=6 entonces: SI 6=< G <7 entonces F=0.9 -- SI 7=< G <8 entonces F=0.8 -- SI 8=< G <9 entonces F=0.7 -- SI 9=< G <10 entonces F=0.6 -- SI G>=10 entonces F=0.5', true);
define('CYT_MSG_EVALUACION_POSGRADO_PDF', 'PG. Sup.', true);


?>