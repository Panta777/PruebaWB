<?php $this->chargeassets->convertJs($js) ?>
<style type="text/css">
    .pnSection{

        text-align:center;
    }
    .no_container{
        padding-top:180px;
        padding-bottom:180px;
    }
    .min-height {
        min-height: 366px!important;
    }
    .vc_row .vc_column_container {
        padding-left: 0px;
        padding-right: 0px;
    }

    #pnSection1{
        padding-top: 100px;
    }

    .bx-wrapper {
        -moz-box-shadow: none!important;
        -webkit-box-shadow: none!important;
        box-shadow: none!important;
        border: none!important;
        background: none!important;
    }
    .bx-pager.bx-default-pager{
        display:none!important;
    }
    .container-fluid {
        padding-right: 0px;
        padding-left: 0px;
    }

    .bx-wrapper .bx-caption {
        position: absolute!important;
        top: 25%!important;
        left: 0!important;
        background: #666!important;
        background: none!important;
        width: 100%!important;
    }

    .bx-caption h2 , .bx-caption  p{
        color:#fff!important;
    }
    .bx-caption h2, .bx-caption p {
        color: #fff !important;
        font-weight: 700;
        margin-top: 3%;
        font-size: 50px;
    }
    .bx-caption p{
        font-size: 30px;	
    }
    .gm-style-iw {
        top: 0px !important;
        left: 0px !important;
        background-color: #fff;
        box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
        border: 1px solid rgba(72, 181, 233, 0.6);
        border-radius: 2px 2px 10px 10px;
        height: 400px;
    }


    #iw-container {
        margin-bottom: 0px;
        height: 500px;
        display: none;
        width:22%;
        background-color:#F2F2F2;
    }

    #iw-container .iw-title {
        font-family: 'Roboto',Arial,sans-serif;
        font-size: 15px;
        font-weight: 400;
        padding: 15px;
        background-color: #db4437;;
        color: white;
        margin: 0;
        border-radius: 2px 2px 0 0;
        max-height:  50px;
    }

    #iw-container .iw-content {
        font-size: 13px;
        line-height: 18px;
        font-weight: 400;
        margin-right: 1px;
        padding: 15px 5px 20px 15px;
        max-height: 500px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .iw-content img {
        float: right;
        margin: 0 5px 5px 10px; 
    }

    .iw-subTitle {
        font-size: 16px;
        font-weight: 700;
        padding: 5px 0;
    }

    .iw-bottom-gradient {
        position: absolute;
        width: 326px;
        height: 25px;
        bottom: 10px;
        right: 18px;
        background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
        background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
        background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
        background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
    }

    #close_buton, #flecha
    {
        display:inline-block;
        width:26px;
        height:22px;
        border-top-color: transparent;
        border-top-style: solid;
        border-top-width: 0px;
        border-right-color: transparent;
        border-right-style: solid;
        border-right-width: 0px;
        border-bottom-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 0px;
        border-left-color: transparent;
        border-left-style: solid;
        border-left-width: 4px;
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
        border-top-width: 0px;
        border-right-width: 0px;
        border-bottom-width: 0px;
        border-left-width: 4px;
        border-radius:100%;
        line-height: 0px;  
        margin-left: 0px;
        text-align: center;
        font-size: 13px;
        background-clip: padding-box;
        background-image: url(//www.gstatic.com/gmeviewer/images/MyMaps_Icons003.png);
        padding: 5px;
    }

    #close_buton {
        background-position: -26px -334px;
    }

    #flecha 
    {
        background-position:-1px -191px;
    }
    .pnTitle, .pnParagraph{
        color:#fff;
    }
    .pnTitle{
        font-size:40px;
    }
    .pnParagraph{
        font-size:24px;
    }
    .primary-img p{
        position:relative!important;
        text-align:center;
        display:block;

    }
</style>
<style type="text/css">
    /* Set a size for our map container, the Google Map will take up 100% of this container */
    #espacioMap {
        width: 100%;
        height: 500px;
    }

    #map {
        width: 100%;
        height: 450px;
    }

    #marcoMapa {
        font-family: 'Roboto',Arial,sans-serif;
        font-size: 15px;
        font-weight: 400;
        padding: 15px;
        background-color: rgb(77,106,121);
        color: white;
        margin: 0;
        border-radius: 2px 2px 0 0;
        max-height:  50px;
        width:100%; 
        float:left;
    }

    #estrellita
    {
        content: -webkit-image-set(url(//ssl.gstatic.com/ui/v1/star/star4.png) 1x,url(//ssl.gstatic.com/ui/v1/star/star4_2x.png) 2x);
    }
</style>

<!-- carrousel try -->
<section class="pnSection" id="pnSection1">

    <div class="example-animation">
        <?php foreach ($images as $it) { ?>
            <div data-lazy-background="<?php echo base_url() . $it['url'] ?>">
                <p data-pos="['0%', '0%', '45%', '0%']" data-duration="700" data-effect="move">		<span class="pnTitle"><?php echo $it['title'] ?></span>
                </p>
                <p class ="pnParagraph" data-pos="['0%', '0%', '50%', '0%']" data-duration="700" data-effect="move">		<?php echo $it['paragraph'] ?>
                </p>
            </div>
        <?php } ?>
    </div>
</section>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.example-animation').DrSlider({
			'transition': 'door',
			'showNavigation':false,
			'showProgress':false
		}); //Yes! that's it!
	});	
</script>
<!-- carrousel try -->

<section id="pnSection2" class="pnSection">
    <div class="vc_row wpb_row vc_row-fluid">
        <div class="container">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12 vc_custom_1487032083669 wpb_animate_when_almost_visible wpb_top-to-bottom wpb_start_animation animated">
                    <div class="wpb_wrapper">
                        <div class="tzElement-title tz-title-type-3">
                            <?php echo $title[0]["content"]; ?>
                        </div>
                        <div class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1485023807641">
                            <figure class="wpb_wrapper vc_figure">
                                <div class="vc_single_image-wrapper   vc_box_border_grey">
                                    <img src='<?php echo base_url() . $title[0]["icon"]; ?>' class="vc_single_image-img attachment-full" alt="" width="299" height="28"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="pnSection3" class="pnSection">
    <!-- Content area -->

    <section id="pnSection3" class="pnSection">
        <div class="vc_row wpb_row vc_row-fluid">
            <?php $cont = 0; ?>
            <?php foreach ($temas as $item) { ?>	
                <div class='min-height wpb_column vc_column_container vc_col-sm-6 vc_custom_1487009354925 wpb_animate_when_almost_visible wpb_top-to-bottom wpb_start_animation animated' style='background-image: url(<?php echo base_url() . $item["imageurl"]; ?>)';>
                    <div class='wpb_wrapper'>
                        <div class='wpb_text_column wpb_content_element '>
                            <div class='wpb_wrapper'>
                                <h2>
                                    <span style='color: #fff;'><?php echo $item["title"]; ?></span>
                                </h2>
                                <p>
                                    <span style='color: #fff;'><?php echo $item["paragraph"] ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- Content area -->
</section>
<section id="pnSection2" class="pnSection">
    <div class="vc_row wpb_row vc_row-fluid">
        <div class="container">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12 vc_custom_1487032083669 wpb_animate_when_almost_visible wpb_top-to-bottom wpb_start_animation animated">
                    <div class="wpb_wrapper">
                        <div class="tzElement-title tz-title-type-3">
                            <?php echo $title[1]["content"]; ?>
                        </div>
                        <div class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1485023807641">
                            <figure class="wpb_wrapper vc_figure">
                                <div class="vc_single_image-wrapper   vc_box_border_grey">
                                    <img src='<?php echo base_url() . $title[1]["icon"]; ?>' class="vc_single_image-img attachment-full" alt="" width="299" height="28"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section>

    <div>
        </select>
        <?php
        echo '<markers id = "marcadores">';
        foreach ($puntos as $pun) {
            echo '<marker ';
            echo 'name="' . $pun["cadena"] . '" ';
            echo 'address="' . $pun["direccion"] . '" ';
            echo 'lat="' . $pun["latitud"] . '" ';
            echo 'lng="' . $pun["longitud"] . '" ';
            echo 'hor="' . $pun["horario"] . '" ';
            echo 'servicio= "' . str_replace(",", "</br>", $pun["nombre_servicio"]) . '" ';
            echo '/>';
        }
        echo '</markers>'; // End XML file
        ?>
    </div>

</section>

<section class="pnSection">
    <div class="container-fluid">
        <div class ="row" >
            <div  id ="iw-container" class="col-xs-6">
                <!--Marker Information-->
            </div>
            <div id ="espacioMap"  class="col-xs-6">
                <div  id="marcoMapa" style ="width:100%; float:left;" >
                    <div  style ="width:25%; float:left;">
                        <span  id="estrellita"></span>
                    </div> 
                    <div  style ="width:50%; float:left;">PRONET</div>
                    <div  style ="width:25%; float:left;">
                        <span  id="estrellita"></span>
                    </div>
                </div>

                <div  id="map"  >
                </div>

            </div>
        </div>
    </div>
</section>
<script>
    var lastWidth = jQuery(window).width();

    jQuery(window).resize(function(){
        if(jQuery(window).width()!=lastWidth){

            lastWidth = jQuery(window).width();
            if ( jQuery("#iw-container").css('display') !== 'none' ){
                // element is hidden
                if (jQuery(window).width() >= 780) {
                    jQuery("#iw-container").css("width", '22%'); 
                    jQuery("#espacioMap").css("width", '78%'); 
                } else if (jQuery(window).width() >= 590) {
                    jQuery("#iw-container").css("width", '30%'); 
                    jQuery("#espacioMap").css("width", '70%'); 
                } else if (jQuery(window).width() >= 300) {
                    jQuery("#iw-container").css("width", '45%'); 
                    jQuery("#espacioMap").css("width", '55%'); 
                }
                else {
                    jQuery("#iw-container").css("width", '50%'); 
                    jQuery("#espacioMap").css("width", '50%'); 
                }
            }   
        }
    })  
    
    function ocultarInfoMapa() {
        jQuery("#iw-container").hide();
        jQuery("#map").css("width", '100%'); 
        map.setZoom(7);
    }
    
    var customLabel = {
        Pronet: {
            label: ''
        },
        bar: {
            label: 'B'
        }
    };


    var markersArray = [];
    var map;
    var mapOptions;
    var marker;

    function acercarsePunto() {
        map.setZoom(16);
        map.setCenter(marker.getPosition());       
    }
    
    
    function addMarker(location) {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markersArray.push(marker);
    }
 
    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }
    
    var infoWindow;
    
    function initMap() {
        var icons = {
            icon: '<?php echo base_url(); ?>assets/uploads/2017/01/logo-4-mini.png'
        };
        
        mapOptions = {
            zoom: 7,
            center: new google.maps.LatLng(15.88962,-90.123907), 
            styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}],
            scrollwheel:false
        };
        
        map = new google.maps.Map(document.getElementById('map'), mapOptions);
       
        
        // var infoWindow;
        
        // Change this depending on the name of your PHP or XML file
        downloadUrl('<?php echo base_url(); ?>Agencia', function() {
            markers = document.getElementsByTagName('marker')
            
            Array.prototype.forEach.call(markers, function(markerElem) {
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                //var type = markerElem.getAttribute('type');
               
                var horario =  markerElem.getAttribute('hor');
                var servicio =  markerElem.getAttribute('servicio');
                
                var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));
                    

                // var icon = customLabel[type] || {};
                
                marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: icons.icon
                });
                
                var content=   '<div class="iw-title" id="lineaTitulo" style ="width:100%; float:left;">'+
                    '<div  class="figuras" style ="width:15%; float:left;">'
                    +'<span id="flecha"  onClick="ocultarInfoMapa()" title="Cerrar Información"></span></div>'+
                    '<div  style ="width:78%; float:left;"> '+name+'</div>'
                    + '<div  style ="width:7%; float:left;">'
                    +'<span id="close_buton" class="figuras" onClick="acercarsePunto()" title="Ir al Punto"></span></div>'
                    +'</div> ' +
                    '<div class="iw-content">';
                
                

                if(servicio !== null && servicio.length>0)
                {    
                    if(!servicio.includes('</br>'))
                    {//if you are looking for a specific service
                        content += '<h6>Servicio:<div class="iw-subTitle" >'+servicio+'</div></h6>';
                    } 
                    else
                    {
                        content += '<h6>Servicios:<div class="iw-subTitle" >'+servicio+'</div></h6>';
                    }
                }
                    

                content+=   '<h6>Dirección: <div class="iw-subTitle">'+ address+' </div></h6>' +
                    '<h6>Horario de Atención: <div class="iw-subTitle">'+horario+'</div></h6>'+
                    '</div>';
                
                marker.addListener('click', function() {
                    var point2 = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));
                    marker.position= point2;
                    
                    jQuery(".iw-title").remove();
                    jQuery (".iw-content").remove();
                    jQuery("#lineaTitulo").remove();
                    jQuery("#iw-container").append(content);
                    
                    if (jQuery(window).width() >= 780) {
                        jQuery("#iw-container").css("width", '22%'); 
                        jQuery("#espacioMap").css("width", '78%'); 
                    } else if (jQuery(window).width() >= 590) {
                        jQuery("#iw-container").css("width", '30%'); 
                        jQuery("#espacioMap").css("width", '70%'); 
                    } else if (jQuery(window).width() >= 300) {
                        jQuery("#iw-container").css("width", '45%'); 
                        jQuery("#espacioMap").css("width", '55%'); 
                    }
                    else {
                        jQuery("#iw-container").css("width", '50%'); 
                        jQuery("#espacioMap").css("width", '50%'); 
                    }

                    jQuery("#iw-container").show();
                
                });
                markersArray.push(marker);
            });
        });
    }

    // Removes the overlays from the map, but keeps them in the array
    function clearOverlays() {
        if (markersArray) {
            for (i in markersArray) {
                markersArray[i].setMap(null);
            }
        }
    }

    // Shows any overlays currently in the array
    function showOverlays() {
        if (markersArray) {
            for (i in markersArray) {
                markersArray[i].setMap(map);
            }
        }
    }
    
    // Deletes all markers in the array by removing references to them
    function deleteOverlays() {
        if (markersArray) {
            for (i in markersArray) {
                markersArray[i].setMap(null);
            }
            markersArray.length = 0;
        }
    }

    function doNothing() {}
    jQuery("body").load(function(){jQuery(window).resize();});
    jQuery("body").ready(function(){jQuery(window).resize();});
    jQuery("body").focus(function(){jQuery(window).resize();});
    jQuery("body").hover(function(){jQuery(window).resize();});
    jQuery("body").change(function(){jQuery(window).resize();});
	
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnYkqbYG-2IM3kfzldf3CQNtH01F99stA&callback=initMap">
</script>

