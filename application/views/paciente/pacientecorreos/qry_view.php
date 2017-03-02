<script type="text/javascript" src="<?php echo URL_JS; ?>pacienteCorreo/jsPacienteCorreoQry.js"></script>
<br/>
<?php if($listado>0){ ?>
<table id="qry_lista_paciente_correos"  cellspacing="0" class="display" width="80%">
    <thead>
        <tr>
            <th></th>
            <th>Tipo Red Social</th>
            <th>Direccion</th>
            <th>Titular</th>
<!--            <th>Acciones</th>-->
        </tr>
    </thead>
    <tbody>
        <?php
        $contador = 1;
        foreach ($listado as $fila) {
            ?>
            <tr class='todoMayuscula'>           
                <!--<td><php echo $fila["nUsuCodigo"]; ?></td>-->
                <td><?php echo $contador; ?></td>
                <td><?php echo $fila["vTipoRedSocial"]; ?></td>
                <td><?php echo $fila["vDireccion"]; ?></td>
                <td><?php echo $fila["vTitular"]; ?></td>
<!--                <td>
                    <a id="btnoptAsignar"  title="Asignar Permisos" class="optAsignar btn btn-sm btn-primary" data-rol="<?php echo $fila["cNombre"]; ?>" data-pid="<?php echo $fila['nIdRol'] ?>" title="Establecer Permisos"><i class="fa fa-exclamation-triangle"></i> Permisos
                    </a>
                </td>-->
            </tr>
            <?php $contador++;
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>Tipo Red Social</th>
            <th>Direccion</th>
            <th>Titular</th>
<!--            <th>Acciones</th>-->
        </tr>
    </tfoot>
</table>
<?php }else{
    echo "sin registros";
    
}?>