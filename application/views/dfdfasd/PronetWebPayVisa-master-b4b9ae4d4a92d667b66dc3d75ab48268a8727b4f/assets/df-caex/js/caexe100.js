jQuery(document).ready(function ($) {

    // $('select').select2({
        // allowClear: true
    // });
	
    loadStep = function(step, target, property) {
        var data = JSON.parse(sessionStorage.getItem(step));
        var obj = $(target);
        var type = obj.attr('type');

        if( data != null ) {

            if (type == 'text') {
                obj.val(data[property]).trigger("change");
            }
            if (type == 'radio') {
                $('#'+data[property]).prop("checked", true);
            }
            if (obj.is('select')){
                obj.val(data[property]).trigger("change");
                var valProperty = property.replace('Municipio', 'CodigoPoblado');
                obj.attr('data-codigo-poblado', data[valProperty]);
            }
            if (obj.is('span')){
                var text = $.number(data[property],2,'.',',');
                obj.html('<div>'+data.Moneda+' '+text+'</div>');
            }

            if(obj.is('textarea')){
                obj.html(data[property]);
            }

        } else {

            if(step=='remitente_destinatario'){

                if (obj.is('select')){
                    var data = JSON.parse(sessionStorage.getItem('cotizar'));

                    if( data != null ){

                        var property = 'DepartamentoOrigen';
                        obj.val(data[property]).trigger("change");
                        var valProperty = property.replace('Municipio', 'CodigoPoblado');
                        obj.attr('data-codigo-poblado', data[valProperty]);

                    }
                }


            }

        }

    }

    saveStep = function(step, data) {
        sessionStorage.setItem(step, data);
    }

});