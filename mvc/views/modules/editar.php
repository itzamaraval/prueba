<?php 
    if(isset($_GET["action"])){
      if($_GET["action"] == "cambio"){
            echo "Cambio exitoso.";
        }
    }
 ?>

<h1> INGREDITAREDESAR </h1>

<form method="post">
    <?php 
        $editarUsuario = MvcController();
        $editarUsuario = editarUsuariosController();
        $editarUsuario = editarUsuariosController();
    ?>
</form>
