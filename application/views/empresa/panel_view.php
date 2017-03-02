<script type="text/javascript" src="<?php echo URL_JS; ?>empresa/jsEmpresaPanel.js" charset=UTF-8"></script>
<!--<script>
    $(function(){
        alert("1231");
    })
</script>-->
<div class="col-lg-12">
    <!--    <div class="page-header">
            <h4>Gestión de <php echo $modulo;?></h4>
        </div>-->
    <div style="margin-bottom: 20px;">
        <ul id="myTab" class="nav nav-tabs pattern">
            <li class="active"><a href="#profile" data-toggle="tab" id="tabqry"><?php echo $modulo; ?></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="profile">
                En construcción.
                <script>alert("En construccion")</script>
            </div>
        </div>
        <div data-modales="<?php echo $modulo; ?>">
            <div  class="modal fade" id="modalCambia<?php echo $modulo; ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headUpd">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Actualizar <?php echo $modulo; ?></h3>
                        </div>
                        <div class="modal-body bodyUpd">
                        </div>
                        <div class="modal-footer footUpd">
                        </div>
                    </div>
                </div>
            </div>

            <div id="permisosModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="lbldetalle" aria-hidden="true">
                <div class="modal_dialog">
                    <div class="modal-content">
                        <div class="modal-header" id="headPermisoUpd">
                            <h3>Permisos Usuario</h3>
                        </div>
                        <div class="modal-body" id="bodyPermisoUpd">
                        </div>
                        <div class="modal-footer" id="footPermisoUpd">
                            <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                            <button id="btnAsignar" class="btn btn-primary">Asignar Permisos</button>
                            <!-- <a href="#" class="btn btn-primary"></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>