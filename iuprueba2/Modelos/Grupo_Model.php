<?php 


class Grupo{

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
		function altaGrupo($nombre)
		{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `grupo`(`NOMBRE_GRUPO`) VALUES ('$nombre')";
			$mysqli->query($query);
			$mysqli->close();
				
		}
		function comprobarexiste($name)
		{
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM grupo where NOMBRE_GRUPO ='$name'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				
				$mysqli->close();
				return FALSE;
			}
		}
		function bajaGrupo($name)
			{
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `grupo` WHERE NOMBRE_GRUPO='$name'";
				$mysqli->query($query);
				$mysqli->close();
					
			}

		function crearArrrayGrupo($name){
			
			$file = fopen("../Archivos/ArrayGrupo.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM grupo where NOMBRE_GRUPO ='$name'");
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

		function modificarGrupo($name,$namenuevo)
		{
			$mysqli=$this->conexionBD();
			$query="UPDATE `grupo` SET `NOMBRE_GRUPO`='$namenuevo' where NOMBRE_GRUPO='$name'";
			$mysqli->query($query);
			$mysqli->close();

		}
		function consultarGrupo()
		{
				 $file = fopen("../Archivos/ArrayConsultarGrupo.php", "w");
				 fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

			$mysqli=$this->conexionBD();
			$query="SELECT * FROM grupo ";
			$resultado=$mysqli->query($query);
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
		function buscarGrupo($nombre)
		{
			 $file = fopen("../Archivos/ArrayBuscarGrupo.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);
				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM grupo where NOMBRE_GRUPO like '%%$nombre%%'";
			$resultado=$mysqli->query($query);
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
}

?>