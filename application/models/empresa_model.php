<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 01-05-2013 19:17:17 */

class Empresa_model extends CI_Model {

    //Atributos de Clase
    private $nEmpId = '';
    private $cEmpNombre= '';
    private $cEmpDescripcion='';
    private $cEmpDireccionFiscal='';
    private $cEmpTelefono='';
    private $cEmpCelular='';
    private $cEmpEmail='';
    private $cEmpRuc='';
    private $nIdRubro='';
    private $cEmpLogoChico='';
    private $cEmpLogoGrande='';
    private $cEmpLogoFondo='';
    private $nEmpPropia='';
    private $cEmpEstado='';
    
    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }
    
    //FUNCIONES Set y Get
    public function getNEmpId() {
        return $this->nEmpId;
    }

    public function setNEmpId($nEmpId) {
        $this->nEmpId = $nEmpId;
    }

    public function getCEmpNombre() {
        return $this->cEmpNombre;
    }

    public function setCEmpNombre($cEmpNombre) {
        $this->cEmpNombre = $cEmpNombre;
    }

    public function getCEmpDescripcion() {
        return $this->cEmpDescripcion;
    }

    public function setCEmpDescripcion($cEmpDescripcion) {
        $this->cEmpDescripcion = $cEmpDescripcion;
    }

    public function getCEmpDireccionFiscal() {
        return $this->cEmpDireccionFiscal;
    }

    public function setCEmpDireccionFiscal($cEmpDireccionFiscal) {
        $this->cEmpDireccionFiscal = $cEmpDireccionFiscal;
    }

    public function getCEmpTelefono() {
        return $this->cEmpTelefono;
    }

    public function setCEmpTelefono($cEmpTelefono) {
        $this->cEmpTelefono = $cEmpTelefono;
    }

    public function getCEmpCelular() {
        return $this->cEmpCelular;
    }

    public function setCEmpCelular($cEmpCelular) {
        $this->cEmpCelular = $cEmpCelular;
    }

    public function getCEmpEmail() {
        return $this->cEmpEmail;
    }

    public function setCEmpEmail($cEmpEmail) {
        $this->cEmpEmail = $cEmpEmail;
    }

    public function getCEmpRuc() {
        return $this->cEmpRuc;
    }

    public function setCEmpRuc($cEmpRuc) {
        $this->cEmpRuc = $cEmpRuc;
    }

    public function getNIdRubro() {
        return $this->nIdRubro;
    }

    public function setNIdRubro($nIdRubro) {
        $this->nIdRubro = $nIdRubro;
    }

    public function getCEmpLogoChico() {
        return $this->cEmpLogoChico;
    }

    public function setCEmpLogoChico($cEmpLogoChico) {
        $this->cEmpLogoChico = $cEmpLogoChico;
    }

    public function getCEmpLogoGrande() {
        return $this->cEmpLogoGrande;
    }

    public function setCEmpLogoGrande($cEmpLogoGrande) {
        $this->cEmpLogoGrande = $cEmpLogoGrande;
    }

    public function getCEmpLogoFondo() {
        return $this->cEmpLogoFondo;
    }

    public function setCEmpLogoFondo($cEmpLogoFondo) {
        $this->cEmpLogoFondo = $cEmpLogoFondo;
    }

    public function getNEmpPropia() {
        return $this->nEmpPropia;
    }

    public function setNEmpPropia($nEmpPropia) {
        $this->nEmpPropia = $nEmpPropia;
    }

    public function getCEmpEstado() {
        return $this->cEmpEstado;
    }

    public function setCEmpEstado($cEmpEstado) {
        $this->cEmpEstado = $cEmpEstado;
    }
    /*Obtener Listado Personas*/
    function qryEmpresa() {
        $Datos[0] = 1; //1
        $query2 = $this->db->query("CALL USP_EMP_S_EMPRESAS(?)", $Datos);
        //return $query;
        
        
        //$query = "call USP_EMP_S_EMPRESAS()";
        //$query2 = $this->db->query($query);
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
        //public function getCEmpNombre() {
        //$query = $this->db->query("CALL USP_GEN_I_PISO(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $Datos);
        //$query = $this->db->query("CALL USP_EMP_I_EMPRESA('" . $archivo . "','" . $nombre  . "')");
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
    }
    
    

}

?>