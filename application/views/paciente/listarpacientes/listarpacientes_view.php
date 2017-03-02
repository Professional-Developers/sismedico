<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <!--                    <form method="get" class="form-horizontal">-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs" id="ul-menu-list">
                                    <input type="hidden" id="hdn_codigopaciente" value="0" />
                                    <li class="active mistabs" id="li1-qrypacientes"><a data-toggle="tab" href="#tab-1-qry-pacientes" id="listaPacientes"> Relación de Pacientes</a></li>
                                    <li class="mistabs"        id="li2-informacionbasica"><a data-toggle="tab" href="#tab-2-informacionbasica"> Información Básica</a></li>
                                    <li class="mistabs"        id="li3-telefonos"><a data-toggle="tab" href="#tab-3-telefonos">Teléfonos</a></li>
                                    <li class="mistabs"        id="li4-correos"><a data-toggle="tab" href="#tab-4-correos">Correo y Redes</a></li>
                                    <!--<li class=""><a data-toggle="tab" href="#tab-4">Cuentas Pendientes</a></li>-->
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1-qry-pacientes" class="tab-pane active">
                                        Relacion Pacientes
                                    </div>
                                    <div id="tab-2-informacionbasica" class="tab-pane">
                                        <div id="bloqueo" class="panel-body">
                                            <form method="get" class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-sm-3">
                                                        <div class="img-preview img-preview-sm">
                                                            <img id="imagePreviewUser" src="<?php echo URL_PLU_IMG; ?>user_new.jpg" class="img-circle circle-border m-b-md" alt="profile" width="120px" height="120px">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="btn-group">
                                                            <label title="Upload image file" for="file" class="btn btn-primary">
                                                                <input name="file" id="file" type="file" accept="image/*"  class="hide">
                                                                Cargar Imagen
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>    

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Nombres</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="txtNombrePaciente" class="form-control" value="cristian">
                                                    </div>
                                                    <label class="col-sm-2 control-label">HCL</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="txtHCL" class="form-control" readonly>
                                                    </div>
                                                    <di class="col-sm-2"></br></di>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Ap.Paterno</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="txtApellidoPaterno" class="form-control" value="gonzalez">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Local Registro</label>
                                                    <div class="col-sm-3">
                                                        <!--<select name="ddlLocalRegistro" id="ddlLocalRegistro" class="form-control"></select>-->
                                                        <select class="form-control" id="ddlLocalRegistro" name="ddlLocalRegistro">
                                                            <?php
                                                            //print_r($localregistro);
                                                            foreach ($localregistro as $valor) {
                                                                echo "<option value=" . $valor['nCodigoLocal'] . ">" . $valor['vDescripcionLocal'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <di class="col-sm-2"></br></di>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Ap.Materno</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="txtApellidoMaterno" class="form-control" value="">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Local Atención</label>
                                                    <div class="col-sm-3">
                                                        <select name="ddlLocalAtencion" id="ddlLocalAtencion" class="form-control">
                                                            <?php
                                                            //print_r($localregistro);
                                                            foreach ($localregistro as $valor) {
                                                                echo "<option value=" . $valor['nCodigoLocal'] . ">" . $valor['vDescripcionLocal'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <di class="col-sm-2"></br></di>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">DNI / CE</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="txtDNI" class="form-control" value="">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Ocupación</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="txtOcupacion" class="form-control" value="">
                                                    </div>
                                                    <di class="col-sm-2"></br></di>
                                                </div>
                                                <div class="form-group" id="data_1">
                                                    <label class="col-sm-2 control-label">Fec.Nacimiento</label>
                                                    <div class="col-sm-3">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" id="txtFechaNacimiento" class="form-control">
                                                        </div>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Centro Trabajo</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="txtCentroTrabajo" id="txtCentroTrabajo" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Género</label>
                                                    <div class="col-sm-3">
                                                        <label class="control-inline fancy-radio">
                                                            <input id="rdbMasculino" type="radio" name="rdbGenero" checked>
                                                            <span><i></i>Masculino</span>
                                                        </label>
                                                        <label class="control-inline fancy-radio">
                                                            <input id="rdbFemenino" type="radio" name="rdbGenero">
                                                            <span><i></i>Femenino</span>
                                                        </label>
                                                    </div>
                                                    <label for="chkEsMoroso" class="col-sm-2 control-label">Morosidad</label>
                                                    <div class="col-sm-3">
                                                        <label class="control-inline fancy-checkbox">
                                                            <input type="checkbox" id="chkEsMoroso">
                                                            <span>Es Moroso</span>
                                                        </label>
                                                    </div>
                                                    <di class="col-sm-2"></br></di>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Estado Civil</label>
                                                    <div class="col-sm-3">
                                                        <?php echo $tipo_estadocivil; ?>
                                                    </div>

                                                    <label class="col-sm-2 control-label">Estado</label>
                                                    <div class="col-sm-3">
                                                        <!--<select id="ddlEstado" name="ddlEstado" class="form-control"></select>-->
                                                        <?php echo $tipo_estado_registro; ?>
                                                    </div>
                                                    <di class="col-sm-2"></br></di>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Procedencia</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="txtProcedencia" class="form-control" value="">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Observaciones</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="txtObservaciones" class="form-control" value="">
                                                    </div>
                                                    <di class="col-sm-2"></br></di>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Dirección</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="txtDireccion" class="form-control" value="">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!--<button id="btnGrabar" type="button" class="btn btn-primary" onclick="FnInsetarPaciente()"><i class="fa fa-check-circle"></i> Guardar</button>-->
                                                        <button id="btnGrabarUpd" type="button" class="btn btn-primary" onclick="FnUpdPaciente()"><i class="fa fa-check-circle"></i> Guardar</button>
                                                        <!--<button type="submit" id="btnRegistrarUsuario" class="btn btn-info">Registrar</button>-->
                                                        <!--<button type="button" id="btnCancelar" class="btn btn-default">Cancelar</button>-->
                                                        <div id="message"></div>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div id="tab-3-telefonos" class="tab-pane">
                                        <!--<div>-->
                                        <div id="bloqueo2" class="panel-body">

                                            <form class="form-horizontal" role="form">
                                                <input type="hidden" id="hdn_codigotelefono" value="0" />
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tipo Teléfono</label>
                                                    <div class="col-sm-2">
                                                        <select id="ddlTipoTelefono" name="ddlTipoTelefono" class="form-control">
                                                            <option value="option1">Móvil</option>
                                                            <option value="option2">Fijo(Casa)</option>
                                                            <option value="option3">Anexo</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Operador</label>
                                                    <div class="col-sm-2">
    <!--                                                    <select name="ddlOperador" id="ddlOperador" class="form-control">
                                                        </select>-->
                                                        <?php echo $OperadorTelefonico; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtTelefono" class="col-sm-2 control-label">Teléfono</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="txtTelefono" placeholder="Teléfono">
                                                    </div>
                                                    <label for="chkEsWhatsApp" class="col-sm-2 control-label">WhatsApp</label>
                                                    <div class="col-sm-2">
                                                        <label class="control-inline fancy-checkbox">
                                                            <input type="checkbox" id="chkEsWhatsApp">
                                                            <span>Es WhatsApp</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtTitular" class="col-sm-2 control-label">Titular</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="txtTitular" placeholder="Titular">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <!--<button type="button" class="btn btn-primary" onclick="FnAddDetail_Contact()"><i class="fa fa-check-circle"></i>Agregar</button>-->
                                                        <button type="button" class="btn btn-primary" id="btnAgregarTelefonos"><i class="fa fa-check-circle"></i>Agregar</button>
                                                    </div>
                                                </div>
                                                <div class="wrapper wrapper-content  animated fadeInRight">
                                                    <div class="ibox-content">
                                                        <div class="jqGrid_wrapper">
                                                            <table id="GridViewPacientesContacto"><tr><td></td></tr></table>
                                                            <div id="PagerPacientesContacto"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>

                                            <!--                                            <div class="item col-md-6">
                                            
                                                                                        </div>-->
                                            <!--<div id="div_tabla_telefonos_paciente"></div>-->
                                            <div id="listaPacienteTelefonos"></div>
                                        </div>

                                    </div>
                                    <div id="tab-4-correos" class="tab-pane">
                                        <div id="bloqueo3" class="panel-body">
<!--                                            <div class="row">
                                                <div class="item col-md-6">-->
                                                    <form class="form-horizontal" role="form">
                                                        <input type="hidden" id="hdn_codigocorreo" value="0" />
                                                        <div class="form-group">
                                                            <label for="ddlTipoRedSocial" class="col-sm-2 control-label">Tipo</label>
                                                            <div class="col-sm-4">
                                                                <select id="ddlTipoRedSocial" name="ddlTipoRedSocial" class="form-control">
                                                                    <option value="option1">Correo
                                                                    <option value="option2">Facebook
                                                                    <option value="option3">Twitter
                                                                    <option value="option4">LinkedIn
                                                                    <option value="option5">Google+

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="txtDescripcionRedSocial" class="col-sm-2 control-label">Dirección</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="txtDirecciónRedSocial" placeholder="Dirección">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="txtTitularRedSocial" class="col-sm-2 control-label">Titular</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="txtTitularRedSocial" placeholder="Titular">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="chkEsPrincipal" class="col-sm-2 control-label">Preferencia</label>
                                                            <div class="col-sm-8">
                                                                <label class="control-inline fancy-checkbox">
                                                                    <input type="checkbox" id="chkEsPrincipal">
                                                                    <span>Es Principal</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <!--<button type="button" class="btn btn-primary" onclick="FnAddDetail_RedSocial()"><i class="fa fa-check-circle"></i>Agregar</button>-->
                                                                <button type="button" class="btn btn-primary" id="btnAgregarCorreo"><i class="fa fa-check-circle"></i>Agregar</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <table id="GridViewPacientesRedSocial"><tr><td></td></tr></table>
                                                                <div id="PagerPacientesPacientesRedSocial"></div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                                <div id="listaPacienteCorreos"></div>
                                                <div class="item col-md-6">

<!--                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                    <!--                                        <div id="tab-4" class="tab-pane">
                                                                                <div class="form-group">
                                                                                    <div class="col-sm-12">
                                                                                        <table id="GridViewPacientesCuentas">
                                                                                            <tr><td></td></tr></table>
                                                                                        <div id="PagerPacientesCuentas"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>-->
                                </div>
                            </div>
                            <!--                                <div class="row">
                                                                <div class="col-md-6">
                                                                    <button id="btnGrabar" type="button" class="btn btn-primary" onclick="FnInsetarPaciente()"><i class="fa fa-check-circle"></i> Guardar</button>
                                                                    <button type="submit" id="btnRegistrarUsuario" class="btn btn-info">Registrar</button>
                                                                    <button type="button" id="btnCancelar" class="btn btn-default">Cancelar</button>
                                                                    <div id="message"></div>
                                                                </div>
                                                            </div>-->

                        </div>
                    </div>
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modales
<div  class="modal fade" id="modalTelefonos"  tabindex="-1" role="dialog" aria-labelledby="lbldetalle" aria-hidden="true">
<!--<div class="modal fade"  id="myModal"          tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
<div id="modalTelefonos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="lbldetalle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header headUsuUpd">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="lbldetalle">Telefonos</h3>
            </div>
            <!--<div class="modal-body" id="modalCambiaPass_body">-->
            <div class="modal-body" id="bodyTelefonos">
                .....
            </div>
            <div class="modal-footer" id="footerUsuUpd">
                <!--                <button id="btnchange" class="btn btn-primary">Guardar</button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                <div id="msgUpdClave"></div>-->
            </div>
        </div>
    </div>
</div>

<div id="modalCorreos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="lbldetalle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header headUsuUpd">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="lbldetalle">Correos</h3>
            </div>
            <!--<div class="modal-body" id="modalCambiaPass_body">-->
            <div class="modal-body" id="bodyCorreos">
                .....
            </div>
            <div class="modal-footer" id="footerUsuUpd">
                <!--                <button id="btnchange" class="btn btn-primary">Guardar</button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                                <div id="msgUpdClave"></div>-->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
//    var nCodigoPaciente = "<php echo $_GET['pCodigoPaciente'] ?>";
//    var nTipo = "<php echo $_GET['pTipo'] ?>";        
//    var nCodigoPaciente = "0";
//    var nTipo = "0";        
</script>
<script type="text/javascript" src="<?php echo URL_JS; ?>paciente/listarpacientes/jsPacienteListarPacientes.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>paciente/listarpacientes/jsPacienteTelefonos.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>paciente/listarpacientes/jsPacienteCorreos.js"></script>
<!--<script type="text/javascript" src="<?php echo URL_JS; ?>paciente/jsPacientePanel.js"></script>-->
<!--<script type="text/javascript" src="<?php echo URL_JS; ?>paciente/wpaciente.js"></script>-->
<script type="text/javascript" src="<?php echo URL_JS; ?>paciente/generalFunction.js"></script>
<!--<script src="../../http://localhost:8080/WGD/Inspinia/myFunction/Paciente/wPaciente.js" type="text/javascript"></script>
<script src="../../http://localhost:8080/WGD/Inspinia/myFunction/generalFunction.js" type="text/javascript"></script>-->