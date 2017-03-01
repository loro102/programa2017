/*

$("#tipo_procedimiento").change(event => {
    $.get(`getformality/${event.target.value}`, function(res, sta){
    $("#town").empty();
    res.forEach(element => {
        $("#procedimientos").append(`<option value=${element.id}> ${element.name} </option>`);
});
});
});*/

/*$(document).ready(function(){
    var suburb = $('#tipo_procedimiento').val();

    $.get( "/getformality/"+suburb+'').done(function( data ) {
        $.each(data, function(i, value){
            $('#procedimientos').append(`<option value=${value[i].id}> ${value[i].nombre} </option>`);
            console.log(data);
        });
    });
});*/
/*
$(document).ready(function(){
 var suburb = $('#tipo_procedimiento').val();

 $.get( "/getformality/"+suburb+'').done(function( data ) {
 $.each(data, function(i, value){
 $('#procedimientos').append("<option value="+value[i].id+"> "+value[i].nombre+" </option>");
 console.log(data);
 });
 });
 });*/
    $('#tipo_procedimiento').change(function(){
        var tipo = $(this).val();
        if(tipo){
            $.ajax({
                type:"GET",
                url:"/getformality/"+tipo,
                success:function(res){
                    if(res){
                        $("#procedimientos").empty();
                        $("#procedimientos").append('<option>Seleccione un procedimiento</option>');
                        $.each(res,function(key,value){
                            $("#procedimientos").append('<option value="'+value.id+'">'+value.nombre+'</option>');

                        });
                    }else{
                        $("#procedimientos").empty();
                    }
                }
            });
        }else{
            $("#procedimientos").empty();
        }
    });
$('#insurer_id').change(function(){
    var tipo = $(this).val();
    if(tipo){
        $.ajax({
            type:"GET",
            url:"/getprocessor/"+tipo,
            success:function(res){
                if(res){
                    $("#processor_id").empty();
                    $("#processor_id").append('<option>Seleccione un tramitador</option>');
                    $.each(res,function(key,value){
                        $("#processor_id").append('<option value="'+value.id+'">'+value.nombre+'</option>');

                    });
                }else{
                    $("#processor_id").empty();
                }
            }
        });
    }else{
        $("#procedimientos").empty();
    }
});

