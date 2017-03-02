<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 01-05-2013 19:17:17 */

class Local_model extends CI_Model {

   private $nCodigoLocal='';
   private $vDescripcionLocal='';
   private $vDireccion='';
   private $nEstado='';
   
   function getNCodigoLocal() {
       return $this->nCodigoLocal;
   }

   function getVDescripcionLocal() {
       return $this->vDescripcionLocal;
   }

   function getVDireccion() {
       return $this->vDireccion;
   }

   function getNEstado() {
       return $this->nEstado;
   }

   function setNCodigoLocal($nCodigoLocal) {
       $this->nCodigoLocal = $nCodigoLocal;
   }

   function setVDescripcionLocal($vDescripcionLocal) {
       $this->vDescripcionLocal = $vDescripcionLocal;
   }

   function setVDireccion($vDireccion) {
       $this->vDireccion = $vDireccion;
   }

   function setNEstado($nEstado) {
       $this->nEstado = $nEstado;
   }

       
    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }
    
    function getLocalActivos($option) {//comite
        $query = "call USP_S_LOCALES('".$option."')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

}

?>