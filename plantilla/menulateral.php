
<!-- MenuLateral -->

<?php 

class menulateral{

	function crear($idioma){

 		/*include("../Funciones/comprobaridioma.php");
       $clase=new comprobacion();
    $idiom=$clase->comprobaridioma($idioma);*/

?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> <?php echo $idioma['Funcionalidad'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                    <li>
                        <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#caca"><i class="fa fa-fw fa-arrows-v"></i> <?php echo $idioma['GestionUsuarios'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="caca" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                    <li>
                        <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#pis"><i class="fa fa-fw fa-arrows-v"></i> <?php echo $idioma['Grupo'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="pis" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                    <li>
                        <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#lore"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="lore" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                    <li>
                       <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#es"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="es" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                    <li>
                       <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#guapa"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="guapa" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#si"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="si" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
              </nav>
<?php 
 }
}?>
        <!-- /#page-wrapper -->