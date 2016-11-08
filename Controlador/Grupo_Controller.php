<?php 

  include("../Modelos/Grupo_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Grupo_ADD_Vista.php");
  include("../Vistas/Grupo_DELETE_Vista.php");
  include("../Vistas/Grupo_SHOW_Vista.php");
  include("../Vistas/Grupo_VIEW_Vista.php");
  include("../Vistas/Grupo_EDIT_Vista.php");
  include("../Vistas/Grupo_Menu_Vista.php");
session_start();

  	if(isset($_POST['grupo']))
  		{
  			$idiom=new idiomas();
  			$vista=new Grupo_Menu();
  			$vista->crear($idiom);
  		}

  		if(isset($_REQUEST['Alta'])){
  			$idiom=new idiomas();
  			$alta=new GrupoAlta();
  			$alta->crear($idiom,TRUE);

  		}
  		if (isset($_REQUEST['AltaGrupo']))
  		{

  			$idiom=new idiomas();
  			$nombreGrupo=$_POST['Nombre'];
  			$model=new Grupo();
  			$resultado=$model->comprobarexiste($nombreGrupo);
  			if($resultado==FALSE)
  			{
			$model->altaGrupo($nombreGrupo);
  			$idiom=new idiomas();
  			$vista=new Grupo_Menu();
  			$vista->crear($idiom);
  			}else
  			{
  			$alta=new GrupoAlta();
  			$alta->crear($idiom,FALSE);
  			}		
  		}
  		if (isset($_POST['Consultar']))
		{
			$idiom=new idiomas();
			$model=new Grupo();
			$model->ConsultarGrupo();
  			include("../Archivos/ArrayConsultarGrupo.php");
  			$arrays=new consult();
  			$form=$arrays->array_consultar();
  			$vistas=new Grupo_SHOW();
  			$vistas->crear($form,$idiom);

		}
  		
  		if (isset($_POST['buscador']))
  			{
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Grupo();
  			$model->buscarGrupo($name);
  			include("../Archivos/ArrayBuscarGrupo.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Grupo_SHOW();
  			$vistas->crear($form,$idiom);

	  		}

	  if (isset($_REQUEST['Modificar']))
  		{	
  				$idiom=new idiomas();
  				$vista=new GrupoEDIT();
  				$vista->crear($idiom,TRUE);

  		}
  		if (isset($_REQUEST['ModificarGrupo']))
  		{
  			$idiom=new idiomas();
  			$name=$_POST['Nombre'];
  			$namenuevo=$_POST['NombreNuevo'];
  			$model=new Grupo();
  			$resultado=$model->comprobarexiste($name);
  			if($resultado==TRUE){
  				$model->ModificarGrupo($name,$namenuevo);
  				$idiom=new idiomas();
  				$vista=new Grupo_Menu();
  				$vista->crear($idiom);
  			}else{
				$idiom=new idiomas();
  				$vista=new GrupoEDIT();
  				$vista->crear($idiom,FALSE);
  			}

  		}
  		if(isset($_POST['Baja'])){

  				$idiom=new idiomas();
  				$vista=new GrupoDelete();
  				$vista->crear($idiom,TRUE);

  		}
  		 if (isset($_REQUEST['BajaGrupo']))
  			{

  			$idiom=new idiomas();
  			$name=$_POST['Nombre'];
  			$model=new Grupo();
  			$resultado=$model->comprobarexiste($name);
  			if($resultado==TRUE){
  				$model->BajaGrupo($name);
  				$idiom=new idiomas();
  				$vista=new Grupo_Menu();
  				$vista->crear($idiom);
  			}else{
				$idiom=new idiomas();
  				$vista=new GrupoDelete();
  				$vista->crear($idiom,FALSE);
  			}
  			}
         if(isset($_REQUEST['View']))
        {  
          $idiom=new idiomas();
          $name=$_REQUEST['View'];
          $model=new Grupo();
          $model->crearArrrayGrupo($name);
          include("../Archivos/ArrayGrupo.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Grupo_VIEW();
          $vistas->crear($form,$idiom);

        }

  			if (isset($_REQUEST['Volver']))
  			{

  			$idiom=new idiomas();
  			$vista=new Grupo_Menu();
  			$vista->crear($idiom);
  			}

  		
?>