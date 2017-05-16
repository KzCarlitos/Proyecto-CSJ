<div class="">
<?php if(isset($completado)):?>    
<div class="alert alert-success">Se ha realizado su tiket. Podras consultarlo en Tikets</div>
<?php endif;?>
    <!--Esta es la zona del titulo de la pagina -->

    <div class="page-title">
        <div class="title_left">
            <h3>Bienvenido A CSJ</h3>
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
            
            <?php print_r($_SESSION['DatosUsuario']); ?>
            <?php print_r($_SESSION['TipoUsuario']); ?>
            <br/>
            <?php echo date("m/Y");?>
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
