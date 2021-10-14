<h3 class="display-6" onload="load()">Agregar productos a la bodega</h3>
    <div class="form-group mb-3">
        <hr>
        <label for="nombre" class="form-label fw-bold"><?php echo "Fecha: ".date("d-m-Y");?></label>
    </div>
    <div class="row">
        <div class="col-5">
            <h4>Detalle Entrada de Bodega</h4>
        </div>
        
        <form autocomplete="off" class="col-7 mb-3" action="<?php echo getUrl('EntradaBodega','EntradaBodega','crearCsv');?>" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="csv">
                <select class="form-select" id="inputGroupSelect01" name="proveedor">
                    <option value="">Proveedor</option>
                    <?php
                        foreach($proveedor as $prov){
                            echo "<option value='".$prov['prov_id']."'>".$prov['prov_nombre']."</option>";
                        }
                    ?>
                </select>
                <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">CSV</button>
            </div>
        </form>
        <hr>
    </div>
    <form autocomplete="off" class="" action="<?php echo getUrl('EntradaBodega','EntradaBodega','crear');?>" method="POST">       
        <div class="row">
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
                            echo "<option value='".$prov['prov_id']."'>".$prov['prov_nombre']."</option>";
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
                
            </tbody>
        </table>
        <div class="col-md-12 mb-5" id="botones">
        
        </div>
    </form>
<script src="./js/conejo.js"></script>