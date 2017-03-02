<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pacientecorreo_model extends CI_Model {

    //Atributos de Clase
    private $nCodigoRedSocial = '';
    private $nCodigoPaciente = '';
    private $vDireccion = '';
    private $nTipoRedSocial = '';
    private $vTipoRedSocial = '';
    private $vTitular = '';
    private $bPrincipal = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set y Get
    function getNCodigoRedSocial() {
        return $this->nCodigoRedSocial;
    }

    function getNCodigoPaciente() {
        return $this->nCodigoPaciente;
    }

    function getVDireccion() {
        return $this->vDireccion;
    }

    function getNTipoRedSocial() {
        return $this->nTipoRedSocial;
    }

    function getVTipoRedSocial() {
        return $this->vTipoRedSocial;
    }

    function getVTitular() {
        return $this->vTitular;
    }

    function getBPrincipal() {
        return $this->bPrincipal;
    }

    function setNCodigoRedSocial($nCodigoRedSocial) {
        $this->nCodigoRedSocial = $nCodigoRedSocial;
    }

    function setNCodigoPaciente($nCodigoPaciente) {
        $this->nCodigoPaciente = $nCodigoPaciente;
    }

    function setVDireccion($vDireccion) {
        $this->vDireccion = $vDireccion;
    }

    function setNTipoRedSocial($nTipoRedSocial) {
        $this->nTipoRedSocial = $nTipoRedSocial;
    }

    function setVTipoRedSocial($vTipoRedSocial) {
        $this->vTipoRedSocial = $vTipoRedSocial;
    }

    function setVTitular($vTitular) {
        $this->vTitular = $vTitular;
    }

    function setBPrincipal($bPrincipal) {
        $this->bPrincipal = $bPrincipal;
    }

    function pacienteCorreoIns() {
        $Datos[0] = $this->getNCodigoPaciente();
        $Datos[1] = $this->getNTipoRedSocial();
        $Datos[2] = $this->getVTipoRedSocial();
        $Datos[3] = $this->getVTitular();
        $Datos[4] = $this->getBPrincipal();
        $Datos[5] = $this->getVDireccion();

        //$Datos[20] = "@p_nCodigoPaciente";
        //sp_RedSocialPaciente_Ins
        //$query = $this->db->query("CALL USP_PAC_I_TELEFONOPACIENTE(?,?,?,?,?,?,?,?)", $Datos);
        $query = $this->db->query("CALL USP_PAC_I_CORREOPACIENTE(?,?,?,?,?,?)", $Datos);

        if ($query) {
            $query = $query->result_array();
            return true;
        } else {
            return false;
        }
    }
    function pacienteCorreoUpd() {
        $Datos[0] = $this->getNCodigoPaciente();
        $Datos[1] = $this->getNTipoRedSocial();
        $Datos[2] = $this->getVTipoRedSocial();
        $Datos[3] = $this->getVTitular();
        $Datos[4] = $this->getBPrincipal();
        $Datos[5] = $this->getVDireccion();
        $Datos[6] = $this->getNCodigoRedSocial();
        //$Datos[20] = "@p_nCodigoPaciente";
            
        //sp_RedSocialPaciente_Ins
        //$query = $this->db->query("CALL USP_PAC_I_TELEFONOPACIENTE(?,?,?,?,?,?,?,?)", $Datos);
        $query = $this->db->query("CALL USP_PAC_U_CORREOPACIENTE(?,?,?,?,?,?,?)", $Datos);

        if ($query) {
            $query = $query->result_array();
            return true;
        } else {
            return false;
        }
    }

    public function qryPacienteCorreos($opt = '', $codigopaciente) {
        //$query = $this->db->query("CALL USP_PAC_S_PACIENTETELEFONOS('" . $opt . "','" . $codigopaciente . "')");
        $query = $this->db->query("CALL USP_PAC_S_PACIENTECORREOS('" . $opt . "','" . $codigopaciente . "')");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function getUpdCorreo($codigocorreo) {
        $query = $this->db->query("CALL USP_PAC_S_GET_CORREOS('" . $codigocorreo . "')");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

}

?>