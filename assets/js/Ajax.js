function ContestarMensaje(xMensaje,xTicked_id,xEmisor_ID,xReceptor_ID,xEstado){
    
    var variables= {Mensaje: xMensaje, Tikect: xTicked_id, Emisor: xEmisor_ID,Receptor: xReceptor_ID, Estado: xEstado};
    
    var resultado =0;
    
    $.ajax({
        type:'post',
        url:'Inicio/ver_tiket',
        async:false,
        data:variables,
        success: function(xresultado){
            console.log(xresultado);
        }
        
    });
}


function GeneraNumeroJuicio(Fecha){
    
    $("#njuicio").val(Fecha);
    
    
}
