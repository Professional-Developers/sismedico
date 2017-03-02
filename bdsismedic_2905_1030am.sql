-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2016 a las 17:28:23
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdsismedic`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Paciente_Ins`(
IN `p_nCodigoLocalRegistro` INT, /*0*/
 IN `p_nCodigoLocalAtencion` INT,   /*1*/
  IN `p_vNombre` VARCHAR(200),      /*2*/
IN `p_vApellidosPaterno` VARCHAR(200),/*3*/
 IN `p_vApellidosMaterno` VARCHAR(200),/*4*/
 IN `p_dFechaNacimiento` VARCHAR(10),  /*5*/
  IN `p_vDireccion` VARCHAR(200),      /*6*/
IN `p_vObservaciones` VARCHAR(200),    /*7*/
 IN `p_cGenero` CHAR(1),               /*8*/
 IN `p_vMedioContactoFavorito` VARCHAR(200),/*9*/
IN `p_cEsMoroso` CHAR(1),              /*10*/
 IN `p_iFoto` VARCHAR(200),            /*11*/
 IN `p_vDNI` VARCHAR(8),               /*12*/
 IN `p_vLugarTrabajo` VARCHAR(200),    /*13*/
IN `p_vProcedencia` VARCHAR(200),      /*14*/
IN `p_nEstadoCivil` INT,               /*15*/
IN `p_vOcupacion` VARCHAR(200),        /*16*/
IN `p_nUsuarioCrea` INT,               /*17*/
 IN `p_vCorreo` VARCHAR(200),          /*18*/
  IN `p_vHCL` VARCHAR(200),            /*19*/
OUT `p_nCodigoPaciente` INT)
BEGIN
	
	DECLARE nEstadoActivo INT DEFAULT 0;
    DECLARE Cant INT DEFAULT 0;

    SELECT nCodigoGenerica INTO nEstadoActivo FROM generica WHERE vDescripcionTipo = 'EstadoRegistro' AND nValor = 'Activo' AND nEstado = 1 LIMIT 1;

    /*cuenta del dia de hoy los registros*/
   select count(*) into Cant from paciente
where vCodigoPaciente REGEXP '^'+year(now());
        
	INSERT INTO paciente 
    (
		nCodigoLocalRegistro ,
		nCodigoLocalAtencion , 
		vNombre ,  
		vApellidosPaterno , 
		vApellidosMaterno , 
		dFechaNacimiento , 
		vDireccion , 
		vObservaciones , 
		cGenero , 
		vMedioContactoFavorito , 
		cEsMoroso,
		iFoto ,
		vDNI , 
		vLugarTrabajo, 
		vProcedencia , 
		nEstadoCivil , 
		vOcupacion,
        nEstado,
        dFechaCrea,
        nUsuarioCrea,
        vCorreo,
        vCodigoPaciente
    )
    VALUES
    (
		p_nCodigoLocalRegistro , 
		p_nCodigoLocalAtencion ,
		p_vNombre ,  
		p_vApellidosPaterno , 
		p_vApellidosMaterno , 
		p_dFechaNacimiento , 
		p_vDireccion ,
		p_vObservaciones , 
		p_cGenero , 
		p_vMedioContactoFavorito , 
		p_cEsMoroso, 
		p_iFoto , 
		p_vDNI , 
		p_vLugarTrabajo, 
		p_vProcedencia , 
		p_nEstadoCivil , 
		p_vOcupacion,
        nEstadoActivo,
        now(),
        p_nUsuarioCrea,
        p_vCorreo,
        CONCAT(p_vHCL,lpad(Cant+1,4,0))
    );
    
    set p_nCodigoPaciente = LAST_INSERT_ID();
    /*set p_nCodigoPaciente = 5;*/
   
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_EMP_S_EMPRESAS`(IN accion int)
select *
from empresa p
order by 1 desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_DICCIONARIO_DATOS_P2`(
in $Accion varchar(200),
in $Criterio varchar(100)
)
begin
/*
if $Accion='L-DD-General' then
select * from diccionario_datos where cDidDescripcion like concat('%',$Criterio,'%');
elseif  $Accion='L-DD-Combo' then
select * from diccionario_datos where nDidIDPadre=cast($Criterio as Unsigned) and cDidEstado='H';
end if;
*/
if $Accion='L-DD-General' then
select * from multitabla where cMulDescripcion like concat('%',$Criterio,'%');
elseif  $Accion='L-DD-Combo' then
select * from multitabla where nMulIdPadre=cast($Criterio as Unsigned) and nMulEstado='A'
and nMulOrden<>0;
/*elseif $Accion='L-DD-ComboParticular' then
select * from multitabla where nMulIdPadre=cast($Criterio as Unsigned) and nMulEstado='A'
and nMulOrden=-1;*/
end if;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_I_CORREOPACIENTE`(
/*in p_nCodigoRedSocial INT,*/
in p_nCodigoPaciente INT,
in p_nTipoRedSocial INT,
in p_vTipoRedSocial VARCHAR(200),
in p_vTitular VARCHAR(200),
in p_bPrincipal CHAR(1),
in p_vDireccion varchar(200)
)
BEGIN
	INSERT INTO redsocialpaciente
    (nCodigoPaciente,vDireccion        ,nTipoRedSocial, vTipoRedSocial, vTitular, bPrincipal)
    VALUES
    (p_nCodigoPaciente,p_vDireccion,p_nTipoRedSocial,p_vTipoRedSocial,p_vTitular,p_bPrincipal);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_I_PACIENTE`(
IN `p_nCodigoLocalRegistro` INT, /*0*/
 IN `p_nCodigoLocalAtencion` INT,   /*1*/
  IN `p_vNombre` VARCHAR(200),      /*2*/
IN `p_vApellidosPaterno` VARCHAR(200),/*3*/
 IN `p_vApellidosMaterno` VARCHAR(200),/*4*/
 IN `p_dFechaNacimiento` VARCHAR(10),  /*5*/
  IN `p_vDireccion` VARCHAR(200),      /*6*/
IN `p_vObservaciones` VARCHAR(200),    /*7*/
 IN `p_cGenero` CHAR(1),               /*8*/
 IN `p_vMedioContactoFavorito` VARCHAR(200),/*9*/
IN `p_cEsMoroso` CHAR(1),              /*10*/
 IN `p_iFoto` VARCHAR(200),            /*11*/
 IN `p_vDNI` VARCHAR(8),               /*12*/
 IN `p_vLugarTrabajo` VARCHAR(200),    /*13*/
IN `p_vProcedencia` VARCHAR(200),      /*14*/
IN `p_nEstadoCivil` INT,               /*15*/
IN `p_vOcupacion` VARCHAR(200),        /*16*/
IN `p_nUsuarioCrea` INT,               /*17*/
 IN `p_vCorreo` VARCHAR(200),          /*18*/
  IN `p_vHCL` VARCHAR(200),            /*19*/
OUT `p_nCodigoPaciente` INT)
BEGIN

	DECLARE nEstadoActivo INT DEFAULT 0;
    DECLARE Cant INT DEFAULT 0;
  DECLARE VCODIGO varchar(200);


    SELECT nCodigoGenerica INTO nEstadoActivo FROM generica WHERE vDescripcionTipo = 'EstadoRegistro' AND nValor = 'Activo' AND nEstado = 1 LIMIT 1;

    /*cuenta del dia de hoy los registros*/
   select count(*) into Cant from paciente
where vCodigoPaciente REGEXP '^'+year(now());

set VCODIGO= CONCAT(p_vHCL,lpad(Cant+1,4,0));

	INSERT INTO paciente
    (
		nCodigoLocalRegistro ,
		nCodigoLocalAtencion ,
		vNombre ,
		vApellidosPaterno ,
		vApellidosMaterno ,
		dFechaNacimiento ,
		vDireccion ,
		vObservaciones ,
		cGenero ,
		vMedioContactoFavorito ,
		cEsMoroso,
		iFoto ,
		vDNI ,
		vLugarTrabajo,
		vProcedencia ,
		nEstadoCivil ,
		vOcupacion,
        nEstado,
        dFechaCrea,
        nUsuarioCrea,
        vCorreo,
        vCodigoPaciente
    )
    VALUES
    (
		p_nCodigoLocalRegistro ,
		p_nCodigoLocalAtencion ,
		p_vNombre ,
		p_vApellidosPaterno ,
		p_vApellidosMaterno ,
		p_dFechaNacimiento ,
		p_vDireccion ,
		p_vObservaciones ,
		p_cGenero ,
		p_vMedioContactoFavorito ,
		p_cEsMoroso,
		p_iFoto ,
		p_vDNI ,
		p_vLugarTrabajo,
		p_vProcedencia ,
		p_nEstadoCivil ,
		p_vOcupacion,
        nEstadoActivo,
        now(),
        p_nUsuarioCrea,
        p_vCorreo,
        VCODIGO
    );
/*        CONCAT(p_vHCL,lpad(Cant+1,4,0))*/
/*    set p_nCodigoPaciente = LAST_INSERT_ID();*/


set p_nCodigoPaciente = LAST_INSERT_ID();

/*set p_nCodigoPaciente = VCODIGO;*/



    /*set p_nCodigoPaciente = 5;*/


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_I_TELEFONOPACIENTE`(
/*in p_nCodigoTelefono int,*/
in p_nCodigoPaciente int,
in p_nCodigoOperador int,
in p_vDescripcionOperador varchar(200),
in p_nTipoTelefono int,
in p_vTipoTelefono varchar(100),
in p_bEsWhatsapp char(1),
in p_vTitular varchar(200),
in p_vTelefono varchar(100)
)
BEGIN


	INSERT INTO telefonopaciente(
  nCodigoPaciente,
  nCodigoOperador,
  vDescripcionOperador,
  nTipoTelefono,
  VTipoTelefono,
  bEsWhatsapp,
  vTitular,
  vTelefono
 )
    VALUES (
      			p_nCodigoPaciente
            ,p_nCodigoOperador
            ,p_vDescripcionOperador
            ,p_nTipoTelefono
            ,p_vTipoTelefono
            ,p_bEsWhatsapp
            ,p_vTitular
            ,p_vTelefono);

/*  select 1 as resultado;*/

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_S_GET_CORREOS`( IN p_codigocorreo int)
SELECT * FROM redsocialpaciente where nCodigoRedSocial= p_codigocorreo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_S_GET_INFORMACION`(IN p_ncodigopaciente int)
select
    nCodigoPaciente,
    nCodigoLocalRegistro ,
		nCodigoLocalAtencion , 
		vNombre ,
		vApellidosPaterno ,
		vApellidosMaterno , 
		dFechaNacimiento ,
		vDireccion , 
		vObservaciones , 
		cGenero ,
		vMedioContactoFavorito , 
		cEsMoroso,
		iFoto ,
		vDNI ,
		vLugarTrabajo,
		vProcedencia ,
		nEstadoCivil ,
		vOcupacion,
        nEstado,
        dFechaCrea,
        nUsuarioCrea,
        vCorreo,
        vCodigoPaciente
from paciente
where nCodigoPaciente=p_ncodigopaciente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_S_GET_TELEFONOS`( IN p_codigotelefono int)
SELECT * FROM telefonopaciente where nCodigoTelefono= p_codigotelefono$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_S_PACIENTECORREOS`(IN `p_tipo` VARCHAR(5), IN p_ncodigopaciente int)
BEGIN
IF p_tipo='CBO' THEN -- COMBO ROLEs
    /*SELECT * FROM telefonopaciente;*/
    select * from redsocialpaciente;
ELSE
      /*SELECT * FROM telefonopaciente where nCodigoPaciente= p_ncodigopaciente;*/
    select * from redsocialpaciente where nCodigoPaciente= p_ncodigopaciente;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_S_PACIENTES`(IN `p_tipo` VARCHAR(5))
BEGIN
IF p_tipo='CBO' THEN -- COMBO
    select nIdRol,cNombre,nEstado
 from
rol
where nEstado=1
order by nIdRol desc;
ELSE
    select * from paciente order by nCodigoPaciente desc;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_S_PACIENTETELEFONOS`(IN `p_tipo` VARCHAR(5), IN p_ncodigopaciente int)
BEGIN
IF p_tipo='CBO' THEN -- COMBO ROLEs
    SELECT * FROM telefonopaciente;
ELSE
      SELECT * FROM telefonopaciente where nCodigoPaciente= p_ncodigopaciente;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_U_CORREOPACIENTE`(
/*in p_nCodigoTelefono int,*/
in p_nCodigoPaciente INT,
in p_nTipoRedSocial INT,
in p_vTipoRedSocial VARCHAR(200),
in p_vTitular VARCHAR(200),
in p_bPrincipal CHAR(1),
in p_vDireccion varchar(200),
in p_nCodigoRedSocial INT

)
BEGIN

update redsocialpaciente
set
vDireccion=p_vDireccion,
nTipoRedSocial=p_nTipoRedSocial,
vTipoRedSocial=p_vTipoRedSocial,
vTitular=p_vTitular,
bPrincipal=p_bPrincipal
where nCodigoRedSocial= p_nCodigoRedSocial;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_U_PACIENTE`(
IN `p_nCodigoLocalRegistro` INT, /*0*/
 IN `p_nCodigoLocalAtencion` INT,   /*1*/
  IN `p_vNombre` VARCHAR(200),      /*2*/
IN `p_vApellidosPaterno` VARCHAR(200),/*3*/
 IN `p_vApellidosMaterno` VARCHAR(200),/*4*/
 IN `p_dFechaNacimiento` VARCHAR(10),  /*5*/
  IN `p_vDireccion` VARCHAR(200),      /*6*/
IN `p_vObservaciones` VARCHAR(200),    /*7*/
 IN `p_cGenero` CHAR(1),               /*8*/
 IN `p_vMedioContactoFavorito` VARCHAR(200),/*9*/
IN `p_cEsMoroso` CHAR(1),              /*10*/
 IN `p_iFoto` VARCHAR(200),            /*11*/
 IN `p_vDNI` VARCHAR(8),               /*12*/
 IN `p_vLugarTrabajo` VARCHAR(200),    /*13*/
IN `p_vProcedencia` VARCHAR(200),      /*14*/
IN `p_nEstadoCivil` INT,               /*15*/
IN `p_vOcupacion` VARCHAR(200),        /*16*/
IN `p_nUsuarioCrea` INT,               /*17*/
 IN `p_vCorreo` VARCHAR(200),          /*18*/
IN `p_vHCL` VARCHAR(200),            /*19*/
IN `p_nCodigoPacienteOriginal` VARCHAR(200),            /*19*/
OUT `p_nCodigoPaciente` INT)
BEGIN

update paciente
set nCodigoLocalRegistro=p_nCodigoLocalRegistro,
nCodigoLocalAtencion=p_nCodigoLocalAtencion,
vNombre=p_vNombre,
vApellidosPaterno=p_vApellidosPaterno,
vApellidosMaterno=p_vApellidosMaterno,
/*dFechaNacimiento*/
vDireccion=p_vDireccion,
vObservaciones=p_vObservaciones,
cGenero=p_cGenero,
iFoto=p_iFoto,
/*		vMedioContactoFavorito*/
cEsMoroso=p_cEsMoroso,
/*		iFoto*/
vDNI= p_vDNI,
vLugarTrabajo=p_vLugarTrabajo,
vProcedencia= p_vProcedencia,
nEstadoCivil= p_nEstadoCivil,
vOcupacion=p_vOcupacion,
/*nEstadoActivo que es el estado*/
/*dFechaCrea,
nUsuarioCrea,*/
vCorreo=p_vCorreo
where nCodigoPaciente=p_nCodigoPacienteOriginal;

/*update paciente
nCodigoLocalRegistro=p_nCodigoLocalRegistro,
nCodigoLocalAtencion=p_nCodigoLocalAtencion,
vNombre=p_vNombre,
vApellidosPaterno=p_vApellidosPaterno,
vApellidosMaterno=p_vApellidosMaterno,
dFechaNacimiento
vDireccion=p_vDireccion,
vObservaciones=p_vObservaciones,
cGenero=p_cGenero,
		vMedioContactoFavorito
cEsMoroso=p_cEsMoroso,
		iFoto
vDNI= p_vDNI,
vLugarTrabajo=p_vLugarTrabajo,
vProcedencia= p_vProcedencia,
nEstadoCivil= p_nEstadoCivil,
vOcupacion=p_vOcupacion,
nEstadoActivo que es el estado
dFechaCrea,
nUsuarioCrea,
vCorreo=p_vCorreo
where nCodigoPaciente=p_nCodigoPacienteOriginal*/

set p_nCodigoPaciente = p_nCodigoPacienteOriginal;
    /*set p_nCodigoPaciente = 5;*/


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PAC_U_TELEFONOPACIENTE`(
/*in p_nCodigoTelefono int,*/
in p_nCodigoPaciente int,
in p_nCodigoOperador int,
in p_vDescripcionOperador varchar(200),
in p_nTipoTelefono int,
in p_vTipoTelefono varchar(100),
in p_bEsWhatsapp char(1),
in p_vTitular varchar(200),
in p_vTelefono varchar(100)  ,
in p_nCodigoTelefono int

)
BEGIN

update telefonopaciente
set
nCodigoOperador=p_nCodigoOperador,
vDescripcionOperador=p_vDescripcionOperador,
nTipoTelefono=p_nTipoTelefono,
VTipoTelefono=p_vTipoTelefono,
bEsWhatsapp=p_bEsWhatsapp,
vTitular=p_vTitular,
vTelefono=  p_vTelefono
where nCodigoTelefono= p_nCodigoTelefono;

/*
	INSERT INTO telefonopaciente(
  nCodigoPaciente,
  nCodigoOperador,
  vDescripcionOperador,
  nTipoTelefono,
  VTipoTelefono,
  bEsWhatsapp,
  vTitular,
  vTelefono
 )
    VALUES (
      			p_nCodigoPaciente
            ,p_nCodigoOperador
            ,p_vDescripcionOperador
            ,p_nTipoTelefono
            ,p_vTipoTelefono
            ,p_bEsWhatsapp
            ,p_vTitular
            ,p_vTelefono);      */

/*  select 1 as resultado;*/

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PER_I_PERSONA`(
	-- IN nPerId int(11),
	IN v_cPerNombres varchar(50),
	IN v_cPerApellidoPaterno varchar(50),
	IN v_cPerApellidoMaterno varchar(50),
	IN v_cPerDni char(8),
	IN v_cPerDireccion varchar(90),
	IN v_cPerTelefono varchar(20),
	IN v_cPerCelular varchar(11)
)
BEGIN
	INSERT INTO persona(cPerNombres, cPerApellidoPaterno, cPerApellidoMaterno, cPerDni, cPerDireccion, cPerTelefono, cPerCelular,cPerEstado)
	VALUES( v_cPerNombres,v_cPerApellidoPaterno,v_cPerApellidoMaterno,v_cPerDni,v_cPerDireccion,v_cPerTelefono,v_cPerCelular,'1');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PER_S`(IN `p_tipo` VARCHAR(5))
BEGIN
IF p_tipo='LPU' THEN -- Lista Personas Con Usuarios 
    SELECT p.nPerId,u.nUsuCodigo,p.cPerNombres,p.cPerApellidoPaterno,
        p.cPerApellidoMaterno,p.cPerDni,
        u.cUsuClave,
        r.cNombre as rol, r.nIdRol
    from persona p 
        INNER JOIN usuario u ON p.nPerId = u.nPerId
        INNER JOIN rol r on r.nIdRol=u.nIdRol
    WHERE p.cPerEstado ='1' and u.cUsuEstado = '1';
ELSE
    SELECT nPerId,cPerNombres,cPerApellidoPaterno,cPerApellidoMaterno,cPerDni,
    cPerDireccion,cPerTelefono,cPerCelular,cPerEstado from persona;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PER_S_DNI`(IN `v_cPerDni` VARCHAR(8))
BEGIN
    SELECT 
        p.nPerId,p.cPerNombres,p.cPerApellidoPaterno,p.cPerApellidoMaterno, p.cPerDni 
    FROM persona p where p.cPerDni =v_cPerDni and nPerId NOT IN (select nPerId from usuario) ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_ROL_S_ROLES`(IN `p_tipo` VARCHAR(5))
BEGIN
IF p_tipo='CBO' THEN -- COMBO ROLEs
    select nIdRol,cNombre,nEstado
 from
rol
where nEstado=1
order by nIdRol desc;
ELSE
    select nIdRol,cNombre,nEstado
 from
rol
where nEstado=1
order by nIdRol desc;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_COMBOS_MULTITABLA`(
    IN v_nMulIdPadre int,
    IN v_Tipo VARCHAR(10)
)
BEGIN
    IF v_Tipo = 'LTU' THEN -- Lista Tipos de Usuarios
--        select nMulId as codx,cMulDescripcion as dato from multitabla where nMulIdPadre = v_nMulIdPadre
        select nMulId,cMulDescripcion from multitabla where nMulIdPadre = v_nMulIdPadre
         and nMulOrden <>0 and nMulEstado='A';
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_GENERICOS`(
in $Accion varchar(200),
in $Criterio varchar(100)
)
begin
/*USP_GEN_S_DICCIONARIO_DATOS_P2*/
if $Accion='L-DD-General' then
/*select * from multitabla where cMulDescripcion like concat('%',$Criterio,'%');*/
select * from generica;
elseif  $Accion='L-DD-Combo' then
select * from generica where vDescripcionTipo=$Criterio and nEstado=1;
/*select * from multitabla where nMulIdPadre=cast($Criterio as Unsigned) and nMulEstado='A'
and nMulOrden<>0;*/

end if;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_LOCALES`(
    IN p_opt VARCHAR(20)
)
BEGIN
    IF p_opt='COMBO-ACTIVOS' THEN -- Lista LOCALES ACTIVO
      select nCodigoLocal,vDescripcionLocal from local where   nEstado=5;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_MENU`(
    IN p_opt VARCHAR(3),
    IN p_criterio INT
)
BEGIN
    IF p_opt='LXM' THEN -- Lista Menus de Modulo
--        SELECT nMenId,cMenMenu,cMenUrl,cMenOrden FROM menu where nModId = p_criterio AND cMenActivo = 0 ;
        SELECT nMenId,cMenMenu,cMenUrl,cMenOrden FROM menu where nModId = p_criterio;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_MODULOS`()
BEGIN
    SELECT nModId,cModModulo,nModOrden,cModIcono FROM modulo ORDER BY nModOrden DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_PERMISOS`(
IN p_nUsuCodigo INT
)
BEGIN
    select nMenId from permiso where nUsuCodigo=p_nUsuCodigo AND cPermActivo=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_PERMISOS_ROL`(
IN p_idrol INT
)
BEGIN
     /*select nMenId from permiso where nUsuCodigo=p_nUsuCodigo AND cPermActivo=1;*/
    select nMenId from permisorol where nIdRol=p_idrol and cPermActivo=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_S_PERMISOS_USUARIO`(
IN p_nUsuCodigo INT
)
BEGIN
    select nMenId from permiso where nUsuCodigo=p_nUsuCodigo AND cPermActivo=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_USU_I_REGISTRAR`(
IN v_nPerId INT,
IN v_cUsuUsuario varchar(100),
IN v_cUsuClave varchar(100),
IN v_nidRol int
)
BEGIN
-- IF v_UsuTipo

INSERT INTO `usuario`
(
`nPerId`,
`cUsuUsuario`,
`cUsuClave`,
`cUsuEstado`,
`nIdRol`
)
VALUES
(
v_nPerId,
v_cUsuUsuario,
v_cUsuClave,
'1',
v_nidRol
);


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
`nEmpId` int(11) NOT NULL,
  `cEmpNombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpDescripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpDireccionFiscal` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpTelefono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpCelular` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpEmail` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpRuc` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nIdRubro` int(11) DEFAULT NULL,
  `cEmpLogoChico` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpLogoGrande` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cEmpLogoFondo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nEmpPropia` int(11) DEFAULT NULL COMMENT '1=si,0=no',
  `cEmpEstado` int(11) DEFAULT NULL COMMENT '1=activo,0=inactivo'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`nEmpId`, `cEmpNombre`, `cEmpDescripcion`, `cEmpDireccionFiscal`, `cEmpTelefono`, `cEmpCelular`, `cEmpEmail`, `cEmpRuc`, `nIdRubro`, `cEmpLogoChico`, `cEmpLogoGrande`, `cEmpLogoFondo`, `nEmpPropia`, `cEmpEstado`) VALUES
(1, 'Sistema Medico Per', 'Sistema Medico', NULL, '261811', '987654321', 'empresa@gmail.com', '12346548', 1, 'ima1.jpg', 'ima1.jpg', 'ima1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generica`
--

CREATE TABLE IF NOT EXISTS `generica` (
  `nCodigoGenerica` int(11) NOT NULL,
  `vDescripcionTipo` varchar(200) DEFAULT NULL,
  `nCodigo` int(11) DEFAULT NULL,
  `nValor` varchar(200) DEFAULT NULL,
  `nEstado` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `generica`
--

INSERT INTO `generica` (`nCodigoGenerica`, `vDescripcionTipo`, `nCodigo`, `nValor`, `nEstado`) VALUES
(1, 'EstadoCivil', 1, 'Soltero(a)', '1'),
(2, 'EstadoCivil', 2, 'Casado(a)', '1'),
(3, 'EstadoCivil', 3, 'Viudo(a)', '1'),
(4, 'EstadoCivil', 4, 'Divorciado(a)', '1'),
(5, 'EstadoRegistro', 1, 'Activo', '1'),
(6, 'EstadoRegistro', 2, 'Inactivo', '1'),
(7, 'EstadoRegistro', 3, 'Bloqueado', '1'),
(8, 'OperadorTelefonico', 1, 'Movistar', '1'),
(9, 'OperadorTelefonico', 2, 'Claro', '1'),
(10, 'OperadorTelefonico', 3, 'Entel', '1'),
(11, 'OperadorTelefonico', 4, 'Bitel', '1'),
(13, 'Concepto', 1, 'Tratamiento', '1'),
(14, 'Concepto', 2, 'Profilaxis', '1'),
(15, 'Concepto', 3, 'Control', '1'),
(16, 'Concepto', 4, 'Operacion', '1'),
(17, 'Moneda', 1, 'Dólares', '1'),
(18, 'Moneda', 2, 'Soles', '1'),
(19, 'TipoEgreso', 1, 'Gasto Administrativo', '1'),
(20, 'TipoEgreso', 2, 'Pasajes', '1'),
(21, 'TipoEgreso', 3, 'Materiales Dentales', '1'),
(22, 'TipoEgreso', 4, 'Laboratorio', '1'),
(23, 'TipoEgreso', 5, 'Honorarios y Servicio Tecnico', '1'),
(24, 'TipoEgreso', 6, 'Servicios y Gastos Fijos', '1'),
(25, 'TipoEgreso', 7, 'Sueldo de Doctores y Personal', '1'),
(26, 'TipoPago', 1, 'Voucher Credito', '1'),
(27, 'TipoPago', 2, 'Mastercard', '1'),
(28, 'TipoPago', 3, 'Tarjeta Provisional', '1'),
(29, 'EstadoRegistro', 4, 'PENDIENTE', '1'),
(30, 'TipoPago', 4, 'Contado', '1'),
(31, 'EstadoRegistro', 5, 'CANCELADO', '1'),
(32, 'TipoPago', 5, 'Depósito en Cuenta', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE IF NOT EXISTS `local` (
  `nCodigoLocal` int(11) NOT NULL DEFAULT '0',
  `vDescripcionLocal` varchar(200) DEFAULT NULL,
  `vDireccion` varchar(200) DEFAULT NULL,
  `nEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`nCodigoLocal`, `vDescripcionLocal`, `vDireccion`, `nEstado`) VALUES
(1, 'Miraflores', '-', 5),
(2, 'San Isidro', '-', 5),
(3, 'San Miguel', '-', 5),
(4, 'Los Olivos', '-', 5),
(5, 'Huancayo', '-', 5),
(6, 'Tarapoto', '-', 5),
(7, 'San Conrado', '-', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`nMenId` int(11) NOT NULL,
  `nModId` int(11) NOT NULL,
  `cMenMenu` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cMenUrl` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `cMenOrden` tinyint(4) NOT NULL,
  `cMenActivo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `cMenSobreNombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`nMenId`, `nModId`, `cMenMenu`, `cMenUrl`, `cMenOrden`, `cMenActivo`, `cMenSobreNombre`) VALUES
(1, 1, 'Dashboard', 'principal', 1, '1', 'Menu Principal'),
(2, 2, 'Empresa', 'empresa', 2, '1', 'Datos Empresa'),
(3, 3, 'Usuario', 'usuario', 3, '1', 'Datos Usuario-Permisos'),
(4, 4, 'productos', 'productos', 4, '1', 'Productos'),
(5, 4, 'Persona', 'persona', 5, '1', 'Persona'),
(6, 5, 'Nuevo Paciente', 'paciente/nuevo', 6, '1', 'Nuevo Paciente'),
(7, 5, 'Listar Pacientes', 'paciente/listarpacientes', 2, '1', 'Listar Paciente'),
(8, 4, 'pruebas', 'paciente', 1, '1', 'Nuevo Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
`nModId` int(11) NOT NULL,
  `cModModulo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nModOrden` tinyint(4) DEFAULT NULL,
  `cModIcono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`nModId`, `cModModulo`, `nModOrden`, `cModIcono`) VALUES
(1, 'Principal', 1, 'fa-dashboard'),
(2, 'Empresa', 2, 'fa fa-bank'),
(3, 'Usuarios', 3, 'fa fa-child'),
(4, 'Mantenedores', 4, 'fa fa-steam'),
(5, 'Gestión Pacientes', 2, 'fa fa-child');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multitabla`
--

CREATE TABLE IF NOT EXISTS `multitabla` (
`nMulId` int(11) NOT NULL,
  `nMulIdPadre` int(11) NOT NULL,
  `cMulDescripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `dMulFechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nMulOrden` tinyint(4) NOT NULL,
  `nMulEstado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nMulParticularidad` int(10) DEFAULT NULL,
  `cMulPadre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `multitabla`
--

INSERT INTO `multitabla` (`nMulId`, `nMulIdPadre`, `cMulDescripcion`, `dMulFechaRegistro`, `nMulOrden`, `nMulEstado`, `nMulParticularidad`, `cMulPadre`) VALUES
(1, 1, 'TIPOS DE USUARIO', '2016-04-22 03:52:36', 0, 'A', NULL, 'TIPOUSUARIO'),
(2, 1, 'ADMINISTRADOR', '2016-04-22 03:52:37', 1, 'A', NULL, 'TIPOUSUARIO'),
(3, 1, 'CAJERO', '2016-04-22 03:52:37', 2, 'A', NULL, 'TIPOUSUARIO'),
(4, 1, 'DOCTOR', '2016-04-22 03:52:37', 3, 'A', NULL, 'TIPOUSUARIO'),
(5, 2, 'TIPO RUBRO', '2016-04-22 03:52:37', 0, 'A', NULL, 'TIPORUBRO'),
(6, 2, 'MEDICO', '2016-04-22 03:52:37', 1, 'A', NULL, 'TIPORUBRO'),
(7, 2, 'COMERCIO', '2016-04-22 03:52:37', 2, 'A', NULL, 'TIPORUBRO'),
(8, 3, 'TIPO SUCURSAL', '2016-04-22 03:56:09', 0, 'A', NULL, 'TIPOSUCURSAL'),
(9, 3, 'PROPIA', '2016-04-22 03:56:09', 1, 'A', NULL, 'TIPOSUCURSAL'),
(10, 3, 'ALQUILADA', '2016-04-22 03:56:09', 2, 'A', NULL, 'TIPOSUCURSAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
`nCodigoPaciente` int(11) NOT NULL,
  `nCodigoLocalRegistro` int(11) DEFAULT NULL,
  `nCodigoLocalAtencion` int(11) DEFAULT NULL,
  `vNombre` varchar(200) DEFAULT NULL,
  `vApellidosPaterno` varchar(200) DEFAULT NULL,
  `vApellidosMaterno` varchar(200) DEFAULT NULL,
  `dFechaNacimiento` date DEFAULT NULL,
  `vDireccion` varchar(200) DEFAULT NULL,
  `vObservaciones` varchar(200) DEFAULT NULL,
  `cGenero` char(1) DEFAULT NULL,
  `vMedioContactoFavorito` varchar(200) DEFAULT NULL,
  `cEsMoroso` char(1) DEFAULT NULL,
  `iFoto` varchar(200) DEFAULT NULL,
  `vDNI` varchar(8) DEFAULT NULL,
  `vLugarTrabajo` varchar(200) DEFAULT NULL,
  `vProcedencia` varchar(200) DEFAULT NULL,
  `nEstadoCivil` int(11) DEFAULT NULL,
  `vOcupacion` varchar(200) DEFAULT NULL,
  `nEstado` int(11) DEFAULT NULL,
  `dFechaCrea` date DEFAULT NULL,
  `dFechaModifica` date DEFAULT NULL,
  `nUsuarioCrea` int(11) DEFAULT NULL,
  `nUsuarioModifica` int(11) DEFAULT NULL,
  `vCorreo` varchar(200) DEFAULT NULL,
  `vCodigoPaciente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`nCodigoPaciente`, `nCodigoLocalRegistro`, `nCodigoLocalAtencion`, `vNombre`, `vApellidosPaterno`, `vApellidosMaterno`, `dFechaNacimiento`, `vDireccion`, `vObservaciones`, `cGenero`, `vMedioContactoFavorito`, `cEsMoroso`, `iFoto`, `vDNI`, `vLugarTrabajo`, `vProcedencia`, `nEstadoCivil`, `vOcupacion`, `nEstado`, `dFechaCrea`, `dFechaModifica`, `nUsuarioCrea`, `nUsuarioModifica`, `vCorreo`, `vCodigoPaciente`) VALUES
(1, 1, 1, 'Luis23', 'Gonzalez', 'Torres', '2016-05-15', 'Cajamarca 108', 'no hay', '1', 'Prueba', '0', '', '46088871', 'Viru', 'trujillo', 1, 'estudiante', 5, '2016-05-15', NULL, 1, NULL, 'correo', '2016050001'),
(2, 1, 1, 'andy', 'Gonzalez2', 'Torres2', '2016-05-15', 'Cajamarca 108', 'no hay', '1', 'Prueba', '0', '', '46088871', 'Viru', 'Lima', 1, 'estudiante', 5, '2016-05-15', NULL, 1, NULL, 'correo', '2016050002'),
(3, 4, 1, 'LUIS', 'FONSI', 'ALVAREZ', '2016-05-09', 'LORETO 132', 'NO HAYYYY', '1', 'Prueba', '0', '', '44141215', 'TRUJILLO', 'CASMA', 2, 'INGENIERO', 5, '2016-05-25', NULL, 1, NULL, 'correo', '2016050003'),
(4, 1, 1, 'LUIS', 'RODRIGUEZ', 'ARMANZA', '2016-05-25', 'A123', 'CASA', '1', 'Prueba', '0', 'pago1.PNG', '45871345', 'ANCASH', 'ESTE', 1, 'INGENIERO', 5, '2016-05-25', NULL, 1, NULL, 'correo', '2016050004'),
(5, 2, 4, 'LUIS34', 'RODRIGUEZ233', 'ARMANZA55', '2016-05-25', 'A123', 'CASA', '1', 'Prueba', '0', '', '45871345', 'ANCASH', 'ESTE', 1, 'INGENIERO', 5, '2016-05-25', NULL, 1, NULL, 'correo', '2016050005'),
(6, 1, 1, 'TULIPANES', 'GONZALEZ', 'TORRES', '2016-05-11', 'CAXA', 'OBS', '1', 'Prueba', '0', '', '45112233', 'VIRUS', 'LA LIBERTAD', 1, 'ABOGADO', 5, '2016-05-25', NULL, 1, NULL, 'correo', '2016050006'),
(7, 1, 1, 'EDX2', 'CASAS2', 'CASAS2', '2016-05-25', '', '', '1', 'Prueba', '0', 'Demora atención al cliente.png', '', '', '', 1, '', 5, '2016-05-25', NULL, 1, NULL, 'correo', '2016050007'),
(8, 1, 1, 'SILVIA', 'CASITA', 'OIGA', '2016-05-25', '', '', '1', 'Prueba', '0', 'lagAttack2.png', '', '', '', 1, '', 5, '2016-05-25', NULL, 1, NULL, 'correo', '2016050008'),
(9, 1, 1, 'julia', 'torres', 'casa', '2016-05-29', '', '', '1', 'Prueba', '0', '898605.jpg', '', '', '', 1, '', 5, '2016-05-29', NULL, 1, NULL, 'correo', '2016050009'),
(10, 1, 1, 'Fernando', 'Sanchez', 'Torres', '2016-05-29', '', '', '1', 'Prueba', '0', 'lagAttack2.png', '', '', '', 1, '', 5, '2016-05-29', NULL, 1, NULL, 'correo', '2016050010'),
(11, 1, 1, 'Luigui2', 'casi', 'Les', '2016-05-29', '', '', '1', 'Prueba', '0', 'lagAttack2.png', '', '', '', 1, '', 5, '2016-05-29', NULL, 1, NULL, 'correo', '2016050011'),
(12, 1, 1, 'Jean', 'Paul', 'Sartre', '2016-05-29', '', '', '1', 'Prueba', '0', 'lagAttack2.png', '', '', '', 1, '', 5, '2016-05-29', NULL, 1, NULL, 'correo', '2016050012'),
(13, 1, 1, 'Gloria', 'Torres', 'Alva', '2016-05-29', '', '', '1', 'Prueba', '0', 'lentesNuevos.jpg', '', '', '', 1, '', 5, '2016-05-29', NULL, 1, NULL, 'correo', '2016050013');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
`nPermId` int(11) NOT NULL,
  `nUsuCodigo` int(11) NOT NULL,
  `nMenId` int(11) NOT NULL,
  `dPermFechaInicio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dPermFechaFin` datetime DEFAULT NULL,
  `cPermActivo` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`nPermId`, `nUsuCodigo`, `nMenId`, `dPermFechaInicio`, `dPermFechaFin`, `cPermActivo`) VALUES
(1, 1, 1, '2016-04-20 03:00:28', NULL, '1'),
(2, 1, 2, '2016-04-20 03:00:52', NULL, '1'),
(3, 1, 3, '2016-04-20 03:00:52', NULL, '1'),
(4, 1, 4, '2016-04-20 03:01:11', '2016-04-24 15:32:54', '0'),
(5, 1, 5, '2016-04-20 03:01:51', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisorol`
--

CREATE TABLE IF NOT EXISTS `permisorol` (
`nPermRolId` int(11) NOT NULL,
  `nIdRol` int(11) NOT NULL,
  `nMenId` int(11) NOT NULL,
  `dPermFechaInicio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dPermFechaFin` datetime DEFAULT NULL,
  `cPermActivo` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `permisorol`
--

INSERT INTO `permisorol` (`nPermRolId`, `nIdRol`, `nMenId`, `dPermFechaInicio`, `dPermFechaFin`, `cPermActivo`) VALUES
(1, 1, 1, '2016-05-10 18:58:10', NULL, '1'),
(2, 1, 2, '2016-05-10 18:58:38', '2016-05-10 14:45:37', '0'),
(3, 1, 3, '2016-05-10 19:45:25', NULL, '1'),
(4, 1, 4, '2016-05-10 19:45:25', '2016-05-10 22:38:34', '0'),
(5, 1, 5, '2016-05-10 19:45:37', '2016-05-10 22:37:51', '0'),
(6, 3, 1, '2016-05-10 19:45:49', NULL, '1'),
(7, 3, 2, '2016-05-10 19:45:49', '2016-05-11 12:23:38', '0'),
(8, 3, 3, '2016-05-10 19:45:49', '2016-05-11 12:23:38', '0'),
(9, 3, 4, '2016-05-10 19:45:49', NULL, '1'),
(10, 3, 5, '2016-05-10 19:45:49', '2016-05-11 12:23:38', '0'),
(11, 2, 1, '2016-05-10 19:46:11', NULL, '1'),
(12, 2, 2, '2016-05-10 19:46:11', '2016-05-10 14:46:16', '0'),
(13, 2, 3, '2016-05-10 19:46:11', NULL, '1'),
(14, 2, 5, '2016-05-10 19:46:11', NULL, '1'),
(15, 1, 4, '2016-05-11 03:36:59', '2016-05-10 22:38:34', '0'),
(16, 1, 2, '2016-05-11 03:37:41', NULL, '1'),
(17, 1, 4, '2016-05-11 03:38:06', '2016-05-10 22:38:34', '0'),
(18, 1, 5, '2016-05-11 03:38:06', NULL, '1'),
(19, 2, 4, '2016-05-11 15:08:40', '2016-05-11 13:45:04', '0'),
(20, 2, 2, '2016-05-11 18:45:04', NULL, '1'),
(21, 1, 6, '2016-05-11 20:06:56', NULL, '1'),
(22, 1, 7, '2016-05-22 13:30:51', NULL, '1'),
(23, 1, 8, '2016-05-22 13:30:51', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
`nPerId` int(11) NOT NULL,
  `cPerNombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cPerApellidoPaterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cPerApellidoMaterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cPerDni` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `cPerDireccion` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `cPerTelefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cPerCelular` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cPerEstado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `tPerFechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tPerFechaBaja` timestamp NULL DEFAULT NULL,
  `nSurId` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`nPerId`, `cPerNombres`, `cPerApellidoPaterno`, `cPerApellidoMaterno`, `cPerDni`, `cPerDireccion`, `cPerTelefono`, `cPerCelular`, `cPerEstado`, `tPerFechaRegistro`, `tPerFechaBaja`, `nSurId`) VALUES
(1, 'Cristian', 'Gonzalez', 'Torres', '46088871', 'CAjamarca 108 urb Aranjuez', '261811', '987713704', '1', '2016-04-20 02:19:41', NULL, 1),
(2, 'Andy', 'xxx', 'xxx', '11111111', 'xxx', 'xxx', NULL, '1', '2016-04-20 02:21:14', NULL, 0),
(3, 'Ernestina', 'Pancracia', 'xxx', '22222222', 'xxx', 'xxxx', NULL, '1', '2016-04-20 02:23:01', NULL, 0),
(4, 'Julia', 'Torres', 'Alva', '33333333', 'xxx', NULL, NULL, '1', '2016-04-28 02:20:16', NULL, NULL),
(5, 'Fidel', 'Torres', 'xxx', '44444444', '', NULL, NULL, '1', '2016-04-28 02:21:44', NULL, NULL),
(6, 'Gloria', 'Torres', 'Alva', '55555555', '', NULL, NULL, '1', '2016-04-28 02:21:44', NULL, NULL),
(7, 'Franca', 'Alva', 'Leon', '', '', NULL, NULL, '1', '2016-04-28 02:21:44', NULL, NULL),
(8, 'Emilia', 'Rodriguez', 'Rebaza', '', '', NULL, NULL, '1', '2016-04-28 02:21:44', NULL, NULL),
(9, 'Fernando', 'Luque', 'xxx', '', '', NULL, NULL, '1', '2016-04-28 02:21:44', NULL, NULL),
(10, 'Pedro', 'Suarez', 'Vertiz', '', '', NULL, NULL, '1', '2016-04-28 15:42:57', NULL, NULL),
(11, 'Roxana', 'Merino', 'Pul', '', '', NULL, NULL, '1', '2016-04-28 15:42:58', NULL, NULL),
(12, 'Carlos', 'Pichon', '322', '', '', NULL, NULL, '1', '2016-04-28 15:42:58', NULL, NULL),
(13, 'Diego', 'Torres', 'ddd', '', '', NULL, NULL, '1', '2016-04-28 15:42:58', NULL, NULL),
(14, 'Briguitte', 'Torres', 'Algo', '87654321', 'Cable Magico', '12412424', '981924124', '1', '2016-05-13 14:59:20', NULL, NULL),
(15, 'Carlos', 'Perez', 'Rojas', '26181122', 'Los sauces', '2626218181', '9871515616', '1', '2016-05-13 19:25:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redsocialpaciente`
--

CREATE TABLE IF NOT EXISTS `redsocialpaciente` (
`nCodigoRedSocial` int(11) NOT NULL,
  `nCodigoPaciente` int(11) DEFAULT NULL,
  `vDireccion` varchar(200) DEFAULT NULL,
  `nTipoRedSocial` int(11) DEFAULT NULL,
  `vTipoRedSocial` varchar(200) DEFAULT NULL,
  `vTitular` varchar(200) DEFAULT NULL,
  `bPrincipal` char(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `redsocialpaciente`
--

INSERT INTO `redsocialpaciente` (`nCodigoRedSocial`, `nCodigoPaciente`, `vDireccion`, `nTipoRedSocial`, `vTipoRedSocial`, `vTitular`, `bPrincipal`) VALUES
(1, 6, 'algo123', 0, 'Facebook', 'yo321', '1'),
(2, 6, 'algo', 0, 'Correo', 'yo', '1'),
(3, 6, 'algo2', 0, 'Correo', 'yo2', '1'),
(4, 6, 'cricri', 0, 'Google+', '12', '0'),
(5, 6, 'silvia', 0, 'LinkedIn', 'iris', '1'),
(6, 13, 'gastoncito89@gmail.com', 0, 'Correo', 'Cricri2', '0'),
(7, 13, 'Fede', 0, 'Facebook', 'Elsa', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
`nIdRol` int(11) NOT NULL,
  `cNombre` varchar(50) NOT NULL,
  `nEstado` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`nIdRol`, `cNombre`, `nEstado`) VALUES
(1, 'Administrador', '1'),
(2, 'Asistente', '1'),
(3, 'Doctor', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonopaciente`
--

CREATE TABLE IF NOT EXISTS `telefonopaciente` (
`nCodigoTelefono` int(11) NOT NULL,
  `nCodigoPaciente` int(11) DEFAULT NULL,
  `nCodigoOperador` int(11) DEFAULT NULL,
  `vDescripcionOperador` varchar(200) DEFAULT NULL,
  `nTipoTelefono` int(11) DEFAULT NULL,
  `vTipoTelefono` varchar(100) DEFAULT NULL,
  `bEsWhatsapp` char(1) DEFAULT NULL,
  `vTitular` varchar(200) DEFAULT NULL,
  `vTelefono` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `telefonopaciente`
--

INSERT INTO `telefonopaciente` (`nCodigoTelefono`, `nCodigoPaciente`, `nCodigoOperador`, `vDescripcionOperador`, `nTipoTelefono`, `vTipoTelefono`, `bEsWhatsapp`, `vTitular`, `vTelefono`) VALUES
(1, 2, 0, 'Movistar', 1, 'Fijo(Casa)', '1', 'silvia', '261811'),
(2, 2, 9, 'Claro', 2, 'Anexo', '1', 'hey', '987713704'),
(3, 2, 9, 'Claro', 2, 'Anexo', '1', 'hey', '987713704'),
(4, 2, 10, 'Entel', 0, 'Móvil', '0', 'hey2', '987713704'),
(5, 2, 10, 'Entel', 1, 'Fijo(Casa)', '0', 'Gloria', '2611'),
(6, 2, 11, 'Bitel', 0, 'Móvil', '0', 'esete', '11111'),
(7, 7, 10, 'Movistar', 1, 'Fijo(Casa)', '1', 'Fidel Torres3', '11111'),
(8, 8, 8, 'Movistar', 1, 'Fijo(Casa)', '1', 'Estuardo', '261811'),
(9, 7, 9, 'Claro', 1, 'Fijo(Casa)', '1', 'ferradas', '4465'),
(10, 7, 9, 'Claro', 1, 'Fijo(Casa)', '1', 'ferradas', '4465'),
(11, 7, 8, 'Movistar', 2, 'Anexo', '1', 'garraza', '11111'),
(12, 7, 10, 'Entel', 1, 'Fijo(Casa)', '1', 'Luigui', '673246'),
(13, 7, 9, 'Entel', 0, 'Fijo(Casa)', '1', 'ferradas', '44657'),
(14, 7, 10, 'Entel', 0, 'Móvil', '1', 'Fidel Torres 2', '987713704'),
(15, 7, 8, 'Movistar', 1, 'Fijo(Casa)', '0', 'cristian', '261811'),
(16, 7, 9, 'Claro', 1, 'Fijo(Casa)', '0', 'hola', 'junio'),
(17, 6, 10, 'Entel', 0, 'Móvil', '0', 'hola', '22123'),
(18, 12, 9, 'Claro', 0, 'Móvil', '0', 'Yo2', '33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`nUsuCodigo` int(11) NOT NULL,
  `nPerId` int(11) NOT NULL,
  `cUsuUsuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cUsuClave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cUsuEstado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `cUsuTipo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nIdRol` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nUsuCodigo`, `nPerId`, `cUsuUsuario`, `cUsuClave`, `cUsuEstado`, `cUsuTipo`, `nIdRol`) VALUES
(1, 1, 'cri', '1234', '1', 'A', 1),
(6, 2, '11111111', '123', '1', '', 2),
(7, 3, '22222222', '123', '1', '', 2),
(8, 4, '33333333', '123', '1', '', 3),
(9, 14, '87654321', '123', '1', '', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
 ADD PRIMARY KEY (`nEmpId`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`nMenId`), ADD KEY `nModId` (`nModId`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
 ADD PRIMARY KEY (`nModId`);

--
-- Indices de la tabla `multitabla`
--
ALTER TABLE `multitabla`
 ADD PRIMARY KEY (`nMulId`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
 ADD PRIMARY KEY (`nCodigoPaciente`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
 ADD PRIMARY KEY (`nPermId`), ADD KEY `nUsuCodigo` (`nUsuCodigo`), ADD KEY `nMenId` (`nMenId`);

--
-- Indices de la tabla `permisorol`
--
ALTER TABLE `permisorol`
 ADD PRIMARY KEY (`nPermRolId`), ADD KEY `nIdRol` (`nIdRol`), ADD KEY `nMenId` (`nMenId`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`nPerId`);

--
-- Indices de la tabla `redsocialpaciente`
--
ALTER TABLE `redsocialpaciente`
 ADD PRIMARY KEY (`nCodigoRedSocial`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
 ADD PRIMARY KEY (`nIdRol`);

--
-- Indices de la tabla `telefonopaciente`
--
ALTER TABLE `telefonopaciente`
 ADD PRIMARY KEY (`nCodigoTelefono`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`nUsuCodigo`), ADD KEY `fk_Usuario_Persona1` (`nPerId`), ADD KEY `fk_Usuario_Rol1` (`nIdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
MODIFY `nEmpId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
MODIFY `nMenId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
MODIFY `nModId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `multitabla`
--
ALTER TABLE `multitabla`
MODIFY `nMulId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
MODIFY `nCodigoPaciente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
MODIFY `nPermId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `permisorol`
--
ALTER TABLE `permisorol`
MODIFY `nPermRolId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `nPerId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `redsocialpaciente`
--
ALTER TABLE `redsocialpaciente`
MODIFY `nCodigoRedSocial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
MODIFY `nIdRol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `telefonopaciente`
--
ALTER TABLE `telefonopaciente`
MODIFY `nCodigoTelefono` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `nUsuCodigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
ADD CONSTRAINT `nModId` FOREIGN KEY (`nModId`) REFERENCES `modulo` (`nModId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
ADD CONSTRAINT `nMenId` FOREIGN KEY (`nMenId`) REFERENCES `menu` (`nMenId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `nUsuCodigo` FOREIGN KEY (`nUsuCodigo`) REFERENCES `usuario` (`nUsuCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisorol`
--
ALTER TABLE `permisorol`
ADD CONSTRAINT `nIdRol2` FOREIGN KEY (`nIdRol`) REFERENCES `rol` (`nIdRol`),
ADD CONSTRAINT `nMenId2` FOREIGN KEY (`nMenId`) REFERENCES `menu` (`nMenId`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `fk_Usuario_Persona1` FOREIGN KEY (`nPerId`) REFERENCES `persona` (`nPerId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`nIdRol`) REFERENCES `rol` (`nIdRol`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
