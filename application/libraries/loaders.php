<?php
class Loaders {
    //CREA MENU DE OPCIONES
    public function get_menu() {
        $CI = & get_instance();
        $CI->load->model('menu_model', 'objMenu');
        $url = $CI->uri->segment(1);
        // $url = '../'.$CI->uri->segment(1) . '/' . $CI->uri->segment(2);
        // $url = $CI->uri->segment(1) . '/' . $CI->uri->segment(2);
        $data=array('url' => $url);        
        $CI->session->set_userdata($data); 
        return $CI->objMenu->listaMenuOpciones();
    }

    public function userDataGet(){
        $CI =& get_instance();
        $CI->load->model('usuario_model','ObjUsuario');
        return $ObjUsuario->get_ObjUsuario( $this->session->userdata('IdUsuario') );
    }

    //VERIFICAR ACCESO DE USUARIO
    public function verificaAcceso() {
        $CI = & get_instance();
        $iduser = $CI->session->userdata('IdUsuario');
        //echo $iduser." dddd";exit;
        if($iduser){
            $url = $CI->uri->segment(1);
            // $url = '../'.$CI->uri->segment(1);
            // $metodo = ( $CI->uri->segment(2)!="" ? '/'.$CI->uri->segment(2) :'');
            // $url = '../'.$CI->uri->segment(1) .$metodo; 
            // $url = '../'.$CI->uri->segment(1) . '/' . $CI->uri->segment(2); 
            // $url = $CI->uri->segment(1) . '/' . $CI->uri->segment(2); 
            // print_r($url);
            // exit();
//            SELECT per.*, men.* 
//                FROM permiso per 
//                INNER JOIN usuario usu ON usu.nUsuCodigo = per.nUsuCodigo
//                INNER JOIN menu men ON men.nMenId = per.nMenId 
//                WHERE men.cMenUrl= ? AND usu.nUsuCodigo=? ", 
            $query = $CI->db->query("
                SELECT per.*, men.* 
                FROM permisorol per 
                INNER JOIN usuario usu ON usu.nIdRol = per.nIdRol
                INNER JOIN menu men ON men.nMenId = per.nMenId 
                WHERE men.cMenUrl= ? AND usu.nUsuCodigo=? ", 
                    array($url,$iduser));

            if ($query->num_rows() > 0) {
                return true;
            }
            show_error(utf8_decode('<center><div style="display: table-cell;vertical-align: middle;position: relative;"><center><br/><p><img src="'.URL_IMG.'error.gif"/><h2 style="color:black;">No cuenta con los privilegios suficientes para acceder a esta pagina.</h2></p></center></div></center>'), 500);
        }
        else{
            redirect('/');
            // $CI->load->view('´login/login_view');
            // 'login/login_view'
        }
    }
    public function numero2mes($num){
        $mes = '';
        switch ($num) {
            case 1:
                $mes='Enero';
            break;
            case 2:
                $mes='Febrero';
            break;
            case 3:
                $mes='Marzo';
            break;
            case 4:
                $mes='Abril';
            break;
            case 5:
                $mes='Mayo';
            break;
            case 6:
                $mes='Junio';
            break;
            case 7:
                $mes='Julio';
            break;
            case 8:
                $mes='Agosto';
            break;
            case 9:
                $mes='Septiembre';
            break;
            case 10:
                $mes='Octubre';
            break;
            case 11:
                $mes='Noviembre';
            break;
            case 12:
                $mes='Diciembre';
            break;
            default:
                $mes = 'Nos es un Mes';
            break;
        }
        return $mes;
    }    

}
?>