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

			<form action="Funcionalidad_Controller.php" method="post">
			<fieldset>
			<input type="text" aling="right" placeholder=<?php echo $idiom['Nombre']; ?> name="buscar" ><input  type="submit" name="buscador" value="Buscar">
			</fieldset>
			</form>
			
			<div>
				<table border=1>
					<tr>
						<th> Nombre </th>
						<th> Descripcion </th>
					</tr>

					</tr>
					
		
						<?php
							$num = 0;
							foreach($form as $fun){
								//foreach($fun as $funs){//foreach($form as $forms => $formss){ 
						?>
							<tr>
								<td>
						<?php
								
								if($num %2 == 0){
								echo $fun;
								}
								$num++;
						?>
								</td>
								<td>
						<?php
								if($num %2 != 0){
								echo $fun;}	
						?>	
								</td>
<?php	
	//}
	//$num++;
	}
?>
					
				</table>
			</div>
<?php 		 
		

		/*for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Funcionalidad_Controller.php?View=".$form[$numar]['nombre']."\">";
			echo "<fieldset><legend>".$idiom['Funcio']."</legend>";
			//echo "<a href=\"Funcionalidad_Controller.php?Modificar=".$form[$numar]['nombre']."\"><input type=\"image\" src=\"..\Archivos\lapiz.png\" width=\"20\" height=\"20\"></a>";
			//echo "<a href=\"Funcionalidad_Controller.php?Eliminar=".$form[$numar]['nombre']."\"><input type=\"image\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"..\Archivos\\eliminar.png\" width=\"30\"  height=\"30\" ></a>";
			echo "<br>";
			echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo "<a href=\"Funcionalidad_Controller.php?View=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\lupa.jpg\" width=\"20\" height=\"20\"></a>";
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"Funcionalidad_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>*/
?>	
<?php 
include '../plantilla/pie.php';
}
}
?>