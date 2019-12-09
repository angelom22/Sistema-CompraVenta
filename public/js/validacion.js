function soloNumero(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 44) {
        return true;
    } else
    if (tecla == 8) {
        return true;
    }
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function cedulaval(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    nro = "0123456789";
    especiales = [8, 9, 46];
    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (nro.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " �����abcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 9];
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function mayuscula(valor, nombre) {
    document.getElementById(nombre).value = valor.toUpperCase();
    ;
}

function validarEmail(email, nombre) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(email)) {
        // alert("La dirección de correo " + email + " es incorrecta.");
        PNotify.error({
            text: 'La direccion de correo ' + email + ' es incorrecta',
            // styling: 'bootstrap4'
        });
        $("#email").toggleClass('has-error');
        $("#email").val('');
        // document.getElementsById(nombre)[0].value = "";
    }
}

function validarTelefono(telefono, nombre) {
    if (telefono.length < 11) {
        // alert("El número de teléfono " + telefono + " no es válido.");
        PNotify.error({
            text: 'El numero de telefono: ' + telefono + ' es incorrecto',
            // styling: 'bootstrap4'
        });
        $("#nombre").toggleClass('has-error');
        $("#nombre").val('');
        // document.getElementsById(nombre)[0].value = "";
    }
}

function NoCopyNoPaste(e){        
    
}

// Funcion del No Copy No Paste
$(document).ready(function(){
    $(".bloquear").on('paste', function(e){
      e.preventDefault();
      swal.fire({
          type: 'warning',
          //title: 'Oops...',
          text: 'Esta acción está prohibida!!',
      })
    })
    
    $(".bloquear").on('copy', function(e){
      e.preventDefault();
      swal.fire({
          type: 'warning',
          //title: 'Oops...',
          text: 'Esta acción está prohibida!!',
      })
    })
  })
