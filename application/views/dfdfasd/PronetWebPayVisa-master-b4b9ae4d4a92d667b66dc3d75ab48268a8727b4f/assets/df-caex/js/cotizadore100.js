jQuery(document).ready(function ($) {

    var getTipoServicio = function (response) {
        if(response.Estado){
            var obj = $('#que_envias');
            obj.find('option').remove().end();
            obj.append($('<option>', {
                value: '',
                text : ''
            }));
            $.each(response.Respuesta, function(k,o){

                obj.append($('<option>', {
                    value: o.codtie,
                    text : o.destie
                }));

            });

            obj.select2({
                placeholder: "Seleccione tipo envio",
                allowClear: true
            }).on("change", function (e) {
                if(jQuery(this).val() == '1'){
                    jQuery('.paquetes').addClass('hide');
                } else {
                    jQuery('.paquetes').removeClass('hide');
                }
            });

            loadStep('cotizar', '#que_envias' ,'CodigoPieza');
        }

    }

    var getDepartamento = function(response) {
        if(response.Estado){

            var label = 'Seleccione departamento';

            var newOptions = '<option value="">'+label+'</option>';

            $.each(response.Respuesta, function(k,o){

                newOptions += '<option value="'+ o.coddep +'">'+ o.desdep +'</option>';

            });

            var obj = $('#origen_departamento');
            obj.select2('destroy').html(newOptions).prop("disabled", false)
                .select2({ width: 'resolve', placeholder: label });

            obj = $('#destino_departamento');
            obj.select2('destroy').html(newOptions).prop("disabled", false)
                .select2({ width: 'resolve', placeholder: label });

            loadStep('cotizar', '#origen_departamento', 'DepartamentoOrigen');
            loadStep('cotizar', '#destino_departamento', 'DepartamentoDestino');
        }
    }

    var getCotizacion = function(response) {
        if(response.Estado){
            var data = response.Respuesta[0];
            var incremento = $('input[name="donde[pagas]"]:checked').val()*1;
            var total = (data.Total*1)+incremento;


            $('#valor-cotizado').html('<br/><div>'+data.Moneda+' '+$.number(total,2,'.',',')+'</div>');
            notify.update('type', 'success');
            notify.update('message', '<strong>Cotización</strong> Generada con éxito.');

            $('.btn-nuevo-servicio').removeClass('hide');

            var origenMunicipio = $('#origen_municipio');
            var destinoMunicipio = $('#destino_municipio');

            var nameOriDep = $('#origen_departamento').select2('data');
            var nameDesDep = $('#destino_departamento').select2('data');
            var nameOriMun = $('#origen_municipio').select2('data');
            var nameDesMun = $('#destino_municipio').select2('data');

            var data = {
                DepartamentoOrigenNombre:   nameOriDep[0].text,
                MunicipioOrigenNombre:      nameOriMun[0].text,
                DepartamentoDestinoNombre:   nameDesDep[0].text,
                MunicipioDestinoNombre:      nameDesMun[0].text,
                DepartamentoOrigen:     $('#origen_departamento').val(),
                DepartamentoDestino:    $('#destino_departamento').val(),
                MunicipioOrigen:        origenMunicipio.val(),
                MunicipioDestino:       destinoMunicipio.val(),
                ValorCotizado:          total,
                Moneda:                 data.Moneda,
                DondePagas:             $('input[name="donde[pagas]"]:checked').attr('id'),
                CodigoPobladoOrigen:    origenMunicipio.data('codigo-poblado'),
                CodigoPobladoDestino:   destinoMunicipio.data('codigo-poblado'),
                CodigoPieza:            $('#que_envias').val(),
                TipoServicio:           1,
                PesoTotal:              (($('#peso').val())? $('#peso').val() : 1),
                CantidadPieza:          $('#cantidad').val(),
            };

            saveStep('cotizar', JSON.stringify(data));

            var dataRemitente = JSON.parse(sessionStorage.getItem('remitente_destinatario'));
            if(dataRemitente){
                dataRemitente['RemitenteDepartamento'] = data.DepartamentoOrigen;
                dataRemitente['RemitenteMunicipio'] = data.MunicipioOrigen;
                dataRemitente['RemitenteCodigoPoblado'] = data.CodigoPobladoOrigen;

                saveStep('remitente_destinatario', JSON.stringify(dataRemitente));
            }

        } else {
            notify.update('type', 'danger');
            notify.update('message', '<strong>NOTIFICAR</strong> Ocurrio un error, al intentar cotizar');
        }
    }

    // make the jsonp call: ajax_action, method, variables, callback
    wp_jsonp("wp_jsonp", "/api/Catalogos/get", 'GET', { codigoCatalogo: 3, parametro1: 'GT' }, getDepartamento);
    wp_jsonp("wp_jsonp", "/api/Catalogos/get", 'GET', { codigoCatalogo: 6 }, getTipoServicio);

    var method = '/api/Catalogos/get';
    new Select2Cascade($('#origen_departamento'), $('#origen_municipio'), method, {
            codigoCatalogo: 4,
            parametro1: ':parentId:',
        }, 'Seleccione un municipio'
    );

    new Select2Cascade($('#destino_departamento'), $('#destino_municipio'), method, {
            codigoCatalogo: 4,
            parametro1: ':parentId:',
        }, 'Seleccione un municipio'
    );

    $('#origen_municipio').on('select2:select', function(e){
        $(this).attr('data-codigo-poblado', $($(this).select2('data')[0].element).data('codigo-poblado'));
    });
    $('#destino_municipio').on('select2:select', function(e){
        $(this).attr('data-codigo-poblado', $($(this).select2('data')[0].element).data('codigo-poblado'));
    });

    var elements = '#origen_departamento, #origen_municipio, '+
        '#destino_departamento, #destino_municipio, '+
        'input[name="donde[pagas]"], '+
        '#cantidad, #peso';

    $('body').on('change', elements, function (e) {

        if($('.btn-cotizar').attr('data-clicked')){

            $('.btn-nuevo-servicio').addClass('hide');

            $('#valor-cotizado').html('<div>Q 0.00</div>');

            $('.btn-cotizar').attr('data-clicked', false);

        }

    })

    $( "form#cotizacion" ).validate({
        rules: {
            peso: {
                required: function(element) {
                    return $("#que_envias").val() == 2;
                }
            }
        }
    });

    $('body').on('click', '.btn-cotizar', function(e){
        e.preventDefault();

        if ($("form#cotizacion").valid()) {

            notify = $.notify('<strong>Cotizando</strong> Por favor espere...', {
                type: 'info',
                placement: {
                    from: 'bottom',
                    align: 'right'
                },
                allow_dismiss: false,
                showProgressbar: false
            });


            $(this).attr('data-clicked', true);

            $('#valor-cotizado').html('<br/><small><i class="fa fa-refresh"></i> Cotizando...</small>');

            var origenMunicipio = $('#origen_municipio');
            var destinoMunicipio = $('#destino_municipio');

            var data = {
                CodigoPobladoOrigen:    origenMunicipio.data('codigo-poblado'),
                CodigoPobladoDestino:   destinoMunicipio.data('codigo-poblado'),
                CodigoPieza:            $('#que_envias').val(),
                TipoServicio:           1,
                PesoTotal:              (($('#peso').val())? $('#peso').val() : 1),
                CantidadPieza:          $('#cantidad').val(),
            };

            wp_jsonp('wp_jsonp', "/api/Catalogos/GetCotizacion", 'GET', data, getCotizacion);

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
        { target: '#cantidad', storageKey: 'CantidadPieza'},
        { target: '#peso', storageKey: 'PesoTotal'},
        { target: '#donde_pagas_origen', storageKey: 'DondePagas'}
    ]
    $.each(elements, function(i, k){
        loadStep('cotizar', k.target, k.storageKey);
    });

});