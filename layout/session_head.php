<head>
    <!-- Materialize Master -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/materialize.min.css">

    <script src="../assets/js/materialize.js"></script>
    <script src="../assets/js/materialize.min.js"></script> -->
    <!-- end material -->
	
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="../assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../assets/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	<script src="../assets/js/jquery-3.1.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/customjs.js"></script>
</head>


<header class="main-header">
<div class="e-head">

<div class="row">
<?php 
    
    include('../controller/e_config.php');

    $default = "SELECT * FROM default_options";

                $qry = mysqli_query($conn, $default);

                while ($set = mysqli_fetch_assoc($qry)) {
            
                   $lg   = $set['logo'];
                   $sch  = $set['school_name'];

              ?>
              <div class="col-sm-4">
                  <a href="../Views/dashboard.php"><img src="defaults/<?php echo $lg; ?>" height="50px" width="50"></a>
             </div>
             <div class="col-sm-4" style="font-family: Tahoma, sans-serif;">
                 <center><h4><?php echo $sch; ?></h4></center>
             </div>
              <?php
            } mysqli_free_result($qry);
 ?>
 <div class="col-sm-4">
    <div align="right">
 	<i class="fa fa-user"></i> <?php echo " ". $user. "  "; ?>
	<a href="../Views/logout.php"><button class="btn btn-danger">Logout</button></a>
    </div>
 </div>
</div>
</div>
</header>

