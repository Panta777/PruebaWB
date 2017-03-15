/**
 * A Javascript module to loadeding/refreshing options of a select2 list box using ajax based on selection of another select2 list box.
 * 
 * @url : https://gist.github.com/ajaxray/187e7c9a00666a7ffff52a8a69b8bf31
 * @auther : Anis Uddin Ahmad <anis.programmer@gmail.com>
 *
 * Live demo - https://codepen.io/ajaxray/full/oBPbQe/ 
 * w: http://ajaxray.com | t: @ajaxray
 */
var Select2Cascade = ( function(window, $) {

    function Select2Cascade(parent, child, method, parameters, label) {
        var afterActions = [];

        var _parameters = parameters;

        // Register functions to be called after cascading data loading done
        this.then = function(callback) {
            afterActions.push(callback);
            return this;
        };



        parent.select2().on("change", function (e) {

            var parentId = jQuery(this).val();

            child.prop("disabled", true);
            var _this = this;

            parameters = JSON.stringify(_parameters);
            parameters = parameters.replace(':parentId:', parentId);
            parameters = JSON.parse(parameters);

            wp_jsonp("wp_jsonp", method, 'GET', parameters, function(items){

                if(items.Estado){
                    var newOptions = '<option value="">'+label+'</option>';

                    jQuery.each(items.Respuesta, function(k,o){

                        newOptions += '<option value="'+ o.codmun +'" data-codigo-poblado="'+o.CabeceraCodigoPoblado+'">'+ o.desmun +'</option>';

                    });

                    child.select2('destroy').html(newOptions).prop("disabled", false)
                        .select2({ width: 'resolve', placeholder: label });

                    afterActions.forEach(function (callback) {
                        callback(parent, child, items);
                    });

                    var sessionData = JSON.parse(sessionStorage.getItem('remitente_destinatario'));
                    if(sessionData){
                        if(parentId == sessionData.RemitenteDepartamento){
                            loadStep('remitente_destinatario', child.selector, child.data('storage-property'));
                        }
                    } else {
                        loadStep('cotizar', child.selector, 'MunicipioOrigen');
                    }

                }

            });
            
            /*$.getJSON(url.replace(':parentId:', $(this).val()), function(items) {
                var newOptions = '<option value="">-- Select --</option>';
                for(var id in items) {
                    newOptions += '<option value="'+ id +'">'+ items[id] +'</option>';
                }

                child.select2('destroy').html(newOptions).prop("disabled", false)
                    .select2({ width: 'resolve', placeholder: "-- Select --" });

                afterActions.forEach(function (callback) {
                    callback(parent, child, items);
                });
            });*/
        });
    }

    return Select2Cascade;

})( window, $);
