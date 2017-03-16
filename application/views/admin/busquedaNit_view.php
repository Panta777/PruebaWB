

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Busqueda Empleados por Nit</h4>
                            <p class="category">Ingrese un Nit y vera los registros con coincidencias </p>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <input type="text" class="form-control border-input" name="nit" id ="nit" placeholder="Ingrese un nit" >
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" id ="pnLoginButon" onClick="getEmpleadoPorNit()">Buscar</button>
                        </div>


                    </div>
                    <div class="content table-responsive table-full-width" style="display: none" id="tablaReport">
                        <table class="table table-striped"  >
                            <thead>
                            <th>ID</th>
                            <th>Nombre Completo</th>
                            <th>NIT</th>
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
            var sal = $("#nit").val();
            if (sal.toString() != "")
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        $(tablaReport).show();
                        document.getElementById("tablaReportBody").innerHTML = this.responseText;

                    }
                };
                xmlhttp.open("GET", "<?php echo base_url() ?>SearchNIT/EmployeeNIT?sal=" + sal, true);
                xmlhttp.send();
            }

        }


    </script>




