const app = new Vue({
  el: "#app",
  data: {
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
        {
          producto: 0,
          cantidad: 1,
          precio: 0,
          total: 0,
        },
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

    precioTotal: function (index) {
      let cantidad = this.datos.productos[index].cantidad;
      let precio = this.datos.productos[index].precio;
      let total = cantidad * precio * 0.18 + cantidad * precio;
      this.datos.productos[index].total = total;
    },

    agregarProducto: function () {
      this.datos.productos.push({
        producto: 0,
        cantidad: 1,
        precio: 0,
        total: 0,
      });
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
