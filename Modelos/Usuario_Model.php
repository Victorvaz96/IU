<?php 


class Usuario
	{
	private $nombre;
	private $apellidos;
	private $email;
	private $usuario;
	private $dni;
	private $password;
	private $grupo;

	function constructor($nombre,$apellidos,$email,$usuario,$password,$dni,$grupo)
	{

		$this->nombre=$nombre;
		$this->apellidos=$apellidos;
		$this->email=$email;
		$this->usuario=$usuario;
		$this->password=$password;
		$this->grupo=$grupo;
		$this->dni=$dni;
	}
	
	function conexionBD(){
				$mysqli=mysqli_connect("127.0.0.1","root","","iu");
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

	function creararrayUsuarios()
	{
		$file = fopen("../Archivos/ArrayConsultarUsuarios.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `usuario`");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				 $apellido1=$fila['APELLIDOS'];
				 $dni=$fila['DNI'];
				 //$email=$fila['EMAIL'];
				 
				 $usuario=$fila['USUARIO'];
				 $password=$fila['PASSWORD'];
				// $fechaNac=$fila['FechaNac'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"apellido1\"=>'$apellido1',
					\"dni\"=>'$dni',\"usuario\"=>'$usuario',
					\"password\"=>'$password')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
	}

	function buscarUsuario($user)
		{
			 $file = fopen("../Archivos/ArrayBuscarUsuario.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM usuario where USUARIO like '%$user%'";
			$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				 $apellido1=$fila['APELLIDOS'];
				 $dni=$fila['DNI'];
				 //$email=$fila['EMAIL'];
				 
				 $usuario=$fila['USUARIO'];
				 $password=$fila['PASSWORD'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"apellido1\"=>'$apellido1',
					\"dni\"=>'$dni',\"usuario\"=>'$usuario',
					\"password\"=>'$password')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}

	function comprobarUsuario($user,$pass)
	{
		$mysqli=$this->conexionBD();
		$query="SELECT * FROM usuario WHERE USUARIO='$user' AND PASSWORD='$pass'";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){

		return true;
		}else{
			return false;
		}
	}

	function altaUsuario($nombr,$apellidos,$fecha,$email,$usuario,$pass,$dni,$grupo)
	{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `usuario`(`USUARIO`, `PASSWORD`, `NOMBRE`, `APELLIDOS`, `DNI`, `GRUPO_NOMBRE_GRUPO`) VALUES ('$usuario','$pass','$nombr','$apellidos','$dni','$grupo')";
			$mysqli->query($query);
			$mysqli->close();		
	}
	//funcion que te dice si el usuario o ese dni estan en la base de datos.
	function comprobarexiste($user,$dni)
		{
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM usuario where USUARIO ='$user' or  DNI='$dni'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				$mysqli->close();
				return FALSE;
			}
		}
		//funcion que te comprueba que el usuario esta en la base de datos
		function comprobarusuarios($user){

			$mysqli=$this->conexionBD();
			$query="SELECT * FROM usuario where USUARIO ='$user'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				
				$mysqli->close();
				return FALSE;
			}
		}
		//funcion que te crea el array de los usuarios para la vista View
		function crearArrrayUsuario($user){

			$file = fopen("../Archivos/ArrayUsuarios.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM usuario where USUARIO ='$user'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				 $apellido1=$fila['APELLIDOS'];
				 $dni=$fila['DNI'];
				 //$email=$fila['EMAIL'];
				 $usuario=$fila['USUARIO'];
				 $password=$fila['PASSWORD'];
				// $fechaNac=$fila['FechaNac'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"apellido1\"=>'$apellido1',
					\"dni\"=>'$dni',\"usuario\"=>'$usuario',
					\"password\"=>'$password')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}
	function modificarUsuario($nombr,$apellidos,$email,$usuario,$nuevousuario,$pass,$dni,$grupo)
	{
		$mysqli=$this->conexionBD();
			$query="UPDATE `usuario` SET `USUARIO`='$nuevousuario',`PASSWORD`='$pass',`NOMBRE`='$nombr',`APELLIDOS`='$apellidos',`DNI`='$dni',`GRUPO_NOMBRE_GRUPO`='$grupo' WHERE USUARIO='$usuario'";
			$mysqli->query($query);
			$mysqli->close();


	}
	function eliminarUsuario($user)
	{
		$mysqli=$this->conexionBD();
				$query="DELETE FROM `usuario` WHERE USUARIO='$user'";
				$mysqli->query($query);
				$mysqli->close();
					
	}
	function CconsultarUsuario()
	{

	}

	}