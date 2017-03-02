<script type="text/javascript" src="<?php echo URL_JS; ?>pacienteCorreo/jsPacienteCorreoQry.js"></script>
<!--<script type="text/javascript" src="<?php echo URL_JS; ?>pacienteTelefono/jsPacienteTelefonoQry.js"></script>-->
<br/>
<?php if($listado>0){ ?>
<table id="qry_lista_paciente_correos"  cellspacing="0" class="display" width="80%">
    <thead>
        <tr>
            <th></th>
            <th>Tipo Red Social</th>
            <th>Direccion</th>
            <th>Titular</th>
            <th>Acciones</th>
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
                <td>
                    <a id="btnoptEditar" onclick="getUpdCorreo('<?php echo $fila['nCodigoRedSocial'] ?>')" class="optEditarTelefono btn btn-sm btn-primary" data-pid-correo="<?php echo $fila['nCodigoRedSocial'] ?>" title="Editar"><i class="fa fa-edit"></i> 
                   </a>
                </td>
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
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>
<?php }else{
    echo "sin registros";
    
}?>