
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
            <li>
                <a href="<?php echo base_url() ?>EmployeeNit">
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
            <li class="active">
                <a href="<?php echo base_url() ?>Reporte1">
                    <i class="ti-view-list-alt"></i>
                    <p>Reporte Empleados por Sueldo</p>
                </a>
            </li>
            <!--            <li>
                            <a href="icons.html">
                                <i class="ti-pencil-alt2"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li>
                            <a href="maps.html">
                                <i class="ti-map"></i>
                                <p>Maps</p>
                            </a>
                        </li>
                        <li>
                            <a href="notifications.html">
                                <i class="ti-bell"></i>
                                <p>Notifications</p>
                            </a>
                        </li>
                        <li class="active-pro">
                            <a href="upgrade.html">
                                <i class="ti-export"></i>
                                <p>Upgrade to PRO</p>
                            </a>
                        </li>-->
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
                            <h4 class="title">Reporte Empleados por Salario</h4>
                            <p class="category">Ingrese una cantidad, presione buscar y obtendra los datos de los empleados con un salario mayor al ingresado</p>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <input type="number" class="form-control border-input" name="sal" id ="sal" placeholder="Ingrese una cantidad">
                        </div>
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-primary" id ="pnLoginButon" onClick="getEmpleadosPorSueldo()">Buscar</button>
                        </div>


                    </div>
                    <div class="content table-responsive table-full-width"  >
                        <table class="table table-striped"  style="display: none" id="tablaReport"  >
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

        function getEmpleadosPorSueldo()
        {
            var sal = $("#sal").val();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText !== "SIN EMPLEADOS"){
                        $("#tablaReport").show();
                        document.getElementById("tablaReportBody").innerHTML = this.responseText;
                                        
                    }
                    else{ $("#tablaReport").hide();alert("Esta: " + this.responseText );}

                }
            };
            xmlhttp.open("GET", "<?php echo base_url() ?>Reporte1/EmployeeEarn?sal="+sal, true);
            xmlhttp.send();
        }
	
   
    </script>




