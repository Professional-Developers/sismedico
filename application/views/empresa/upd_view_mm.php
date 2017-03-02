<script type="text/javascript" src="<?php echo URL_JS ?>sucursal/jsSucursalUpd.js"></script>
<div class="panel-body">
    <form class="form-horizontal" todoMayuscula action="#" id="frmEmpresaUpd" name="frmEmpresaUpd">
        <input type="hidden" name="hdnidEmpresa_upd" id="hdnidEmpresa_upd" value="<?php echo $informacion[0]['nEmpId']; ?>"/>
        
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombre</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cSurNombre']; ?>" id="upd_txt_cSurNombre" name="upd_txt_cSurNombre" placeholder="Ejm:STAND 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Descripciones</label>
            <div class="col-lg-5">
                <textarea id="txt_cSurDescripcion" name="txt_cSurDescripcion" class="form-control limit uniform" rows="3" maxlength="100"><?php echo $informacion[0]['cSurDescripcion']; ?></textarea>
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Ubigeo</label>
            <div class="col-lg-5">
                <input type="hidden" value="<?php echo $informacion[0]['cSurUbigeo']; ?>" id="txt_cSurUbigeo" name="txt_cSurUbigeo" placeholder="Ejm: 14241" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Lugar Referencia</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cSurReferencia']; ?>" id="txt_cSurReferencia" name="txt_cSurReferencia" placeholder="Ejm: Av. España" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Telefonos</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cSurTelefonos']; ?>" id="txt_cSurTelefonos" name="txt_cSurTelefonos" placeholder="Ejm: Av. España" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Linea 1</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cSurLinea1']; ?>" id="txt_cSurLinea1" name="txt_cSurLinea1" placeholder="Ejm: Calzado" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Linea 2</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cSurLinea2']; ?>" id="txt_cSurLinea2" name="txt_cSurLinea2" placeholder="Ejm: linea 2" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Tipo Stand</label>
            <div class="col-lg-5">
                <?php
                echo $tipo_stand;
                ?>
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Empresa</label>
            <div class="col-lg-5">
                <input type="hidden" value="<?php echo $informacion[0]['nEmpId']; ?>" id="txt_nEmpId" name="txt_nEmpId" VALUE="1" class="form-control uniform-input text" />
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