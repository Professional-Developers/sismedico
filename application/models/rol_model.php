<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 01-05-2013 19:17:17 */

class Rol_model extends CI_Model {

    //Atributos de Clase
    private $nIdRol='';
    private $cNombre='';
    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }
    
    //FUNCIONES Set y Get
    public function getNIdRol() {
        return $this->nIdRol;
    }

    public function getCNombre() {
        return $this->cNombre;
    }

    public function setNIdRol($nIdRol) {
        $this->nIdRol = $nIdRol;
    }

    public function setCNombre($cNombre) {
        $this->cNombre = $cNombre;
    }
    
    function getCboTipoRol($opt = ''){
        $result = $this->db->query("CALL USP_ROL_S_ROLES('" . $opt . "')");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return null;
        }
    }
    public function qryRoles($opt = '') {
        $query = $this->db->query("CALL USP_ROL_S_ROLES('" . $opt . "')");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

        
    /*Obtener Listado Personas*/
    /*function qryEmpresa() {
        $Datos[0] = 1; //1
        $query2 = $this->db->query("CALL USP_EMP_S_EMPRESAS(?)", $Datos);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }    
    
    function getCboTipoRubro() {
        $query = "select nMulId,nMulIdPadre,cMulDescripcion,nMulOrden,nMulEstado 
            from multitabla where nMulIdPadre=8 and nMulEstado='A' 
            and nMulOrden <> 0";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    
    function getCboTipoEmpresa() {
        $query = "select nMulId,nMulIdPadre,cMulDescripcion,nMulOrden,nMulEstado 
            from multitabla where nMulIdPadre=48 and nMulEstado='A' 
            and nMulOrden <> 0";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function empresaIns(){
        $Accion="";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCEmpNombre(); //1
        $Datos[2] = $this->getCEmpDescripcion(); //1
        $Datos[3] = $this->getCEmpDireccionFiscal(); //1
        $Datos[4] = $this->getCEmpTelefono(); //1
        $Datos[5] = $this->getCEmpCelular(); //1
        $Datos[6] = $this->getCEmpEmail(); //1
        $Datos[7] = $this->getCEmpRuc(); //1
        $Datos[8] = $this->getNIdRubro(); //1
        $Datos[9] = $this->getCEmpLogoChico(); //1
        $Datos[10] = $this->getCEmpLogoGrande(); //1
        $Datos[11] = $this->getCEmpLogoFondo(); //1
        $Datos[12] = $this->getNEmpPropia(); //1
        $query = $this->db->query("CALL USP_EMP_I_EMPRESA(?,?,?,?,?,?,?,?,?,?,?,?,?)", $Datos);
        return $query;
    }
    function getDatos($idper){
        $query = "call USP_EMP_S_EMPRESA_GET('".$idper."')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }
    //0953
    function empresaUpd(){
        $Accion="";
        $Datos[0] = $Accion;
        $Datos[1] = $this->getCEmpNombre(); //1
        $Datos[2] = $this->getCEmpDescripcion(); //1
        $Datos[3] = $this->getCEmpDireccionFiscal(); //1
        $Datos[4] = $this->getCEmpTelefono(); //1
        $Datos[5] = $this->getCEmpCelular(); //1
        $Datos[6] = $this->getCEmpEmail(); //1
        $Datos[7] = $this->getCEmpRuc(); //1
        $Datos[8] = $this->getNIdRubro(); //1
        $Datos[9] = $this->getCEmpLogoChico(); //1
        $Datos[10] = $this->getCEmpLogoGrande(); //1
        $Datos[11] = $this->getCEmpLogoFondo(); //1
        $Datos[12] = $this->getNEmpPropia(); //1
        $Datos[13] = $this->getNEmpId(); //1
        $query = $this->db->query("CALL USP_EMP_U_EMPRESA(?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $Datos);
        return $query;
    }*/
    
    

}

?>