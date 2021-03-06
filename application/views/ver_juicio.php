<div class="">
    <div class="clearfix"></div>
    <div class="row">

        <?php foreach ($listajuicios as $lista): ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height: auto;">
                    <div class="x_title">
                        <h2><i class="fa fa-gavel"></i> Nº Juicio: <?= $lista->Numero_Juicio ?> <small>Estado: <?php
                                if ($lista->Estado == 'A') {
                                    echo 'Abierto';
                                } elseif ($lista->Estado == 'P') {
                                    echo "Pendiente";
                                } else {
                                    echo "Cerrado";
                                }
                                ?></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: none;" >

                        <!-- start accordion -->
                        <?php
                        $this->load->model('M_Usuarios');
                        $listaprocedimiento = $this->M_Usuarios->Lista_procedimiento($lista->ID);
                        // print_r($listaprocedimiento);
                        foreach ($listaprocedimiento as $listapro):
                            ?>
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <div class="panel-heading" >
                                        <a role="tab" id="headingOne<?= $listapro->ID ?>" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?= $listapro->ID ?>" aria-expanded="false" aria-controls="collapseOne">
                                            <h4 class="panel-title ">Nº Procedimiento: <?= $listapro->Num_Procedimiento ?>
                                                <small>&nbsp;&nbsp;<?= $listapro->Descripcion ?>  </small>
                                                <a href="<?= base_url() ?>index.php/Inicio/Crear_Tiket/<?= $listapro->ID ?>" class="panel-title pull-right " ><i class="fa fa-commenting-o"></i></a>
                                            </h4>
                                        </a>

                                    </div>
                                    <div id="collapseOne<?= $listapro->ID ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">

                                        <embed src="<?= base_url() ?>uploads\<?= $listapro->Fichero ?>"  width="100%" height="500">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- end of accordion -->


                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
    <div align="center">
        <?php echo $this->pagination->create_links() ?>
    </div>
</div>

