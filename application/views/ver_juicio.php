<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <?php foreach ($listajuicios as $lista): ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
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
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- start accordion -->
                        <?php
                        $this->load->model('M_Usuarios');
                        $listaprocedimiento = $this->M_Usuarios->Lista_procedimiento($lista->ID);
                        // print_r($listaprocedimiento);
                        foreach ($listaprocedimiento as $listapro):
                            ?>
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <a class="panel-heading" role="tab" id="headingOne<?= $listapro->ID ?>" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?= $listapro->ID ?>" aria-expanded="false" aria-controls="collapseOne">
                                        <h4 class="panel-title">Nº Procedimiento: <?= $listapro->Num_Procedimiento ?></h4>
                                    </a>
                                    <div id="collapseOne<?= $listapro->ID ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                        Aqui se visualiza el pdf.
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
