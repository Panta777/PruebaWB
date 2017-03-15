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
</style>
<section class="pnSection" id="pnSection1">
	<div class="container">
		<h2>Registro Usuarios Pronet</h2>
		<div class="div container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
			
				<?php echo form_open("user/register",
					array("method"=>"post","id"=>"pnRegister", "class"=>"form-horizontal"));  
				?>
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
						<label for="" class="">
							Apellido
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="60" id="apellido" name="apellido" required />
					</div>
						
					
				</div>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="telefono" class="">
							Telefonos
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="20" id="telefono" name="telefono" required />
					</div>
						
					
				</div>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="direccion" class="">
							Direccion
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"maxlength="20" id="direccion" name="direccion" required />
					</div>
						
					
				</div>
								
								
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="password" class="">
							Contraseña
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="20" id="password" name="password" required />
					</div>
						
					
				</div>		
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="password2" class="">
							Reingrese Su Contraseña
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="20" id="password" name="password2" required />
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
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
	<script>
		jQuery("#pnRegister").validate();
	</script>
</section>