<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pacientetelefono_model extends CI_Model {

    //Atributos de Clase
    private $p_nCodigoTelefono = '';
    private $p_nCodigoPaciente = '';
    private $p_nCodigoOperador = '';
    private $p_vDescripcionOperador = '';
    private $p_nTipoTelefono = '';
    private $p_vTipoTelefono = '';
    private $p_bEsWhatsapp = '';
    private $p_vTitular = '';
    private $p_vTelefono = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set y Get
    public function getP_nCodigoTelefono() {
        return $this->p_nCodigoTelefono;
    }

    public function getP_nCodigoPaciente() {
        return $this->p_nCodigoPaciente;
    }

    public function getP_nCodigoOperador() {
        return $this->p_nCodigoOperador;
    }

    public function getP_vDescripcionOperador() {
        return $this->p_vDescripcionOperador;
    }

    public function getP_nTipoTelefono() {
        return $this->p_nTipoTelefono;
    }

    public function getP_vTipoTelefono() {
        return $this->p_vTipoTelefono;
    }

    public function getP_bEsWhatsapp() {
        return $this->p_bEsWhatsapp;
    }

    public function getP_vTitular() {
        return $this->p_vTitular;
    }

    public function getP_vTelefono() {
        return $this->p_vTelefono;
    }

    public function setP_nCodigoTelefono($p_nCodigoTelefono) {
        $this->p_nCodigoTelefono = $p_nCodigoTelefono;
    }

    public function setP_nCodigoPaciente($p_nCodigoPaciente) {
        $this->p_nCodigoPaciente = $p_nCodigoPaciente;
    }

    public function setP_nCodigoOperador($p_nCodigoOperador) {
        $this->p_nCodigoOperador = $p_nCodigoOperador;
    }

    public function setP_vDescripcionOperador($p_vDescripcionOperador) {
        $this->p_vDescripcionOperador = $p_vDescripcionOperador;
    }

    public function setP_nTipoTelefono($p_nTipoTelefono) {
        $this->p_nTipoTelefono = $p_nTipoTelefono;
    }

    public function setP_vTipoTelefono($p_vTipoTelefono) {
        $this->p_vTipoTelefono = $p_vTipoTelefono;
    }

    public function setP_bEsWhatsapp($p_bEsWhatsapp) {
        $this->p_bEsWhatsapp = $p_bEsWhatsapp;
    }

    public function setP_vTitular($p_vTitular) {
        $this->p_vTitular = $p_vTitular;
    }

    public function setP_vTelefono($p_vTelefono) {
        $this->p_vTelefono = $p_vTelefono;
    }

    function pacienteTelefonoIns() {
        $Datos[0] = $this->getP_nCodigoPaciente();
        $Datos[1] = $this->getP_nCodigoOperador();
        $Datos[2] = $this->getP_vDescripcionOperador();
        $Datos[3] = $this->getP_nTipoTelefono();
        $Datos[4] = $this->getP_vTipoTelefono();
        $Datos[5] = $this->getP_bEsWhatsapp();
        $Datos[6] = $this->getP_vTitular();
        $Datos[7] = $this->getP_vTelefono();
        //$Datos[20] = "@p_nCodigoPaciente";

        $query = $this->db->query("CALL USP_PAC_I_TELEFONOPACIENTE(?,?,?,?,?,?,?,?)", $Datos);
        //$out_param_query = $this->db->query('select @p_nCodigoPaciente as out_param;');

        if ($query) {
            $query = $query->result_array();
            //$this->setNProdDetalleId($query[0]['resultado']);
            return true;
        } else {
            return false;
        }
    }
    
    function pacienteTelefonoUpd() {
        $Datos[0] = $this->getP_nCodigoPaciente();
        $Datos[1] = $this->getP_nCodigoOperador();
        $Datos[2] = $this->getP_vDescripcionOperador();
        $Datos[3] = $this->getP_nTipoTelefono();
        $Datos[4] = $this->getP_vTipoTelefono();
        $Datos[5] = $this->getP_bEsWhatsapp();
        $Datos[6] = $this->getP_vTitular();
        $Datos[7] = $this->getP_vTelefono();
        $Datos[8] = $this->getP_nCodigoTelefono();
        //$Datos[20] = "@p_nCodigoPaciente";

        $query = $this->db->query("CALL USP_PAC_U_TELEFONOPACIENTE(?,?,?,?,?,?,?,?,?)", $Datos);
        //$out_param_query = $this->db->query('select @p_nCodigoPaciente as out_param;');

        if ($query) {
            $query = $query->result_array();
            //$this->setNProdDetalleId($query[0]['resultado']);
            return true;
        } else {
            return false;
        }
    }

    /*
      public function qryPaciente($opt = '') {
      $query = $this->db->query("CALL USP_PAC_S_PACIENTES('" . $opt . "')");
      if ($query->num_rows() > 0) {
      return $query->result_array();
      } else {
      return null;
      }
      } */

    public function qryPacienteTelefonos($opt = '', $codigopaciente) {
        $query = $this->db->query("CALL USP_PAC_S_PACIENTETELEFONOS('" . $opt . "','" . $codigopaciente . "')");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function getUpdTelefono($codigotelefono) {
        $query = $this->db->query("CALL USP_PAC_S_GET_TELEFONOS('" . $codigotelefono . "')");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    /* public function qryPacienteTelefonos($opt = '',$codigopaciente) {
      $query = $this->db->query("CALL USP_PAC_S_PACIENTETELEFONOS('" . $opt . "','".$codigopaciente."')");
      if ($query->num_rows() > 0) {
      return $query->result_array();
      } else {
      return null;
      }
      } */
}

?>