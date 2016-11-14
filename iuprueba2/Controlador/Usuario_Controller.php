<?php 
  include("../Modelos/Usuario_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Usuario_ADD_Vista.php");
  include("../Vistas/Usuario_DELETE_Vista.php");
  include("../Vistas/Usuario_SHOW_Vista.php");
  include("../Vistas/Usuario_VIEW_Vista.php");
  include("../Vistas/Usuario_EDIT_Vista.php");
  include("../Vistas/Usuario_Menu_Vista.php");
  session_start();

  	if(isset($_POST['usuarios']))
  		{
  			$idiom=new idiomas();
  			$vista=new Usuarios_Menu();
  			$vista->crear($idiom);
  		}
  		if(isset($_REQUEST['Alta']))
      {

  			$idiom=new idiomas();
  			$alta=new UsuarioAlta();
        $model=new Usuario();
        $model->crearArrrayGrupo();
        include("../Archivos/ArrayGrupo_usuarios.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
  			$alta->crear($idiom,TRUE,$form);
  		}
  		if (isset($_REQUEST['AltaUsuario']))
  		{
  			$idiom=new idiomas();
  			$nombreUsuario=$_POST['Nombre'];
        $apellidos=$_POST['Apellido'];
        $Fecha=$_POST['FechaNac'];
        $dni=$_POST['DNI'];
        $email=$_POST['email'];
        $usuario=$_POST['Usuario'];
        $password=$_POST['Password'];
        $grupo=$_POST['grupo'];
        $password=md5($password);
  			$model=new Usuario();
  			$resultado=$model->comprobarexiste($usuario,$dni);
  			if($resultado==FALSE)
  			{
			  $model->altaUsuario($nombreUsuario,$apellidos,$Fecha,$email,$usuario,$password,$dni,$grupo);
  			$vista=new Usuarios_Menu();
  			$vista->crear($idiom);
  			}else
  			{
  			$alta=new UsuarioAlta();
        $model=new Usuario();
        $model->crearArrrayGrupo();
        include("../Archivos/ArrayGrupo_usuarios.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
  			$alta->crear($idiom,FALSE,$form);
  			}		
  		}
  		if (isset($_POST['Consultar']))
		{
			$idiom=new idiomas();
			$model=new Usuario();
			$model->creararrayUsuarios();
  			include("../Archivos/ArrayConsultarUsuarios.php");
  			$arrays=new consult();
  			$form=$arrays->array_consultar();
  			$vistas=new Usuario_SHOW();
  			$vistas->crear($form,$idiom);

		}
  		if (isset($_POST['buscador']))
  			{
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Usuario();
  			$model->buscarUsuario($name);
  			include("../Archivos/ArrayBuscarUsuario.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Usuario_SHOW();
  			$vistas->crear($form,$idiom);

	  		}

	  if (isset($_REQUEST['Modificar']))
  		{	
  			 $idiom=new idiomas();
  			 $vista=new UsuarioEDIT();
         $model=new Usuario();
         $model->crearArrrayGrupo();
         include("../Archivos/ArrayGrupo_usuarios.php");
         $arrays=new consult();
         $form=$arrays->array_consultar();
  				$vista->crear($idiom,TRUE,$form);

  		}
  		if (isset($_REQUEST['ModificarUsuario']))
  		{
  			$idiom=new idiomas();
  			$usuarioexistente=$_POST['Usuario'];
        $nombreUsuario=$_POST['Nombre'];
        $apellidos=$_POST['Apellido'];
        $Fecha=$_POST['FechaNac'];
        $dni=$_POST['DNI'];
        $email=$_POST['email'];
        $usuario=$_POST['Usuarionuevo'];
        $password=$_POST['Password'];
        $grupo=$_POST['grupo'];
  			$model=new Usuario();
        $resultado=$model->comprobarusuarios($usuarioexistente);
        if($resultado==TRUE)
        { 
  				$model->modificarUsuario($nombreUsuario,$apellidos,$email,$usuarioexistente,$usuario,$password,$dni,$grupo);
  				$idiom=new idiomas();
  				$vista=new Usuarios_Menu();
  				$vista->crear($idiom);
  			}else{
			   	$idiom=new idiomas();
  				$vista=new UsuarioEDIT();
          $model=new Usuario();
         $model->crearArrrayGrupo();
         include("../Archivos/ArrayGrupo_usuarios.php");
         $arrays=new consult();
         $form=$arrays->array_consultar();
  				$vista->crear($idiom,FALSE,$form);
  			}

  		}
  		if(isset($_POST['Baja'])){

  				$idiom=new idiomas();
  				$vista=new UsuarioDelete();
  				$vista->crear($idiom,TRUE);

  		}
  		 if (isset($_REQUEST['BajaUsuario']))
  			{

  			$idiom=new idiomas();
  			$usuario=$_POST['usuario'];
  			$model=new Usuario();
  			$resultado=$model->comprobarusuarios($usuario);
  			if($resultado==TRUE){
  				$model->eliminarUsuario($usuario);
  				$idiom=new idiomas();
  				$vista=new Usuarios_Menu();
  				$vista->crear($idiom);
  			}else{
				$idiom=new idiomas();
  				$vista=new UsuarioDelete();
  				$vista->crear($idiom,FALSE);
  			}
  			}
        if(isset($_REQUEST['View']))
        {  
          $idiom=new idiomas();
          $usuario=$_REQUEST['View'];
          $model=new Usuario();
          $model->crearArrrayUsuario($usuario);
          include("../Archivos/ArrayUsuarios.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Usuario_VIEW();
          $vistas->crear($form,$idiom);

        }
  			if (isset($_REQUEST['Volver']))
  			{
  			$idiom=new idiomas();
  			$vista=new Usuarios_Menu();
  			$vista->crear($idiom);
  			}

  		
?>