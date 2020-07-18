<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>

    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="https://filetracking.velomia.tech/">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card col-4 rounded mx-auto d-block m-5">
    
    <h5 class="card-header info-color white-text text-center py-4 mt-2">
    <strong>Sign in</strong>
  </h5>
  <div class="card-body px-lg-5 pt-0">
       <img class="rounded mx-auto d-block m-2" src="<?php echo base_url(); ?>public/assets/img/au.png">
        <form class="text-center" style="color: #757575;" action="<?php base_url();?>Welcome/login" method="post">
        <div class="md-form">
        <input class="form-control" type="email" id="Email" name="email" required="" placeholder="Email address" autofocus="">
</div>
<div class="md-form">
        <input class="form-control" type="password" id="Password" name="password" required="" placeholder="Password">
</div>
            <button
            class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="login" type="submit">Login </button>
        </form>
        <a class="forgot-password" href="javascript:Alert();">Forget Password?</a>
        <span class="text-danger wrap-text"><?php echo form_error("email");?></span>

        <span class="text-danger wrap-text"><?php echo form_error("password");?></span>
    </div>
</div>
<?php  include('Footer.php')?>
</body>

</html>