<?php

//CODIGO AUTOGENERADO
//Fecha:27-09-2012 14:35:50 - renzot
class Generica_model extends CI_Model {

    //DECLARACION DE VARIABLES
    private $nCodigoGenerica = '';
    private $vDescripcionTipo = '';
    private $nCodigo = '';
    private $nValor = '';
    private $nEstado = '';

    //CONSTRUCTOR DE LA CLASE
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES SET
    function setNCodigoGenerica($nCodigoGenerica) {
        $this->nCodigoGenerica = $nCodigoGenerica;
    }

    function setVDescripcionTipo($vDescripcionTipo) {
        $this->vDescripcionTipo = $vDescripcionTipo;
    }

    function setNCodigo($nCodigo) {
        $this->nCodigo = $nCodigo;
    }

    function setNValor($nValor) {
        $this->nValor = $nValor;
    }

    function setNEstado($nEstado) {
        $this->nEstado = $nEstado;
    }

    
    //FUNCIONES GET
    function getNCodigoGenerica() {
        return $this->nCodigoGenerica;
    }

    function getVDescripcionTipo() {
        return $this->vDescripcionTipo;
    }

    function getNCodigo() {
        return $this->nCodigo;
    }

    function getNValor() {
        return $this->nValor;
    }

    function getNEstado() {
        return $this->nEstado;
    }

    
    function cboGenericaComboGet($Parametros = array(), $Config = array()) {
        $query = $this->db->query("CALL USP_S_GENERICOS(?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $query = $query->result_array();
            //print_p($query);exit;
            /* INICIO - DEFINIMOS LOS VALORES POR DEFECTO */
            if ($Config['name'] == "")
                $Config['name'] = "cbo_ins_dicdat_dicdat";
            if ($Config['id'] == "")
                $Config['id'] = "cbo_ins_dicdat_dicdat";
            if ($Config['extra'] == "")
                $Config['extra'] = "style='width: 200Px'";
            /* FIN - DEFINIMOS LOS VALORES POR DEFECTO */
            if (count($query) > 0) {
                
                foreach ($query as $query) {
                    //$data[$query['nDidID']] = $query['cDidDescripcion'];
                    $data[$query['nCodigoGenerica']] = $query['nValor'];
                }
                //print_p($Config);exit;
                $result = form_dropdown($Config['name'], $data, $Config['value'], "id='" . $Config['id'] . "' " . $Config['extra']);
            } else {
                $data[""] = "Seleccione una opción...";
                $result = form_dropdown($Config['name'], $data, $Config['value'], "id=" . $Config['id'] . " " . $Config['extra']);
            }
            return $result;
        } else {
            return false;
        }
    }
}

?>