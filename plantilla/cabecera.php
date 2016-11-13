<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Proyecto</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php 
//Establecemos el idioma
class cabecera{

    function crear($idioma){ 
        
        include("../Funciones/comprobaridioma.php");
       $clase=new comprobacion();
    $idiom=$clase->comprobaridioma($idioma);


//Creamos el menu lateral
?>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                <form class="principal" method="post" action="..\Controlador\MenuPrincipal_Controller.php">
                    <input type="submit" class="btn btn-default" name="principal"  value="<?php echo $idiom['Menu'];?>">    
                    </form>
                </li>
                 <li class="sidebar-brand">
                <form class="principal" method="post" action="..\Controlador\Funcionalidad_Controller.php">
                    <input type="submit" class="btn btn-default" name="funcionalidad"  value="<?php echo $idiom['Funcionalidad'];?>">    
                    </form>
                </li>
				 <li class="sidebar-brand">
                <form class="principal" method="post" action="..\Controlador\Accion_Controller.php">
                    <input type="submit" class="btn btn-default" name="accion"  value="<?php echo $idiom['Accion'];?>">    
                    </form>
                </li>
                  <li class="sidebar-brand">
                <form class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
                    <input type="submit" class="btn btn-default" name="usuarios"  value="<?php echo $idiom['GestionUsuarios'];?>">    
                    </form>
                </li>
                  <li class="sidebar-brand">
                <form class="principal" method="post" action="..\Controlador\Grupo_Controller.php">
                    <input type="submit" class="btn btn-default" name="grupo"  value="<?php echo $idiom['Grupo'];?>">    
                    </form>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    
                    <?php   }} ?>
                               