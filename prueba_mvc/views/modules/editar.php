<?php

	session_start();

	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
	
?>


<h1>Editar Usuario</h1>
		<form method="post">
			<?php
				$editarUsuario= new MvcController();
				$editarUsuario -> editarUsuarioController();
				$editarUsuario -> actualizarUsuarioController();
			?>
		</form>
		