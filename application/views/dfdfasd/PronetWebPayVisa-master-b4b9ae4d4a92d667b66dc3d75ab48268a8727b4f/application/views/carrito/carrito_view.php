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
	
    height: 400px;
    padding-top: 100px;
    margin-top: 185px;
}
.modal {
    z-index: 999999999!important;
	top:160px;
}
.pnInputContainer{
	padding:5px 0;
}
.modal-header {
    background-color: #52B848;
	color:green;
}
.pnTexRight{
	text-align:right;
}
.pnTextLeft{
	text-align:left;
	
}
.pnTextLeft a{
	font-size:12px;
	color:gray;
	
}
.modal-title {

    color: #fff!important;
}
.modal {
	font-family: 'Cabin', sans-serif !important;
}
.pnInputContainer input{
	width:100%;
}
.modal .btn-default, .modal .btn-primary {

    display: block;
    width: 100%;
	margin-top:5px;
    margin-bottom: 5px;
	border-radius:none;
}
.modal .btn-primary {
	background-color: #005EAB;
}
.modal .btn-default{
	background-color:#ccc;
	color#fff;
}
.modal-header h4{
	font-family: 'Cabin', sans-serif !important;
}
</style>

<!-- title page -->
<section id="pnSection1" class="vc_row wpb_row vc_row-fluid pnSection" style="background-image: url(<?php echo base_url().$images[0]["url"]; ?>); height: 400px;padding-top: 100px;">
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
						if(isset($images[0]["paragraph"])){
							echo "<p>".$images[0]["paragraph"]."</p>";
						}
					?>
               </div>
            </div>
         </div>
      </div>
</section>
<section class="pnSection" id="pnSection2">
	<div class="container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<h3 class="pnEmpresa">Empresa 1</h3><br />
				
				</div>
				<div class="col-md-4">
					<h3 class="pnEmpresa">Empresa 2</h3><br />
				</div>
				<div class="col-md-4">
					<h3 class="pnEmpresa">Empresa 3</h3><br />
				</div>
				<div class="col-md-4">
					<h3 class="pnEmpresa">Empresa 4</h3><br />
				</div>
				<div class="col-md-4">
					<h3 class="pnEmpresa">Empresa 5</h3><br />
				</div>
				<div class="col-md-4">
					<h3 class="pnEmpresa">Empresa 6</h3><br />
				</div>
				<div class="col-md-4">
					<h3 class="pnEmpresa">Empresa 7</h3><br />
				</div>
				<div class="col-md-4">
					<h3 class="pnEmpresa">Empresa 8</h3><br />
				</div>
				<div class="col-md-4">
					<h3 class="pnEmpresa">Empresa 9</h3><br />
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Button trigger modal -->
<?php if(!isset($this->session->user1)){echo $this->session->user1;?>
	<div class="pnSection" id="pnSection3">
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	 Iniciar Sesion
	</button>
	<a href="<?php echo base_url()."user/register"?>" class="btn btn-primary btn-lg">Registrarse</a>
	</div>
	 
<?php }?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Iniciar Sesion</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
        	<div class="row">
			<?php echo form_open('',array("method"=>"","id"=>"pnLoginM"));?>
        		<div class="col-md-6">
					<div class="pnLabelContainer">
						<label for="">Correo/Mail</label>
					</div>
					<div class="pnInputContainer">
						<input name="pnUser" type="text" class=" wpcf7-form-control wpcf7-text wpcf7-validates-as-required pnInput" id="pnUser" />
					</div>
					
				</div>
        		
				<div class="col-md-6">
					<div class="pnLabelContainer">
						<label for="">Password/Pass</label>
					</div>
					<div class="pnInputContainer">
						<input name="pnPass" type="password" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required pnInput" id="pnPass" />
					</div>
				</div>
        		<div class="col-md-12 pnTexRight">
					<button type="submit" class="btn btn-primary" id ="pnLoginButon">Login</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<div class="pnTextLeft">
						<a href= "../user/resetpassword">Olvide Contraseña</a>
					</div>
					
				</div>
			<?php echo form_close(); ?>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
jQuery("#pnLoginM").submit(function(e){
	validate("pnUser","pnPass", "pnLoginM");
	e.preventDefault();
	return false;
});

validate = function(user,pass){
	user = jQuery("#"+user).val();
	pass = jQuery("#"+pass).val();
	info ={"pnUser":user,"pnPass":pass}
	if(user=="" || pass==""){
		alert("favor rellenar campos");
		jQuery("#"+user).val("");jQuery("#"+pass).val("");
		jQuery("#"+pass).focus();
		jQuery(".modal.fade").removeClass("in");
		jQuery(".modal.fade").removeClass("in");
		
		return false;
	}
	else{
		jQuery.post( "loginUser", info , function(data) {
			jQuery(".pnScripts").html(data);
			if(info1== "loged"){
				jQuery("#pnUser").val("");
				jQuery("#pnPass").val("");
				jQuery(".modal-backdrop").removeClass("in");
				jQuery("#myModal").removeClass("in");
				jQuery("#pnSection3").hide();
				location.reload();
			}
			else{
				alert(info1);
			}
			return false;
			
		});
		return false;
		
	}		
}
</script>
<div class="pnScripts">
</div>


