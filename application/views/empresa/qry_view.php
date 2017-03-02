<script type="text/javascript" src="<?php echo URL_JS; ?>empresa/jsEmpresaQry.js" charset=UTF-8"></script>
<div id="qry_lista_empressa">
    <input type="hidden" id="codEmpresa" name="" />
    <?php if ($informacion) { 
        ?>
        <table id="qry_empresa" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
<!--                    <th>cEmpDescripcion</th>
                    <th>cEmpDireccionFiscal</th>-->
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Ruc</th>
                    <!--<th>nIdRubro</th>-->
                    <th>Logo</th>
                    <!--<th>nEmpPropia</th>-->
                    <th></th>
                    <!--<th></th>-->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <td><?php echo $data["nEmpId"]; ?></td>
                        <td><?php echo $data["cEmpNombre"]; ?></td>
<!--                        <td><php echo $data["cEmpDescripcion"]; ?></td>
                        <td><php echo $data["cEmpDireccionFiscal"]; ?></td>-->
                        <td><?php echo $data["cEmpTelefono"]; ?></td>
                        <td><?php echo ($data["cEmpCelular"] == '') ? "-" : $data["cEmpCelular"]; ?></td>
                        <td><?php echo ($data["cEmpEmail"] == '') ? "-" : $data["cEmpEmail"]; ?></td>
                        <td><?php echo ($data["cEmpRuc"] == '') ? "-" : $data["cEmpRuc"]; ?></td>
                        <!--<td><?php // echo ($data["nIdRubro"] == '') ? "-" : $data["nIdRubro"]; ?></td>-->
                        <?php
                        $logo=($data["cEmpLogoChico"] == '') ? "sinEmpresa.jpg" : $data["cEmpLogoChico"];
                        ?>
                        <td><a target="_blank" href="<?php echo URL_MAIN_LOGO."/"?><?php echo $logo;?>"><img class="imagenParaTabla" src="<?php echo URL_MAIN_LOGO."/"?><?php echo $logo;?>" /></a></td>
                        <!--<td><?php // echo ($data["nEmpPropia"] == '') ? "-" : $data["nEmpPropia"]; ?></td>-->
                        <td>
                            <a title="editar" class="optEditar iconic-icon-pen-alt2" onclick="panelUpdEmpresa('persona/panel_updEmpresa', '<?php echo htmlspecialchars(json_encode(array("nEmpId" => $data['nEmpId']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
<!--                        <td>
                            <?php if ($data["cEmpEstado"] == "1") { ?>
                                <a class="iconic-icon-check-alt" title='Activo' onClick="panelDelPersona(<?php // echo htmlspecialchars($data['nEmpId']); ?>)" style="cursor: pointer;">
                                </a>
                            <?php } else { ?>
                                <a class="iconic-icon-x" title='Inactivo' onClick="panelDelPersona(<?php // echo htmlspecialchars($data['nEmpId']); ?>)" style="cursor: pointer;">
                                </a>
                            <?php } ?>
                        </td>-->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "No se encuentran registros para empresa";
    } ?>
</div>