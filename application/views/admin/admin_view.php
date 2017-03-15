
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
            <li class="active">
                <a href="<?php echo base_url() ?>home">
                    <i class="ti-user"></i>
                    <p>Pefil de Usuario</p>
                </a>
            </li>
            <li>
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
                <a href="<?php echo base_url() ?>Reporte1">
                    <i class="ti-view-list-alt"></i>
                    <p>Reporte Empleados por Sueldo</p>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="main-panel">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
<!--                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1">algo1</span>
                    <span class="icon-bar bar2">akkgjdf</span>
                    <span class="icon-bar bar3">dfad</span>-->
                </button>
                <a class="navbar-brand" href="#">Perfil de Usuario</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ti-panel"></i>
                            <p>Stats</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ti-bell"></i>
                            <p class="notification">5</p>
                            <p>Notifications</p>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Notification 1</a></li>
                            <li><a href="#">Notification 2</a></li>
                            <li><a href="#">Notification 3</a></li>
                            <li><a href="#">Notification 4</a></li>
                            <li><a href="#">Another notification</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="ti-settings"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="card card-user">
                        <div class="image">
                            <img src="<?php echo base_url() . "assets/main/img/" ?>background.jpg" alt="slgo"/>
                        </div>
                        <div class="content">
                            <div class="author">
                                <img class="avatar border-white" src="<?php echo base_url() . "assets/main/img/" ?>faces/face-2.jpg" alt="..."/>
                                <h4 class="title">Chet Faker<br />
                                    <a href="#"><small>@chetfaker</small></a>
                                </h4>
                            </div>
                            <p class="description text-center">
                                "I like the way you work it <br>
                                No diggity <br>
                                I wanna bag it up"
                            </p>
                        </div>
                        <hr>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <h5>12<br /><small>Files</small></h5>
                                </div>
                                <div class="col-md-4">
                                    <h5>2GB<br /><small>Used</small></h5>
                                </div>
                                <div class="col-md-3">
                                    <h5>24,6$<br /><small>Spent</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Team Members</h4>
                        </div>
                        <div class="content">
                            <ul class="list-unstyled team-members">
                                <li>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="avatar">
                                                <img src="<?php echo base_url() . "assets/main/img/" ?>faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            DJ Khaled
                                            <br />
                                            <span class="text-muted"><small>Offline</small></span>
                                        </div>

                                        <div class="col-xs-3 text-right">
                                            <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="avatar">
                                                <img src="<?php echo base_url() . "assets/main/img/" ?>faces/face-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            Creative Tim
                                            <br />
                                            <span class="text-success"><small>Available</small></span>
                                        </div>

                                        <div class="col-xs-3 text-right">
                                            <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="avatar">
                                                <img src="<?php echo base_url() . "assets/main/img/" ?>faces/face-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            Flume
                                            <br />
                                            <span class="text-danger"><small>Busy</small></span>
                                        </div>

                                        <div class="col-xs-3 text-right">
                                            <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Profile</h4>
                        </div>
                        <div class="content">
                            <form>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Company</label>
                                            <input type="text" class="form-control border-input" disabled placeholder="Company" value="Creative Code Inc.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control border-input" placeholder="Username" value="michael23">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control border-input" placeholder="Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Company" value="Chet">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Last Name" value="Faker">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control border-input" placeholder="Home Address" value="Melbourne, Australia">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control border-input" placeholder="City" value="Melbourne">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control border-input" placeholder="Country" value="Australia">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="number" class="form-control border-input" placeholder="ZIP Code">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>About Me</label>
                                            <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">Oh so, your weak rhyme
You doubt I'll bother, reading into it
I'll probably won't, left to my own devices
But that's the difference in our opinions.</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script type="text/javascript">
        // $("#pnLogoutButon").click(function(e){
    
        function CloseSession()
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //   document.getElementById("txtHint").innerHTML = this.responseText;
                    location.reload();
                }
            };
            xmlhttp.open("GET", "<?php echo base_url() ?>User/logout", true);
            xmlhttp.send();
        }
	
   
    </script>




