<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//require_once APPPATH.'controllers/controlador_padre.php';
//require_once APPPATH.'controllers/principal.php';
//class Empresa extends Principal {
class Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('diccionario_model', 'ObjDiccionario'); //multitabla
    }

    public function cargaInformacionEmpresa() {
        $data['informacion'] = $this->ObjEmpresa->qryEmpresa();
        $datos['nombreEmpresa'] = $data['informacion'][0]['cEmpNombre'];
        $datos['logoEmpresa'] = $data['informacion'][0]['cEmpLogoGrande'];
        if ($datos['nombreEmpresa'] == "")
            $datos['nombreEmpresa'] = "empresa";
        if ($datos['logoEmpresa'] == "")
            $datos['logoEmpresa'] = "sinEmpresa.jpg";
        return $datos;
    }

    public function index() {
        //error_reporting(E_ALL ^ E_DEPRECATED);
        $this->loaders->verificaacceso();
        $data['modulo'] = 'Empresa';
        $datos[] = $this->cargaInformacionEmpresa();
        //print_r($datos);
        //print_r($data);exit;
        $this->load->view('layout/header', $datos[0]);
        $data['tipo_rubro'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '2'), array('ID' => 'nTipoRubro', 'NAME' => 'nTipoRubro', 'VALUE' => '9', 'EXTRA' => '')
        );

        $data['tipo_empresa'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '3'), array('ID' => 'nTipoEmpresa', 'NAME' => 'nTipoEmpresa', 'VALUE' => '49', 'EXTRA' => '')
        );

        //print_r($data);exit;
        //echo "hola";
        //exit;
        $this->load->view('empresa/panel_view', $data);
        $this->load->view('layout/footer');
    }

    public function qryEmpresa() {
        $data['informacion'] = $this->ObjEmpresa->qryEmpresa();
        $this->load->view("empresa/qry_view", $data);
    }

    function cboDiccionarioGet($Parametros, $Config) {
        $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
        return $datos;
    }

    function empresaIns() {
        $status = "ok";
        $msg = "mal";
        $file_element_name = 'txt_cEmpLogoGrande';
        if ($status != "error") {
            //$config['upload_path'] = './uploads/obras/multimedia';
            $config['upload_path'] = './uploads/logoEmpresa';
            //$config['allowed_types'] = 'png|jpg|jpeg|gif|bmp|doc|docx|pdf|txt|xsl|xslx|ppt|pptx';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|bmp';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->ObjEmpresa->setcEmpNombre($_POST['txt_cPerNombres']);
            $this->ObjEmpresa->setcEmpDescripcion($_POST['txt_cEmpDescripcion']);
            $this->ObjEmpresa->setcEmpDireccionFiscal($_POST['txt_cEmpDireccionFiscal']);
            $this->ObjEmpresa->setcEmpTelefono($_POST['txt_cEmpTelefono']);
            $this->ObjEmpresa->setcEmpCelular($_POST['txt_cEmpCelular']);
            $this->ObjEmpresa->setcEmpEmail($_POST['txt_cEmpEmail']);
            $this->ObjEmpresa->setcEmpRuc($_POST['txt_cEmpRuc']);
            $this->ObjEmpresa->setnIdRubro($_POST['nTipoRubro']);
            $this->ObjEmpresa->setcEmpLogoChico('');
            $this->ObjEmpresa->setcEmpLogoGrande('');
            $this->ObjEmpresa->setcEmpLogoFondo('');
            $this->ObjEmpresa->setnEmpPropia($_POST['nTipoEmpresa']);

            if (!$this->upload->do_upload($file_element_name)) {
                $msg = $this->upload->display_errors('', '');
                $status = "sinarchivo";
                $result = $this->ObjEmpresa->empresaIns();
                if ($result) {
                    $status = "success";
                    $msg = "Guardado Satisfactorio";
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Hubo un inconveniente comuniquese con el administrador.";
                }
            } else {
                $data = $this->upload->data();
                /* $result = $this->ObjEmpresa->empresaIns($data['file_name'], $_POST['txt_cPerNombres']); */
                $this->ObjEmpresa->setcEmpLogoChico($data['file_name']);
                $this->ObjEmpresa->setcEmpLogoGrande($data['file_name']);
                $this->ObjEmpresa->setcEmpLogoFondo($data['file_name']);

                $result = $this->ObjEmpresa->empresaIns();
                if ($result) {
                    $status = "success";
                    //$titulo = $_POST['title'];
                    $imagen = $data['file_name'];
                    $background = 'images/ok.jpg';
                    $msg = "Guardado Satisfactorio";
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $imagen = $data['file_name'];
                    $background = 'images/error.png';
                    //$titulo = $_POST['title'];
                    $msg = "Hubo un inconveniente comuniquese con el administrador.";
                }
            }

            @unlink($_FILES[$file_element_name]);
            echo json_encode(array('status' => $status, 'msg' => $msg, 'id' => $file_element_name, 'pat' => $config['upload_path']));
        }
    }

    public function panel_updEmpresa() {
        $algo = json_decode($_POST["json"]);
        $id = $algo->nEmpId;
        //$data["informacion"] = $this->ObjPersona->getDatos($id);
        $data["informacion"] = $this->ObjEmpresa->getDatos($id);
        $data['tipo_rubroUpd'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '8'), array('ID' => 'upd_nTipoRubroUpd', 'NAME' => 'upd_nTipoRubroUpd', 'VALUE' => $data["informacion"][0]['nIdRubro'], 'EXTRA' => '')
        );
        $data['tipo_empresaUpd'] =
                $this->cboDiccionarioGet(
                array('L-DD-Combo', '48'), array('ID' => 'upd_nTipoEmpresaUpd', 'NAME' => 'upd_nTipoEmpresaUpd', 'VALUE' => $data["informacion"][0]['nEmpPropia'], 'EXTRA' => '')
        );
        //print_r($data);exit;
        $this->load->view("empresa/upd_view", $data);
    }

    public function empresaUpd() {
        $status = "ok";
        $msg = "mal";
        $file_element_name = 'upd_txt_cEmpLogoGrande';
        if ($status != "error") {
            $config['upload_path'] = './uploads/logoEmpresa';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|bmp';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->ObjEmpresa->setNEmpId($_POST['hdnidEmpresa_upd']);
            $this->ObjEmpresa->setcEmpNombre($_POST['upd_txt_cPerNombres']);
            $this->ObjEmpresa->setcEmpDescripcion($_POST['upd_txt_cEmpDescripcion']);
            $this->ObjEmpresa->setcEmpDireccionFiscal($_POST['upd_txt_cEmpDireccionFiscal']);
            $this->ObjEmpresa->setcEmpTelefono($_POST['upd_txt_cEmpTelefono']);
            $this->ObjEmpresa->setcEmpCelular($_POST['upd_txt_cEmpCelular']);
            $this->ObjEmpresa->setcEmpEmail($_POST['upd_txt_cEmpEmail']);
            $this->ObjEmpresa->setcEmpRuc($_POST['upd_txt_cEmpRuc']);
            $this->ObjEmpresa->setnIdRubro($_POST['upd_nTipoRubro']);
            /* $this->ObjEmpresa->setcEmpLogoChico('');
              $this->ObjEmpresa->setcEmpLogoGrande('');
              $this->ObjEmpresa->setcEmpLogoFondo(''); */
            $this->ObjEmpresa->setnEmpPropia($_POST['upd_nTipoEmpresa']);

            if (!$this->upload->do_upload($file_element_name)) {
                $msg = $this->upload->display_errors('', '');
                $status = "sinarchivo";
                $this->ObjEmpresa->setcEmpLogoChico($_POST['img_upd_logo']);
                $this->ObjEmpresa->setcEmpLogoGrande($_POST['img_upd_logo']);
                $this->ObjEmpresa->setcEmpLogoFondo($_POST['img_upd_logo']);
                $result = $this->ObjEmpresa->empresaUpd();
                if ($result) {
                    $status = "success";
                    $msg = "Guardado Satisfactorio sin archivo";
                } else {
                    //unlink($data['full_path']);
                    $status = "error";
                    $msg = "Hubo un inconveniente comuniquese con el administrador.";
                }
            } else {
                $data = $this->upload->data();
                /* $result = $this->ObjEmpresa->empresaIns($data['file_name'], $_POST['txt_cPerNombres']); */
                /* if ($data['file_name'] != '') { */
                $this->ObjEmpresa->setcEmpLogoChico($data['file_name']);
                $this->ObjEmpresa->setcEmpLogoGrande($data['file_name']);
                $this->ObjEmpresa->setcEmpLogoFondo($data['file_name']);

                $result = $this->ObjEmpresa->empresaUpd();
                if ($result) {
                    $status = "success";
                    //$titulo = $_POST['title'];
                    $imagen = $data['file_name'];
                    $background = 'images/ok.jpg';
                    $msg = "Guardado Satisfactorio 1";
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $imagen = $data['file_name'];
                    $background = 'images/error.png';
                    //$titulo = $_POST['title'];
                    $msg = "Hubo un inconveniente comuniquese con el administrador.";
                }
                /* } *//* else{
                  $this->ObjEmpresa->setcEmpLogoChico($_POST['img_upd_logo']);
                  $this->ObjEmpresa->setcEmpLogoGrande($_POST['img_upd_logo']);
                  $this->ObjEmpresa->setcEmpLogoFondo($_POST['img_upd_logo']);

                  $result = $this->ObjEmpresa->empresaUpd();
                  if ($result) {
                  $status = "success";
                  //$titulo = $_POST['title'];
                  $imagen = $data['file_name'];
                  $background = 'images/ok.jpg';
                  $msg = "Guardado Satisfactorio 2";
                  } else {
                  unlink($data['full_path']);
                  $status = "error";
                  $imagen = $data['file_name'];
                  $background = 'images/error.png';
                  //$titulo = $_POST['title'];
                  $msg = "Hubo un inconveniente comuniquese con el administrador.";
                  }
                  } */
            }

            @unlink($_FILES[$file_element_name]);
            echo json_encode(array('status' => $status, 'msg' => $msg, 'id' => $file_element_name, 'pat' => $config['upload_path']));
        }
    }

    public function updPersona() {
        $this->ObjPersona->set_cPerNombres($this->input->post('txtcPerNombresUpd'));
        $this->ObjPersona->set_cPerApellidoPaterno($this->input->post('txtcPerApellidoPaternoUpd'));
        $this->ObjPersona->set_cPerApellidoMaterno($this->input->post('txtcPerApellidoMaternoUpd'));
        $this->ObjPersona->set_cPerDni($this->input->post('txtcPerDniUpd'));
        $this->ObjPersona->set_cPerDireccion($this->input->post('txtcPerDireccionUpd'));
        $this->ObjPersona->set_cPerTelefono($this->input->post('txtcPerTelefonoUpd'));
        $this->ObjPersona->set_cPerCelular($this->input->post('txtcPerCelularUpd'));

        $resultado = $this->ObjPersona->updPersona($this->input->post('hdnidPersona_upd'));
        if ($resultado) {
            echo 1;
        } else {
            echo 0;
        }
    }

}

/* End of file persona.php */
/* Location: ./application/controllers/persona.php */
?>