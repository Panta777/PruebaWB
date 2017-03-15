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

#pnSection1 {
    height: 400px;
    padding-top: 100px;
    margin-top: 80px;
}
.modal {
    z-index: 999999999!important;
	top:160px;
}
.pnInputContainer{
	padding:5px 0;
}
.modal-header{
	background-color:#E51B25;
	color:green;
}
.form-group {
    text-align: center;
}
.wpb_wrapper h2 {
    font-size: 51px;
    margin-top: 0px!important;
    font-weight: 700;
}
.pnInputContainer input {
    border: none;
    border-bottom: 1px solid silver;
    width: 90%;
}
.pnLabelContainer label{
	font-family: 'Cabin', sans-serif !important;
	
}
.pnSection h2{
	font-family: 'Cabin', sans-serif !important;
	color:#52B848;
}
.pnSection{
	font-family: 'Cabin', sans-serif !important;
}
.panel-title{
	font-family: 'Cabin', sans-serif !important;
}
</style>
<link rel="stylesheet" href="<?php echo base_url() . "assets/js_composer/assets/css/js_composer_tta.min.css" ?>" />
<link rel="stylesheet" href="<?php echo base_url() . "assets/js_composer/assets/css/js_composer.css" ?>" />

<!-- title page -->
<section id="pnSection1" class="vc_row wpb_row vc_row-fluid pnSection" style="background-image: url(<?php echo base_url() . $images[0]["url"]; ?>); height: 400px;padding-top: 100px;">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="wpb_wrapper">
            <div class="wpb_text_column wpb_content_element">
                <div class="wpb_wrapper">

                    <h1 style="text-align: center;">
                        <strong>
                            <span style="color: #ffffff;"><?php echo $images[0]["title"]; ?></span>

                        </strong>
                    </h1>
                    <?php
                    if (isset($images[0]["title"])) {
                        echo "<p>" . $images[0]["paragraph"] . "</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- title page -->
<!-- title area -->
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
    <div class="vc_row wpb_row vc_row-fluid ">
        <div class="container">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-3 wpb_animate_when_almost_visible wpb_top-to-bottom wpb_start_animation animated">
                    <div class="wpb_wrapper">
                        <div class="wpb_text_column wpb_content_element ">
                            <div class="wpb_wrapper">
                                <p>Lorem Ipsum bla bla wasare Lorem Ipsum bla bla wasareLorem Ipsum bla bla wasareLorem Ipsum bla bla wasareLorem Ipsum bla bla wasareLorem Ipsum bla bla wasareLorem Ipsum bla bla wasareLorem Ipsum bla bla wasare Lorem Ipsum bla bla wasare </p>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-9">
			
				<?php echo form_open("contacto/index",
					array("method"=>"post","id"=>"pnRegister", "class"=>"form-horizontal"));  
				?>

				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="nombre" class="">
						Nombre
						</label>
					</div>

					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="60" id="nombre" name="nombre" required />
					</div>
				</div>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="correo" class="">
							Correo Electronico
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="email" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="75" id="correo" name="correo"  required />
					</div>
				</div>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="" class="">
							Asunto
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="60" id="asunto" name="asunto" required />
					</div>
						
					
				</div>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="telefono" class="">
							Telefono
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="25" id="telefono" name="telefono" required />
					</div>
				</div>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="telefono" class="">
							Mensaje
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="300" id="mensaje" name="mensaje" required />
					</div>
				</div>
				<div class="form-group">
					<div>
						<br />
						<?php 
							/* $a = $this->captcha->generateString();
							$this->session->set_userdata("captcha", $a);
							$this->captcha->generateImage();  */
						?>
						<?php echo $this->recaptcha->render(); ?>
						<button type="submit" class="btn btn-primary" data-dismiss="modal">
							Enviar
						</button>
					</div>
				</div>
				<?php echo form_close();  ?>
				<?php 
					if(isset($mensaje)){
						echo "<h2>".$mensaje."</h2>";
					} 
				?>
				</div>
            </div>
        </div>
    </div>
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
	<div class="container-fluid">
		<div class="container">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php $cont=0; foreach ($faq as $it) { ?>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading<?php echo $it["position"]; ?>">
						<a <?php if($cont>0){echo " class='collapsed' ";}?>  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $it["position"]; ?>" aria-expanded="<?php if($cont==0){echo " true ";}else{echo "false";}?>" aria-controls="collapse<?php echo $it["position"]; ?>">
						<h4 class="panel-title">			
							<span class="pnPlusMinus">
								<?php if($cont>0){echo "+";}else{echo "-";}?>
								
							</span>
							<?php echo $it["pregunta"]; ?>
						</h4>
						</a>
					</div>
					<div id="collapse<?php echo $it["position"]; ?>" class="panel-collapse collapse<?php if($cont==0){echo " in ";}?>" role="tabpanel" aria-labelledby="heading<?php echo $it["position"]; ?>">
						<div class="panel-body">
							<?php echo $it["respuesta"]; ?>	
						</div>
					</div>
				</div>
					
	
			<?php $cont++;} ?>
			</div>
		</div>
	</div>
</section>


<section class="pnSection" id="pnSection4">
	<div class="tzFooterTop">
		<div class="container">
			<div class="row">
				<div class="col-md-3 footerattr">
					<aside id="text-6" class="widget_text widget">
						<div class="textwidget">
							<ul>
								<li><strong>PBX</strong></li>
								<li>Lorem Ipsum</li>
							</ul>
						</div>
					</aside>
				</div>
				<div class="col-md-3 footerattr">
					<aside id="text-8" class="widget_text widget">
						<div class="textwidget">
							<ul>
								<li><strong>Horario</strong></li>
								<li>Lorem Ipsum</li>
							</ul>
						</div>
					</aside>
				</div>
				<div class="col-md-3 footerattr">
					<aside id="text-7" class="widget_text widget">
						<div class="textwidget">
							<ul>
								<li><strong>Correo Soporte</strong></li>
								<li>a@a.com</li>
							</ul>
						</div>
					</aside>
				</div>
				<div class="col-md-3 footerattr">
					<aside id="text-7" class="widget_text widget">
						<div class="textwidget">
							<ul>
								<li><strong>Direccion Oficinas Centrales</strong></li>
								<li>Lorem Ipsun</li>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="pnSection" id="pnSection5">
	<div class="fb-like" data-href="https://www.facebook.com/Testpnet-329152380819712/" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
</section>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=330484427009664";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<style type="text/css">
.panel-title a{
	font-family: 'Montserrat', sans-serif;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 1px;
	text-align:left!important;
}
.panel-title, .panel-body {	
	text-align:left!important;
}
.panel-body{

}

.panel-group .panel {
    margin-bottom: 0;
    border-radius: 2px;
}   

.panel-default {
    border-color: #eee;
} 
.pnSection div, .pnSection li{
	font-family: 'Cabin', sans-serif !important;
}
.textwidget li{
	list-style:none;
}
</style>

<script type="text/javascript">
    jQuery('.panel-heading').click(function(){
		id = "#"+jQuery(this).attr("id");
		jQuery("h4 .pnPlusMinus").html("-")
		jQuery(id + " h4 .pnPlusMinus").html("+")
	});
</script>