<?php

include_once '../Model/EntradaBodega/EntradaBodegaModel.php';

class EntradaBodegaController
{

    private $objEntradaBodega;

    public function __construct()
    {
        $this->objEntradaBodega = new EntradaBodegaModel();
    }

    public function getCrear()
    {
        $productos = $this->objEntradaBodega->consultar("*", "productos");
        include_once '../View/EntradaBodega/create.php';
    }

    public function crear()
    {
        if (isset($_POST)) {

        $fecha = $_POST['fecha'];
        $proveedor = $_POST['proveedor'];
        $usuario = 1;
        

        $id = $this->objEntradaBodega->autoIncrement("ent_bod_id", "entrada_bodega");
        $this->objEntradaBodega->insertar("Entrada_bodega", false, "$id,'$fecha','$proveedor','$usuario'");

            if (isset($_POST['producto'])) {

                $producto= $_POST['producto'];
                $cantidad= $_POST['cantidad'];

                for ($i = 0; $i < count($producto); $i++) {
                    $ido = $this->objEntradaBodega->autoIncrement("ent_det_id", "entrada_bodega_detalle");

                    $this->objEntradaBodega->insertar(
                        "entrada_bodega_detalle",
                        false,
                        "$ido," . $cantidad[$i] . ",'" . $producto[$i] . "'"
                    );
                }
            }

        } else {
            redirect(getUrl("EntradaBodega", "EntradaBodega", "getCrear"));
        }
    }

    public function consultar()
    {
        $entradaBodega = $this->objEntradaBodega->consultar("*", "entrada_bodega");
        include_once '../View/EntradaBodega/consult.php';
    }

   
}