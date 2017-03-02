<script type="text/javascript" src="<?php echo URL_JS; ?>pacienteTelefono/jsPacienteTelefonoQry.js"></script>
<br/>
<?php if($listado>0){ ?>
<table id="qry_lista_paciente_telefonos"  cellspacing="0" class="display" width="60%">
    <thead>
        <tr>
            <th></th>
            <th>Operador</th>
            <th>Tipo Telefono</th>
            <th>Titular</th>
            <th>Telefono</th>
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
                <td><?php echo $fila["vDescripcionOperador"]; ?></td>
                <td><?php echo $fila["vTipoTelefono"]; ?></td>
                <td><?php echo $fila["vTitular"]; ?></td>
                <td><?php echo $fila["vTelefono"]; ?></td>
                <td>
                    <a id="btnoptEditar" onclick="getUpdTelefono('<?php echo $fila['nCodigoTelefono'] ?>')" class="optEditarTelefono btn btn-sm btn-primary" data-pid-telefono="<?php echo $fila['nCodigoTelefono'] ?>" title="Editar"><i class="fa fa-edit"></i> 
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
            <th>Operador</th>
            <th>Tipo Telefono</th>
            <th>Titular</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>
<?php }else{
    echo "Sin Registros";
    
}?>