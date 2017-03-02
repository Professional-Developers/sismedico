<script type="text/javascript" src="<?php echo URL_JS; ?>paciente/jsPacienteCorreos.js"></script>
<form class="form-horizontal" role="form">
    <div class="form-group">
        <label for="ddlTipoRedSocial" class="col-sm-4 control-label">Tipo</label>
        <div class="col-sm-8">
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
        <label for="txtDescripcionRedSocial" class="col-sm-4 control-label">Dirección</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="txtDirecciónRedSocial" placeholder="Dirección">
        </div>
    </div>
    <div class="form-group">
        <label for="txtTitularRedSocial" class="col-sm-4 control-label">Titular</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="txtTitularRedSocial" placeholder="Titular">
        </div>
    </div>
    <div class="form-group">
        <label for="chkEsPrincipal" class="col-sm-4 control-label">Preferencia</label>
        <div class="col-sm-8">
            <label class="control-inline fancy-checkbox">
                <input type="checkbox" id="chkEsPrincipal">
                <span>Es Principal</span>
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary" onclick="FnAddDetail_RedSocial()"><i class="fa fa-check-circle"></i>Agregar</button>

        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <table id="GridViewPacientesRedSocial"><tr><td></td></tr></table>
            <div id="PagerPacientesPacientesRedSocial"></div>
        </div>

    </div>
</form>

