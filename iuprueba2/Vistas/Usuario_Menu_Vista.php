<?php

	class Usuarios_Menu{

		function crear($idioma){ 
			include '../plantilla/cabecera.php';
			
			$cabecera=new cabecera();
			$cabecera->crear($idioma);

       		$clase=new comprobacion();
    		$idiom=$clase->comprobaridioma($idioma);
    		?>
    
	
			<div class="container well">
 			<div class="row">
			<div class="col-xs-12">
    		<form id="formulario" class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Alta"  value="<?php echo $idiom['AltaUsuario'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Baja"  value="<?php echo $idiom['BajaUsuario'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Modificar"  value="<?php echo $idiom['ModificacionUsuario'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Consultar"  value="<?php echo $idiom['ConsultaUsaurio'];?>">
              </form>
	</div>
	</div>
	</div>
			<?php 


		}	

			

		}
?>