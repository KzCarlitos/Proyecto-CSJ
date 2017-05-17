<div class="">
    <?php if (isset($completado)): ?>    
        <div class="alert alert-success">Se ha creado el nuevo juicio</div>
    <?php endif; ?>
    <!--Esta es la zona del titulo de la pagina -->

    <div class="page-title">
        <div class="title_left">
            <h3>Nuevo Juicio</h3>
        </div>


    </div>

    <!--Fin de la zona del titulo-->


    <!--Esta es la zona del contenido de la pagina -->
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos Juicio <small>Rellena todos los campos</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url('index.php/Inicio/crear_juicio');?>" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nombre">Fecha del Juicio <span class="required">*</span></label>

                                <div class="col-md-8 col-sm-8 col-xs-12 xdisplay_inputx form-group has-feedback">
                                    <input type="date" class="form-control has-feedback-left" id="fecha" placeholder="Fecha del juicio" aria-describedby="inputSuccess2Status4" name="fjuicio" onchange="GeneraNumeroJuicio(this.value)">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                </div>

                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="njuicio">Nº Juicio <span class="required"></span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" id="njuicio" name="njuicio" value="<?= set_value('njuicio') ?>"  class="form-control col-md-7 col-xs-12" readonly="readonly">
                                    <?php echo form_error('njuicio'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nombre">Nombre Abogado <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name='abogado' id="abogado" value="<?php echo $_SESSION['DatosUsuario'][0]->Nombre ." ".
                                    $_SESSION['DatosUsuario'][0]->Apellido1 ." ".$_SESSION['DatosUsuario'][0]->Apellido2; ?>" class="form-control col-md-7 col-xs-12" readonly>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="1Apellido">Nombre Acusado <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="acusado">
                                        <?php foreach ($usuario as $user):?>
                                        <option value="<?=$user->ID?>"><?=$user->Nombre ." ".$user->Apellido1 ." ".$user->Apellido2?></option>
                                                                               
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                           

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="estado">Estado<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select class="form-control" name="estado">
                                        <option value="A">Abierto</option>
                                        <option value="C">Cerrado</option>
                                        <option value="P">Pendiente</option>
                                        
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nombre">NºProcedimiento <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name='nprocedimiento' id="nprocedimiento" value="<?= set_value('nprocedimiento') ?>" class="form-control col-md-7 col-xs-12" readonly="readonly">
                                    <?php echo form_error('nprocedimiento'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nombre">Descripción <span class="required"></span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea class="resizable_textarea form-control" name="descripcion" placeholder="escriba una descripcion del documento" style="margin: 0px -1px 0px 0px; height: 60px; width: 270px;"></textarea>
                                    <?php echo form_error('descripcion'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nombre">Fichero <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="file" name="fichero">
                                     <?php echo form_error('fichero'); ?>
                                </div>
                            </div>

                        </div>

                         



                        <div class="clearfix"></div>


                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">

                                <button class="btn btn-primary" type="reset">Borrar Todo</button>
                                <button type="submit" class="btn btn-success">Crear Juicio</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--Fin de la zona del contenido-->





</div>

