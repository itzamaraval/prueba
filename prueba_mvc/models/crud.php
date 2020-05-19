<?php

	require_once "conexion.php";



	//heredar la clase conexion.php para poder accesar y utilizar la conexión de base de datos, se extiende cuando se requiere manipular una función o método, en este caso manipularemos la función "conectar" de models/conexion.php
	class Datos extends Conexion{

		//REGISTRO DE USUARIOS

		public function registroUsuariosModel($datosModel, $tabla){

			#prepare() prepara la sentencia de sql para que sea ejecutada por el método POSStatmen. La sentencia de SQL se puede contener desde cero para ejecutar mas parámetros.

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password,email) VALUES (:usuario,:password,:email)");


			//bindParam vincula una variable de PHP a un parametro de sustitución con nombre correspondiente a la sentencia sql

			$stmt->bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password",$datosModel["password"], PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"], PDO::PARAM_STR);


			#Regresar una respuesta satisfactoria o no

			if($stmt->execute()){
				return "success";	
			}else{
				return "error";
			}

			$stmt->close();

		}


		public function ingresoUsuarioModel($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("SELECT usuario,password FROM $tabla WHERE usuario=:usuario");
			$stmt -> bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
			$stmt -> execute();

			#fetch() Obtiene una fila de un conjunto de resultados asociado al objeto stmt
			return $stmt->fetch();
			$stmt->close();
		}


		#MODELO VISTA USUARIO
		public function vistaUsuarioModel($tabla){
			$stmt=Conexion::conectar()->prepare("SELECT id,usuario,password,email FROM $tabla");
			$stmt->execute();

			#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociados al objeto PDO statment ($stmt)
			return $stmt->fetchAll();

			$stmt->close();
		}

		#MODELO EDITAR USUARIO
		public function editarUsuarioModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("SELECT id,usuario,password,email FROM $tabla WHERE id=:id");
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
			return $stmt->fetch();
			$stmt->close();

		}


		#MODELO ACTUALIZAR USUARIO
		public function actualizarUsuarioModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:usuario,password=:password,email=:email WHERE id=:id");
			$stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
			$stmt->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
			$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
				$stmt->close();

		}

		#MODELO BORRAR USUARIO
		public function borrarUsuarioModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);

			if($stmt->execute()){
				return "sucess";
			}else{
				return "error";
			}

			$stmt->close();
		}


	 }
?>