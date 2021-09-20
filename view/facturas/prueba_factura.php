<h3 class="display-6">Facturacion</h3>
<!-- <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Facturacion</li>
  </ol>
</nav> -->

<form autocomplete="off" @submit="eliminarBorrador()" class="mt-2">
    <div class="form-group mb-3">
        <label for="nombre" class="form-label fw-bold">Numero factura: <span>{{datos.factura.numero}}</span></label>
        <br>
        <label for="nombre" class="form-label fw-bold">Fecha: <span>{{datos.factura.fecha}}</span></label>
    </div>
    <div class="col-md-12 mb-5">
        <hr>
        <h4>Datos cliente</h4>
    </div>
    <div class="col-md-6 row">
        <div class="col-md-6 form-group mb-3">
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Nombre cliente: </label>
                <div class="col-sm-8">
                    <input type="text" @keyup="crearBorrador()" class="form-control" v-model="datos.cliente.nombre">
                </div>
            </div>
        </div>
        <div class="col-md-6 form-group mb-3">
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Identificacion: </label>
                <div class="col-sm-8">
                    <input type="text" @keyup="crearBorrador()" class="form-control" v-model="datos.cliente.identificacion">
                </div>
            </div>
        </div>
        <div class="col-md-6 form-group mb-3">
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Direccion: </label>
                <div class="col-sm-8">
                    <input type="text" @keyup="crearBorrador()" class="form-control" v-model="datos.cliente.direccion">
                </div>
            </div>
        </div>
        <div class="col-md-6 form-group mb-3">
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Telefono: </label>
                <div class="col-sm-8">
                    <input type="text" @keyup="crearBorrador()" class="form-control" v-model="datos.cliente.telefono">
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-4 form-group mb-3">
            <label for="precio" class="form-label">Telefono</label>
            <input type="number" @keyup="crearBorrador()" class="form-control" id="precio" v-model="borrador.precio">
        </div>
        <div class="col-md-4 form-group mb-3">
            <label for="precio" class="form-label">Direccion</label>
            <input type="number" @keyup="crearBorrador()" class="form-control" id="precio" v-model="borrador.precio">
        </div> -->
    <div class="col-md-12 mb-5">
        <h4>Productos</h4>
    </div>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Iva</th>
                    <th>Total</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(producto, index) of datos.productos">
                    <th>{{index+1}}</th>
                    <th>
                        <select name="" @change="crearBorrador()" id="" class="form-select" v-model="producto.producto">
                            <option selected value="0">Seleccione</option>
                            <option value="1">Cartillas</option>
                            <option value="2">Cuadernos</option>
                            <option value="3">Afiches</option>
                        </select>
                    </th>
                    <th><input type="number" @change="precioTotal(index)" @keyup="precioTotal(index), crearBorrador()" class="form-control" v-model="producto.cantidad"></th>
                    <th><input type="number" @change="precioTotal(index)" @keyup="precioTotal(index), crearBorrador()" placeholder="$" class="form-control" v-model="producto.precio"></th>
                    <th><input type="text" disabled class="form-control disabled" value="18%"></th>
                    <th><input type="number" class="form-control disabled" disabled v-model="producto.total"></th>
                    <th v-if="index <= 0"><button type="button" class="btn btn-success" @click="agregarProducto(), crearBorrador()">Agregar</button></th>
                    <th v-else="index > 0"><button type="button" class="btn btn-danger" @click="eliminarProducto(index), crearBorrador()">Eliminar</button></th>
                </tr>
            </tbody>
        </table>
        <div class="col-md-12 mb-5">
            <button type="submit" class="btn btn-info text-white">Guardar factura</button>
            <button v-if="datos.cantidad > 0" @click="eliminarBorrador(), location.reload();" type="button" class="btn btn-danger text-white">Eliminar borrador</button>
        </div>
    </div>
</form>