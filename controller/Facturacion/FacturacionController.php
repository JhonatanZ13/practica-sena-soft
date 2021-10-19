<?php 
    include_once '../model/Facturacion/FacturacionModel.php';

    class FacturacionController{

        public function getFacturacion(){
            
            include_once '../view/facturas/prueba_factura.php';
        }

        public function buscarProducto(){
            $obj = new FacturacionModel();
            $busqueda = $_GET['busqueda'];
            $sql = "SELECT id_pro, nombre_pro FROM productos WHERE nombre_pro LIKE '%$busqueda%' LIMIT 4";
            $consultar = $obj->query($sql);
            $resultado['productos'] = array();
            if(mysqli_num_rows($consultar) > 0){
                while ($row = mysqli_fetch_array($consultar)) {
                    $datos = array();
                    $datos['id'] = $row['id_pro'];
                    $datos['nombre'] = $row['nombre_pro'];
                    array_push($resultado['productos'], $datos);
                }
            }
            echo json_encode($resultado);
        }
        
        public function prueba(){
            include_once "../view/facturas/prueba.php";
        }
    }

?>