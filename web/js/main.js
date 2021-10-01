const app = new Vue({
  el: "#app",
  data: {
    producto: {
      nombre: '',
      id: '',
      cantidad: 1,
      precio: 0,
      total: 0,
    },
    busqueda: "",
    preferencias: [
      
    ],
    datos: {
      cantidad: 0,
      factura: {
        numero: "001",
        fecha: "23/08/2021",
      },
      cliente: {
        nombre: "",
        identificacion: "",
        direccion: "",
        telefono: "",
      },
      productos: [
        
      ],
    },
  },

  methods: {
    crearBorrador() {
      localStorage.setItem("borrador", JSON.stringify(this.datos));
    },

    eliminarBorrador() {
      localStorage.removeItem("borrador");
    },
    focus(){
      $("#box-search").removeClass("d-none");
    },
    blur(){
      $("#box-search").addClass("d-none");
    },
    elegirProducto(index){
      let nombre = this.preferencias[index].nombre;
      let id = this.preferencias[index].id;
      this.producto.id = id;
      this.producto.nombre = nombre;
      this.busqueda = nombre;
      this.blur();
    },
    async buscarProductos(){
      let buscar = this.busqueda;
      let url = "ajax.php?modulo=Facturacion&controlador=Facturacion&funcion=buscarProducto&busqueda="+buscar;
      let {data} = await axios.post(url);
      //console.log(data)
      this.preferencias = data.productos;
      //console.log(this.preferencias);
    },
    agregarBusqueda(datos){
      this.preferencias.push({
        id: datos.productos.id_pro,
        nombre: datos.productos.nombre,
      });
    },
    precioTotal: function () {
      let cantidad = this.producto.cantidad;
      let precio = this.producto.precio;
      let total = cantidad * precio * 0.19 + cantidad * precio;
      this.producto.total = total;
    },

    agregarProducto: function () {
      this.datos.productos.push({
        id: this.producto.id,
        producto: this.producto.nombre,
        cantidad: this.producto.cantidad,
        precio: this.producto.precio,
        total: this.producto.total,
      });
      this.producto.id = "";
      this.producto.nombre = "0";
      this.producto.cantidad = 1;
      this.producto.precio = 0;
      this.producto.total = 0;
    },

    eliminarProducto(index) {
      this.datos.productos.splice(index, 1);
    },
  },

  created() {
    let datosGuardados = localStorage.getItem("borrador");

    if (datosGuardados != null) {
      this.datos = JSON.parse(datosGuardados);
      this.datos.cantidad = 1;
      var toastLiveExample = document.getElementById("liveToast");
      var toast = new bootstrap.Toast(toastLiveExample);
      toast.show();
    }
    
  },
});
