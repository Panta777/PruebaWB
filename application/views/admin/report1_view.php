

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


                    <input type="submit" value="Crear PDF" title="Crear PDF" onClick="pdfEmpleadosPorSueldo()"/>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        function getEmpleadosPorSueldo()
        {
            var sal = $("#sal").val();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText !== '"SIN EMPLEADOS') {
                        $("#tablaReport").show();
                        document.getElementById("tablaReportBody").innerHTML = this.responseText;
                    } else {
                        $("#tablaReport").hide();
                        alert("Esta: " + this.responseText);
                    }

                }
            };
            xmlhttp.open("GET", "<?php echo base_url() ?>ReportePorSalario/EmployeeEarn?sal=" + sal, true);
            xmlhttp.send();
        }


        function pdfEmpleadosPorSueldo()
        {
            var sal = $("#sal").val();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                     //   console.log("si");
                     console.log(this.responseText);
                     
                }
            };
            xmlhttp.open("GET", "<?php echo base_url() ?>ReportePorSalario/generar?sal=" + sal, true);
            xmlhttp.send();
        }


    </script>




