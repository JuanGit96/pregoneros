
var redimir = (url) =>{
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
        method: "post",
        url:  url,
        data: $("#crearcliente").serialize(),
    }).done((res) => {
      //Si la respuesta del controlador es correcta, muestra un modal de informacion que recarga la pagina.
       swal({
            title: "Registro Exitoso!",
            text: res.mensaje,
            type: "success"
          }, function() {
            window.location.href = "/";
          });
    }).fail((error) => {
      //Si la repuesta al controlador no es correcta, se muestra un modal con el error.
        swal("Oops...", "Verfique que se hayan completado todos los campos", "error");
    });


}


var crearpregon = (url) =>{
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      method: "post",
      url:  url,
      data: $("#createpregonero").serialize(),
  }).done((res) => {
    //Si la respuesta del controlador es correcta, muestra un modal de informacion que recarga la pagina.
     swal({
          title: "Registro Exitoso!",
          text: res.mensaje,
          type: "success"
        }, function() {
          window.location.href = "/";
        });
  }).fail((error) => {
    //Si la repuesta al controlador no es correcta, se muestra un modal con el error.
      swal("Oops...", "Verfique que se hayan completado todos los campos", "error");
  });


}

var crearclient = (url) =>{
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      method: "post",
      url:  url,
      data: $("#createcliente").serialize(),
  }).done((res) => {
    //Si la respuesta del controlador es correcta, muestra un modal de informacion que recarga la pagina.
     swal({
          title: "Registro Exitoso!",
          text: res.mensaje,
          type: "success"
        }, function() {
          window.location.href = "/";
        });
  }).fail((error) => {
    //Si la repuesta al controlador no es correcta, se muestra un modal con el error.
      swal("Oops...", "Verfique que se hayan completado todos los campos", "error");
  });


}

$(document).ready(function() {

 $(".datepicker").datepicker({
      format: 'yyyy/mm/dd',
      autoclose: true,
      todayHighlight: true,
      language: 'es',
  }).datepicker('update', new Date());

});

var crearcampaña = (url) =>{
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      method: "post",
      url:  url,
      data: $("#createcampaña").serialize(),
  }).done((res) => {
    //Si la respuesta del controlador es correcta, muestra un modal de informacion que recarga la pagina.
     swal({
          title: "Registro Exitoso!",
          text: res.mensaje,
          type: "success"
        }, function() {
          window.location.href = "/campaña";
        });
  }).fail((error) => {
    //Si la repuesta al controlador no es correcta, se muestra un modal con el error.
      swal("Oops...", "Verfique que se hayan completado todos los campos", "error");
  });


}


var updateimpact = (url) =>{
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      method: "post",
      url:  url,
      data: $("#createimpacto").serialize(),
  }).done((res) => {
    //Si la respuesta del controlador es correcta, muestra un modal de informacion que recarga la pagina.
     swal({
          title: "Registro Exitoso!",
          text: res.mensaje,
          type: "success"
        }, function() {
          window.location.href = "/campaña";
        });
  }).fail((error) => {
    //Si la repuesta al controlador no es correcta, se muestra un modal con el error.
      swal("Oops...", "Verfique que se hayan completado todos los campos", "error");
  });


}

var editcampaña = (url) =>{
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      method: "PUT",
      url:  url,
      data: $("#editcampaña").serialize(),
  }).done((res) => {
    //Si la respuesta del controlador es correcta, muestra un modal de informacion que recarga la pagina.
     swal({
          title: "Exitoso!",
          text: res.mensaje,
          type: "success"
        }, function() {
          window.location.href = "/campaña";
        });
  }).fail((error) => {
    //Si la repuesta al controlador no es correcta, se muestra un modal con el error.
      swal("Oops...", "Verfique que se hayan completado todos los campos", "error");
  });


}


function crear(obj) {
  $("#field").append('<div><input name="input[]" type="text" class="form-control pt-4" placeholder="Correo" />')
  
}
