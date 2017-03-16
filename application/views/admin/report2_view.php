
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Reporte Empleados por Puesto</h4>
                            <p class="category">Ingrese un puesto y vera los registros con coincidencias </p>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <input type="text" class="form-control border-input" name="sal" id ="sal" placeholder="Ingrese un Puesto">
                        </div>
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-primary" id ="pnLoginButon" onClick="getEmpleadosPorPuesto()()">Buscar</button>
                        </div>


                    </div>
                    <div class="content table-responsive table-full-width" style="display: none" id="tablaReport">
                        <table class="table table-striped"  >
                            <thead>
                            <th>ID</th>
                            <th>Nombre Completo</th>
                            <th>Salario</th>
                            <th>Puesto</th>
                            <th>Disponibilidad</th>
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

        function getEmpleadosPorPuesto()
        {
            var sal = $("#sal").val();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    $(tablaReport).show();
                    document.getElementById("tablaReportBody").innerHTML = this.responseText;

                }
            };
            xmlhttp.open("GET", "<?php echo base_url() ?>ReportePorPuesto/EmployeePuesto?sal=" + sal, true);
            xmlhttp.send();
        }


    </script>




