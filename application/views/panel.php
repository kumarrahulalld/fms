<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>
<style>
    .card-img-top{
        max-height:200px;
        max-width:300px;
          display:block;
    margin:auto;
    }
    .card{
        
        max-height:600px;
    }
</style>
<nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                     <li class="nav-item" role="presentation"><a class="nav-link font-weight-bold" href="#"><?php echo "Welcome - ". $this->session->userdata('isa')->NAME . " (Admin)" ?></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link font-weight-bold" href="https://172.1696.251//Authenticator/panel">Home</a></li>
                    
                    <li class="nav-item" role="presentation"><a class="nav-link font-weight-bold" href="https://172.1696.251//User/logout">Log Out</a></li>

                </ul>
            </div>
        </div>
    </nav>
<!--/.Navbar -->
<div class="row row-cols-1 row-cols-md-2 row-cols-md-3 ">
  <div class="col mb-1">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top img-fluid" src="/admingif/u.gif"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body" style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">Users Operations</h4>
        <!--Text-->
        <p class="card-text"> Add/Update/Delete Users from this Section. </p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
       
       <div aria-label="1">
  

       
       
        <a role="button" class="btn btn-outline-success waves-effect" href="https://172.1696.251//User/index">Add</a>
        </br>
        <a class="btn btn-outline-danger waves-effect" href="https://172.1696.251//User/select">Update</a>
        </br>
        <button type="button" class="btn btn-outline-info waves-effect"><a href="https://172.1696.251//User/active">Activate</a></button>
        </br>
        <button type="button" class="btn btn-outline-primary waves-effect"><a href="https://172.1696.251//User/deactive">Deactivate</a></button>
            </div>

      </div>

    </div>
    <!-- Card -->
  </div>
  <div class="col mb-1">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top img-fluid" src="/admingif/f.gif"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body"style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">File Operations</h4>
        <!--Text-->
        <p class="card-text">Here You Can Track & View Details of Files.</p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        
        <button type="button" class="btn btn-outline-info waves-effect"><a href="https://172.1696.251//User/tfile">Track File</a></button>
        </br>
        <button type="button" class="btn btn-outline-primary waves-effect"><a href="https://172.1696.251//User/vfile">View File Details</a></button>
         </br>  </br>  </br> </br>
 </br>  
      </div>

    </div>
    <!-- Card -->
  </div>
  <div class="col mb-1">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top img-fluid" src="/admingif/d.gif"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body"style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">Department Operations</h4>
        <!--Text-->
        <p class="card-text">Here You Can Add , Update & Delete Departments</p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <div  aria-label="7">
        <button type="button" class="btn btn-outline-success waves-effect"><a href="https://172.1696.251//User/AddDep">Add</a></button>
        </br>
        <button type="button" class="btn btn-outline-info waves-effect">Update </button>
        </br>
                <button type="button" class="btn btn-outline-danger waves-effect">Delete</button>
                </br>  </br> </br>
         </div>

        

      </div>

    </div>
    <!-- Card -->
  </div>
  <div class="col mb-1">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top img-fluid" src="/admingif/r.gif"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body"style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">Roles Operations</h4>
        <!--Text-->
        <p class="card-text">Here You Can Add , Update , Delete Roles & Can Define Aceessibility For Roles.</p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <div aria-label="7">
        <button type="button" class="btn btn-outline-success waves-effect"><a href="https://172.1696.251//User/Addrol">Add Role</a></button>
         </br>
        <button type="button" class="btn btn-outline-danger waves-effect"><a href="https://172.1696.251//User/addacc">Add Access</a></button>
        </br>
        
        <button type="button" class="btn btn-outline-info waves-effect"><a href="https://172.1696.251//User/remacc">Remove Access</a></button>
        </br>  </br> </br>
            </div>
      </div>

    </div>
    <!-- Card -->
    
  </div>
  <div class="col mb-1">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top img-fluid" src="/admingif/o.gif">
        <a href="#!">
          <div class=" rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body"style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">Other Operations</h4>
        <!--Text-->
        <p class="card-text">Here You Can Retrive Forgot Password.</p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <div class="btn-group" role="group" aria-label="2">
        <button type="button" class="btn btn-outline-success waves-effect"><a href="https://172.1696.251//User/forgot">Reset Password</a></button>
         
      </div>
      </div>

    </div>
</div>
  <div class="col mb-1">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top img-fluid" src="/admingif/v.gif">
        <a href="#!">
          <div class=" rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body"style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">View</h4>
        <!--Text-->
        <p class="card-text">Here You Can View Reports & Retrive Forgot Password.</p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <div  aria-label="7">
       
         
        <button type="button" class="btn btn-outline-danger waves-effect"><a href="https://172.1696.251//User/suser">User Details</a></button>
        
        </br>
        
        
        <button type="button" class="btn btn-outline-primary waves-effect"><a href="https://172.1696.251//User/srole">Role Details</a></button>
        </br>
  
         <button type="button" class="btn btn-outline-orange waves-effect"><a href="https://172.1696.251//User/saccess">User Access log</a></button>
   
        <button type="button" class="btn btn-outline-info waves-effect"><a href="https://172.1696.251//User/sdep">Department Details</a></button>
      </div>
</div>
    </div>
</div>
</div>
<?php  include('Footer.php');?>
</body>
</html>