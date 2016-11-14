<?php 

class UsuarioAlta{

	function crear($idioma,$resultado,$form){

		include '../plantilla/cabecera.php';
			$cabecera=new cabecera();
			$cabecera->crear($idioma);

			$clase=new comprobacion();
    		$idiom=$clase->comprobaridioma($idioma);

?>
 <?php
 			if ($resultado==FALSE){
 				echo "<script>alert(\"".$idiom["USUARIOSINCORRECTO"]."\")</script>";
 			}
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\"  name=\"formulario\" action=\"..\Controlador\Usuario_Controller.php?AltaUsuario\">";
			echo "<fieldset><legend>".$idiom['Usuario']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required  name=\"Nombre\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Apellido\"id =\"Apellido\"> ".$idiom['Apellidos'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Apellido name=Apellido>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"FechaNac\"id =\"FechaNac\"> ".$idiom['FechaNac'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=date required id=FechaNac name=FechaNac>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"DNI\"id =\"DNI\"> ".$idiom['DNI'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=DNI name=DNI>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"email\"id =\"email\"> ".$idiom['email'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<span class=\"input-group-addon\">@</span>";
			echo "<"."input"." "."class=\"form-control\""."type=text  pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\"required id=email name=email>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Usuario\"id =\"Usuario\"> ".$idiom['Usuario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Usuario name=Usuario>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Password\"id =\"Password\"> ".$idiom['Password'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type='Password' required id='Password' name='Password'>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"grupo\"id =\"grupo\"> ".$idiom['GrupoName'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."type='grupo' required id='grupo' name='grupo'>"; 
			for ($numar =0;$numar<count($form);$numar++){
			echo "<option value=".$form[$numar]["nombre"].">".$form[$numar]['nombre']."</option>";

				 }
				 echo"</select>";
			 echo "</div></div>";
			echo "<a href=\"Usuario_Controller.php?AltaFuncionalidad\"><input type=\"image\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\" mouseover='encriptar();'></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Usuario_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>



<?php
	include '../plantilla/pie.php';
	}}


?>