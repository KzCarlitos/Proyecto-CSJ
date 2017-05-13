<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <?php foreach ($listatiket as $lista): ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-commenting-o">

                            </i> Nº Tiket: <?= $lista->ID ?> <small>Estado: Abierto &nbsp;/&nbsp;  Fecha de Creación: <?= $lista->Fecha_Creacion ?></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- start accordion -->
                        <?php
                        $this->load->model('M_Usuarios');
                        $mensajes = $this->M_Usuarios->Ver_Mensaje($lista->ID);
                        $NProcedimiento = $this->M_Usuarios->Devuelve_Nprocedimiento($lista->Procedimiento_ID);
                        // print_r($mensaje);
                        ?>
                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel">
                                <a class="panel-heading" role="tab" id="headingOne<?= $lista->ID ?>" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?= $lista->ID ?>" aria-expanded="false" aria-controls="collapseOne">
                                    <h4 class="panel-title">Nº Procedimiento: <?php echo $NProcedimiento->NUM_PROCEDIMIENTO; ?></h4>
                                </a>
                                <div id="collapseOne<?= $lista->ID ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                    <?php foreach ($mensajes as $mensaje): ?>
                                        <div class="media event">
                                            <a class="pull-left border-green profile_thumb">
                                                <i class="fa fa-user green"></i>
                                            </a>
                                            <a class="pull-right "><?= $mensaje->Fecha ?>&nbsp;</a>
                                            <div class="media-body">
                                                <?php $Cnombre = $this->M_Usuarios->NombreUsuarios($mensaje->Emisor_ID); ?>
                                                <a class="title"><?= $Cnombre->NOMBRE . " " . $Cnombre->APELLIDO1 . " " . $Cnombre->APELLIDO2 ?></a>
                                                <p><?= $mensaje->contenido ?> </p>

                                            </div>

                                            <div class="ln_solid"></div>
                                        <?php endforeach; ?>
                                        <div class="col-md-12">
                                            <div class="col-md-10"> <textarea class="resizable_textarea form-control" id="respuesta" placeholder="Escriba aquí el mensaje..." name="mensaje"></textarea></div>
                                            <input type="submit" class="btn btn-success" name="contestar" id="bcontestar" value="Enviar Mensaje">
                                        </div>
                                        
                                    </div>



                                </div>
                            </div>







                            <!-- end of accordion -->


                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
