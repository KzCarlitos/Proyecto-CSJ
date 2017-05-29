<!-- footer content -->

<footer>
    <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url() ?>assets/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url() ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>assets/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?= base_url() ?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?= base_url() ?>assets/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="<?= base_url() ?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="<?= base_url() ?>assets/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="<?= base_url() ?>assets/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="<?= base_url() ?>assets/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="<?= base_url() ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="<?= base_url() ?>assets/vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url() ?>assets/build/js/custom.min.js"></script>

<!-- Funciones de ayuda o edicion -->


<script>
    function GeneraNumeroJuicio(Fecha) {
        $.get("<?php echo base_url('index.php/Inicio/GeneraNumeroProcedimiento') ?>","",function(data){
            console.log(data);
            var json = JSON.parse(data);
            var numero;
            for (post in json)
            {
                numero= json[post].numero;
            }
        
        var gnum = Fecha.split('-');
        console.log(gnum);
        var nproc =  parseInt(numero) + 1;
        var nprocedimiento= nproc + gnum[1] +"/"+ gnum[0];
        
        
       
        $("#nprocedimiento").val(nprocedimiento);
        });
        
        
        $.get("<?php echo base_url('index.php/Inicio/GeneraNumeroJuicio') ?>","",function(data){
            console.log(data);
            var json = JSON.parse(data);
            var numero;
            for (post in json)
            {
                numero= json[post].numero;
            }
        
        var gnum = Fecha.split('-');
        console.log(gnum);
        var nproc =  parseInt(numero) + 1;
        var nprocedimiento= nproc + gnum[1] +"/"+ gnum[0];
        
        
        $("#njuicio").val(nprocedimiento);
       
        });
       
        

    }
 
    
    
    </script>
    <script>
       function Contestar(){
           
        var mensaje =$('#contenido').val();
        var idtiket =$('#Tikect_ID').val();
        var emisor =$('#Emisor_ID').val();
        var receptor =$('#Receptor_ID').val();
        var estado = "N";
        
        
        $.ajax({
            type:"POST",
            url: "<?php echo base_url('index.php/Inicio/ContestaMensaje/') ?>",
            data:{'contenido':mensaje,
                'tiket':idtiket,
                'emisor':emisor,
                'receptor':receptor,
                'estado':estado
            },
            success:function(){
                alert('Los datos se agregaron');
                window.location.href = "<?php echo base_url('index.php/Inicio/ver_tiket/') ?>";
            },
            
            
        });
           
           
       }
        
        
        
    
    
    
    </script>
<script src="<?= base_url() ?>assets/js/moment/moment.js"></script>
<script src="<?= base_url() ?>assets/js/moment/es.js"></script>
</body>
</html>
