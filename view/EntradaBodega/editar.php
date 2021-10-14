<h3 class="display-6" >Editar productos de la bodega</h3>
    <div class="form-group mb-3">
        <hr>
        <label for="nombre" class="form-label fw-bold"><?php echo "Fecha: ".date("d-m-Y");?></label>
    </div>
    <div class="row">
        <div class="col-7">
            <h4>Detalle Entrada de Bodega</h4>
        </div>
        <hr>
    </div>
    <form autocomplete="off" class="" action="<?php echo getUrl('EntradaBodega','EntradaBodega','editar');?>" method="POST">
        <div class="row">
            <input type="hidden" name="id" value="<?php echo $bodega['ent_bod_id']; ?>" required>
            <div class="input-group">
                <span class="input-group-text">Productos</span>
                <div id="inputGroup">
                    <select class="form-select" id="inputGroupSelect01" name="producto[]">
                        <option value="">Seleccione...</option>
                        <?php
                            foreach($productos as $prod){
                                echo "<option value='".$prod['id_pro']."'>".$prod['nombre_pro']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <input type="number" class="form-control" name="cantidad[]" id="cantidad">
                <button type="button" class="btn btn-outline-primary form-control" onclick="agregarProducto()">Agregar producto</button>
            </div>

            <div class="col md-6 input-group mb-3 mt-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Proveedor</label>
                </div>
                <select class="form-select" id="inputGroupSelect01" name="proveedor">
                    <option value="">Seleccione...</option>
                    <?php
                        foreach($proveedor as $prov){
                            foreach($entrada_bodega as $bodega){
                                if($bodega['prov_id']=$prov['prov_id']){
                                    echo "<option selected value='".$prov['prov_id']."'>".$prov['prov_nombre']."</option>";
                                }else{
                                    echo "<option value='".$prov['prov_id']."'>".$prov['prov_nombre']."</option>";
                                }
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-12 mb-4 mt-4">
            <h4>Agregados</h4>
        </div>
        
        <table class="table table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="agregar">
                <?php
                    foreach($bodega_detalle as $detalle){
                        echo "<tr class='text-center'>";
                            echo "<td>";
                                echo $detalle['ent_det_id'];
                            echo "</td>";
                            echo "<td>";
                                echo "<select class='form-select' id='inputGroupSelect01' name='producto[]'>";
                                    echo "<option value=''>Seleccione...</option>";
                                    foreach($productos as $prod){
                                        if($detalle['id_pro']==$prod['id_pro']){
                                            echo "<option selected value='".$prod['id_pro']."'>".$prod['nombre_pro']."</option>";
                                        }else{
                                            echo "<option value='".$prod['id_pro']."'>".$prod['nombre_pro']."</option>";
                                        }  
                                    }
                                echo "</select>";
                            echo "</td>";
                            echo "<td>";
                                echo "<input type='number' class='form-control' name='cantidad[]' value='".$detalle['ent_det_cantidad']."'>";
                            echo "</td>";

                            echo "<td>";
                                echo "<button type='button' class='btn btn-danger form-control' onclick='quitarProducto(this)'>-</button>";
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <div class="col-md-12 mb-5" id="botones">
        
        </div>
    </form>
<script src="./js/conejo.js"></script>