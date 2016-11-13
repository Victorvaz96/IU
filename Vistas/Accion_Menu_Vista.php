<?php

	class Accion_Menu{

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
    		<form class="principal" method="post" action="..\Controlador\Accion_Controller.php">
             <input type="submit" class="btn btn-default" name="Alta"  value="<?php echo $idiom['AltaAccion'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Accion_Controller.php">
             <input type="submit" class="btn btn-default" name="Baja"  value="<?php echo $idiom['BajaAccion'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Accion_Controller.php">
             <input type="submit" class="btn btn-default" name="Modificar"  value="<?php echo $idiom['ModificarAccion'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Accion_Controller.php">
             <input type="submit" class="btn btn-default" name="Consultar"  value="<?php echo $idiom['ConsultarAccion'];?>">    
              </form>
             
	</div>
	</div>
	</div>
			<?php 


		}	

			

		}
?>