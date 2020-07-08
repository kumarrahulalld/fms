<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - VELOMIA_Filemgmt1.0</title>
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<!--Navbar -->
<nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="http://localhost/fms/Authenticator/panel">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
<!--/.Navbar -->
<div class="row row-cols-1 row-cols-md-3 m-5 p-5">
  <div class="col mb-4">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/04/15/18/05/computer-1331579_960_720.png"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body" style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">Users Opeartions</h4>
        <!--Text-->
        <p class="card-text">You Can Add , Update & Delete Users Using This Section. </p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
       
        <button type="button" class="btn btn-outline-success waves-effect"><a href="http://localhost/fms/User/index">Add User</a></button>
        <br/>
        <button type="button" class="btn btn-outline-danger waves-effect"><a href="http://localhost/fms/User/select">Update User</a></button>
        <br/>
        <button type="button" class="btn btn-outline-info waves-effect"><a href="http://localhost/fms/User/active">Activate User</a></button>
        <button type="button" class="btn btn-outline-primary waves-effect"><a href="http://localhost/fms/User/deactive">Deactivate User</a></button>


      </div>

    </div>
    <!-- Card -->
  </div>
  <div class="col mb-4">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2017/06/10/07/18/list-2389219_960_720.png"
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
        <button type="button" class="btn btn-outline-info waves-effect">Track File</button>
        <button type="button" class="btn btn-outline-primary waves-effect">View File Deatils</button>

      </div>

    </div>
    <!-- Card -->
  </div>
  <div class="col mb-4">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUVe5-xQ-1q7ba89gc8HpMoWDBmoyTu68cwgC_wP-EJO0C94Hm&usqp=CAU"
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
        <button type="button" class="btn btn-outline-success waves-effect"><a href="http://localhost/fms/User/AddDep">Add Department</a></button>
        <br/>
        <button type="button" class="btn btn-outline-danger waves-effect">Update Department</button>
        <br/>
        <button type="button" class="btn btn-outline-info waves-effect">Delete Department </button>

      </div>

    </div>
    <!-- Card -->
  </div>
  <div class="col mb-4">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSyrqaU4a-cwO9UAxsstKpYlPxVNw_K0xj5tMLZBs6i10IGpXyi&usqp=CAU"
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
        <button type="button" class="btn btn-outline-success waves-effect"><a href="http://localhost/fms/User/Addrol">Add Role</a></button>
        <br/>
        <button type="button" class="btn btn-outline-danger waves-effect"><a href="http://localhost/fms/User/addacc">Add Access</a></button>
        <br/>
        <button type="button" class="btn btn-outline-info waves-effect"><a href="http://localhost/fms/User/remacc">Remove Access</a></button>

      </div>

    </div>
    <!-- Card -->
    
  </div>
  <div class="col mb-4">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSSwx6Bg5TGGsmRym3GA7SKMGcZ7nKrt79gr9KaDEkMKrK9JrTU&usqp=CAU"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body"style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">Other Operations</h4>
        <!--Text-->
        <p class="card-text">Here You Can View Reports & Retrive Forgot Password.</p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <button type="button" class="btn btn-outline-success waves-effect"><a href="http://localhost/fms/User/forgot">Forgot Password</a></button>
        <br/>
        <button type="button" class="btn btn-outline-danger waves-effect">Generate User Reports</button>
        <br/>
        <button type="button" class="btn btn-outline-info waves-effect">Generate Files Report</button>
        <button type="button" class="btn btn-outline-primary waves-effect">Upcoming</button>

      </div>

    </div>
</div>

</body>
</html>