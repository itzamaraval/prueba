<?php 
require_once "conexion.php";

//Heredar la clase conexion.php para poder accesar y utilizar la conexion a la base de datos, se extiende cuando se requiere manipular una función o método, en este caso manipularemos la función "conectar" de models/conexion.php

class ClassName extends Conexion{
	
	public function registroUsuarioModel($datosModel, $tabla){
		//prepare() Prepara la sentencia de SQL para que sea ejecutada por el método POStantement. La sentencia SQL se puede cotener desde 0 para ejecutar con parámetros

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES (:usuario, :password, :email)");

		//bindParam() vincula una variable de PHP a un parámetro de sustitución con nombre correspondiente a la sentencia sql que fue usada para la sentencia

		$stmt-bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt-bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt-bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "succes";
		} else {
			return "error";
		}

		$stmt->close();
	}

	//modelo ingresarUsuarioModel
	public function ingresoUsuarioModel($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");
		$stmt = bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt = execute();
		//fetch() obtiene una fila de un conjunto de resultados asociado al objeto stmt
		return $stmt->fetch();
		$stmt->close();
	}

	//Modelo vista usuarios
	public function vistaUsuariosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla");
		$stmt->execute();
		//fetchAll() obtiene todas las fila de un conjunto de resultados asiciao al objeto PDO statement
		return $stmt->fetchAll();
		$stmt->close();
	}

	//modelo editar usuario
	public function editarUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	//Modelo actualizarUsuario
	public function actualizarUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email WHERE id = :id");
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

	//modelo borrar usuario
	public function borrarUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

}

 ?>