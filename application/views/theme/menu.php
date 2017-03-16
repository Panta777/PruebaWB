<div class="sidebar" data-background-color="black" data-active-color="info">
    <!--
="primary | info | success | warning | danger"
    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                MENU PRINCIPAL
            </a>
        </div>
        <ul class="nav">
            <?php
            if (isset($activado) && $activado == "home") {
                echo'       <li class="active">';
            } else {
                echo'       <li>';
            }
            ?>
            <a href="<?php echo base_url() ?>home">
                <i class="ti-user"></i>
                <p>Inicio</p>
            </a>
            </li>
            <?php
            if (isset($activado) && $activado == "SearchNIT") {
                echo'       <li class="active">';
            } else {
                echo'       <li>';
            }
            ?>
            <a href="<?php echo base_url() ?>SearchNIT">
                <i class="ti-view-list-alt"></i>
                <p>Ver Empleados por NIT</p>
            </a>
            </li>
            <?php
            if (isset($activado) && $activado == "ReportePorEdad") {
                echo'       <li class="active">';
            } else {
                echo'       <li>';
            }
            ?>
            <a href="<?php echo base_url() ?>ReportePorEdad">
                <i class="ti-view-list-alt"></i>
                <p>Reportes Empleados por Edad</p>
            </a>
            </li>
            <?php
            if (isset($activado) && $activado == "ReportePorPuesto") {
                echo'       <li class="active">';
            } else {
                echo'       <li>';
            }
            ?>
            <a href="<?php echo base_url() ?>ReportePorPuesto">
                <i class="ti-view-list-alt"></i>
                <p>Reportes Empleados por Puesto</p>
            </a>
            </li>
            <?php
            if (isset($activado) && $activado == "ReportePorSalario") {
                echo'       <li class="active">';
            } else {
                echo'       <li>';
            }
            ?>
            <a href="<?php echo base_url() ?>ReportePorSalario">
                <i class="ti-view-list-alt"></i>
                <p>Reporte Empleados por Sueldo</p>
            </a>
            </li>
        </ul>
    </div>
</div>

