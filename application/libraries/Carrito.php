<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carrito {

    //private $carrito = array();

    function __construct() {
        if (!get_instance()->session->userdata("carrito"))
            get_instance()->session->set_userdata("carrito", array());
    }

    private function carrito_to_session() {
        //get_instance()->session->set_userdata("carrito", $this->carrito);
    }

    private function session_to_carrito() {
        //$this->carrito = get_instance()->session->userdata("carrito");
    }

    public function add($item) {
        $carrito = get_instance()->session->userdata("carrito");
        //$carrito[$item["id_producto"]] = $item;
        $carrito[$item["nProductoHueco"]] = $item;
        get_instance()->session->set_userdata("carrito", $carrito);
    }

    public function delete($id_producto) {
        $carrito = get_instance()->session->userdata("carrito");
        unset($carrito[$id_producto]);
        get_instance()->session->set_userdata("carrito", $carrito);
    }
    public function updateItemPrecio($id_producto, $precio,$cantidad=1,$dscto=0) {
        $carrito = get_instance()->session->userdata("carrito");
        $carrito[$id_producto]["precio"] = $precio;
        $carrito[$id_producto]["cantidad"] = $cantidad;
        $carrito[$id_producto]["descuento"] = $dscto;
        $carrito[$id_producto]["subtotalfinal"]=(100-$dscto)*($precio*$cantidad)/100;
        
        get_instance()->session->set_userdata("carrito", $carrito);
    }
    
    /*public function update($id_producto, $cantidad) {
        $carrito = get_instance()->session->userdata("carrito");
        $carrito[$id_producto]["cantidad"] = $cantidad;
        get_instance()->session->set_userdata("carrito", $carrito);
    }*/

    public function show() {
        print_r(get_instance()->session->userdata("carrito"));
    }

    public function get_carrito() {
        return get_instance()->session->userdata("carrito");
    }

    public function delete_carrito() {
        $this->session->unset_userdata('carrito');
    }

    public function get_total() {
        if (!get_instance()->session->userdata("carrito"))
            return 0;
        $total = 0;
        $carrito = get_instance()->session->userdata("carrito");
        foreach ($carrito as $item) {
            $total += ($item["precio"] * $item["cantidad"])*(100-$item['descuento'])/100;
        }
        return $total;
    }

}
