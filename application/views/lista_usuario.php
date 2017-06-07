<div class="">
    <?php if (isset($completado)): ?>    
        <div class="alert alert-success">Se ha modificado el usuario correctamente</div>
    <?php endif; ?>



    <!--Esta es la zona del titulo de la pagina -->

    <div class="page-title">
        <div class="title_left">
            <h3>Lista Usuarios</h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <select name="Fusurio" class="form-control" id="filtro" >
                        <option value="R">Administrador</option>
                        <option value="A">Abogado</option>
                        <option value="U">Usuario</option>
                    </select>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="Filtrar()">Filtrar</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!--Fin de la zona del titulo-->


    <!--Esta es la zona del contenido de la pagina -->
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">

            <div class="x_panel">
                <div class="x_content">




                    <?php foreach ($usuarios as $user) : ?>   



                        <div class="modal fade bs-example-modal-lg<?= $user->ID ?>" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">¿Deseas dar de baja al usuario <?php echo $user->Nombre." ".$user->Apellido1; ?>?</h4>
                                    </div>
                                    <div class="modal-body">
                                        En el caso de que este sea el usuario que tenga iniciada la sesion de desconectara automaticamente de ella.
                                        Solo podras volver a iniciarla si un administrador te vuelve habilitar la cuenta.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <a href="<?php echo base_url() ?>index.php/Inicio/Baja_Usuario/<?= $user->ID ?>" class="btn btn-primary">Confirmar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($user->Tipo_Usuario == 'R') {
                            $tusuario = 'Administrador';
                        } elseif ($user->Tipo_Usuario == 'A') {
                            $tusuario = 'Abogado';
                        } else {
                            $tusuario = 'Usuario';
                        }
                        ?>


                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i><?= $tusuario ?></i></h4>
                                    <div class="left col-xs-7">
                                        <h2><?= $user->Nombre . " " . $user->Apellido1 . " " . $user->Apellido2 ?></h2>

                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-home"></i> Dirección: <?= $user->Direccion ?> </li>
                                            <li><i class="fa fa-building"></i> Provincia: <?= $user->Provincia ?> </li>
                                            <li><i class="fa fa-phone"></i> Telefono: <?= $user->Telefono ?> </li>
                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="<?= base_url() ?>assets/images/img.jpg" alt="" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">

                                    <div class="col-xs-12 col-sm-12 emphasis">
                                        <button  class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg<?= $user->ID ?>" > <i class="fa fa-trash">
                                            </i> Dar de baja </button>
                                        <a href="<?php echo base_url() ?>index.php/Inicio/editar_usuario/<?= $user->ID ?>" class="btn btn-primary btn-xs">

                                            <i class="fa fa-user"> </i> Editar Datos
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>




<?php endforeach; ?>


                </div>

            </div>

        </div>
    </div>
    <!--Fin de la zona del contenido-->
    <!-- Large modal -->







</div>



