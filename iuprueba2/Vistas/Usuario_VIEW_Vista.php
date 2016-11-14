<?php 
	class Usuario_VIEW{

		function crear($form,$idioma){ 

			include '../plantilla/cabecera.php';
			
			$cabecera=new cabecera();
			$cabecera->crear($idioma);

       		$clase=new comprobacion();
    		$idiom=$clase->comprobaridioma($idioma);
    		?>
    		<header>
		
  			</header>

			<form action="Usuario_Controller.php" method="post">
			<fieldset>
			<input type="text" aling="right" placeholder=<?php echo $idiom['Usuario']; ?> name="buscar" ><input  type="submit" name="buscador" value="Buscar">
			</fieldset>
			</form>
<?php 		 

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Usuario_Controller.php?View=".$form[$numar]['usuario']."\">";
			echo "<fieldset><legend>".$idiom['Usuario']."</legend>";
			echo "<br>";
			echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo "<br>";
			echo $idiom['Apellidos'].":".$form[$numar]["apellido1"];
			echo "<br>";
			echo $idiom['DNI'].":".$form[$numar]["dni"];
			echo "<br>";
			echo $idiom['Usuario'].":".$form[$numar]["usuario"];
			echo "<br>";
			echo "<a href=\"Usuario_Controller.php?View=".$form[$numar]['usuario']."\""."><input type=\"image\" src=\"..\Archivos\\lupa.jpg\" width=\"20\" height=\"20\"></a>";
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"Usuario_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>