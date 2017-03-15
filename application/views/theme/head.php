
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() . "assets/main/img/" ?>apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() . "assets/main/img/" ?>favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>CP Web Business</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() . "assets/main/css/" ?>/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url() . "assets/main/css/" ?>animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url() . "assets/main/css/" ?>paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url() . "assets/main/css/" ?>demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() . "assets/main/css/" ?>themify-icons.css" rel="stylesheet">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>


</head>
<style type="text/css">
    .pnBar{
        background-color: #005EAB;
        text-align:right;
        padding:10px;
        margin-bottom:20px;
        /*display:none;*/
    }
    .pnBar ul, .pnBar li, .pnBar li a{
        display:inline-block;
        color:#fff;
    }
    .pnBar li{
        width:80px;
    }

</style>
<header>
    <div class="pnBar">
        <?php
        if (!isset($this->session->user1)) {
            echo '<script type="text/javascript">
            $(document).ready(function () {

                demo.initChartist();

                $.notify({
                    icon: "ti-gift",
                    message: "Bienvenido a <b>Control de Personal de Web Bussiness</b> -Ingrese sus datos para poder entrar al Sistema-."

                }, {
                    type: "info",
                    timer: 4000
                });

            });
        </script>';
        } else {
            echo '<button type="submit" class="btn btn-info btn-fill btn-wd" id ="pnLogoutButon" onClick="CloseSession()">Salir</button>';
        }
        ?>
        <img class="avatar border-white" src="<?php echo base_url() . "assets/main/img/" ?>Logootipo.png" alt="slgo" width ="50px" height="50px"/>


    </div>
</header>
