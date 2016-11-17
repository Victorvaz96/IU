<?php 

class Permisos{



function conexionBD(){
				$mysqli=mysqli_connect("127.0.0.1","root","","iu2");
				if(!$mysqli){
					echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    				exit;
				}		
			return $mysqli;
	}

	function crearArrrayGrupo(){
			
			$file = fopen("../Archivos/ArrayGrupo_usuarios.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM grupo");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_GRUPO'];
				
				 fwrite($file,"array(\"nombre\"=>'$nombre')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}
		function crearArrayAccion_Funcionalidad($name){
			$file = fopen("../Archivos/ArrayAccion_Funcionalidad.php", "w");
		fwrite($file,"<?php class consult2 { function array_consultar(){". PHP_EOL);
		fwrite($file,"\$form=array(". PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM acciones where FUNCIONALIDAD='$name'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBREACCION'];
				$funcionalidad=$fila['FUNCIONALIDAD'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"funcionalidad\"=>'$funcionalidad')," . PHP_EOL);
			  }
			}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
		function crearArrayFuncionalidad()
		{
			$file = fopen("../Archivos/ArrayFuncionalidad.php", "w");
		fwrite($file,"<?php class consult1 { function array_consultar(){". PHP_EOL);
		fwrite($file,"\$form=array(". PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM funcionalidades ");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
			 $filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $funcionalidad=$fila['NOMBRE_FUNCIONALIDAD'];
				 fwrite($file,"array(\"funcionalidad\"=>'$funcionalidad')," . PHP_EOL);
			 }
			}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();


		}
		function incluirpermisos(){

			
		}

}



?>