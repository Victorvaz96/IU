<?php
class Mensaje{

		function crear($idioma, $mensaje){ 
			include '../plantilla/cabecera.php';
			
			$cabecera=new cabecera();
			$cabecera->crear($idioma);

       		$clase=new comprobacion();
    		$idiom=$clase->comprobaridioma($idioma);
?>

<h3>
<?php			
			echo $idiom[$mensaje];
?>
<h3>

			<div class="container well">
 			<div class="row">
			<div class="col-xs-12">
    		<form class="principal" method="post" action="..\Controlador\Funcionalidad_Controller.php">
             <input type="submit" class="btn btn-default" name="Volver"  value="<?php echo $idiom['Volver'];?>">    
              </form>
             
	</div>
	</div>
	</div>
			<?php 


		}	

			

		}
?>