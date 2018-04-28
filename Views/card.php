<?php 
 
	
session_start();
 if (!empty($_SESSION['username'])) {

 	$user = $_SESSION['username'];

 	include("../layout/session_head.php");

 	

 	if (isset($_GET['id'])) {
 		
 	$id = $_GET['id'];

 	$retrv = "SELECT * FROM user_reg_card WHERE id='$id'";

 	$rst = mysqli_query($conn, $retrv);

 	while ($row = mysqli_fetch_assoc($rst)) {
 	
 		$stn = $row['f_name'].' '.$row['l_name'];
 		$cn  = $row['card_number'];
 		$dob = $row['date_of_birth'];
 		$cls = $row['class'];
 		$cy  = $row['cycle'];
 		$img = $row['user_image'];
 		$pob = $row['place_of_birth'];
 	
 		
 	?>
 	
 	<div class="e-container">
 	<section class="invoice">
 		<div class="row" style="background: #052d71; color: #fff; padding: 10px; border-radius: 5px;">
 		    <?php 
 		    	$default = "SELECT * FROM default_options";

 		        $qry = mysqli_query($conn, $default);

 		        while ($set = mysqli_fetch_assoc($qry)) {
 			
 			       $lg   = $set['logo'];
 			       $sch  = $set['school_name'];
 		   
 		          ?>
       		    <div class="col-sm-4">
       		   	 <img src="defaults/<?php echo $lg; ?>" class="img-circle" height="60px" width="60px" alt="logo">
       		    </div>
       		    <div class="col-sm-4">
       		     <center><strong><?php echo $sch; ?></strong></center>
       			  </div>
         			<div class="col-sm-4">
         			 <img src="images/<?php echo $lg; ?>" class="" height="60px" width="60px" align="right" alt="flag">
         			</div>
       			<?php 
       			} 
       			mysqli_free_result($qry);
       			?>
 		</div>
 		  <hr>
 	<div class="row">
    <div class="col-md-2">
       <dt><img src="images/<?php echo $img; ?>" height="150px" width="150px"></dt>
    </div>
    <div class="col-md-6">
    <div class="box box-solid">
      <div class="box-body">
        <dl class="dl-horizontal">
          <dt>STUDENT'S NAME:    <?php echo $stn; ?></dt><br>
          <dt>DATE OF BIRTH:     <?php echo $dob; ?></dt><br>
          <dt>PLACE OF BIRTH:    <?php echo $pob; ?></dt><br>
          <dt>CLASS:             <?php echo $cls; ?></dt><br>
          <dt>CYCLE:             <?php echo $cy; ?></dt>
          <dd>
             <hr size="5px" style="background: #000;">

             <?php 
              $text=$cn;
              echo "<img alt='testing' src='barcode.php?codetype=Code39&size=40&text=".$text."&print=true' width='300px;'/>";
              ?>
          </dd>
        </dl>
      </div>
    </div>
    </div>

 	</div>
 		<div class="row no-print">
            <div class="col-xs-12">
              <a href="" target="_blank" class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
             
            </div>
            <div align="right">
            	 <a href="manage_lib.php?v_card" class="btn btn-default pull-right" ><i class="fa fa-chevron-left"></i>Back to List</a>
            </div>
        </div>
     </section>
 	</div>
 	<?php
    }
   }
 } else {

 	header('Location: ../index.php');
 }
 ?>