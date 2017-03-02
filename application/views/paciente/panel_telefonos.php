<script type="text/javascript" src="<?php echo URL_JS; ?>paciente/jsPacienteTelefonos.js"></script>
<form class="form-horizontal" role="form" id="frm-ins-telefonos">
    <input type="hidden" id="hdn_codigopaciente" value="<?php echo $ncodigopaciente; ?>" />
    <div class="form-group">
        <label class="col-sm-3 control-label">Tipo Teléfono</label>
        <div class="col-sm-4">
            <select id="ddlTipoTelefono" name="ddlTipoTelefono" class="form-control">
                <option value="option1">Móvil
                <option value="option2">Fijo(Casa)
                <option value="option3">Anexo
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Operador</label>
        <div class="col-sm-4">
<!--            <select name="ddlOperador" id="ddlOperador" class="form-control">
            </select>-->
            <?php echo $OperadorTelefonico; ?>
        </div>

    </div>
    <div class="form-group">
        <label for="txtTelefono" class="col-sm-3 control-label">Teléfono</label>
        <div class="col-sm-4">
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
        <label for="txtTitular" class="col-sm-3 control-label">Titular</label>
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
    <!--    <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="ibox-content">
                <div class="jqGrid_wrapper">
                    <table id="GridViewPacientesContacto"><tr><td></td></tr></table>
                    <div id="PagerPacientesContacto"></div>
                </div>
    
            </div>
        </div>-->
</form>
<div class="tab-pane" id="listaPacienteTelefonos">
</div>