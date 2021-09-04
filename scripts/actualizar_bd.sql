CREATE TABLE `cyt_tipo_equipo` (
	`oid` INT(20) NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(100) NULL DEFAULT NULL,
	PRIMARY KEY (`oid`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

INSERT INTO `cyt_tipo_equipo` (`nombre`) VALUES ('Equipo nuevo');
INSERT INTO `cyt_tipo_equipo` (`nombre`) VALUES ('Accesorios o repuestos');

CREATE TABLE cyt_solicitudequipamiento (
	cd_solicitud INT(11) NOT NULL AUTO_INCREMENT,
	`cd_docente` INT(11) NOT NULL,
	`cd_periodo` INT(11) NOT NULL,
	`ds_mail` VARCHAR(255) NULL DEFAULT NULL,
	`nu_telefono` VARCHAR(50) NULL DEFAULT NULL,
	`dt_fecha` DATETIME NULL DEFAULT NULL,
	`dt_nacimiento` DATE NULL DEFAULT NULL,
	`ds_calle` VARCHAR(255) NULL DEFAULT NULL,
	`nu_nro` VARCHAR(20) NULL DEFAULT NULL,
	`nu_piso` VARCHAR(20) NULL DEFAULT NULL,
	`ds_depto` VARCHAR(20) NULL DEFAULT NULL,
	`nu_cp` VARCHAR(20) NULL DEFAULT NULL,
	`ds_titulogrado` VARCHAR(255) NULL DEFAULT NULL,
	`ds_tituloposgrado` VARCHAR(255) NULL DEFAULT NULL,
	`unidad_oid` INT(11) NULL DEFAULT NULL,
	`nu_nivelunidad` INT(11) NULL DEFAULT NULL,
	`cargo_oid` INT(11) NULL DEFAULT NULL,
	`deddoc_oid` INT(11) NULL DEFAULT NULL,
	`facultad_oid` INT(11) NULL DEFAULT NULL,
	`facultadplanilla_oid` INT(11) NULL DEFAULT NULL,
	`bl_becario` BINARY(1) NOT NULL DEFAULT '0',
	`bl_unlp` BINARY(1) NOT NULL,
	`ds_tipobeca` VARCHAR(255) NULL DEFAULT NULL,
	`ds_orgbeca` VARCHAR(255) NULL DEFAULT NULL,
	`unidadbeca_oid` INT(11) NULL DEFAULT NULL,
	`dt_becadesde` DATE NULL DEFAULT NULL,
	`dt_becahasta` DATE NULL DEFAULT NULL,
	`bl_carrera` BINARY(1) NOT NULL,
	`carrerainv_oid` INT(11) NULL DEFAULT NULL,
	`organismo_oid` INT(11) NULL DEFAULT NULL,
	`unidadcarrera_oid` INT(11) NULL DEFAULT NULL,
	`dt_ingreso` DATE NULL DEFAULT NULL,
	`dt_egresogrado` DATE NULL DEFAULT NULL,
	`dt_egresoposgrado` DATE NULL DEFAULT NULL,
	`categoria_oid` INT(11) NULL DEFAULT NULL,
	`tipoinvestigador_oid` INT(11) NULL DEFAULT NULL,
	`nu_monto` FLOAT NOT NULL,
	`ds_presupuesto` TEXT NULL,
	`ds_curriculum` VARCHAR(255) NULL DEFAULT NULL,
	`nu_puntaje` FLOAT NULL DEFAULT NULL,
	`nu_diferencia` FLOAT NULL DEFAULT NULL,
	`ds_observaciones` TEXT NULL,
	`bl_notificacion` BINARY(1) NOT NULL DEFAULT '0',
	`ds_justificacion` TEXT NULL,
	`ds_investigadores` TEXT NULL,
	`ds_produccion` TEXT NULL,
	`ds_logros` TEXT NULL,
	`titulogrado_oid` INT(11) NULL DEFAULT NULL,
	`tituloposgrado_oid` INT(11) NULL DEFAULT NULL,
	`ds_disciplina` VARCHAR(255) NULL DEFAULT NULL,
	`tipoequipo_oid` INT(11) NULL DEFAULT NULL,
	`ds_denominacionequipo` TEXT NULL,
	PRIMARY KEY (cd_solicitud)
	
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_docente` FOREIGN KEY (`cd_docente`) REFERENCES `docente` (`cd_docente`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_periodo` FOREIGN KEY (`cd_periodo`) REFERENCES `periodo` (`cd_periodo`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_unidad` FOREIGN KEY (`unidad_oid`) REFERENCES `unidad` (`cd_unidad`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_cargo` FOREIGN KEY (`cargo_oid`) REFERENCES `cargo` (`cd_cargo`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_deddoc` FOREIGN KEY (`deddoc_oid`) REFERENCES `deddoc` (`cd_deddoc`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_facultad` FOREIGN KEY (`facultad_oid`) REFERENCES `facultad` (`cd_facultad`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_facultad_2` FOREIGN KEY (`facultadplanilla_oid`) REFERENCES `facultad` (`cd_facultad`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_unidad_2` FOREIGN KEY (`unidadbeca_oid`) REFERENCES `unidad` (`cd_unidad`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_unidad_3` FOREIGN KEY (`unidadcarrera_oid`) REFERENCES `unidad` (`cd_unidad`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_categoria` FOREIGN KEY (`categoria_oid`) REFERENCES `categoria` (`cd_categoria`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_tipoinvestigador` FOREIGN KEY (`tipoinvestigador_oid`) REFERENCES `tipoinvestigador` (`cd_tipoinvestigador`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_titulo` FOREIGN KEY (`titulogrado_oid`) REFERENCES `titulo` (`cd_titulo`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_titulo_2` FOREIGN KEY (`tituloposgrado_oid`) REFERENCES `titulo` (`cd_titulo`);

ALTER TABLE `cyt_solicitudequipamiento`
	ADD CONSTRAINT `FK_cyt_solicitudequipamiento_cyt_tipo_equipo` FOREIGN KEY (`tipoequipo_oid`) REFERENCES `cyt_tipo_equipo` (`oid`);
	
CREATE TABLE cyt_solicitudequipamiento_estado (
  oid bigint(20) NOT NULL auto_increment,
  solicitud_oid int(11) default NULL,
  estado_oid int(11) default NULL,
  fechaDesde datetime default NULL,
  fechaHasta datetime default NULL,
  motivo text default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY solicitud_oid (solicitud_oid),
  KEY estado_oid (estado_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

ALTER TABLE cyt_solicitudequipamiento_estado ADD FOREIGN KEY ( solicitud_oid ) REFERENCES cyt_solicitudequipamiento (
cd_solicitud
);

ALTER TABLE cyt_solicitudequipamiento_estado ADD FOREIGN KEY ( estado_oid ) REFERENCES estado (
cd_estado
);

ALTER TABLE cyt_solicitudequipamiento_estado ADD FOREIGN KEY ( user_oid ) REFERENCES cyt_user (
oid
);

CREATE TABLE `cyt_solicitudequipamientoproyecto` (
	`oid` INT(11) NOT NULL AUTO_INCREMENT,
	`solicitud_oid` INT(11) NOT NULL,
	`proyecto_oid` INT(11) NULL DEFAULT '0',
	`dt_alta` DATE NULL DEFAULT NULL,
	`dt_baja` DATE NULL DEFAULT NULL,
	`bl_elegido` BINARY(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (`oid`)
	
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

ALTER TABLE `cyt_solicitudequipamientoproyecto`
	ADD CONSTRAINT `FK_cyt_solicitudequipamientoproyecto_cyt_solicitudequipamiento` FOREIGN KEY (`solicitud_oid`) REFERENCES `cyt_solicitudequipamiento` (cd_solicitud);

ALTER TABLE `cyt_solicitudequipamientoproyecto`
	ADD CONSTRAINT `FK_cyt_solicitudequipamientoproyecto_proyecto` FOREIGN KEY (`proyecto_oid`) REFERENCES `proyecto` (`cd_proyecto`);



