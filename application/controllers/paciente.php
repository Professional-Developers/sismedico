<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paciente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        //$this->load->model('empresa_model', 'ObjEmpresa');
        //$this->load->model('sucursal_model', 'ObjSucursal');
        $this->load->model('persona_model', 'ObjPersona');
        $this->load->model('rol_model', 'ObjRol');
        $this->load->model('generica_model', 'ObjGenerica');
        $this->load->model('local_model', 'ObjLocal');
        $this->load->model('paciente_model', 'ObjPaciente');
        $this->load->model('pacientetelefono_model', 'ObjPacienteTelefono');
        $this->load->model('pacientecorreo_model', 'ObjPacienteCorreo');
        //$this->load->model('diccionario_model', 'ObjDiccionario'); //multitabla
    }

    public function nuevo() {
        $this->loaders->verificaacceso();
        //$datos[] = $this->cargaInformacionEmpresa();
        $datos[] = "";
        $this->load->view('layout/header', $datos[0]);
        //$data['cbo']= $this->ObjRol->getCboTipoRol();
        //$data['modelo'] = $this->ObjModelo->qryModeloActivas();
        $data['localregistro'] = $this->ObjLocal->getLocalActivos('COMBO-ACTIVOS');
        //print_r($data);exit;
        $data['tipo_estadocivil'] = $this->cboGenericaComboGet(
                array('L-DD-Combo', 'EstadoCivil'), array('id' => 'ddlEstadoCivil', 'name' => 'ddlEstadoCivil', 'value' => '', 'extra' => 'class="form-control"')
        );
        $data['tipo_estado_registro'] = $this->cboGenericaComboGet(
                array('L-DD-Combo', 'EstadoRegistro'), array('id' => 'ddlEstado', 'name' => 'ddlEstado', 'value' => '', 'extra' => 'class="form-control"')
        );
        $data['OperadorTelefonico'] = $this->cboGenericaComboGet(
                array('L-DD-Combo', 'OperadorTelefonico'), array('id' => 'ddlOperador', 'name' => 'ddlOperador', 'value' => '', 'extra' => 'class="form-control"')
        );
        //print_r($data['tipo_estadocivil']);exit;
        //print_r($data);exit;
        $this->load->view('paciente/panel_view', $data, false);
        $this->load->view('layout/footer');
    }

    public function listarpacientes() {
        $this->loaders->verificaacceso();
        //$datos[] = $this->cargaInformacionEmpresa();
        $datos[] = "";
        $this->load->view('layout/header', $datos[0]);

        $data['localregistro'] = $this->ObjLocal->getLocalActivos('COMBO-ACTIVOS');
        $data['tipo_estadocivil'] = $this->cboGenericaComboGet(
                array('L-DD-Combo', 'EstadoCivil'), array('id' => 'ddlEstadoCivil', 'name' => 'ddlEstadoCivil', 'value' => '', 'extra' => 'class="form-control"')
        );
        $data['tipo_estado_registro'] = $this->cboGenericaComboGet(
                array('L-DD-Combo', 'EstadoRegistro'), array('id' => 'ddlEstado', 'name' => 'ddlEstado', 'value' => '', 'extra' => 'class="form-control"')
        );
        $data['OperadorTelefonico'] = $this->cboGenericaComboGet(
                array('L-DD-Combo', 'OperadorTelefonico'), array('id' => 'ddlOperador', 'name' => 'ddlOperador', 'value' => '', 'extra' => 'class="form-control"')
        );

        $this->load->view('paciente/listarpacientes/listarpacientes_view', $data, false);

        $this->load->view('layout/footer');
    }

    public function qryPaciente() {
        if ($this->input->post('tipo')) {
            $tipo = $this->input->post('tipo');
        } else {
            $tipo = '';
        }
        //$data['listado'] = $this->ObjRol->qryRoles($tipo);
        //$this->load->view("rol/qry_view", $data);
        //echo "11";exit;
        $data['listado'] = $this->ObjPaciente->qryPaciente($tipo);
        //print_r($data);exit;
        $this->load->view("paciente/listarpacientes/qry_view", $data);
    }

    public function getDatosInformacionBasica() {
        //echo "hii";
        $ncodigopaciente = $this->input->post("pid");
        //print_r($ncodigopaciente);exit;
        $data['ncodigopaciente'] = $ncodigopaciente;
        /* $data['OperadorTelefonico'] = $this->cboGenericaComboGet(
          array('L-DD-Combo', 'OperadorTelefonico'), array('id' => 'ddlOperador', 'name' => 'ddlOperador', 'value' => '', 'extra' => 'class="form-control"')
          ); */
        $data['datos'] = $this->ObjPaciente->getDatosInformacionBasica($ncodigopaciente);
        print_r(json_encode($data['datos'][0]));
        //print_r($data);exit;
        //$this->load->view("paciente/panel_telefonos",$data);
    }

    public function pacienteUpd() {
        //print_r($_POST);exit;
        $this->ObjPaciente->setNCodigoPaciente($this->input->post('p_nCodigoPaciente'));
        $this->ObjPaciente->setNCodigoLocalRegistro($this->input->post('p_nCodigoLocalRegistro'));
        $this->ObjPaciente->setNCodigoLocalAtencion($this->input->post('p_nCodigoLocalAtencion'));
        $this->ObjPaciente->setVNombre($this->input->post('p_vNombre'));
        $this->ObjPaciente->setVApellidosPaterno($this->input->post('p_vApellidosPaterno'));
        $this->ObjPaciente->setVApellidosMaterno($this->input->post('p_vApellidosMaterno'));
        $this->ObjPaciente->setDFechaNacimiento($this->input->post('p_dFechaNacimiento'));
        $this->ObjPaciente->setVDireccion($this->input->post('p_vDireccion'));
        $this->ObjPaciente->setVObservaciones($this->input->post('p_vObservaciones'));
        $this->ObjPaciente->setCGenero($this->input->post('p_cGenero'));
        $this->ObjPaciente->setVMedioContactoFavorito($this->input->post('p_vMedioContactoFavorito'));
        $this->ObjPaciente->setCEsMoroso($this->input->post('p_cEsMoroso'));
        $this->ObjPaciente->setIFoto($this->input->post('p_iFoto'));
        $this->ObjPaciente->setVDNI($this->input->post('p_vDNI'));
        $this->ObjPaciente->setVLugarTrabajo($this->input->post('p_vLugarTrabajo'));
        $this->ObjPaciente->setVProcedencia($this->input->post('p_vProcedencia'));
        $this->ObjPaciente->setNEstadoCivil($this->input->post('p_nEstadoCivil'));
        $this->ObjPaciente->setVOcupacion($this->input->post('p_vOcupacion'));
        $this->ObjPaciente->setNUsuarioCrea($this->input->post('p_nUsuarioCrea'));
        $this->ObjPaciente->setVCorreo("correo");
        $this->ObjPaciente->setVHCL($this->input->post("p_vHCL"));

        $rs = $this->ObjPaciente->pacienteUpd();
        print_r($rs['out_param']);
//        if ($rs) {
//            echo 1;
//        } else {
//            echo 0;
//        }
    }

    function cboGenericaComboGet($Parametros, $Config) {
        $datos = $this->ObjGenerica->cboGenericaComboGet($Parametros, $Config);
        return $datos;
    }

    public function pacienteIns() {
        //print_r($_POST);exit;
        $this->ObjPaciente->setNCodigoLocalRegistro($this->input->post('p_nCodigoLocalRegistro'));
        $this->ObjPaciente->setNCodigoLocalAtencion($this->input->post('p_nCodigoLocalAtencion'));
        $this->ObjPaciente->setVNombre($this->input->post('p_vNombre'));
        $this->ObjPaciente->setVApellidosPaterno($this->input->post('p_vApellidosPaterno'));
        $this->ObjPaciente->setVApellidosMaterno($this->input->post('p_vApellidosMaterno'));
        $this->ObjPaciente->setDFechaNacimiento($this->input->post('p_dFechaNacimiento'));
        $this->ObjPaciente->setVDireccion($this->input->post('p_vDireccion'));
        $this->ObjPaciente->setVObservaciones($this->input->post('p_vObservaciones'));
        $this->ObjPaciente->setCGenero($this->input->post('p_cGenero'));
        $this->ObjPaciente->setVMedioContactoFavorito($this->input->post('p_vMedioContactoFavorito'));
        $this->ObjPaciente->setCEsMoroso($this->input->post('p_cEsMoroso'));
        $this->ObjPaciente->setIFoto($this->input->post('p_iFoto'));
        $this->ObjPaciente->setVDNI($this->input->post('p_vDNI'));
        $this->ObjPaciente->setVLugarTrabajo($this->input->post('p_vLugarTrabajo'));
        $this->ObjPaciente->setVProcedencia($this->input->post('p_vProcedencia'));
        $this->ObjPaciente->setNEstadoCivil($this->input->post('p_nEstadoCivil'));
        $this->ObjPaciente->setVOcupacion($this->input->post('p_vOcupacion'));
        $this->ObjPaciente->setNUsuarioCrea($this->input->post('p_nUsuarioCrea'));
        $this->ObjPaciente->setVCorreo("correo");
        $this->ObjPaciente->setVHCL($this->input->post("p_vHCL"));

        $rs = $this->ObjPaciente->pacienteIns();
        print_r($rs['out_param']);
//        if ($rs) {
//            echo 1;
//        } else {
//            echo 0;
//        }
    }

    /* function cboDiccionarioGet($Parametros, $Config) {
      $datos = $this->ObjDiccionario->cboDiccionarioGet($Parametros, $Config);
      return $datos;
      } */

    public function upload() {
//        print_r($_FILES);exit;
        //$p_nombreImagen = (isset($_GET['nombreImagen']) ? $_GET['nombreImagen'] : $_POST['nombreImagen']);

        if (isset($_FILES["file"]["type"])) {
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["file"]["name"]);
            $file_extension = end($temporary);


            if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
                    ) && ($_FILES["file"]["size"] < 900000)//Approx. 100kb files can be uploaded.
                    && in_array($file_extension, $validextensions)) {
                if ($_FILES["file"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
                } else {
                    $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                    //$targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
                    $extensi = explode("/", $_FILES["file"]["type"]);
                    $extension = "";
                    if ($extensi[1] == "jpeg") {
                        $extension = "jpg";
                    } else {
                        $extension = $extensi[1];
                    }
                    //agregue
                    $p_nombreImagen = $_FILES['file']['name'];
                    //$targetPath = "upload/" . $p_nombreImagen . "." . $extension;
                    $targetPath = "uploads/" . $p_nombreImagen;

                    move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
                    echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
                    echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
                    echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
                    echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                    echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
                }
            } else {
                echo "<span id='invalid'>***Invalid file Size or Type***<span>";
            }
        } else {

            echo "noooooo";
        }
    }

    public function getPanelTelefonosListado() {
        if ($this->input->post('tipo')) {
            $tipo = $this->input->post('tipo');
        } else {
            $tipo = '';
        }
        $codigopaciente = $this->input->post("pid"); //hdn_codigopaciente
        $data['listado'] = $this->ObjPacienteTelefono->qryPacienteTelefonos($tipo, $codigopaciente);
        $this->load->view("pacientetelefono/qry_view", $data);
    }

    public function getPanelCorreosListado() {
        if ($this->input->post('tipo')) {
            $tipo = $this->input->post('tipo');
        } else {
            $tipo = '';
        }
        $codigopaciente = $this->input->post("pid"); //hdn_codigopaciente
        /* $data['listado'] = $this->ObjPacienteTelefono->qryPacienteTelefonos($tipo,$codigopaciente);
          $this->load->view("pacientetelefono/qry_view", $data); */
        $data['listado'] = $this->ObjPacienteCorreo->qryPacienteCorreos($tipo, $codigopaciente);
        $this->load->view("pacientecorreos/qry_view", $data);
    }

    /*
      public function getPanelTelefonos(){
      //echo "hii";
      $ncodigopaciente = $this->input->post("pid");
      //print_r($ncodigopaciente);exit;
      $data['ncodigopaciente']=$ncodigopaciente;
      $data['OperadorTelefonico'] = $this->cboGenericaComboGet(
      array('L-DD-Combo', 'OperadorTelefonico'), array('id' => 'ddlOperador', 'name' => 'ddlOperador', 'value' => '', 'extra' => 'class="form-control"')
      );
      //print_r($data);exit;
      $this->load->view("paciente/panel_telefonos",$data);
      } */

    public function pacienteTelefonoIns() {
        //pacienteTelefonoIns
        $this->ObjPacienteTelefono->setP_nCodigoPaciente($this->input->post('p_nCodigoPaciente'));
        $this->ObjPacienteTelefono->setP_nCodigoOperador($this->input->post('p_nCodigoOperador'));
        $this->ObjPacienteTelefono->setP_vDescripcionOperador($this->input->post('p_vDescripcionOperador'));
        $this->ObjPacienteTelefono->setP_nTipoTelefono($this->input->post('p_nTipoTelefono'));
        $this->ObjPacienteTelefono->setP_vTipoTelefono($this->input->post('p_vTipoTelefono'));
        $this->ObjPacienteTelefono->setP_bEsWhatsapp($this->input->post('p_bEsWhatsapp'));
        $this->ObjPacienteTelefono->setP_vTitular($this->input->post('p_vTitular'));
        $this->ObjPacienteTelefono->setP_vTelefono($this->input->post('p_vTelefono'));
        $rs = $this->ObjPacienteTelefono->pacienteTelefonoIns();
        print_r($rs);
    }

    public function pacienteTelefonoUpd() {
        //pacienteTelefonoIns
        //p_nCodigoTelefono
        $this->ObjPacienteTelefono->setP_nCodigoTelefono($this->input->post('p_nCodigoTelefono'));
        $this->ObjPacienteTelefono->setP_nCodigoPaciente($this->input->post('p_nCodigoPaciente'));
        $this->ObjPacienteTelefono->setP_nCodigoOperador($this->input->post('p_nCodigoOperador'));
        $this->ObjPacienteTelefono->setP_vDescripcionOperador($this->input->post('p_vDescripcionOperador'));
        $this->ObjPacienteTelefono->setP_nTipoTelefono($this->input->post('p_nTipoTelefono'));
        $this->ObjPacienteTelefono->setP_vTipoTelefono($this->input->post('p_vTipoTelefono'));
        $this->ObjPacienteTelefono->setP_bEsWhatsapp($this->input->post('p_bEsWhatsapp'));
        $this->ObjPacienteTelefono->setP_vTitular($this->input->post('p_vTitular'));
        $this->ObjPacienteTelefono->setP_vTelefono($this->input->post('p_vTelefono'));

        $rs = $this->ObjPacienteTelefono->pacienteTelefonoUpd();
        print_r($rs);
    }

    public function pacienteCorreoUpd() {
        //pacienteTelefonoIns
        $this->ObjPacienteCorreo->setNCodigoRedSocial($this->input->post('p_nCodigoCorreo'));
        $this->ObjPacienteCorreo->setNCodigoPaciente($this->input->post('nCodigoPaciente'));
        $this->ObjPacienteCorreo->setVDireccion($this->input->post('vDireccion'));
        $this->ObjPacienteCorreo->setNTipoRedSocial($this->input->post('nTipoRedSocial'));
        $this->ObjPacienteCorreo->setVTipoRedSocial($this->input->post('vTipoRedSocial'));
        $this->ObjPacienteCorreo->setVTitular($this->input->post('vTitular'));
        $this->ObjPacienteCorreo->setBPrincipal($this->input->post('bPrincipal'));

        $rs = $this->ObjPacienteCorreo->pacienteCorreoUpd();
        print_r($rs);
    }
    public function pacienteCorreoIns() {
        //pacienteTelefonoIns
        $this->ObjPacienteCorreo->setNCodigoPaciente($this->input->post('nCodigoPaciente'));
        $this->ObjPacienteCorreo->setVDireccion($this->input->post('vDireccion'));
        $this->ObjPacienteCorreo->setNTipoRedSocial($this->input->post('nTipoRedSocial'));
        $this->ObjPacienteCorreo->setVTipoRedSocial($this->input->post('vTipoRedSocial'));
        $this->ObjPacienteCorreo->setVTitular($this->input->post('vTitular'));
        $this->ObjPacienteCorreo->setBPrincipal($this->input->post('bPrincipal'));

        $rs = $this->ObjPacienteCorreo->pacienteCorreoIns();
        print_r($rs);
    }
    
    

    public function qryPacienteTelefonos() {
        if ($this->input->post('tipo')) {
            $tipo = $this->input->post('tipo');
        } else {
            $tipo = '';
        }
        $codigopaciente = $this->input->post("hdn_codigopaciente");
        $data['listado'] = $this->ObjPacienteTelefono->qryPacienteTelefonos($tipo, $codigopaciente);
        $this->load->view("pacientetelefono/qry_view", $data);
    }

    public function qryPacienteCorreos() {
        if ($this->input->post('tipo')) {
            $tipo = $this->input->post('tipo');
        } else {
            $tipo = '';
        }
        $codigopaciente = $this->input->post("hdn_codigopaciente");
        /*$data['listado'] = $this->ObjPacienteTelefono->qryPacienteCorreos($tipo, $codigopaciente);
        $this->load->view("pacientetelefono/qry_view", $data);*/
        $data['listado'] = $this->ObjPacienteCorreo->qryPacienteCorreos($tipo, $codigopaciente);
        $this->load->view("pacientecorreos/qry_view", $data);
    }

    public function getPanelCorreos() {
        //echo "hii";
        $this->load->view("paciente/panel_correos");
    }

    public function getUpdTelefono() {
        //print_r($_POST);
        $nCodigoTelefono = $this->input->post("nCodigoTelefono");
        $data['datos'] = $this->ObjPacienteTelefono->getUpdTelefono($nCodigoTelefono);
        //print_r($data);
        print_r(json_encode($data['datos'][0]));
    }
    public function getUpdCorreo() {
        //print_r($_POST);
        $nCodigoTelefono = $this->input->post("nCodigoRedSocial");
        $data['datos'] = $this->ObjPacienteCorreo->getUpdCorreo($nCodigoTelefono);
        //print_r($data);
        print_r(json_encode($data['datos'][0]));
    }

}

/* End of file persona.php */
/* Location: ./application/controllers/persona.php */
?>