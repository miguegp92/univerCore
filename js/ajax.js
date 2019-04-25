$(document).ready(function(){
    
    $(".clickable").click(function(){

        let id = $(this).parent().parent().attr("id");
        let dirigir = $(this).attr("id");
        //Seteamos el dialogo con el id del Alumno
        $("#"+dirigir+"Id").val(id);
        var controlador = dirigir+"/"+id+"/data";
        $.get(controlador, function(res){
            switch(dirigir){
                case "alumnos": setDataAlumno(res); break;
            }
            //console.log(res);
        
        })
        //alert(controlador)
    });

    function setDataAlumno(array){
        console.log(array);
       $("#editarNombre").val(array.nombre);
       $("#editarApellidos").val(array.apellidos);
       $("#editarDNI").val(array.dni);
       $("#editarFecha").val(array.fechanacimiento);
       $("#editarlocalidad").val(array.localidad);
       $("#editarprovincia").val(array.provincia);
       $("#editar"+array.sexo).prop("checked", true);

    }
    /*
    function setDataAsignatura(array){

        $().val();
     }
    */
    $("#search").keyup(function(){
        $("table#resultSearch").html("");
        var texto = $(this).val();
        var controlador = "alumnos/search/"+texto;
        $.ajax({
            url: controlador,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            method: "POST",
            success: function(response) {
                //Acciones si success
                $.each(response, function(index, alumno){
                    //alert(response.length);
                    $("table#resultSearch").append("<tr><td><a href='alumnos/"+alumno.id+"/eval'> "+alumno.nombre+" "+alumno.apellidos+"</a></td></tr>")
                })
               
                //console.log(response.length);
            },
            error: function () {
                var error = "error "+texto;
                //Acciones si error
                console.log(error);
            }
        });
        
    });
});