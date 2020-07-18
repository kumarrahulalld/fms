<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>

<nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="http://localhost/fms">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card col-4 rounded mx-auto d-block m-5">
    <h5 class="card-header info-color white-text text-center py-4 mt-2">
    <strong>Authentication </strong>
  </h5>    
        <form class="text-center" style="color: #757575;" action="check" method="post">
        <div class="md-form">
        <input class="form-control" type="password" id="Password" name="password" placeholder="Enter Authenticator App Code">
</div>
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"  type="submit">Sign in</button>
            <br/>
            <span class="text-danger wrap-text"><?php echo form_error("password");?></span>
            <br/>
        </form>
            
        </div>




        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
<?php  include('Footer.php');?>
</body>

</html>