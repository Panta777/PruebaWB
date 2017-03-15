
<div class="container"> 
<!--  Notifications Plugin    -->
<script src="<?php echo base_url() . "assets/main/" ?>js/bootstrap-notify.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        demo.initChartist();

        $.notify({
            icon: 'ti-gift',
            message: "Bienvenido a <b>Control de Personal de Web Bussiness</b> -Ingrese sus datos para poder entrar al Sistema-."

        }, {
            type: 'success',
            timer: 4000
        });

    });
</script>

<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Login</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
        </div>     
        <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <form id="loginform" class="form-horizontal" role="form">
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="USUARIO REGISTRADO">                                        
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="PASSWORD">
                </div>
                <div class="input-group">
                    <div class="checkbox">
                        <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1">Recordarme
                        </label>
                    </div>
                </div>
                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->

                    <div class="col-sm-12 controls">
                        <a id="btn-login" href="#" class="btn btn-primary">Entrar </a>
                    </div>
                </div>   
            </form>     
        </div>                     
    </div>  
</div>
<div id="signupbox" style="display:inline; margin-top:175px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
</div> 
</div>



