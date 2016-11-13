<?php 


class Funcionalidad{


		private $name;

	function creador($name){

		$this->$name=$name;
	}

		function conexionBD()
		{
				$mysqli=mysqli_connect("127.0.0.1","root","","iu");
				if(!$mysqli)
				{
					echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    				exit;
				}
				
			return $mysqli;
		}
		function altaFuncionalidad($nombre)
		{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `funcionalidades`(`NOMBRE_FUCIONALIDAD`) VALUES ('$nombre')";
			$mysqli->query($query);
			$mysqli->close();
				
		}
		function comprobarexiste($name)
		{
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM funcionalidades where NOMBRE_FUCIONALIDAD ='$name'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				
				$mysqli->close();
				return FALSE;
			}
		}

		function bajaFuncionalidad($name)
			{
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `funcionalidades` WHERE NOMBRE_FUCIONALIDAD='$name'";
				$mysqli->query($query);
				$mysqli->close();
					
			}

		

		function modificarFuncionalidad($name,$namenuevo)
		{
			$mysqli=$this->conexionBD();
			$query="UPDATE `funcionalidades` SET `NOMBRE_FUCIONALIDAD`='$namenuevo' where NOMBRE_FUCIONALIDAD='$name'";
			$mysqli->query($query);
			$mysqli->close();

		}
		
		function crearArrrayFuncionalidad($name){
			
			$file = fopen("../Archivos/ArrayFuncionalidad.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM funcionalidades where NOMBRE_FUCIONALIDAD ='$name'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUCIONALIDAD'];
				
				 fwrite($file,"array(\"nombre\"=>'$nombre')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}
		function consultarFuncionalidad()
		{
				 $file = fopen("../Archivos/ArrayConsultarFuncionalidad.php", "w");
				 fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

			$mysqli=$this->conexionBD();
			$query="SELECT * FROM funcionalidades ";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUCIONALIDAD'];
				fwrite($file,"array(\"nombre\"=>'$nombre')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
		function buscarFuncionalidad($nombre)
		{
			 $file = fopen("../Archivos/ArrayBuscarFuncionalidad.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM funcionalidades where NOMBRE_FUCIONALIDAD like '%$nombre%'";
			$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUCIONALIDAD'];
				fwrite($file,"array(\"nombre\"=>'$nombre')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
}

?>