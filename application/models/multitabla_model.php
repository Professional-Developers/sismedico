<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @jvinceso*/
/* Date : 01-05-2013 19:17:17 */
	class Multitabla_model extends CI_Model {
		//Atributos de Clase
		private $nMulId = '';
		private $nMulIdPadre = '';
		private $cMulDescripcion = '';
		private $dMulFechaRegistro = '';
		private $nMulOrden = '';
		private $nMulEstado = '';

		//Constructor de Clase
		function __construct(){
			parent::__construct();
		}

		//FUNCIONES Set
		function set_nMulId($nMulId){
			$this->nMulId = $nMulId;
		}
		function set_nMulIdPadre($nMulIdPadre){
			$this->nMulIdPadre = $nMulIdPadre;
		}
		function set_cMulDescripcion($cMulDescripcion){
			$this->cMulDescripcion = $cMulDescripcion;
		}
		function set_dMulFechaRegistro($dMulFechaRegistro){
			$this->dMulFechaRegistro = $dMulFechaRegistro;
		}
		function set_nMulOrden($nMulOrden){
			$this->nMulOrden = $nMulOrden;
		}
		function set_nMulEstado($nMulEstado){
			$this->nMulEstado = $nMulEstado;
		}

		//FUNCIONES Get
		function get_nMulId(){
			return $this->nMulId;
		}
		function get_nMulIdPadre(){
			return $this->nMulIdPadre;
		}
		function get_cMulDescripcion(){
			return $this->cMulDescripcion;
		}
		function get_dMulFechaRegistro(){
			return $this->dMulFechaRegistro;
		}
		function get_nMulOrden(){
			return $this->nMulOrden;
		}
		function get_nMulEstado(){
			return $this->nMulEstado;
		}
		//Obtener Objeto MULTITABLA
		function get_ObjMultitabla($CAMPO){
			$query = $this->db->query("SELECT * FROM MULTITABLA WHERE CAMPO=?", array($CAMPO));
			if ($query->num_rows() > 0){
				$row = $query->row();
				//CREANDO EL OBJETO
			}
		}
	}
?>