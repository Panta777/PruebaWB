
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Reporte Empleados por Rango de Fecha Nacimiento</h4>
                            <p class="category">Escoja un rango de Fechas</p>
                            </br>   
                        </div>
                        <!--                        <div style="margin-bottom: 25px" class="input-group">
                                                    <input type="number" class="form-control border-input" name="sal" id ="sal" placeholder="Ingrese una cantidad">
                                                </div>-->
                        <div class="form-group">
                            <label for="dtp_input2" class="col-md-2 control-label">Fecha Inicial</label>
                            <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="date" id="fechaIni">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>

                            <label for="dtp_input2" class="col-md-2 control-label">Fecha Final</label>
                            <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="date" id="fechaFinal" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-primary" id ="pnLoginButon" onClick="getEmpleadosPorFecha()">Buscar</button>
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

        function getEmpleadosPorFecha()
        {
            var sal = $("#fechaIni").val();
            var sal2= $("#fechaFinal").val();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    $(tablaReport).show();
                    document.getElementById("tablaReportBody").innerHTML = this.responseText;

                }
            };
            xmlhttp.open("GET", "<?php echo base_url() ?>ReportePorEdad/EmployeeAge?fechaIni=" + sal+ "&fechaFin="+ sal2, true);
            xmlhttp.send();
        }


    </script>








