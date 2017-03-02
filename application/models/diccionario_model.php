<?php

//CODIGO AUTOGENERADO
//Fecha:27-09-2012 14:35:50 - renzot
class Diccionario_model extends CI_Model {

    //DECLARACION DE VARIABLES
    private $nDicId = '';
    private $nPcaId = '';
    private $cDicDescripcion = '';
    private $bDicEliminado = '';

    //CONSTRUCTOR DE LA CLASE
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES SET
    function set_nDicId($nDicId) {
        $this->nDicId = $nDicId;
    }

    function set_nPcaId($nPcaId) {
        $this->nPcaId = $nPcaId;
    }

    function set_cDicDescripcion($cDicDescripcion) {
        $this->cDicDescripcion = $cDicDescripcion;
    }

    function set_bDicEliminado($bDicEliminado) {
        $this->bDicEliminado = $bDicEliminado;
    }

    //FUNCIONES GET
    function get_nDicId() {
        return $this->nDicId;
    }

    function get_nPcaId() {
        return $this->nPcaId;
    }

    function get_cDicDescripcion() {
        return $this->cDicDescripcion;
    }

    function get_bDicEliminado() {
        return $this->bDicEliminado;
    }

    function cboDiccionarioGet($Parametros = array(), $Config = array()) {
        $query = $this->db->query("CALL USP_GEN_S_DICCIONARIO_DATOS_P2(?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $query = $query->result_array();
            //print_p($query);exit;
            /* INICIO - DEFINIMOS LOS VALORES POR DEFECTO */
            if ($Config['NAME'] == "")
                $Config['NAME'] = "cbo_ins_dicdat_dicdat";
            if ($Config['ID'] == "")
                $Config['ID'] = "cbo_ins_dicdat_dicdat";
            if ($Config['EXTRA'] == "")
                $Config['EXTRA'] = "style='width: 200Px'";
            /* FIN - DEFINIMOS LOS VALORES POR DEFECTO */
            if (count($query) > 0) {
                foreach ($query as $query) {
                    //$data[$query['nDidID']] = $query['cDidDescripcion'];
                    $data[$query['nMulId']] = $query['cMulDescripcion'];
                }
                //print_p($Config);exit;
                $result = form_dropdown($Config['NAME'], $data, $Config['VALUE'], "id='" . $Config['ID'] . "' " . $Config['EXTRA']);
            } else {
                $data[""] = "Seleccione una opción...";
                $result = form_dropdown($Config['NAME'], $data, $Config['VALUE'], "id=" . $Config['ID'] . " " . $Config['EXTRA']);
            }


            return $result;
        } else {
            return false;
        }
    }
/*
    function get_parametro_segun_categoria($categoria = null) {
        if ($categoria != null) {
            $this->adampt->setDicam($categoria);
            $query = $this->adampt->consulta('USP_GEN_S_DiccionarioSegunCategoria');
            $result = "";
            if ($query) {
                if (count($query) == 0) {
                    return false;
                } else {
                    foreach ($query as $reg) {
                        $result[$reg['nDicId']] = $reg['cDicDescripcion'];
                    }
                    return $result;
                }
            } else {
                return false;
            }
        }
        return false;
    }*/

}

?>