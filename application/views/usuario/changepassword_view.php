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
.form-group{
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
				<?php echo form_open("user/changepass",
					array("method"=>"post","id"=>"pnRegister", "class"=>"form-horizontal"));  
				?>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="correo" class="">
							Ingreso Codigo
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="50" id="codigo" name="codigo"  required />
					</div>
				</div>
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="password" class="">
							Nuevo Password
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="50" id="password2" name="password2"  required />
					</div>
				</div>
				
				<div class="form-group">
					<div class="pnLabelContainer">
						<label for="password2" class="">
							Ingrese de nuevo el nuevo password
						</label>
					</div>
					
					<div class="pnInputContainer">
						<input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" maxlength="50" id="password2" name="password"  required />
					</div>
				</div>
				
				
				
					<div class="form-group">
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
						<?php if(isset($mensaje)){echo "<h2>".$mensaje."</h2>";}?>
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