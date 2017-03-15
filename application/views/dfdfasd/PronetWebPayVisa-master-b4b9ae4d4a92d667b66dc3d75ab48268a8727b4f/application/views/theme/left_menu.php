<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element"> <span>
            <img alt="image" class="img-circle" src="<?php echo base_url('assets/img/profile_small.jpg'); ?>" />
          </span>
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->loged['UserName2'];  ?></strong>
            </span> <span class="text-muted text-xs block">Rol  <b class="caret"></b></span> </span> </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
              <li><a href="<?php echo base_url("login/logout"); ?>">cerrar sesi&oacute;n</a></li>
            </ul>
          </div>
          <div class="logo-element">
            Proval
          </div>
        </li>
      </ul>
  </div>
</nav>
