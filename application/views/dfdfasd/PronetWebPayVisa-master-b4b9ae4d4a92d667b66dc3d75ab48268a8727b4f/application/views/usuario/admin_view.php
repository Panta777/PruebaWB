<style>
.pnInputContainer input {
    border: none;
    border-bottom: 1px solid silver;
    width: 90%;
}
.pnLabelContainer label{
	font-family: 'Cabin', sans-serif !important;
	
}
.pnSection h2{
	color:#52B848;
	font-family: 'Cabin', sans-serif !important;
}
.pnSection{
	text-align:center;
}
</style>
<section class="pnSection" id="pnSection1">
	<div class="container">
		<h2>Registro Usuarios Pronet</h2>
		<div class="div container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
				<?php echo form_open("user/admin",
					array("method"=>"post","id"=>"pnRegister", "class"=>"form-horizontal"));  
				?>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="nombre" class="">
						Nombre
						</label>
					</div>
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="60" id="nombre" name="nombre" required value="<?php echo $userInfo[0]["nombre"] ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="" class="">
							Apellido
						</label>
					</div>
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="60" id="apellido" name="apellido" required value="<?php echo $userInfo[0]["apellido"] ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="telefono" class="">
							Telefonos
						</label>
					</div>					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="20" id="telefono" name="telefono" required value="<?php echo $userInfo[0]["telefono"] ?>" />
					</div>
						
					
				</div>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="direccion" class="">
							Direccion
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"maxlength="20" id="direccion" name="direccion" required value="<?php echo $userInfo[0]["direccion"] ?>" /> 
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