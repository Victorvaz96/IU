<?php 


class Accion{


	function creador($name){

		$this->$name=$name;
	}

		function conexionBD()
		{
				$mysqli=mysqli_connect("127.0.0.1","root","","iu2");
				if(!$mysqli)
				{
					echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    				exit;
				}
				
			return $mysqli;
		}
		function altaAccion($nombre,$descripcion,$funcionalidad)
		{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `acciones`(`NOMBREACCION`,`DESCRIPCION`, `FUNCIONALIDAD`) VALUES ('$nombre','$descripcion','$funcionalidad')";
			$mysqli->query($query);
			$mysqli->close();
				
		}
		function crearArrrayFuncionalidades(){
			
			$file = fopen("../Archivos/ArrayAcciones_GRUPO.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM funcionalidades");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUNCIONALIDAD'];
				
				 fwrite($file,"array(\"nombre\"=>'$nombre')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}
		function comprobarexiste($name)
		{
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM acciones where NOMBREACCION ='$name'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				
				$mysqli->close();
				return FALSE;
			}
		}

		function bajaAccion($name)
			{
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `acciones` WHERE NOMBREACCION='$name'";
				$mysqli->query($query);
				$mysqli->close();
					
			}

		

		function modificarAccion($name,$descripcion,$funcionalidad)
		{
			$mysqli=$this->conexionBD();
			$query="UPDATE `acciones` SET `DESCRIPCION`='$descripcion',`FUNCIONALIDAD`='$funcionalidad' where `NOMBREACCION`='$name'";
			$mysqli->query($query);
			$mysqli->close();
		}
		function crearArrrayAccion($name){
			
			$file = fopen("../Archivos/ArrayAcciones.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM acciones where NOMBREACCION like '%$name%' ");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBREACCION'];
				$descripcion=$fila['DESCRIPCION'];
				$funcionalidad=$fila['FUNCIONALIDAD'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"descripcion\"=>'$descripcion',\"funcionalidad\"=>'$funcionalidad')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
		function consultarAccion()
		{
				 $file = fopen("../Archivos/ArrayConsultarAccion.php", "w");
				 fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM acciones";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBREACCION'];
				$descripcion=$fila['DESCRIPCION'];
				$funcionalidad=$fila['FUNCIONALIDAD'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"descripcion\"=>'$descripcion',\"funcionalidad\"=>'$funcionalidad')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
		function buscarAccion($nombre)
		{
			 $file = fopen("../Archivos/ArrayBuscarAccion.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM acciones where NOMBREACCION like '%$nombre%'";
			$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBREACCION'];
				$descripcion=$fila['DESCRIPCION'];
				$funcionalidad=$fila['FUNCIONALIDAD'];
				fwrite($file,"array(\"nombre\"=>'$nombre', \"descripcion\"=>'$descripcion',\"funcionalidad\"=>'$funcionalidad')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
}

?>