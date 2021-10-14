<?php

include_once '../Model/EntradaBodega/EntradaBodegaModel.php';

class EntradaBodegaController
{

    private $objEntradaBodega;

    public function __construct()
    {
        $this->objEntradaBodega = new EntradaBodegaModel();
    }

    public function getCrear(){
        $productos = $this->objEntradaBodega->consultar("*", "productos");
        $proveedor = $this->objEntradaBodega->consultar("*","proveedor");
        include_once '../View/EntradaBodega/create.php';
    }

    public function crear(){
        if(isset($_POST)){
            $fecha = date("d-m-Y");//$_POST['fecha'];
            $proveedor = $_POST['proveedor'];
            $usuario = 1;

            $id = $this->objEntradaBodega->autoIncrement("entrada_bodega", "ent_bod_id");

            $this->objEntradaBodega->insertar("entrada_bodega", false, "$id,'$fecha','$proveedor','$usuario'");

            if(isset($_POST['producto'])){
                $producto = $_POST['producto'];
                $cantidad = $_POST['cantidad'];

                for($i = 1; $i < count($producto); $i++){
                    $ido = $this->objEntradaBodega->autoIncrement("entrada_bodega_detalle","ent_det_id");

                    $this->objEntradaBodega->insertar(
                        "entrada_bodega_detalle",
                        false,
                        "$ido," . $cantidad[$i] . ",$id,'" . $producto[$i] . "'"
                    );
                }
                redirect(getUrl("EntradaBodega","EntradaBodega","consultar"));
            }
        }else{
            redirect(getUrl("EntradaBodega", "EntradaBodega", "getCrear"));
        }
    }

    public function consultar(){
        $entradaBodega = $this->objEntradaBodega->consultar("*","entrada_bodega as bodega, proveedor as prov, usuario as usu","bodega.prov_id=prov.prov_id AND bodega.usu_id=usu.usu_id");
        // $proveedor = $this->objEntradaBodega->consultar("*","proveedor");
        $this->objEntradaBodega->close();

        include_once '../View/EntradaBodega/consult.php';
    }

    public function crearCsv(){
        if(isset($_FILES)){

            if(!empty($_FILES['csv'])){
            

                    $bodega_csv=$_FILES['csv']['name'];
                    $ruta="csv/$bodega_csv";
                    move_uploaded_file($_FILES['csv']['tmp_name'],$ruta);
                    
                    //abrimos el documento que almacenamos
                    $file = fopen($ruta, "r");

                    $_SESSION['mensaje']="";
                    $usuario = 1;
                    //si el documento no está vacío
                    if(!empty($file)){
                        
                        $fecha = date('d-m-Y');

                        
                        
                        $proveedor = $_POST['proveedor'];

                        $id = $this->objEntradaBodega->autoIncrement("entrada_bodega", "ent_bod_id");


                        if(is_numeric($proveedor)){
                            $this->objEntradaBodega->insertar("entrada_bodega",false,"$id,'$fecha','$proveedor','$usuario'");   
                        }
                        //REpetimos el bucle hasta que el no se encuentren más datos separados por // ; ,
                        //gracias a la funcion fgetcsv de php
                        $col=1;
                        while(($datos = fgetcsv($file)) !== false){
                            //el último campo(cantidad de productos) no debería tener algún valor si 
                            //queremos solamente insertar nuevos datos
                            
                            if(!isset($datos[2]) || $datos[2]=="" || $datos[2]==null && !isset($datos[3]) || $datos[3]=="" || $datos[3]==null){

                                //comprobamos que el usuario haya seleccionado un proveedor
                                //nos envia el id
                                //de lo contrario nos envia letras por defecto del primer option del select
                                if(is_numeric($_POST['proveedor'])){

                                    if(is_numeric($datos[0])){
                                        
                                        $ido = $this->objEntradaBodega->autoIncrement("entrada_bodega_detalle","ent_det_id");
                                        $ejecutar = $this->objEntradaBodega->insertar(
                                            "entrada_bodega_detalle",
                                            false,
                                            "$ido, $datos[1],$id, $datos[0]"
                                        );
                                        if($ejecutar){
                                            $_SESSION['mensaje'].="Se agregó el producto ".$datos[0]."<br>";
                                        }else{
                                            $_SESSION['mensaje'].="No se pudo agregar el producto de la columna ".$col."<br>";
                                        }
                                    }else{
                                        $_SESSION['mensaje'].="No se pudo agregar el producto de la columna $col"."<br>";
                                    }
                                }else{
                                    echo "No se ha enviado el proveedor para la inserción<br>";
                                }
                            //de lo contrario vamos a actualizar los datos gracias al id en la primer y segunda columna
                            }else{
                                $consulta_bodega = $this->objEntradaBodega->consultar("*","entrada_bodega_detalle detalle","detalle.ent_bod_id=$datos[0] AND detalle.id_pro=$datos[1]");
                                if(mysqli_num_rows($consulta_bodega)>=1){
                                    $consulta = mysqli_fetch_assoc($consulta_bodega);
                                    // dd($consulta);
                                    if($consulta['id_pro']!=$datos[2] || $consulta['ent_det_cantidad']!=$datos[3]){
                                        $ido = $consulta['ent_det_id'];
                                        $ejecutar = $this->objEntradaBodega->editar("entrada_bodega_detalle",
                                            "ent_det_id=$ido",
                                            array(
                                                "ent_det_cantidad" => "'$datos[3]'",
                                                "id_pro" => "'$datos[2]'",
                                            )
                                        );

                                        if($ejecutar){
                                            $_SESSION['mensaje'].="Se actualizó la entrada de bodega con el id ".$datos[2]."<br>";
                                        }else{
                                            $_SESSION['mensaje'].="No se pudo actualizar la entrada de bodega de la columna ".$col."<br>"; 
                                        }
                                    }
                                }else{
                                    echo "No existe el id $datos[1] de producto de la columna $col";
                                }
                            }
                            $col++;
                        }
                        fclose($file);
                        redirect(getUrl("EntradaBodega","EntradaBodega","consultar"));    
                    }
            }else{
                echo "No se ha cargado el archivo";
            }
        }else{
            echo "No se ha enviado nigún archivo";
        }
    }

    public function getEditar(){
        if(isset($_GET)){
            $id = $_GET['id'];
            $proveedor = $this->objEntradaBodega->consultar("*","proveedor");
            $productos = $this->objEntradaBodega->consultar("*","productos");
            $entrada_bodega = $this->objEntradaBodega->consultar("*","entrada_bodega bodega","bodega.ent_bod_id=$id");
            $bodega = mysqli_fetch_assoc($entrada_bodega);


            $bodega_detalle = $this->objEntradaBodega->consultar("*","entrada_bodega_detalle detalle","detalle.ent_bod_id=$id");
            include '../view/EntradaBodega/editar.php';
        }
    }

    public function editar(){
        if(isset($_POST)){
            $id= $_POST['id'];

            $fecha = date("d-m-Y");
            $usuario = 1;
            $proveedor = $_POST['proveedor'];

            $this->objEntradaBodega->eliminar("entrada_bodega_detalle","ent_bod_id=$id");

            $this->objEntradaBodega->eliminar("entrada_bodega","ent_bod_id=$id");
            

            $this->objEntradaBodega->insertar("entrada_bodega", false, "$id,'$fecha','$proveedor','$usuario'");

            if(isset($_POST['producto'])){
                $producto = $_POST['producto'];
                $cantidad = $_POST['cantidad'];

                for($i = 1; $i < count($producto); $i++){
                    $ido = $this->objEntradaBodega->autoIncrement("entrada_bodega_detalle","ent_det_id");

                    $this->objEntradaBodega->insertar(
                        "entrada_bodega_detalle",
                        false,
                        "$ido," . $cantidad[$i] . ",$id,'" . $producto[$i] . "'"
                    );
                }
                redirect(getUrl("EntradaBodega","EntradaBodega","consultar"));
            }
        }else{
            redirect(getUrl("EntradaBodega","EntradaBodega","consultar"));
        }
    }

    public function eliminar(){
        if(isset($_GET)){
            $id = $_GET['id'];

            $this->objEntradaBodega->eliminar("entrada_bodega_detalle","ent_bod_id=$id");

            $this->objEntradaBodega->eliminar("entrada_bodega","ent_bod_id=$id");
            redirect(getUrl("EntradaBodega","EntradaBodega","consultar"));
        }else{
            redirect(getUrl("EntradaBodega","EntradaBodega","consultar"));
        }
    }
}