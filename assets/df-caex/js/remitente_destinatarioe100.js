/**
 * Created by rap on 2/14/17.
 */

jQuery(document).ready(function ($) {

    var getDepartamento = function(response) {
        if(response.Estado){

            var label = 'Seleccione departamento';

            var newOptions = '<option value="">'+label+'</option>';

            $.each(response.Respuesta, function(k,o){

                newOptions += '<option value="'+ o.coddep +'">'+ o.desdep +'</option>';

            });

            var obj = $('#remitente_departamento');
            obj.select2('destroy').html(newOptions).prop("disabled", false)
                .select2({ width: 'resolve', placeholder: label });

            loadStep('remitente_destinatario', '#remitente_departamento', 'RemitenteDepartamento');
        }
    }

    // make the jsonp call: ajax_action, method, variables, callback
    wp_jsonp("wp_jsonp", "/api/Catalogos/get", 'GET', { codigoCatalogo: 3, parametro1: 'GT' }, getDepartamento);

    var method = '/api/Catalogos/get';
    new Select2Cascade($('#remitente_departamento'), $('#remitente_municipio'), method, {
            codigoCatalogo: 4,
            parametro1: ':parentId:',
        }, 'Seleccione un municipio'
    );

    $('#remitente_municipio').on('select2:select', function(e){
        $(this).attr('data-codigo-poblado', $($(this).select2('data')[0].element).data('codigo-poblado'));
    });

    $( "form#form-remitente" ).validate();
    $( "form#form-destinatario" ).validate();

    $('body').on('click', '.btn-siguiente', function(e){
        e.preventDefault();

        if ($("form#form-remitente").valid() && $('form#form-destinatario').valid()) {

            var remitenteMunicipio = $('#remitente_municipio');

            var data = {
                RemitenteNombre:            $('#remitente_nombre').val(),
                RemitenteNit:               $('#remitente_nit').val(),
                RemitenteEmail:             $('#remitente_email').val(),
                RemitenteTelefono:          $('#remitente_telefono').val(),
                RemitenteDireccion:         $('#remitente_direccion_exacta').val(),
                RemitenteDepartamento:      $('#remitente_departamento').val(),
                RemitenteMunicipio:         remitenteMunicipio.val(),
                RemitenteCodigoPoblado:     remitenteMunicipio.data('codigo-poblado'),
                RemitenteFecha:             $('#remitente_fecha').val(),
                RemitenteObservaciones:     $('#remitente_observaciones').val(),

                DestinatarioNombre:         $('#destinatario_nombre').val(),
                DestinatarioEmail:          $('#destinatario_email').val(),
                DestinatarioTelefono:       $('#destinatario_telefono').val(),
                DestinatarioDireccion:      $('#destinatario_direccion_exacta').val(),
                DestinatarioObservaciones:  $('#destinatario_observaciones').val(),

            };

            saveStep('remitente_destinatario', JSON.stringify(data));

            $.notify('<strong>SOLICITUD</strong> Preparando servicio...', {
                type: 'info',
                icon: 'fa fa-check',
                placement: {
                    from: 'bottom',
                    align: 'right'
                },
                allow_dismiss: false,
                showProgressbar: false
            });

            window.location.href = $(this).attr('href');

        } else {
            $.notify('<strong>ERROR</strong> Por favor completar el formulario', {
                type: 'danger',
                icon: 'fa fa-exclamation-triangle',
                placement: {
                    from: 'bottom',
                    align: 'right'
                },
                allow_dismiss: false,
                showProgressbar: false
            });
        }

    });

    var elements = [
        { target: '#remitente_nombre',              storageKey: 'RemitenteNombre'},
        { target: '#remitente_nit',                 storageKey: 'RemitenteNit'},
        { target: '#remitente_email',               storageKey: 'RemitenteEmail'},
        { target: '#remitente_telefono',            storageKey: 'RemitenteTelefono'},
        { target: '#remitente_direccion_exacta',    storageKey: 'RemitenteDireccion'},
        { target: '#remitente_fecha',               storageKey: 'RemitenteFecha'},
        { target: '#remitente_observaciones',       storageKey: 'RemitenteObservaciones'},

        { target: '#destinatario_nombre',              storageKey: 'DestinatarioNombre'},
        { target: '#destinatario_email',               storageKey: 'DestinatarioEmail'},
        { target: '#destinatario_telefono',            storageKey: 'DestinatarioTelefono'},
        { target: '#destinatario_direccion_exacta',    storageKey: 'DestinatarioDireccion'},
        { target: '#destinatario_observaciones',       storageKey: 'DestinatarioObservaciones'},

    ]
    $.each(elements, function(i, k){
        loadStep('remitente_destinatario', k.target, k.storageKey);
    });

    var date = new Date();

    var seconds = date.getSeconds();
    var minutes = date.getMinutes();
    var hour = date.getHours();


    var sData = JSON.parse(sessionStorage.getItem('cotizar'));
    var startDate = '+d';
    if(sData != null){

        var numDay = date.getDay();
        switch (numDay) {
            case 0:
                startDate = '+d';
                break;
            case 6:
                var dateMax = new Date(date.getFullYear(), (date.getMonth()) , date.getDate(), '9', '54', '59');
                if( ( date > dateMax ) ) {
                    startDate = '+2';
                }
                break;
            default:
                if(sData.CodigoPieza=1){ //sobres
                    var dateMax = new Date(date.getFullYear(), (date.getMonth()) , date.getDate(), '16', '54', '59');
                    if( ( date > dateMax ) ) {
                        startDate = '+1';
                    }
                }
                if(sData.CodigoPieza=2){ //paquetes
                    var dateMax = new Date(date.getFullYear(), (date.getMonth()) , date.getDate(), '13', '54', '59');
                    if( ( date > dateMax ) ) {
                        startDate = '+1';
                    }
                }
        }
    }


    $('#remitente_fecha').datepicker({
        format: "dd/mm/yyyy",
        minDate: startDate,
        language: "es",
        autoclose: true,
        todayHighlight: true
    });

});