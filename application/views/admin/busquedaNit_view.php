
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
            <li >
                <a href="<?php echo base_url() ?>home">
                    <i class="ti-user"></i>
                    <p>Pefil de Usuario</p>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo base_url() ?>SearchNIT">
                    <i class="ti-view-list-alt"></i>
                    <p>Ver Empleados por NIT</p>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>EmployeeAge">
                    <i class="ti-view-list-alt"></i>
                    <p>Reportes Empleados por Edad</p>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>EmployeePuesto">
                    <i class="ti-view-list-alt"></i>
                    <p>Reportes Empleados por Puesto</p>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>home/EmployeeEarn">
                    <i class="ti-view-list-alt"></i>
                    <p>Reporte Empleados por Sueldo</p>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Busqueda Empleados por Nit</h4>
<!--                            <p class="category">Ingrese un Nit </p>-->
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <input type="text" class="form-control border-input" name="nit" id ="nit" placeholder="Ingrese un nit">
                        </div>
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-primary" id ="pnLoginButon" onClick="getEmpleadoPorNit()">Buscar</button>
                        </div>


                    </div>
                    <div class="content table-responsive table-full-width" style="display: none" id="tablaReport">
                        <table class="table table-striped"  >
                            <thead>
                            <th>ID</th>
                            <th>Nombre Completo</th>
                            <th>Salario</th>
                            <th>Direccion</th>
                            <th>Puesto</th>
                            </thead>
                            <tbody id="tablaReportBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        function getEmpleadoPorNit()
        {
            var sal = $("#sal").val();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $(tablaReport).show();
                    document.getElementById("tablaReportBody").innerHTML = this.responseText;
                                    
                }
            };
            xmlhttp.open("GET", "<?php echo base_url() ?>SearchNIT/EmployeeNIT?sal="+sal, true);
            xmlhttp.send();
        }
	
   
    </script>




