<div class="">

<?php foreach($datos as $dato):?>


    <!--Esta es la zona del titulo de la pagina -->

    <div class="page-title">
        <div class="title_left">
            <h3>Editando el Usuario ID <?=$dato->ID?></h3>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url('index.php/Inicio/modificar_usuario/');?>">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DNI">DNI <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name='dni' id="DNI" value="<?=$dato->DNI?>" class="form-control col-md-7 col-xs-12" readonly>
                                 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name='nombre' id="nombre" value="<?=$dato->Nombre?>" class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('nombre');?>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="1Apellido">1ºApellido <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="1apellido" name="1apellido" value="<?=$dato->Apellido1?>"  class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('1apellido');?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="2Apellido">2ºApellido <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="2apellido" name="2apellido" value="<?=$dato->Apellido2?>" class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('2apellido');?>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Telefono">Telefono <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="telefono" name="telefono" value="<?=$dato->Telefono?>"  class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('telefono');?>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Direccion">Dirección <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="direccion" name="direccion"  value="<?=$dato->Direccion?>" class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('direccion');?>
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Provincia">Provincia <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="provincia" name="provincia" value="<?=$dato->Provincia?>" class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('provincia');?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Cpostal">C.Postal <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cpostal" name="cpostal" value="<?=$dato->Codigo_Postal?>" class="form-control col-md-7 col-xs-12">
                                <?php  echo form_error('cpostal');?>
                            </div>
                        </div>
                        
                                                
                      
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contraseña">Contraseña <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="pass" name="pass" value="<?=$dato->Contrasena?>" class="form-control col-md-7 col-xs-12">
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
                                <input type="text" name="id" value="<?=$dato->ID?>" hidden="hidden">
                                <button class="btn btn-primary" type="reset">Borrar Todo</button>
                                <button type="submit" class="btn btn-success">Modificar Usuario</button>
                            </div>
                        </div>
                        

                    </form>
                </div>
            </div>
           
        </div>
    </div>
    <!--Fin de la zona del contenido-->

<?php endforeach;?>


 
</div>


                
