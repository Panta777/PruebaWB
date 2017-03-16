
<div class="container"> 


    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Login</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
            </div> 
            <?php echo form_open('', array("method" => "", "id" => "pnLoginM")); ?>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">

                </div>
                <!--                <form id="loginform" class="form-horizontal" role="form">-->

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="pnUser"  type="text" class="form-control" name="username" value="" placeholder="USUARIO REGISTRADO">                                        
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="pnPass" type="password" class="form-control" name="password" placeholder="PASSWORD">
                </div>
                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->

                    <div class="col-sm-12 controls">
                        <button type="submit" class="btn btn-primary" id ="pnLoginButon">Entrar</button>
                    </div>
                </div>  

                <!--                </form>     -->
            </div> 
            <?php echo form_close(); ?>
        </div>  
    </div>
    <div id="signupbox" style="display:inline; margin-top:175px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    </div> 
</div>
<script type="text/javascript">
    $("#pnLoginM").submit(function(e){
        validate("pnUser","pnPass", "pnLoginM");
        e.preventDefault();
        return false;
    });
    
    validate = function(user,pass){
        user = $("#"+user).val();
        pass = $("#"+pass).val();
        info ={"pnUser":user,"pnPass":pass}
        if(user=="" || pass==""){
            alert("Favor rellenar campos");
            $("#"+user).val("");$("#"+pass).val("");
            $("#"+pass).focus();
            return false;
        }
        else
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById("txtHint").innerHTML = this.responseText;
                    var info1  = this.responseText
                    
                    if(info1== 'loged'){
                        location.reload();
                    }
                    else{
                        alert(info1);
                    }

                }
            };
            xmlhttp.open("GET", "<?php echo base_url() ?>Home/loginUser?usu="+user+"&pas="+pass, true);
            xmlhttp.send();
    		
        }		
    }
</script>




