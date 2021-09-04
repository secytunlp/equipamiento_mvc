<?php


//envío de emails.


//desarrollo.
define('CDT_POP_MAIL_FROM', 'marcosp@presi.unlp.edu.ar');
define('CDT_POP_MAIL_FROM_NAME', 'Subsidios Ciencia y Técnica U.N.L.P.');
define('CDT_POP_MAIL_HOST', 'smtp.presi.unlp.edu.ar');
define('CDT_POP_MAIL_PORT', '465');
define('CDT_POP_MAIL_SMTP_SECURE', 'ssl');
define('CDT_POP_MAIL_USERNAME', 'marcosp');
define('CDT_POP_MAIL_PASSWORD', 'elMaster1');
define('CDT_MAIL_ENVIO_POP', true);

define("CDT_DEBUG_LOG", true);
define("CDT_ERROR_LOG", true);
define("CDT_MESSAGE_LOG", true);
define("CDT_TEST_MODE", true);

define('CYT_DATE_FORMAT', 'd/m/Y');
define('CYT_DATETIME_FORMAT', 'd/m/Y H:i:s');
define('CYT_DATETIME_FORMAT_STRING', 'YmdHis');



//lista de permisos
define('CYT_FUNCTION_AGREGAR_SOLICITUD', '60');
define('CYT_FUNCTION_LISTAR_ESTADO', '65');
define('CYT_FUNCTION_VER_PUNTAJE', '66');
define('CYT_FUNCTION_VER_ANTERIORES', '67');
define('CYT_FUNCTION_ENVIAR_SOLICITUD', '68');
define('CYT_FUNCTION_ADMITIR_SOLICITUD', '69');
define('CYT_FUNCTION_RECHAZAR_SOLICITUD', '70');
define('CYT_FUNCTION_VER_EVALUACION', '76');
define('CYT_FUNCTION_EVALUAR_SOLICITUD', '74');

define('CYT_PERIODO_INICIAL', '2010');

define('CYT_PERIODO_YEAR', '2017');
define('CYT_RANGO_INI', '01/07/');
define('CYT_RANGO_FIN', '30/06/');
define('CYT_RANGO_INGRESO', '01/01/');
define('CYT_YEAR_INGRESO_ATRAS', '4');
define('CYT_DIA_MES_BECA', '-03-31');
define('CYT_DIA_MES_EDAD', '-12-30');
define('CYT_FIN_EDAD', '31/12/');
define('CYT_EDAD_TOPE', 35);
define('CYT_DIFERENCIA', 15);
define('CYT_PERIODO_ANTERIORES_OTORGADOS', '2');
define('CYT_MONTO_MAXIMO', 25000);
define('CYT_RESUMEN_PALABRAS_MAXIMO', 300);
define('CYT_DIAS_YEAR', 360);
define('CYT_YEARS_PROYECTOS', 1);


define('CYT_TIPO_INVESTIGADOR_MOSTRADOS', '3,4');

define('CYT_FECHA_CIERRE', '2017-09-18');
define('CYT_PROYECTO_RANGO_INI', '01/01/1994');
define('CYT_PROYECTO_RANGO_FIN', '31/12/2009');

define('CYT_BECA_RANGO_FIN', '01/04/2011');

define('CYT_LONGITUD_EVALUACION_LINEA', 105);

define('CYT_CD_OTROS', 'Otros');

define('CYT_CD_GROUPS_MOSTRAR', '3,4,8,9,10,11');


?>