


<div class="main-panel">

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edite Su Informacion</h4>
                        </div>
                        <div class="content">
                            <form>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Empresa</label>
                                            <input type="text" class="form-control border-input" disabled placeholder="Empresa" value="Web Buisness">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" class="form-control border-input" value="" placeholder="<?php echo $this->session->dataEmpleados[0]["usuario"];?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control border-input"  value="" placeholder="<?php echo $this->session->dataEmpleados[0]["password"];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre Completo</label>
                                            <input type="text" class="form-control border-input"  value="" placeholder="<?php echo $this->session->dataEmpleados[0]["Nombre_Completo"];?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="text" class="form-control border-input"  value="" placeholder="<?php echo $this->session->dataEmpleados[0]["Telefono"];?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Direccion</label>
                                            <input type="text" class="form-control border-input"  value="" placeholder="<?php echo $this->session->dataEmpleados[0]["Direccion"];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Actualizar Data</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





