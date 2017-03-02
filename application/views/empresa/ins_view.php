<style type="text/css">

</style>
<script type="text/javascript" src="<?php echo URL_JS; ?>empresa/jsEmpresaIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmEmpresaInsa" name="frmEmpresaInsa" role="form">
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombre</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cPerNombres" name="txt_cPerNombres" placeholder="Ejm: Juan Valera" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Descripcion</label>
            <div class="col-lg-5">
                <textarea id="txt_cEmpDescripcion" name="txt_cEmpDescripcion" class="form-control limit uniform" rows="3" maxlength="100"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Dirección</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cEmpDireccionFiscal" name="txt_cEmpDireccionFiscal" placeholder="Ejm: Av. Colonial 233" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Teléfono</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cEmpTelefono" name="txt_cEmpTelefono" placeholder="Ejm: 044-261811" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Celular</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cEmpCelular" name="txt_cEmpCelular" placeholder="Ejm: 987713708" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">E-mail</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cEmpEmail" name="txt_cEmpEmail" placeholder="Ejm: xyz@gmail.com" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">RUC</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cEmpRuc" name="txt_cEmpRuc" placeholder="Ejm: 12345678912" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Rubro</label>
            <div class="col-lg-5">
                <?php //echo form_dropdown('nTipoRubro', $TipoRubro, '', 'id="nTipoRubro"  required="required" data-original-title="Seleccione un Rubro"'); ?>
                <?php
//                $tipo_rubro = isset($tipo_rubro) ? "":$tipo_rubro;
                echo $tipo_rubro;
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Logo</label>
            <div class="col-lg-6">
                <div id="uniform-file" class="uploader">
                    <input id="txt_cEmpLogoGrande" name="txt_cEmpLogoGrande" class="form-control" type="file">
                    <span class="filename" style="-moz-user-select: none;">No Seleccionar Archivo</span>
                    <span class="action" style="-moz-user-select: none;">Seleccionar Archivo</span>
                    <!--<div id="progress">--> 
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput"></label>
            <div class="col-lg-2">
                <div id="bar" class="progress progress-striped active tip" oldtitle="0%" title="" data-hasqtip="true" aria-describedby="qtip-10">
                    <div id="percent" class="progress-bar" style="width: 0%;">0%</div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Tipo de Empresa</label>
            <div class="col-lg-5">
                <?php //echo form_dropdown('nTipoEmpresa', $TipoEmpresa, '', 'id="nTipoEmpresa"  required="required" data-original-title="Seleccione Tipo Empresa"'); ?>
                <?php echo $tipo_empresa; ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <!-- disabled="disabled"-->
                <button disabled="disabled"  type="submit" id="btnRegistrar" class="btn btn-info">Registrar</button>
                <button disabled="disabled" type="button" id="btnCancelar" class="btn btn-default">cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjEmpresa"></div>

</div>
<script type="text/javascript" src='<?php echo URL_PLU; ?>ajaxFileUploader/ajaxfileupload.js'></script>