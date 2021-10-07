<?php

    include_once '../lib/conf/connection.php';

    class MasterModel extends Connection{

        public function query($sql){
            $result = mysqli_query($this->getConnect(),$sql);
            return $result;
        }
        
        public function autoIncrement($table,$field){
            $sql="SELECT MAX($field) FROM $table";
            $result=$this->query($sql);
            $account=mysqli_fetch_row($result);

            return end($account)+1;
        }

        public function ejecutar($sql){

            $ejecutar = mysqli_query($this->getConnect(),$sql);
    
            if($ejecutar){
    
                return $ejecutar;
    
            }else{
                die(mysqli_error($this->getConnect()));
    
            }
        }
    
        public function insertar($table,$fields=false,$values){
    
            if($fields!=false){
                $fields="($fields)";
            }
    
    
            
              $sql="insert into $table $fields values($values)";
    
            $ejecutar=mysqli_query($this->getConnect(),$sql);
            if(!$ejecutar){
                echo mysqli_error($this->getConnect());
            }
        }
    
        public function editar($table,$condicion=false,$campos){
    
            if($condicion!=false){
                $condicion= "where ". $condicion;
            }
            $actualizar="";
            foreach($campos as $campo=>$valor){
                $actualizar.="$campo=$valor,";
            }
            $campos=substr($actualizar,0,-1);
    
            $sql="update $table set $campos $condicion";
            $ejecutar=mysqli_query($this->getConnect(),$sql);
            if(!$ejecutar){
                echo mysqli_error($this->getConnect());
            }
    
        }
    
    
    
        public function consultar($campos,$tabla,$condicion=false){
    
            if($condicion!=false){
                $condicion="where $condicion";
            }
    
            $sql="select $campos from $tabla $condicion";
            $ejecutar=mysqli_query($this->getConnect(),$sql);
            if($ejecutar){
                return $ejecutar;
            }
            else{
                echo mysqli_error($this->getConnect());
            }
    
    
        }
    
        public function eliminar($table,$condicion){
    
            $sql="delete from $table where $condicion";
    
            $ejecutar=mysqli_query($this->getConnect(),$sql);
            if(!$ejecutar){
                echo mysqli_error($this->getConnect());
            }
        }
    
        // function autoincrement($id,$tabla)
        // {
    
        //     $sql = "select max($id) from $tabla";
        //     $resultado = mysqli_query($this->getConnect(), $sql);
        //     $contador = mysqli_fetch_row($resultado);
        //     return end($contador) + 1;
        // }
    }
