<?php 
class AccionEDIT{

	function crear($idioma,$name,$form){

			include('../plantilla/cabecera.php');
        	include("../Funciones/comprobaridioma.php");
        	$clase=new cabecera();
        	$clases=new comprobacion();
        	$idiom=$clases->comprobaridioma($idioma);
        	$clase->crear($idiom);
        	include('../plantilla/menulateral.php');
        	$menus=new menulateral();
       		$menus->crear($idiom);

?>
 <?php
 			
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" name=\"formulario\" id=\"formulario\" method=\"post\" action=\"..\Controlador\Accion_Controller.php?ModificarAccion\">";
			echo "<fieldset><legend>".$idiom['Acciones']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required value=\"".$name."\" name=\"Nombre\" readonly>"; 
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"cuenta\"id =\"cuenta\"> ".$idiom['descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<textarea rows=\"4\" cols=\"50\" name=\"descripcion\" required form=\"formulario\"></textarea>";
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Funcio\"id =\"Funcio\"> ".$idiom['Funcio'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."type='Funcio' required id='Funcio' name='Funcio'>";
			for ($numar =0;$numar<count($form);$numar++){
			echo "<option value=\"".$form[$numar]["nombre"]."\">".$form[$numar]['nombre']."</option>";
				 }
			echo"</select>";
			echo "</div></div>";
			echo "<a href=\"Accion_Controller.php?ModificarAccion\"><input type=\"image\" onClick=\"return confirm('".$idiom['confirmeEditName'].":".$name."?')\" src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Accion_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>



<?php
	include '../plantilla/pie.php';
	}}


?>