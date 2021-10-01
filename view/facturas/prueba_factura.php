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
    <div class="col-md-12 mb-4">
        <hr>
        <h4>Datos del cliente</h4>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mb-3">
            <label class="form-label">Nombre cliente</label>
            <input type="text" @keyup="crearBorrador()" class="form-control" v-model="datos.cliente.nombre">
        </div>
        <div class="col-md-2 form-group mb-3">
            <label class="form-label">Identificacion </label>
            <input type="text" @keyup="crearBorrador()" class="form-control" v-model="datos.cliente.identificacion">
        </div>
        <div class="col-md-3 form-group mb-3">
            <label class="form-label">Direccion </label>
            <input type="text" @keyup="crearBorrador()" class="form-control" v-model="datos.cliente.direccion">
        </div>
        <div class="col-md-3 form-group mb-3">
            <label class="form-label">Telefono </label>
            <input type="text" @keyup="crearBorrador()" class="form-control" v-model="datos.cliente.telefono">
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <h4>Agregar productos</h4>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="position-relative">
                <label class="form-label">Producto</label>
                <input type="search" v-model="busqueda" @keyup="buscarProductos()" placeholder="Escriba aqui para buscar..." class="form-control" id="inputSearch" @focus="focus()" @focusout="blur()">
                <ul class="form-control d-none" id="box-search">
                    <li v-for="(pre, index) in preferencias" @mousedown="elegirProducto(index)" :value="pre.id">{{pre.nombre}}</li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <label class="form-label">Cantidad</label>
            <input type="number" @keyup="precioTotal()" class="form-control" v-model="producto.cantidad">
        </div>
        <div class="col-md-2">
            <label class="form-label">Precio</label>
            <input type="number" @keyup="precioTotal()" class="form-control" v-model="producto.precio">
        </div>
        <div class="col-md-2">
            <label class="form-label">Iva</label>
            <input type="text" disabled value="19%" class="form-control disabled">
        </div>
        <div class="col-md-2">
            <label class="form-label">Total</label>
            <input type="number" disabled class="form-control disabled" v-model="producto.total">
        </div>
        <div class="col-md-2">
            <label class="form-label">&nbsp;</label>
            <button type="button" class="btn btn-success form-control" @click="agregarProducto(), crearBorrador()">Agregar</button>
        </div>
    </div>
    <div class="col-md-12 mb-4 mt-4">
        <h4>Productos agregados</h4>
    </div>
    <div>
        <table class="table table-striped table-responsive">
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
                        <input type="hidden" name="id_pro" :value="producto.id">
                        <input disabled type="text" class="form-control disabled" v-model="producto.producto">
                    </th>
                    <th><input type="number" @change="precioTotal(index)" @keyup="precioTotal(index), crearBorrador()" class="form-control" v-model="producto.cantidad"></th>
                    <th><input type="number" @change="precioTotal(index)" @keyup="precioTotal(index), crearBorrador()" placeholder="$" class="form-control" v-model="producto.precio"></th>
                    <th><input type="text" disabled class="form-control disabled" value="19%"></th>
                    <th><input type="number" class="form-control disabled" disabled v-model="producto.total"></th>
                    <th><button type="button" class="btn btn-danger" @click="eliminarProducto(index), crearBorrador()">Eliminar</button></th>
                </tr>
            </tbody>
        </table>
        <div class="col-md-12 mb-5">
            <button type="submit" class="btn btn-info text-white">Guardar factura</button>
            <button v-if="datos.cantidad > 0" @click="eliminarBorrador(), location.reload();" type="button" class="btn btn-danger text-white">Eliminar borrador</button>
        </div>
    </div>
</form>