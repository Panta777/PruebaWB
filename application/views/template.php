<!DOCTYPE HTML>
<html lang="es">
    <?php $this->load->view("theme/head.php"); ?>
    <body>
        <div class="wrapper">
            <?php
            if (isset($activado) && $activado != "login") {
                $this->load->view("theme/menu.php");
            }
            ?>
            <?php
            if (isset($mainContent)) {
                $this->load->view($mainContent);
            }
            ?>

            <?php $this->load->view("theme/footer.php"); ?>
        </div></div>
</body>


<!--   Core JS Files   -->
<script src="<?php echo base_url() . "assets/main/" ?>js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/main/" ?>js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="<?php echo base_url() . "assets/main/" ?>js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="<?php echo base_url() . "assets/main/" ?>js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo base_url() . "assets/main/" ?>js/bootstrap-notify.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="<?php echo base_url() . "assets/main/" ?>js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url() . "assets/main/" ?>js/demo.js"></script>



<script type="text/javascript" src="<?php echo base_url() . "assets/main/" ?>bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/main/" ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/main/" ?>js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>



</html>
