<div class="">
<?php if(isset($completado)):?>    
<div class="alert alert-success">Se ha creado el nuevo usuario</div>
<?php endif;?>
    <!--Esta es la zona del titulo de la pagina -->

    <div class="page-title">
        <div class="title_left">
            <h3>Nuevo Usuario</h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Busqueda...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Ir!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!--Fin de la zona del titulo-->


    <!--Esta es la zona del contenido de la pagina -->
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos Usuario <small>Rellena todos los campos</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url('index.php/Inicio/nuevo_usuario/');?>">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DNI">DNI <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name='dni' id="DNI" value="<?=set_value('dni')?>" class="form-control col-md-7 col-xs-12">
                                 <?php  echo form_error('dni');?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name='nombre' id="nombre" value="<?=set_value('nombre')?>" class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('nombre');?>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="1Apellido">1ºApellido <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="1apellido" name="1apellido" value="<?=set_value('1apellido')?>"  class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('1apellido');?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="2Apellido">2ºApellido <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="2apellido" name="2apellido" value="<?=set_value('2apellido')?>" class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('2apellido');?>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Telefono">Telefono <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="telefono" name="telefono" value="<?=set_value('telefono')?>"  class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('telefono');?>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Direccion">Dirección <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="direccion" name="direccion"  value="<?=set_value('direccion')?>" class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('direccion');?>
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Provincia">Provincia <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="provincia" name="provincia" value="<?=set_value('provincia')?>" class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('provincia');?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Cpostal">C.Postal <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cpostal" name="cpostal" value="<?=set_value('cpostal')?>" class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('cpostal');?>
                            </div>
                        </div>
                        
                                                
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de usuario</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="Tuser" value="A"> &nbsp; Abogado &nbsp;
                                    </label>
                                    <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="Tuser" value="R"> Administrador
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="Tuser" value="U"> Usuario
                                    </label>
                                </div>
                                </p><?php  echo form_error('Tuser');?>
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contraseña">Contraseña <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="pass" name="pass"  class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('pass');?>
                            </div>
                        </div>
                          <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <input type="checkbox" id="inicio" name="inicio" value="1" class="form-control col-md-2 col-xs-12">
                            
                            <label class="control-label col-md-8 col-sm-8 col-xs-12" for="Primer inicio">Solicitar cambio de contraseña al inciar sesión. <span class="required"></span>
                            </label>
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                
                                <button class="btn btn-primary" type="reset">Borrar Todo</button>
                                <button type="submit" class="btn btn-success">Crear Usuario</button>
                            </div>
                        </div>
                        

                    </form>
                </div>
            </div>
           
        </div>
    </div>
    <!--Fin de la zona del contenido-->




    <!-- Puede servir para hacer paneles
        <div class="x_panel">
          <div class="x_title">
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
           
          </div>
        </div>
    -->
</div>