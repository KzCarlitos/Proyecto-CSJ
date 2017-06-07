<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSJ-Consultas Judiciales</title>
        
        <!-- Bootstrap -->
        <link href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?= base_url() ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="<?= base_url() ?>assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link href="<?= base_url() ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- Switchery -->
        <link href="<?= base_url() ?>assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
        <!-- starrr -->
        <link href="<?= base_url() ?>assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="<?= base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?= base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
        
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa fa-balance-scale"></i> <span>CSJ</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="<?= base_url() ?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <?php foreach ($_SESSION['DatosUsuario'] as $datos): ?>
                                    <span>Bienvenido,</span>
                                    <h2><?= $datos->Nombre . " " . $datos->Apellido1 ?></h2>
                                </div>
                            </div>
                            <!-- /menu profile quick info -->

                            <br />

                            <!-- sidebar menu -->
                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                                <div class="menu_section">
                                    <h3>General</h3>
                                    <ul class="nav side-menu">
                                        <li><a href="<?php echo base_url()?>index.php/Inicio/index"><i class="fa fa-home"></i> Inicio </a>
                                            
                                        </li>
                                        <?php if($_SESSION['TipoUsuario']->Tipo_Usuario != "R"){?>
                                    </ul>
                                      <ul class="nav side-menu">
                                        <li><a><i class="fa fa-gavel"></i> Juicios <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <?php if($_SESSION['TipoUsuario']->Tipo_Usuario == "A"){?>
                                                <li><a href="<?php echo base_url()?>index.php/Inicio/crear_juicio">Crear Juicio</a></li>
                                                <?php }  ?>
                                                <li><a href="<?php echo base_url()?>index.php/Inicio/ver_juicio">Ver Juicio</a></li>
                                                
                                            </ul>
                                        </li>

                                    </ul>
                                    <ul class="nav side-menu">
                                        <li><a><i class="fa fa-commenting-o"></i> Tikets <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">

                                                <li><a href="<?php echo base_url()?>index.php/Inicio/ver_tiketC">Cerrados</a></li>
                                                <li><a href="<?php echo base_url()?>index.php/Inicio/ver_tiket">Abiertos</a></li>
                                                
                                            </ul>
                                        </li>

                                    </ul>
                                        <?php }else{?>
                                     <ul class="nav side-menu">
                                        <li><a><i class="fa fa-gears"></i> Administrar <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li> <?php echo anchor("Inicio/nuevo_usuario", "Crear Usuarios", "") ?></li>
                                                <li><?php echo anchor("Inicio/lista_usuarios", "Lista Usuarios", "") ?></li>
                                                
                                            </ul>
                                        </li>

                                    </ul>
                                    <?php }?>
                                </div>
                                


                            </div>
                            <!-- /sidebar menu -->

                            <!-- /menu footer buttons -->
                            <div class="sidebar-footer hidden-small">
                                <a data-toggle="tooltip" data-placement="top" title="Settings">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Lock">
                                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Desconectarse" href="<?php echo base_url()?>index.php/Inicio/Desconectarse"> 
                                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                </a>
                            </div>
                            <!-- /menu footer buttons -->
                        </div>
                    </div>

                    <!-- top navigation -->
                    <div class="top_nav">
                        <div class="nav_menu">
                            <nav>
                                <div class="nav toggle">
                                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                                </div>

                                <ul class="nav navbar-nav navbar-right">
                                    <li class="">
                                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <img src="<?= base_url() ?>assets/images/img.jpg" alt=""><?= $datos->Nombre . " " . $datos->Apellido1 ?>
                                            <span class=" fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                                            <li><a href="javascript:;"> Perfil</a></li>
                                            
                                            <li><a href="javascript:;">Manuales</a></li>
                                            <li><a href="<?php echo base_url()?>index.php/Inicio/Desconectarse"><i class="fa fa-sign-out pull-right"></i> Desconectarse</a></li>
                                        </ul>
                                    </li>

                                    <li role="presentation" class="dropdown">
                                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-envelope-o"></i>
                                            <span class="badge bg-green">6</span>
                                        </a>
                                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                            <?php
                                               /*$this->load->model('M_Usuarios');
                                                $mensajes =$this->M_Usuarios->VerNuevoMensaje($_SESSION['DatosUsuario'][0]->ID);
                                                
                                                foreach ($mensajes as $mensaje):*/?>
                                            <li>
                                                <a>
                                                    <span class="image"><img src="<?= base_url() ?>assets/images/img.jpg" alt="Profile Image" /></span>
                                                    <span>
                                                        <span>John Smith</span>
                                                        <span class="time">3 mins ago</span>
                                                    </span>
                                                    <span class="message">
                                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                                    </span>
                                                </a>
                                            </li>
                                            <?php //endforeach;?>
                                            <li>
                                                <a>
                                                    <span class="image"><img src="<?= base_url() ?>assets/images/img.jpg" alt="Profile Image" /></span>
                                                    <span>
                                                        <span>John Smith</span>
                                                        <span class="time">3 mins ago</span>
                                                    </span>
                                                    <span class="message">
                                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                                    </span>
                                                </a>
                                            </li>
                                            
                                           
                                            <li>
                                                <div class="text-center">
                                                    <a>
                                                        <strong>Ver todos</strong>
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /top navigation -->
                <?php endforeach; ?>
