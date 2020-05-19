<?php
    class Conexion{
        public function conectar(){
            $link = new PDO("mysql:host=localhost;dbname=baseDatos", "root","root");
            return $link;
        }
    }

?>