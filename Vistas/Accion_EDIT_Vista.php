<?php 
class accionEDIT{

	function crear($idioma,$resultado){

		include '../plantilla/cabecera.php';
			$cabecera=new cabecera();
			$cabecera->crear($idioma);

			$clase=new comprobacion();
    		$idiom=$clase->comprobaridioma($idioma);

?>
 <?php
 			if ($resultado==FALSE){
 				echo "<script>alert(\"".$idiom["modificado"]."\")</script>";
 			}
 			
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Accion_Controller.php?ModificarAccion\">";
			echo "<fieldset><legend>".$idiom['Accio']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required  name=\"Nombre\">"; 
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['nombreNuevo'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required  name=\"NombreNuevo\">"; 
			echo "</div></div>";
			echo "<a href=\"Accion_Controller.php?ModificarAccion\"><input type=\"image\" src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Accion_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>



<?php
	include '../plantilla/pie.php';
	}}


?>