<div class="">
    <div class="clearfix"></div>
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-commenting-o"></i> Nuevo Tiket <small> </small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>

                    <form class="form-horizontal form-label-left input_mask" method="POST" action="<?php echo base_url('index.php/Inicio/Crear_Tiket/'.$this->uri->segment(3));?>">

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nº Procedimiento" type="text" name="nprocedimiento" readonly="readonly" value="<?= $nprocedimiento->NUM_PROCEDIMIENTO ?>">
                            <span class="fa fa-newspaper-o form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input class="form-control" id="inputSuccess3" placeholder="Abogado" type="text" name="nabogado" readonly="readonly" value="<?= $_SESSION['DatosUsuario'][0]->Nombre . ' ' . $_SESSION['DatosUsuario'][0]->Apellido1 . ' ' . $_SESSION['DatosUsuario'][0]->Apellido2 ?>" >
                            <input type="text" name="abogado" hidden="hidden" value="<?=$_SESSION['DatosUsuario'][0]->ID?>"/>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control has-feedback-left" name="estado">
                                <option value="A">Abierto</option>
                                <option value="P">Pendiente</option>
                                <option value="C">Cerrado</option>
                            </select>
                            <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control has-feedback-right" name="acusado">
                                <?php foreach ($acusados as $usuarios): ?>
                                
                                    <option value="<?= $usuarios->ID ?>"><?= $usuarios->Nombre . " " . $usuarios->Apellido1 . " " . $usuarios->Apellido2 ?></option>
                                <?php endforeach; ?>
                            </select>

                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Mensaje</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="resizable_textarea form-control" placeholder="Escriba aquí el mensaje..." name="mensaje"></textarea>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-5">
                                <button class="btn btn-primary" type="reset">Borrar Todo</button>
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
