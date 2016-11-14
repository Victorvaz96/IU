<?php 
	class Funcionalidad_SHOW{

		function crear($form,$idioma){ 

			include '../plantilla/cabecera.php';
			
			$cabecera=new cabecera();
			$cabecera->crear($idioma);

       		$clase=new comprobacion();
    		$idiom=$clase->comprobaridioma($idioma);
    		?>
    		<header>

		
   </header>
			<a href="Funcionalidad_Controller.php?Alta=alta"><input type="image" src="..\Archivos\añadir.png" width="20" height="20"></a>
			<form action="Funcionalidad_Controller.php">
			<input type="text" aling="right" name="buscar" ><input aling="right" type="submit" name "buscador" value="Buscar">
			</form>
<?php 		 

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\ControladorDeportistas.php\">";
			echo "<fieldset><legend>".$idiom['Funcio']."</legend>";
			echo "<a href=\"Funcionalidad_Controller.php?Modificar=".$form[$numar]['nombre']."\"><input type=\"image\" src=\"..\Archivos\lapiz.png\" width=\"20\" height=\"20\"></a>";
			echo "<a href=\"Funcionalidad_Controller.php?Eliminar=".$form[$numar]['nombre']."\"><input type=\"image\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"..\Archivos\\eliminar.png\" width=\"30\"  height=\"30\" ></a>";
			echo "<br>";
			echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";

			echo "</div>";
			

		 	}

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>