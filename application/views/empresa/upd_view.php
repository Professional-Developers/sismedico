<script type="text/javascript" src="<?php echo URL_JS ?>empresa/jsEmpresaUpd.js"></script>
<div class="panel-body">
    <?php //print_r($informacion[0]); ?>
    <form class="form-horizontal" todoMayuscula action="#" id="frmEmpresaUpd" name="frmEmpresaUpd">
        <input type="hidden" name="hdnidEmpresa_upd" id="hdnidEmpresa_upd" value="<?php echo $informacion[0]['nEmpId']; ?>"/>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombre</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cEmpNombre']; ?>" id="upd_txt_cPerNombres" name="upd_txt_cPerNombres" placeholder="Ejm: Juan Valera" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Descripcion</label>
            <div class="col-lg-5">
                <textarea id="upd_txt_cEmpDescripcion" name="upd_txt_cEmpDescripcion" class="form-control limit uniform" rows="3" maxlength="100"><?php echo $informacion[0]['cEmpDescripcion']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Dirección</label>
            <div class="col-lg-5">
                <input type="text" maxlength="100" value="<?php echo $informacion[0]['cEmpDireccionFiscal']; ?>" id="upd_txt_cEmpDireccionFiscal" name="upd_txt_cEmpDireccionFiscal" placeholder="Ejm: Av. Colonial 233" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Teléfono</label>
            <div class="col-lg-5">
                <input type="text" maxlength="30" value="<?php echo $informacion[0]['cEmpTelefono']; ?>" id="upd_txt_cEmpTelefono" name="upd_txt_cEmpTelefono" placeholder="Ejm: 044-261811" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Celular</label>
            <div class="col-lg-5">
                <input type="text" maxlength="30" value="<?php echo $informacion[0]['cEmpCelular']; ?>" id="upd_txt_cEmpCelular" name="upd_txt_cEmpCelular" placeholder="Ejm: 987713708" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">E-mail</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cEmpEmail']; ?>" id="upd_txt_cEmpEmail" name="upd_txt_cEmpEmail" placeholder="Ejm: xyz@gmail.com" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">RUC</label>
            <div class="col-lg-5">
                <input type="text" maxlength="11" value="<?php echo $informacion[0]['cEmpRuc']; ?>" id="upd_txt_cEmpRuc" name="upd_txt_cEmpRuc" placeholder="Ejm: 12345678912" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Rubro</label>
            <div class="col-lg-5">
                <?php //echo form_dropdown('nTipoRubro', $TipoRubro, '', 'id="nTipoRubro"  required="required" data-original-title="Seleccione un Rubro"'); ?>
                <?php
//                $tipo_rubro = isset($tipo_rubro) ? "":$tipo_rubro;
                echo $tipo_rubroUpd;
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Logo</label>
            <!--<div class="col-lg-6">-->
            <div class="col-lg-7">
                <!--<div id="uniform-file" class="uploader">-->
                <div>
                    <input id="upd_txt_cEmpLogoGrande" name="upd_txt_cEmpLogoGrande" class="form-control" type="file" value="<?php echo $informacion[0]['cEmpLogoChico'];?>" style="height:30px;font-size:10px">
                    <input type="hidden" id="img_upd_logo" value="<?php echo $informacion[0]['cEmpLogoChico'];?>"  />
                    <!--<span class="filename" style="-moz-user-select: none;"></span>
                    <span class="action" style="-moz-user-select: none;">Seleccionar Archivo</span>-->
                </div>
                <div class="col-lg-3">
                    <img width="50px" height="50px" src="<?php echo URL_MAIN_LOGO."/"?><?php echo $informacion[0]['cEmpLogoChico'];?>"  />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput"></label>
            <div class="col-lg-2">
                <div id="bar" class="progress progress-striped active tip" oldtitle="0%" title="" data-hasqtip="true" aria-describedby="qtip-10">
                    <div id="upd_percent" class="progress-bar" style="width: 0%;">0%</div>
                </div>
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Tipo de Empresa</label>
            <div class="col-lg-3">
                <?php //echo form_dropdown('nTipoEmpresa', $TipoEmpresa, '', 'id="nTipoEmpresa"  required="required" data-original-title="Seleccione Tipo Empresa"'); ?>
                <?php echo $tipo_empresaUpd;?>
                <?php //echo "hello guys";?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnActualizarEmp" class="btn btn-info">Actualizar</button>
                <button type="button" id="btnCancelarEmp" class="btn btn-default">cancelar</button>
                <div id="messageUpd"></div>
            </div>
        </div>
    </form>
</div>
<div id="msjEmpresa">

</div>
<script type="text/javascript" src='<?php echo URL_PLU; ?>ajaxFileUploader/ajaxfileupload.js'></script>