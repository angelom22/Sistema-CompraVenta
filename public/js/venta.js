$(document).ready(function(){

    $('#tipo_pago').change(function(){
        // Campo solo punto
        if($(this).val() === "1"){
            $("#punto").prop("disabled", false);
            $("#efectivo").prop("disabled", true);
            $("#moneda_extranjera").prop("disabled", true);
            $("#tranferencia").prop("disabled", true);
            $("#detalle").prop("disabled", true);

            $("#div_pago1").show();

        }
        // campo solo efectivo
        else if($(this).val() === "2"){
            $("#punto").prop("disabled", true);
            $("#efectivo").prop("disabled", false);
            $("#moneda_extranjera").prop("disabled", true);
            $("#tranferencia").prop("disabled", true);
            $("#detalle").prop("disabled", true);

            $("#div_pago1").show();
        }
        // Transferencia
        else if($(this).val() === "3"){
            $("#punto").prop("disabled", true);
            $("#efectivo").prop("disabled", true);
            $("#moneda_extranjera").prop("disabled", true);
            $("#tranferencia").prop("disabled", false);
            $("#detalle").prop("disabled", false);

            $("#div_pago1").show();
        }
        // Campo punto mas efectivo
        else if ($(this).val() === "4") {
            $("#punto").prop("disabled", false);
            $("#efectivo").prop("disabled", false);
            $("#moneda_extranjera").prop("disabled", true);
            $("#tranferencia").prop("disabled", true);
            $("#detalle").prop("disabled", true);

            $("#div_pago1").show();

        }
        // campo solo Dolar$
        else if ($(this).val() === "5"){
            $("#moneda_extranjera").prop("disabled", false);
            $("#punto").prop("disabled", true);
            $("#efectivo").prop("disabled", true);
            $("#tranferencia").prop("disabled", true);
            $("#detalle").prop("disabled", true);

            $("#div_pago1").show();
        }
        // Campo Punto+$
        else if ($(this).val() === "6"){
            $("#punto").prop("disabled", false);
            $("#efectivo").prop("disabled", true);
            $("#moneda_extranjera").prop("disabled", false);
            $("#tranferencia").prop("disabled", true);
            $("#detalle").prop("disabled", true);

            $("#div_pago1").show();
        }
        // Campo Efectivo+$
        else if($(this).val() === "7"){
            $("#punto").prop("disabled", true);
            $("#efectivo").prop("disabled", false);
            $("#moneda_extranjera").prop("disabled", false);
            $("#tranferencia").prop("disabled", true);
            $("#detalle").prop("disabled", true);

            $("#div_pago1").show();
        }
        // Campo Otra Moneda (se debe esconder el div actual)
        else if($(this).val() === "8"){
            
            $("#div_pago1").hide();
            $("div_pago2").show();
        }
        // Nota de credito
        else if($(this).val() === "9"){
            if($('#nota').val() === " "){
                swal.fire({
                    type: 'warning',
                    //title: 'Oops...',
                    text: 'Debe ingresar la nota',
                })
            }
            $("#punto").prop("disabled", false);
            $("#efectivo").prop("disabled", false);
            $("#moneda_extranjera").prop("disabled", false);
            $("#tranferencia").prop("disabled", false);
            $("#detalle").prop("disabled", false);

            $("#div_pago1").show();
        }
        // Campo CriptoMoneda (se debe esconder el div actual)
        else if($(this).val() === "10"){
            
            $("#div_pago1").hide();
            $("div_pago2").show();

        }
         
        
    })

    // Click al boton agregar
    $("#agregar").click(function(){
        agregar();
    });

    var cont = 0;
    total = 0;
    subtotal = [];
    $("#guardar").hide();
    $("#id_producto").change(mostrarValores);
 
      function mostrarValores(){
 
          datosProducto = document.getElementById('id_producto').value.split('_');
          $("#precio_venta").val(datosProducto[2]);
          $("#stock").val(datosProducto[1]);
      
      }
 
      function agregar(){
 
          datosProducto = document.getElementById('id_producto').value.split('_');
 
          id_producto= datosProducto[0];
          producto= $("#id_producto option:selected").text();
          cantidad= $("#cantidad").val();
          descuento= $("#descuento").val();
          precio_venta= $("#precio_venta").val();
          stock= $("#stock").val();
          impuesto=20;
           
           if(id_producto != "" && cantidad != "" && cantidad > 0  && descuento != "" && precio_venta != ""){
 
                 if(parseInt(stock) >= parseInt(cantidad)){
                     
                     /*subtotal[cont]=(cantidad*precio_venta)-descuento;
                     total= total+subtotal[cont];*/
 
                     subtotal[cont]=(cantidad*precio_venta)-(cantidad*precio_venta*descuento/100);
                     total= total+subtotal[cont];
 
                     var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td> <td><input type="number" name="precio_venta[]" value="'+parseFloat(precio_venta).toFixed(2)+'"> </td> <td><input type="number" name="descuento[]" value="'+parseFloat(descuento).toFixed(2)+'"> </td> <td><input type="number" name="cantidad[]" value="'+cantidad+'"> </td> <td>Bs'+parseFloat(subtotal[cont]).toFixed(2)+'</td></tr>';
                     cont++;
                     limpiar();
                     totales();
                     /*$("#total").html("USD$ " + total.toFixed(2));
                     $("#total_venta").val(total.toFixed(2));*/   
                     evaluar();
                     $('#detalles').append(fila);
 
                 } else{
 
                     //alert("La cantidad a vender supera el stock");
                 
                     swal.fire({
                     type: 'error',
                     //title: 'Oops...',
                     text: 'La cantidad a vender supera el stock',
                 
                     })
                 }
                
             }else{
 
                 //alert("Rellene todos los campos del detalle de la venta");
            
                 swal.fire({
                 type: 'error',
                 //title: 'Oops...',
                 text: 'Rellene todos los campos del detalle de la venta',
               
                 })
            
             }
          
      }
 
       
      function limpiar(){
         
         $("#cantidad").val("");
         $("#descuento").val("");
         $("#precio_venta").val("");
 
      }
 
      function totales(){
 
         $("#total").html("Bs " + total.toFixed(2));
         //$("#total_venta").val(total.toFixed(2));
 
         total_impuesto=total*impuesto/100;
         total_pagar=total+total_impuesto;
         $("#total_impuesto").html("Bs " + total_impuesto.toFixed(2));
         $("#total_pagar_html").html("Bs " + total_pagar.toFixed(2));
         $("#total_pagar").val(total_pagar.toFixed(2));
       }
 
 
      function evaluar(){
 
          if(total > 0){
 
            $("#guardar").show();
 
          } else{
               
            $("#guardar").hide();
          }
      }
 
      function eliminar(index){
 
         total=total-subtotal[index];
         total_impuesto= total*20/100;
         total_pagar_html = total + total_impuesto;
 
         $("#total").html("Bs " + total);
         $("#total_impuesto").html("Bs " + total_impuesto);
         $("#total_pagar_html").html("Bs " + total_pagar_html);
         $("#total_pagar").val(total_pagar_html.toFixed(2));
         
         $("#fila" + index).remove();
         evaluar();
      }


})