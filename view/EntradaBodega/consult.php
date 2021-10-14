<h3 class="display-6">Entrada de bodega</h3>
<div class="row">
    <hr>
    <div class="col-10 mb-5">
        <h4>Bodega</h4>
    </div>
    <div class="col mb-6">
        <a href="<?php echo getUrl('EntradaBodega','EntradaBodega','getCrear');?>"><button class="btn btn-success">Agregar</button></a>
    </div>
</div>
<table class="table table-striped" id="inventario">
    <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Fecha</th>
            <th>Proveedor</th>
            <th>Nombre usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($entradaBodega as $bodega){
                echo "<tr class='text-center'>";
                echo "<td>".$bodega['ent_bod_id']."</td>";
                echo "<td>".$bodega['ent_bod_fecha']."</td>";
                echo "<td>".$bodega['prov_nombre']."</td>";
                echo "<td>".$bodega['usu_nombres']."</td>";
                echo "<td class='col md-1'>";
                    echo "<a href='".getUrl("EntradaBodega","EntradaBodega","eliminar",array('id' => $bodega['ent_bod_id']))."'><button type='button' class='btn btn-danger'>Eliminar</button></a>";
                    echo "<a href='".getUrl("EntradaBodega","EntradaBodega","getEditar",array('id' => $bodega['ent_bod_id']))."'><button type='button' class='btn btn-primary'>Editar</button></a>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>