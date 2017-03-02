<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paciente_model extends CI_Model {

    //Atributos de Clase
    private $nCodigoPaciente = '';
    private $vCodigoPaciente = '';
    private $nCodigoLocalRegistro = '';
    private $nCodigoLocalAtencion = '';
    private $vNombre = '';
    private $vApellidosPaterno = '';
    private $vApellidosMaterno = '';
    private $dFechaNacimiento = '';
    private $vDireccion = '';
    private $vObservaciones = '';
    private $cGenero = '';
    private $vMedioContactoFavorito = '';
    private $cEsMoroso = '';
    private $iFoto = '';
    private $vDNI = '';
    private $vLugarTrabajo = '';
    private $vProcedencia = '';
    private $nEstadoCivil = '';
    private $vOcupacion = '';
    private $nEstado = '';
    private $dFechaCrea = '';
    private $dFechaModifica = '';
    private $nUsuarioCrea = '';
    private $nUsuarioModifica = '';
    private $vCorreo = '';
    private $vHCL = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set y Get
    function getNCodigoPaciente() {
        return $this->nCodigoPaciente;
    }

    function getVCodigoPaciente() {
        return $this->vCodigoPaciente;
    }

    function getNCodigoLocalRegistro() {
        return $this->nCodigoLocalRegistro;
    }

    function getNCodigoLocalAtencion() {
        return $this->nCodigoLocalAtencion;
    }

    function getVNombre() {
        return $this->vNombre;
    }

    function getVApellidosPaterno() {
        return $this->vApellidosPaterno;
    }

    function getVApellidosMaterno() {
        return $this->vApellidosMaterno;
    }

    function getDFechaNacimiento() {
        return $this->dFechaNacimiento;
    }

    function getVDireccion() {
        return $this->vDireccion;
    }

    function getVObservaciones() {
        return $this->vObservaciones;
    }

    function getCGenero() {
        return $this->cGenero;
    }

    function getVMedioContactoFavorito() {
        return $this->vMedioContactoFavorito;
    }

    function getCEsMoroso() {
        return $this->cEsMoroso;
    }

    function getIFoto() {
        return $this->iFoto;
    }

    function getVDNI() {
        return $this->vDNI;
    }

    function getVLugarTrabajo() {
        return $this->vLugarTrabajo;
    }

    function getVProcedencia() {
        return $this->vProcedencia;
    }

    function getNEstadoCivil() {
        return $this->nEstadoCivil;
    }

    function getVOcupacion() {
        return $this->vOcupacion;
    }

    function getNEstado() {
        return $this->nEstado;
    }

    function getDFechaCrea() {
        return $this->dFechaCrea;
    }

    function getDFechaModifica() {
        return $this->dFechaModifica;
    }

    function getNUsuarioCrea() {
        return $this->nUsuarioCrea;
    }

    function getNUsuarioModifica() {
        return $this->nUsuarioModifica;
    }

    function getVCorreo() {
        return $this->vCorreo;
    }

    function setNCodigoPaciente($nCodigoPaciente) {
        $this->nCodigoPaciente = $nCodigoPaciente;
    }

    function setVCodigoPaciente($vCodigoPaciente) {
        $this->vCodigoPaciente = $vCodigoPaciente;
    }

    function setNCodigoLocalRegistro($nCodigoLocalRegistro) {
        $this->nCodigoLocalRegistro = $nCodigoLocalRegistro;
    }

    function setNCodigoLocalAtencion($nCodigoLocalAtencion) {
        $this->nCodigoLocalAtencion = $nCodigoLocalAtencion;
    }

    function setVNombre($vNombre) {
        $this->vNombre = $vNombre;
    }

    function setVApellidosPaterno($vApellidosPaterno) {
        $this->vApellidosPaterno = $vApellidosPaterno;
    }

    function setVApellidosMaterno($vApellidosMaterno) {
        $this->vApellidosMaterno = $vApellidosMaterno;
    }

    function setDFechaNacimiento($dFechaNacimiento) {
        $this->dFechaNacimiento = $dFechaNacimiento;
    }

    function setVDireccion($vDireccion) {
        $this->vDireccion = $vDireccion;
    }

    function setVObservaciones($vObservaciones) {
        $this->vObservaciones = $vObservaciones;
    }

    function setCGenero($cGenero) {
        $this->cGenero = $cGenero;
    }

    function setVMedioContactoFavorito($vMedioContactoFavorito) {
        $this->vMedioContactoFavorito = $vMedioContactoFavorito;
    }

    function setCEsMoroso($cEsMoroso) {
        $this->cEsMoroso = $cEsMoroso;
    }

    function setIFoto($iFoto) {
        $this->iFoto = $iFoto;
    }

    function setVDNI($vDNI) {
        $this->vDNI = $vDNI;
    }

    function setVLugarTrabajo($vLugarTrabajo) {
        $this->vLugarTrabajo = $vLugarTrabajo;
    }

    function setVProcedencia($vProcedencia) {
        $this->vProcedencia = $vProcedencia;
    }

    function setNEstadoCivil($nEstadoCivil) {
        $this->nEstadoCivil = $nEstadoCivil;
    }

    function setVOcupacion($vOcupacion) {
        $this->vOcupacion = $vOcupacion;
    }

    function setNEstado($nEstado) {
        $this->nEstado = $nEstado;
    }

    function setDFechaCrea($dFechaCrea) {
        $this->dFechaCrea = $dFechaCrea;
    }

    function setDFechaModifica($dFechaModifica) {
        $this->dFechaModifica = $dFechaModifica;
    }

    function setNUsuarioCrea($nUsuarioCrea) {
        $this->nUsuarioCrea = $nUsuarioCrea;
    }

    function setNUsuarioModifica($nUsuarioModifica) {
        $this->nUsuarioModifica = $nUsuarioModifica;
    }

    function setVCorreo($vCorreo) {
        $this->vCorreo = $vCorreo;
    }

    function getVHCL() {
        return $this->vHCL;
    }

    function setVHCL($vHCL) {
        $this->vHCL = $vHCL;
    }

    function pacienteIns() {
        //https://uno-de-piera.com/procedimientos-almacenados-en-codeigniter/
        //http://stackoverflow.com/questions/4827752/calling-a-stored-procedure-from-codeigniters-active-record-class

//         $this->db->trans_start(); 
        $Datos[0] = $this->getNCodigoLocalRegistro();
        $Datos[1] = $this->getNCodigoLocalAtencion();
        $Datos[2] = $this->getVNombre();
        $Datos[3] = $this->getVApellidosPaterno();
        $Datos[4] = $this->getVApellidosMaterno();
        $Datos[5] = $this->getDFechaNacimiento();
        $Datos[6] = $this->getVDireccion();
        $Datos[7] = $this->getVObservaciones();
        $Datos[8] = $this->getCGenero();
        $Datos[9] = $this->getVMedioContactoFavorito();
        $Datos[10] = $this->getCEsMoroso();
        $Datos[11] = $this->getIFoto();
        $Datos[12] = $this->getVDNI();
        $Datos[13] = $this->getVLugarTrabajo();
        $Datos[14] = $this->getVProcedencia();
        $Datos[15] = $this->getNEstadoCivil();
        $Datos[16] = $this->getVOcupacion();
        $Datos[17] = $this->getNUsuarioCrea();
        $Datos[18] = $this->getVCorreo();
        $Datos[19] = $this->getVHCL();
        //$Datos[20] = "@p_nCodigoPaciente";


        $query = $this->db->query("CALL USP_PAC_I_PACIENTE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@p_nCodigoPaciente)", $Datos);//21
        $out_param_query = $this->db->query('select @p_nCodigoPaciente as out_param;');
//         $this->db->trans_complete(); 
        //$out_param_row = $this->db->row();
        //$out_param_val = $this->out_param;
        //return $out_param_query->row_array();
        if ($out_param_query->num_rows() > 0) {
            return $out_param_query->row_array();
        }else{
            return 0;
        }
    }

    function pacienteUpd() {
        //https://uno-de-piera.com/procedimientos-almacenados-en-codeigniter/
        //http://stackoverflow.com/questions/4827752/calling-a-stored-procedure-from-codeigniters-active-record-class

//         $this->db->trans_start(); 
        $Datos[0] = $this->getNCodigoLocalRegistro();
        $Datos[1] = $this->getNCodigoLocalAtencion();
        $Datos[2] = $this->getVNombre();
        $Datos[3] = $this->getVApellidosPaterno();
        $Datos[4] = $this->getVApellidosMaterno();
        $Datos[5] = $this->getDFechaNacimiento();
        $Datos[6] = $this->getVDireccion();
        $Datos[7] = $this->getVObservaciones();
        $Datos[8] = $this->getCGenero();
        $Datos[9] = $this->getVMedioContactoFavorito();
        $Datos[10] = $this->getCEsMoroso();
        $Datos[11] = $this->getIFoto();
        $Datos[12] = $this->getVDNI();
        $Datos[13] = $this->getVLugarTrabajo();
        $Datos[14] = $this->getVProcedencia();
        $Datos[15] = $this->getNEstadoCivil();
        $Datos[16] = $this->getVOcupacion();
        $Datos[17] = $this->getNUsuarioCrea();
        $Datos[18] = $this->getVCorreo();
        $Datos[19] = $this->getVHCL();
        $Datos[20] = $this->getNCodigoPaciente();
        //$Datos[20] = "@p_nCodigoPaciente";


        $query = $this->db->query("CALL USP_PAC_U_PACIENTE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@p_nCodigoPaciente)", $Datos);
        $out_param_query = $this->db->query('select @p_nCodigoPaciente as out_param;');
//         $this->db->trans_complete(); 
        //$out_param_row = $this->db->row();
        //$out_param_val = $this->out_param;
        //return $out_param_query->row_array();
        if ($out_param_query->num_rows() > 0) {
            return $out_param_query->row_array();
        }else{
            return 0;
        }
    }
    
    
    public function qryPaciente($opt = '') {
        $query = $this->db->query("CALL USP_PAC_S_PACIENTES('" . $opt . "')");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    public function getDatosInformacionBasica($ncodigopaciente) {
        $query = $this->db->query("CALL USP_PAC_S_GET_INFORMACION('" . $ncodigopaciente . "')");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

}

?>