<?php 

  include("../Modelos/Accion_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Accion_ADD_Vista.php");
  include("../Vistas/Accion_DELETE_Vista.php");
  include("../Vistas/Accion_SHOW_Vista.php");
  include("../Vistas/Accion_VIEW_Vista.php");
  include("../Vistas/Accion_EDIT_Vista.php");
  include("../Vistas/MenuPrincipal_Show_Vista.php");
  session_start();

  		if(isset($_REQUEST['Alta'])){
  			$idiom=new idiomas();
  			$alta=new accionAlta();
        $model=new Accion();
        $model->crearArrrayFuncionalidades();
        include("../Archivos/ArrayAcciones_GRUPO.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
  			$alta->crear($idiom,TRUE,$form);
  		}
  		if (isset($_REQUEST['AltaAccion']))
  		{
  			$idiom=new idiomas();
  			$nombrefuncionalidad=$_POST['Nombre'];
        $descripcion=$_POST['descripcion'];
        $funcionalidad=$_POST['Funcio'];
  			$model=new Accion();
  			$resultado=$model->comprobarexiste($nombrefuncionalidad);
  			if($resultado==FALSE)
  			{
        $origen="AltaFuncionalidad";
			  $model->altaAccion($nombrefuncionalidad,$descripcion,$funcionalidad);
  			$idiom=new idiomas();
  			$vista=new panel();
        $vista->constructor($idiom,$origen);
  			}else
  			{
        $model=new Accion();
        $model->crearArrrayFuncionalidades();
        include("../Archivos/ArrayAcciones_GRUPO.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
  			$alta=new AccionAlta();
  			$alta->crear($idiom,FALSE,$form);
  			}	
  		}

  		if (isset($_REQUEST['Consultar']))
		{   $origen="consultar";
			  $idiom=new idiomas();
			  $model=new Accion();
			  $model->ConsultarAccion();
  			include("../Archivos/ArrayConsultarAccion.php");
  			$arrays=new consult();
  			$form=$arrays->array_consultar();
  			$vistas=new Accion_SHOW();
  			$vistas->crear($form,$idiom,$origen);

		}
  		
  		if (isset($_POST['buscador'])and !isset($_REQUEST['Modificar2']))
  			{
          $origen="consultar";
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Accion();
  			$model->buscarAccion($name);
  			include("../Archivos/ArrayBuscarAccion.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Accion_SHOW();
  			$vistas->crear($form,$idiom,$origen);
	  		}

        if (isset($_REQUEST['Modificar1'])){
          $origen="Modificar";
          $idiom=new idiomas();
          $model=new Accion();
          $model->ConsultarAccion();
          include("../Archivos/ArrayConsultarAccion.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vista=new Accion_SHOW();
          $vista->crear($form,$idiom,$origen);
        }
	  if (isset($_REQUEST['Modificar']))
  		{	  
          $origen="Modificar";
  				$idiom=new idiomas();
          $name=$_REQUEST['Modificar'];
          $model=new Accion();
          $model->buscarAccion($name);
          include("../Archivos/ArrayBuscarAccion.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
  				$vista=new Accion_View();
  				$vista->crear($form,$idiom,$origen);
  		}
      if(isset($_REQUEST['Modificar2'])){
          $idiom=new idiomas();
          $origen="Modificar"; 
          $name=$_POST['buscar'];
          $model=new Accion();
          $model->buscarAccion($name);
          include("../Archivos/ArrayBuscarAccion.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vista=new Accion_SHOW();
          $vista->crear($form,$idiom,$origen);
      }
  		if (isset($_REQUEST['ModificarAccion']))
  		{  
           $origen="Modificar";
  			  $idiom=new idiomas();
  			  $name=$_POST['Nombre'];
          $descripcion=$_POST['descripcion'];
          $funcionalidad=$_POST['Funcio'];
          $model=new Accion();
  				$model->ModificarAccion($name,$descripcion,$funcionalidad);
  				$idiom=new idiomas();
  				$vista=new panel();
          $vista->constructor($idiom,$origen);
  			}

  		if(isset($_REQUEST['Baja'])){
          $idiom=new idiomas();
          $model=new Accion();
          $model->ConsultarAccion();
          include("../Archivos/ArrayConsultarAccion.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
  				$vista=new AccionDelete();
  				$vista->crear($idiom,TRUE,$form);

  		}
  		 if (isset($_REQUEST['BajaAccion']))
  			{
        $origen="Baja";
  			$idiom=new idiomas();
  			$name=$_REQUEST['BajaAccion'];
  			$model=new Accion();
  			$model->BajaAccion($name);
        $vista=new panel();
        $vista->constructor($idiom,$origen);
  			}
        
        if(isset($_REQUEST['View']))
        {  
          $origen="consultar";
          $idiom=new idiomas();
          $name=$_REQUEST['View'];
          $model=new Accion();
          $model->crearArrrayAccion($name);
          include("../Archivos/ArrayAcciones.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Accion_VIEW();
          $vistas->crear($form,$idiom,$origen);
        }
        if(isset($_REQUEST['BajaShow']))
        {  
          $idiom=new idiomas();
          $name=$_POST['buscar'];
          $model=new Accion();
          $model->buscarAccion($name);
          include("../Archivos/ArrayBuscarAccion.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new AccionDELETE();
          $vistas->crear($idiom,TRUE,$form);
        }
         if(isset($_REQUEST['BajaShow1']))
         {
          $origen="Baja";
          $idiom=new idiomas();
          $name=$_REQUEST['BajaShow1'];
          $model=new Accion();
          $model->crearArrrayAccion($name);
          include("../Archivos/ArrayAcciones.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Accion_VIEW();
          $vistas->crear($form,$idiom,$origen);
         }
        if(isset($_REQUEST['Modificar3']))
      {
        $idiom=new idiomas();
        $name=$_REQUEST['Modificar3'];
        $model=new Accion();
        $model->crearArrrayFuncionalidades();
        include("../Archivos/ArrayAcciones_GRUPO.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
        $vistas=new AccionEDIT();
        $vistas->crear($idiom,$name,$form);
      }
  			if (isset($_REQUEST['Volver']))
  			{
          $origen="volver";
        $idiom=new idiomas();
        $vista=new panel();
        $vista->constructor($idiom,$origen);
  			}

  		
?>