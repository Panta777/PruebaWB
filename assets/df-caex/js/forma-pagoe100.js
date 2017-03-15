/**
 * Created by rap on 2/15/17.
 */

jQuery(document).ready(function ($) {

    var dataCotizar = JSON.parse(sessionStorage.getItem('cotizar'));
    var dataRemDes = JSON.parse(sessionStorage.getItem('remitente_destinatario'));

    $('#page-cotizar').attr('href', wp_jsonp_vars.base_homepage+'/cotizador');

    if(!dataCotizar && !dataRemDes){
        $('#message-error').removeClass('hide');
        $('.checkout-container').addClass('hide');
    } else {
        $('#origen .information').html(dataRemDes.RemitenteNombre+' '+dataCotizar.DepartamentoOrigenNombre+' / '+dataCotizar.MunicipioOrigenNombre);
        $('#destino .information').html(dataRemDes.DestinatarioNombre+' '+dataCotizar.DepartamentoDestinoNombre+' / '+dataCotizar.MunicipioDestinoNombre);

        if(dataCotizar.codigoPieza == 1) {
            var stringSobres = (dataCotizar.CantidadPieza>1)? 'Sobres' : 'Sobre';
            var text = dataCotizar.CantidadPieza +' '+ stringSobres;
            $('#paquetes').html(text);
        } else {

            var stringPaquetes = (dataCotizar.PesoTotal>1)? 'Paquetes' : 'Paquete';
            var stringPaquetesPeso = (dataCotizar.PesoTotal>1)? 'Lbs' : 'Lb';
            var text = dataCotizar.CantidadPieza +' '+ stringPaquetes;
            text += ' / '+ dataCotizar.PesoTotal + ' ' + stringPaquetesPeso;
            $('#paquetes').html(text);
        }

        $('#precio').html(dataCotizar.Moneda+' '+$.number(dataCotizar.ValorCotizado, 2, '.', ','));


        $('#fecha').html(dataRemDes.RemitenteFecha);

    }



    var obj = $('#tipo_pago');
    obj.select2({
        placeholder: "Seleccione tipo pago",
        allowClear: true
    }).on("change", function (e) {
        if(jQuery(this).val() == '1'){
            jQuery('#data-tc').addClass('hide');
        } else if (jQuery(this).val() == '3'){
            jQuery('#data-tc').removeClass('hide');
        }
    });

    $('form#form-checkout').validate({
        rules: {
            tc_numero: {
                required: function(element) {
                    return $("#tipo_pago").val() == '3';
                }
            },
            tc_year: {
                required: function(element) {
                    return $("#tipo_pago").val() == '3';
                }
            },
            tc_month: {
                required: function(element) {
                    return $("#tipo_pago").val() == '3';
                }
            },
            tc_cvv: {
                required: function(element) {
                    return $("#tipo_pago").val() == '3';
                }
            }
        },
        messages: {
            tc_year: "Requerido",
            tc_month: "Requerido",
            tc_cvv: "Requerido",
        }
    });

    $('body').on('click', '#sendService', function(e){
        e.preventDefault();

        $btnSendService = $(this).button('loading');

        if($('form#form-checkout').valid()){

            var fechaRecoleccion = new Date(dataRemDes.RemitenteFecha);
            var year = fechaRecoleccion.getFullYear();
            var mes = fechaRecoleccion.getMonth();
            var day = fechaRecoleccion.getDate();

            var dataTarjeta = {};

            if($('#tipo_pago').val()==3) {
                dataTarjeta["CodigoSeguridad"]  = $('#tc_cvv').val();
                dataTarjeta["FechaExperacion"]  = $('#tc_year').val()+'-'+$('#tc_month').val();
                dataTarjeta["NumeroTarjeta"]    = $('#tc_numero').val();
            }

            var data = {
                solicitud: JSON.stringify({
                    "CantidadPiezas": dataCotizar.CantidadPieza,
                    "FechaRecoleccion": year+'-'+(mes+1)+'-'+day,
                    "IntruccionesRecoleccion": dataRemDes.RemitenteObservaciones,
                    "Peso": dataCotizar.PesoTotal,
                    "TipoPago": $('#tipo_pago').val(),
                    "TipoPieza": dataCotizar.CodigoPieza,
                    "ValorPago": dataCotizar.ValorCotizado
                }),
                remitente: JSON.stringify({
                    "NombreRemitente": dataRemDes.RemitenteNombre,
                    "TelefonoRemitente": dataRemDes.RemitenteTelefono,
                    "DireccionRemitente": dataRemDes.RemitenteDireccion,
                    "EmailRemitente": dataRemDes.RemitenteEmail,
                    "NitRemitente": dataRemDes.RemitenteNit,
                    "IdDepartamento": dataRemDes.RemitenteDepartamento,
                    "IdMunicipio": dataRemDes.RemitenteMunicipio
                }),
                destinatario: JSON.stringify({
                    "NombreDestinatario": dataRemDes.DestinatarioNombre,
                    "TelefonoDestinatario": dataRemDes.DestinatarioTelefono,
                    "DireccionDestinatario": dataRemDes.DestinatarioDireccion,
                    "EmailDestinatario": dataRemDes.DestinatarioEmail,
                    "InstruccionesDestinatario": dataRemDes.DestinatarioObservaciones,
                    "IdDepartamento": dataCotizar.DepartamentoDestino,
                    "IdMunicipio": dataCotizar.MunicipioDestino
                }),
                tarjeta: JSON.stringify(dataTarjeta),
                token: '31b650d6b6551b3790bdaa8171ef5a2a'
            };

            wp_jsonp("wp_jsonp", "/api/Recoleccion/GenerarServicioWeb", 'POST', data, setServicio);

        } else {
            $.notify('<strong>ERROR</strong> Complete el formulario', {
                type: 'danger',
                icon: 'fa fa-exclamation-triangle',
                placement: {
                    from: 'bottom',
                    align: 'right'
                },
                allow_dismiss: false,
                showProgressbar: false
            });

            $btnSendService.button('reset');
        }
    });

    var setServicio = function(response) {
        if(response.Estado) {
            $.notify('<strong>Éxito</strong> '+response.Mensaje, {
                type: 'success',
                icon: 'fa fa-exclamation-triangle',
                placement: {
                    from: 'bottom',
                    align: 'right'
                },
                allow_dismiss: false,
                showProgressbar: false
            });

            sessionStorage.removeItem('cotizar');
            sessionStorage.removeItem('remitente_destinatario');


            window.location.href =  wp_jsonp_vars.base_homepage+'/gracias';
            $btnSendService.button('reset');

        } else {
            $.notify('<strong>ERROR</strong> '+response.Mensaje, {
                type: 'danger',
                icon: 'fa fa-exclamation-triangle',
                placement: {
                    from: 'bottom',
                    align: 'right'
                },
                allow_dismiss: false,
                showProgressbar: false
            });
            $btnSendService.button('reset');
        }
    }
});
