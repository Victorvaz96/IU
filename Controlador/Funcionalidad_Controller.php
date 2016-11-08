<?php 

  include("../Modelos/Funcionalidad_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Funcionalidad_ADD_Vista.php");
  include("../Vistas/Funcionalidad_DELETE_Vista.php");
  include("../Vistas/Funcionalidad_SHOW_Vista.php");
  include("../Vistas/Funcionalidad_VIEW_Vista.php");
  include("../Vistas/Funcionalidad_EDIT_Vista.php");
  include("../Vistas/Funcionalidad_Menu_Vista.php");
session_start();

  	if(isset($_POST['funcionalidad']))
  		{
  			$idiom=new idiomas();
  			$vista=new Funcionalidad_Menu();
  			$vista->crear($idiom);
  		}

  		if(isset($_REQUEST['Alta'])){
  			$idiom=new idiomas();
  			$alta=new funcionalidadAlta();
  			$alta->crear($idiom,TRUE);

  		}
  		if (isset($_REQUEST['AltaFuncionalidad']))
  		{

  			$idiom=new idiomas();
  			$nombrefuncionalidad=$_POST['Nombre'];
  			$model=new Funcionalidad();
  			$resultado=$model->comprobarexiste($nombrefuncionalidad);
  			if($resultado==FALSE)
  			{
			$model->altaFuncionalidad($nombrefuncionalidad);
  			$idiom=new idiomas();
  			$vista=new Funcionalidad_Menu();
  			$vista->crear($idiom);
  			}else
  			{
  			$alta=new funcionalidadAlta();
  			$alta->crear($idiom,FALSE);
  			}		
  		}
  		if (isset($_POST['Consultar']))
		{
			$idiom=new idiomas();
			$model=new Funcionalidad();
			$model->ConsultarFuncionalidad();
  			include("../Archivos/ArrayConsultarFuncionalidad.php");
  			$arrays=new consult();
  			$form=$arrays->array_consultar();
  			$vistas=new Funcionalidad_SHOW();
  			$vistas->crear($form,$idiom);

		}
  		
  		if (isset($_POST['buscador']))
  			{
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Funcionalidad();
  			$model->buscarFuncionalidad($name);
  			include("../Archivos/ArrayBuscarFuncionalidad.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Funcionalidad_SHOW();
  			$vistas->crear($form,$idiom);

	  		}

	  if (isset($_REQUEST['Modificar']))
  		{	
  				$idiom=new idiomas();
  				$vista=new funcionalidadEDIT();
  				$vista->crear($idiom,TRUE);

  		}
  		if (isset($_REQUEST['ModificarFuncionalidad']))
  		{
  			$idiom=new idiomas();
  			$name=$_POST['Nombre'];
  			$namenuevo=$_POST['NombreNuevo'];
  			$model=new Funcionalidad();
  			$resultado=$model->comprobarexiste($name);
  			if($resultado==TRUE){
  				$model->ModificarFuncionalidad($name,$namenuevo);
  				$idiom=new idiomas();
  				$vista=new Funcionalidad_Menu();
  				$vista->crear($idiom);
  			}else{
				$idiom=new idiomas();
  				$vista=new funcionalidadEDIT();
  				$vista->crear($idiom,FALSE);
  			}

  		}
  		if(isset($_POST['Baja'])){

  				$idiom=new idiomas();
  				$vista=new funcionalidadDelete();
  				$vista->crear($idiom,TRUE);

  		}
  		 if (isset($_REQUEST['BajaFuncionalidad']))
  			{

  			$idiom=new idiomas();
  			$name=$_POST['Nombre'];
  			$model=new Funcionalidad();
  			$resultado=$model->comprobarexiste($name);
  			if($resultado==TRUE){
  				$model->BajaFuncionalidad($name);
  				$idiom=new idiomas();
  				$vista=new Funcionalidad_Menu();
  				$vista->crear($idiom);
  			}else{
				$idiom=new idiomas();
  				$vista=new funcionalidadDelete();
  				$vista->crear($idiom,FALSE);
  			}
  			}
        if(isset($_REQUEST['View']))
        {  
          $idiom=new idiomas();
          $name=$_REQUEST['View'];
          $model=new Funcionalidad();
          $model->crearArrrayFuncionalidad($name);
          include("../Archivos/ArrayFuncionalidad.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Funcionalidad_VIEW();
          $vistas->crear($form,$idiom);

        }

  			if (isset($_REQUEST['Volver']))
  			{

  			$idiom=new idiomas();
  			$vista=new Funcionalidad_Menu();
  			$vista->crear($idiom);
  			}

  		
?>