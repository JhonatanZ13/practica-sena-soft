<?php

include_once '../Model/SalidaBodega/SalidaBodegaModel.php';

class SalidaBodegaController
{

    private $objSalidaBodega;

    public function __construct()
    {
        $this->objSalidaBodega = new SalidaBodegaModel();
    }

    public function getCrear()
    {
        $productos = $this->objSalidaBodega->consultar("*", "productos");
        include_once '../View/SalidaBodega/create.php';
    }

    public function crear()
    {
        if (isset($_POST)) {

        $fecha = $_POST['fecha'];
        $sucursal = $_POST['sucursal'];
        $usuario = 1;
        

        $id = $this->objSalidaBodega->autoIncrement("sal_bod_id", "salida_bodega");
        $this->objSalidaBodega->insertar("salida_bodega", false, "$id,'$fecha','$sucursal','$usuario'");

            if (isset($_POST['producto'])) {

                $producto= $_POST['producto'];
                $cantidad= $_POST['cantidad'];

                for ($i = 0; $i < count($producto); $i++) {
                    $ido = $this->objSalidaBodega->autoIncrement("sal_det_id", "salida_bodega_detalle");

                    $this->objSalidaBodega->insertar(
                        "salida_bodega_detalle",
                        false,
                        "$ido," . $cantidad[$i] . ",'" . $producto[$i] . "'"
                    );
                }
            }

        } else {
            redirect(getUrl("SalidaBodega", "SalidaBodega", "getCrear"));
        }
    }

    public function consultar()
    {
        $salidaBodega = $this->objSalidaBodega->consultar("*", "salida_bodega");
        include_once '../View/SalidaBodega/consult.php';
    }

   
}
