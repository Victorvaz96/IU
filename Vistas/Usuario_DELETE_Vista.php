<?php 
class UsuarioDelete{

	function crear($idioma,$resultado){

		include '../plantilla/cabecera.php';
			$cabecera=new cabecera();
			$cabecera->crear($idioma);

			$clase=new comprobacion();
    		$idiom=$clase->comprobaridioma($idioma);
?>
 <?php
 			if ($resultado==FALSE){
 				echo "<script>alert(\"".$idiom["Eliminado"]."\")</script>";
 			}
 			
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Usuario_Controller.php?BajaUsuario\">";
			echo "<fieldset><legend>".$idiom['Usuario']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"usuario\"> ".$idiom['Usuario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required  name=\"usuario\">"; 
			echo "</div></div>";
			echo "<a href=\"Usuario_Controller.php?BajaUsuario\"><input type=\"image\" src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Usuario_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>



<?php
	include '../plantilla/pie.php';
	}}


?>
