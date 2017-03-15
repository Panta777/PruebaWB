<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title><?php echo $titleWeb; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="pagos, pay, online, en linea, pronet, guatemala">
        <meta name="keywords" content="Sitio Oficila de Pronet. Todos tus pagos en un solo lugar">
        <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet"> 
    </head>
    <script type="text/javascript"> 
        function verDepartamentosyServicios() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    document.getElementById("locationDepartamento").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "<?php echo base_url(); ?>agencia/llena_departamentos?q=Guatemala", true);
            xmlhttp.send();
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("locationServicio").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "<?php echo base_url(); ?>agencia/llena_servicios?q=Guatemala", true);
            xmlhttp.send();
        }
    </script>
    <body>
        <?php $this->load->view("theme/head.php"); ?>
        <div class="container-fluid">
            <?php
            if (isset($mainContent)) {
                $this->load->view($mainContent);
            }
            ?>
        </div>
        <?php $this->load->view("theme/footer.php"); ?>
        <section id="ga">
<!-- 		<script type="text/javascript">
                        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
                        ga('create', 'UA-92547395-1', 'auto');
                        ga('send', 'pageview');
                </script> -->
        </section>
    </body>
</html>
