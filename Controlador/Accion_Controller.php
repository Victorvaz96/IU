<?php 

  include("../Modelos/Accion_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Accion_ADD_Vista.php");
  include("../Vistas/Accion_DELETE_Vista.php");
  include("../Vistas/Accion_SHOW_Vista.php");
  include("../Vistas/Accion_VIEW_Vista.php");
  include("../Vistas/Accion_EDIT_Vista.php");
  include("../Vistas/Accion_Menu_Vista.php");
session_start();

  	if(isset($_POST['accion']))
  		{
  			$idiom=new idiomas();
  			$vista=new Accion_Menu();
  			$vista->crear($idiom);
  		}

  		if(isset($_REQUEST['Alta'])){
  			$idiom=new idiomas();
  			$alta=new accionAlta();
  			$alta->crear($idiom,TRUE);

  		}
  		if (isset($_REQUEST['AltaAccion']))
  		{

  			$idiom=new idiomas();
  			$nombreaccion=$_POST['Nombre'];
  			$model=new Accion();
  			$resultado=$model->comprobarexiste($nombreaccion);
  			if($resultado==FALSE)
  			{
			$model->altaAccion($nombreaccion);
  			$idiom=new idiomas();
  			$vista=new Accion_Menu();
  			$vista->crear($idiom);
  			}else
  			{
  			$alta=new accionAlta();
  			$alta->crear($idiom,FALSE);
  			}		
  		}
  		if (isset($_POST['Consultar']))
		{
			$idiom=new idiomas();
			$model=new Accion();
			$model->ConsultarAccion();
  			include("../Archivos/ArrayConsultarAccion.php");
  			$arrays=new consult();
  			$form=$arrays->array_consultar();
  			$vistas=new Accion_SHOW();
  			$vistas->crear($form,$idiom);

		}
  		
  		if (isset($_POST['buscador']))
  			{
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Accion();
  			$model->buscarAccion($name);
  			include("../Archivos/ArrayBuscarAccion.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Accion_SHOW();
  			$vistas->crear($form,$idiom);

	  		}

	  if (isset($_REQUEST['Modificar']))
  		{	
  				$idiom=new idiomas();
  				$vista=new accionEDIT();
  				$vista->crear($idiom,TRUE);

  		}
  		if (isset($_REQUEST['ModificarAccion']))
  		{
  			$idiom=new idiomas();
  			$name=$_POST['Nombre'];
  			$namenuevo=$_POST['NombreNuevo'];
  			$model=new Accion();
  			$resultado=$model->comprobarexiste($name);
  			if($resultado==TRUE){
  				$model->ModificarAccion($name,$namenuevo);
  				$idiom=new idiomas();
  				$vista=new Accion_Menu();
  				$vista->crear($idiom);
  			}else{
				$idiom=new idiomas();
  				$vista=new accionEDIT();
  				$vista->crear($idiom,FALSE);
  			}

  		}
  		if(isset($_POST['Baja'])){

  				$idiom=new idiomas();
  				$vista=new accionDelete();
  				$vista->crear($idiom,TRUE);

  		}
  		 if (isset($_REQUEST['BajaAccion']))
  			{

  			$idiom=new idiomas();
  			$name=$_POST['Nombre'];
  			$model=new Accion();
  			$resultado=$model->comprobarexiste($name);
  			if($resultado==TRUE){
  				$model->BajaAccion($name);
  				$idiom=new idiomas();
  				$vista=new Accion_Menu();
  				$vista->crear($idiom);
  			}else{
				$idiom=new idiomas();
  				$vista=new accionDelete();
  				$vista->crear($idiom,FALSE);
  			}
  			}
        if(isset($_REQUEST['View']))
        {  
          $idiom=new idiomas();
          $name=$_REQUEST['View'];
          $model=new Accion();
          $model->crearArrrayAccion($name);
          include("../Archivos/ArrayAccion.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Accion_VIEW();
          $vistas->crear($form,$idiom);

        }

  			if (isset($_REQUEST['Volver']))
  			{

  			$idiom=new idiomas();
  			$vista=new Accion_Menu();
  			$vista->crear($idiom);
  			}

  		
?>