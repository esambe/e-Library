<?php 
	
	
	session_start();

	if (!empty($_SESSION['username'])) {
		
		// include('../functions.php');

		$user = $_SESSION['username'];

		include("../layout/session_head.php");
        
	?>
		<div class="e-container">
		<div align="center">
			<div class="alert alert-info">
				<strong>Hello <i class="fa fa-user"></i><?php echo " <span style='color: red;'>".$user."</span> "; ?>welcome to e-Library <i class="fa fa-sitemap"></i> </strong>
			</div>
		</div>
		<hr>
			<div class="row" onload="clock()">
			   <div class="col-lg-3 col-xs-6">

			   	 <div class="small-box bg-aqua">
	                <div class="inner">
	                  <h5>Create Library Card <i class="fa fa-users"></i></h5>
	                </div>
	                <a href="manage_lib.php?c_card" class="small-box-footer">Go <i class="fa fa-arrow-circle-right"></i></a>
                 </div>

                 <div class="small-box bg-aqua">
	                <div class="inner">
	                  <h5>View cards <i class="fa fa-video-camera"></i></h5>
	                </div>
	                <a href="manage_lib.php?v_card" class="small-box-footer">Go <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             	
             	 <div class="small-box bg-aqua">
	                <div class="inner">
	                  <h5>Configuartions <i class="fa fa-cogs"></i></h5>
	                </div>
	                <a href="manage_lib.php?s_conf" class="small-box-footer">Go <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
                 <div class="small-box bg-aqua">
	                <div class="inner">
	                  <h5 id="date"></h5>
	                  <h5 id="time"></h5>
	                </div>
                 </div>
               </div>
               
               <!-- Display area -->
               <div class="col-lg-9 col-xs-6">

               	<?php 

               		if (isset($_GET['c_card'])) { 
            	?>
               		 <div class="alert alert-info">
               		 	<strong>Creating Library card</strong>
               		 </div>

               		 <div class="row">

               		 <div class="col-lg-12 col-xs-6">

               		 <form action="" method="post" enctype="multipart/form-data">
               		 <div class="row">
               		 	<div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
               		 		<label for="fname">FIRST NAME: </label>
               		 		<input type="text" name="f_name" id="fname" class="form-control" placeholder="first name">
               		 	</div>
               		
               		 	<div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
               		 		<label for="lname">LAST NAME: </label>
               		 		<input type="text" name="l_name" id="lname" class="form-control" placeholder="last name">
               		 	</div>
               		 </div>
               		 <div class="row">
               		 	<div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
               		 		<label for="dob">DATE OF BIRTH: </label>
               		 		<input type="date" name="date_of_birth" id="dob" class="form-control">
               		 	</div>
               		 	<div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
               		 		<label for="pob">PLACE OF BIRTH: </label>
               		 		<input type="text" name="place_of_birth" id="pob" class="form-control" placeholder="place of birth">
               		 	</div>
               		 </div>
               		 <div class="row">
               		 	<div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
               		 		<label for="gname">GUARDIAN'S NAME: </label>
               		 		<input type="text" name="g_name" id="gname" class="form-control" placeholder="guardian's name">
               		 	</div>
               		 	<div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
               		 		<label for="gnumber">GUARDINA'S CELL NUMBER:</label>
               		 		<input type="phone" name="g_number" id="gnumber" class="form-control" placeholder="000000000">
               		 	</div>
               		 </div>
               		 	<script type="text/javascript">
               		 		
               		 	</script>
               		 <div class="row">
               		 	<div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
               		 		<label for="cycle">CYCLE: </label>
               		 		<select name="cycle[]" id="cycle" class="browser-default">
               		 			<option>--select cycle--</option>
               		 			<option value="1">1st Cycle</option>
               		 			<option value="2">2nd Cycle</option>
               		 		</select>
               		 	</div>

               		 	<div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" >
               		 		<label for="class">CLASS: </label>
               		 		<select name="class[]" id="class" class="browser-default">
               		 			<option data-group="SHOW" value="0">--select class--</option>
               		 			<option data-group="1" value="1">1</option>
               		 			<option data-group="1" value="2">2</option>
               		 			<option data-group="1" value="3">3</option>
               		 			<option data-group="1" value="4">4</option>
               		 			<option data-group="1" value="5">5</option>
               		 			<option data-group="2" value="L6">L<sup>6</sup></option>
               		 			<option data-group="2" value="U6">U<sup>6</sup></option>
               		 		</select>
               		 	</div>
               		 </div>
               		 <div class="row">
               		 	<div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-8">
               		 		<label for="img">UPLOAD IMAGE: </label>
               		 		<input type="hidden" name="MAX_FILE_SIZE" value="80000">
               		 		<input type="file" name="img" id="img" class="form-control">
               		 	</div>
               		 
               		 	<div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-8">
               		 		<input type="submit" name="create" class="btn btn-success" value="Create">
               		 		<input type="reset" name="reset" class="btn btn-danger" style="float: right;">
               		 	</div>
               		 </div>
               		 </form>

              		</div>
              		<div class="col-lg-4 col-xs-6">
              			
              		</div>
              		</div>
               	<?php

               		}
               		 #--------------------CREATE LIBRARY CARD----------------------

               		 if (isset($_REQUEST['create'])) {

               		 	$image = $_FILES['img']['name'];
               		 	$fname = $_POST['f_name'];
               		 	$lname = $_POST['l_name'];
               		 	$dob   = $_POST['date_of_birth'];
               		 	$gname = $_POST['g_name'];
               		 	$gnumber = $_POST['g_number'];
               		 	$pob   = $_POST['place_of_birth'];
               		 	$cycle = join('', $_POST['cycle']);
               		 	$class = join('', $_POST['class']);
               		 	$file_loc = $_FILES['img']['tmp_name'];
               			$folder="images/";
               		 		
               		 	
               		 	$mv = move_uploaded_file($file_loc,$folder.$image);

               		 	if ($cycle == 1 && $mv) {

               		 		$pref = setCycleOnePrefix();
               		 		$card_num = $pref.mt_rand(1000,9000);

               		 		$add = "INSERT INTO user_reg_card(f_name,l_name,card_number,date_of_birth,place_of_birth,g_name,g_number,cycle,class,user_image)
               		 		VALUES('$fname','$lname','$card_num','$dob','$pob','$gname','$gnumber','$cycle','$class','$image')";

               		 	    $rst = mysqli_query($conn, $add);

		               		 	if ($rst) {
		               		 		
		        ?>
		               		 		<div class="alert alert-success">
		               		 			<strong>Card created successfully</strong>
		               		 		</div>
		    	<?php
		               		 	} else {
		        ?>
		               		 		<!-- <div class="alert alert-danger">
		               		 			<strong><?php  //mysqli_error(); ?></strong>
		               		 		</div> -->
		        <?php 
		               		 	}
		               		
               		 	}
               		 	if ($cycle == 2 && $mv) {
               		 		
               		 		$pref = setCycleTwoPrefix();
               		 		$card_num = $pref.mt_rand(1000,9000);

               		 		$add = "INSERT INTO user_reg_card(f_name,l_name,card_number,date_of_birth,place_of_birth,g_name,g_number,cycle,class,user_image)
               		 		VALUES('$fname','$lname','$card_num','$dob','$pob','$gname','$gnumber','$cycle','$class','$image')";

               		 	    $rst = mysqli_query($conn, $add);

		               		 	if ($rst) {
		        ?>
		               		 		<div class="alert alert-success">
		               		 			<strong>Card created successfully</strong>
		               		 		</div>
		            <?php
		               		 	} else {
		               	?>
		               		 		<div class="alert alert-danger">
		               		 			
		               		 		</div>
		            <?php 
		               		 	}
               		 	
               		 }
               	} 
               		#-----VIEW CARDS SECTION--------------------------
               		if (isset($_GET['v_card'])) {
               			
               			?>
               			<div class="alert alert-info">
               				<strong>List of created cards</strong>
               			</div>
               			<?php

               			$get_card = "SELECT * FROM user_reg_card";

               			$rst = mysqli_query($conn, $get_card);

               			?>

               			<div style="overflow-x: auto;">
               			<hr>
						<div class="form-group">
							 <input id="inputfilter" type="text" class="col-sm-4 form-control" placeholder="search filter">
						</div>
					    <hr>
               				<table class="table" id="filterme">
               					<thead>
               						<tr>
               							<th>Card Number</th>
               							<th>Student Name</th>
               							<th>Date of Birth</th>
               							<th>Place of Birth</th>
               							<th>Guardian's Name</th>
               							<th>Guardian's No.</th>
               							<th>Cycle</th>
               							<th>Class</th>
               							<th>Image</th>
               						</tr>
               					</thead>
               					<tbody>
               						<?php 
               						while ($row = mysqli_fetch_assoc($rst)) {
               							
               							$id  = $row['id'];
               							$pob = $row['place_of_birth'];
               							$cn  = $row['card_number'];
               							$stn = $row['f_name'].' '.$row['l_name'];
               							$dob = $row['date_of_birth'];
               							$gn  = $row['g_name'];
               							$gno = $row['g_number'];
               							$cy  = $row['cycle'];
               							$cls = $row['class'];
               							$img = $row['user_image'];
               							$fname = $row['f_name'];
               							$lname = $row['l_name'];
               						    
               						 ?>
               						<tr>
               							<td><?php echo $cn; ?></td>
               							<td><?php echo $stn; ?></td>
               							<td><?php echo $dob; ?></td>
               							<td><?php echo $pob; ?></td>
               							<td><?php echo $gn; ?></td>
               							<td><?php echo $gno; ?></td>
               							<td><?php echo $cy; ?></td>
               							<td><?php echo $cls; ?></td>
               							<td>
               								<img class="materialboxed" src="images/<?php echo $img; ?>" class="img-circle" alt="User Image" height="50px" width="50"/>
               							</td>
               					
               							<td>
               								<a href="card.php?id=<?php echo $id; ?>" class="btn btn-app"><i class="fa fa-edit"></i>Display</a>
               							</td>
               							<td>
               								<a href="../controller/user_manage.php?id=<?php echo $id; ?>&v_card" class="btn btn-app"><i class="fa fa-trash-o"></i>Delete</a>
               							</td>
               							<td>
               								<!-- <a href="manage_lib.php?v_card&si=<?php #echo $id; ?>" class="btn btn-app"><i class="fa fa-map-marker"></i>Status</a> -->
               								<a href="manage_lib.php?v_card&si=<?php echo $id; ?>">
               								<button type="button" class="btn btn-app" data-toggle="modal" data-target="#myModal"><i class="fa fa-map-marker"></i>Status</button>
               								</a>
               							</td>
               						</tr>
               					</tbody>
               				</table>

               				<?php 
		               				if ( isset($_GET['si']) ) {
		               				
		               				$id = $_GET['si'];

									$query_st = "SELECT * FROM user_borrow WHERE stu_tb_id=$id";

									$st = mysqli_query($conn, $query_st);

									
									if (mysqli_num_rows($st) > 0 ) {

									while ($row = mysqli_fetch_assoc($st)) {
										
										$_book    = $row['book_title'];
										$_author  = $row['book_author'];
										$_edition = $row['edition'];
										$_cost    = $row['book_cost'];
										$_date_b  = $row['date_borrowed'];

										
										?>
										 <div class="modal fade" id="status" role="document">
											<div class="modal-dialog">
											<div class="modal-content">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<div class="modal-body">
											 	<table class="table">
											 		<tbody>
											 			<tr>
											 				<td><?php echo $_book; ?></td>
											 				<td><?php echo $_author; ?></td>
											 				<td><?php echo $_edition; ?></td>
											 				<td><?php echo $_cost; ?></td>
											 				<td><?php echo $_date_b; ?></td>
											 			</tr>
											 		</tbody>
											 	</table>
										    </div>
										    </div>
										    </div>
										 </div>
										<?php 
										 
									}

									mysqli_free_result($st);
								    } else {

										?>
										<div class="modal fade" id="myModal" role="dialog">
											<div class="modal-dialog">
											<div class="modal-content">
											<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												
												  <p>Account clear</p>
												
										    </div>
										    <div class="modal-footer">
		                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                                    </div>
										    </div>
										    </div>
										 </div>
										<?php 
								    }

		               		    }

		               		}
		               		mysqli_free_result($rst);
               				?>
               			</div>
               			<?php
               		
               		}
               		#-------------END------------------------------------------

               		#----------SYSTEM CONFIGURATIONS --------------------------
                  
               		if (isset($_GET['s_conf'])) {
               			
               			$get = "SELECT * FROM default_options";

               			$rst = mysqli_query($conn, $get);

               			while ($row = mysqli_fetch_assoc($rst)) {
               				
               			$sn  = $row['school_name'];
               			$lg  = $row['logo'];
               			$sig = $row['signature'];
               			$dd  = $row['due_day'];
               			$mx  = $row['max_book'];
               			$fp  = $row['fc_prefix'];
               			$sp  = $row['sc_prefix'];
               			$fne = $row['due_fine'];

               			?>
               			<div class="alert alert-info">
               				<strong>System configurations </strong>
               			</div>

               			<!-- #SYSTEM DEFAULTS UPDATE -->
               			<div class="row">
               			
               			<div class="col-lg-8 col-xs-6">
               
                        <div class="row">
                           <div class="col-xs-10 col-sm-4 col-md-4 col-lg-6">
               				<form action="" method="post">
               					<div class="form-group">
               						<label for="scn">Set School name: </label>
               						<input type="text" name="school_name" id="scn" class="form-control" placeholder="Name of School..." value="<?php echo $sn; ?>">
               					</div>
               					<div class="form-group">
               						<input type="submit" name="school" class="btn btn-primary" value="Update">
               					</div>
               				</form>
               				</div>

               			    <div class="col-xs-10 col-sm-4 col-md-4 col-lg-6">
               				<form action="" method="post" enctype="multipart/form-data">
               					<div class="form-group">
               						<label>Upload Logo: </label>
               						<input type="hidden" name="MAX_FILE_SIZE" value="800000">
               						<input type="file" name="logo" class="form-control" value="<?php echo $lg; ?>">
               					</div>
               					<div class="form-group" align="right">
               						<input type="submit" name="u_logo" class="btn btn-primary" value="Update" >
               					</div>
               				</form>
               				</div>

               				<div class="col-xs-10 col-sm-4 col-md-4 col-lg-6">
               				<form action="" method="post" enctype="multipart/form-data">
               					<div class="form-group">
               						<label>Principal's signature(Scanned):</label>
               						<input type="hidden" name="MAX_FILE_SIZE" value="800000">
               						<input type="file" name="signature" class="form-control" value="">
               					</div>
               					<div class="form-group">
               						<input type="submit" name="_signature" class="btn btn-primary" value="Update">
               					</div>
               				</form>
               				</div>

               				<div class="col-xs-10 col-sm-4 col-md-4 col-lg-6">
               				<form action="" method="post" enctype="multipart/form-data">
               					<div class="form-group">
               						<label>School Stamp:</label>
               						<input type="hidden" name="MAX_FILE_SIZE" value="800000">
               						<input type="file" name="stamp" class="form-control">
               					</div>
               					<div class="form-group" align="right">
               						<input type="submit" name="s_stamp" class="btn btn-primary" value="Update">
               					</div>
               				</form>
               				</div>

               				<div class="col-xs-10 col-sm-4 col-md-4 col-lg-6">
               				<form action="" method="post">
               					<div class="form-group">
               						<label>Set Return Due day(s):</label>
               						<input type="number" name="due_day" class="form-control" placeholder="Day(s) in number" value="<?php echo $dd; ?>" min="1">
               					</div>
               					<div class="form-group">
               						<input type="submit" name="day" class="btn btn-primary" value="Update">
               					</div>
               				</form>
               				</div>

               			   <div class="col-xs-10 col-sm-4 col-md-4 col-lg-6">
               				<form action="" method="post">
               					<div class="form-group">
               					   <label>Maximum book can borrow in time:</label>
               					   <input type="number" name="max_book" class="form-control" value="<?php echo $mx; ?>" min="1" required="true">
               					</div>
               					<div class="form-group" align="right">
               						<input type="submit" name="max_borrow" class="btn btn-primary" value="Update">
               					</div>
               				</form>
               			   </div>

               			   <div class="col-xs-10 col-sm-4 col-md-4 col-lg-6">
               			   		<form action="" method="post">
               			   			<div class="form-group">
               			   				<label>Set card prefix for first cylce: </label>
               			   				<input type="text" name="f_prefix" class="form-control" value="<?php echo $fp; ?>" required="true">
               			   			</div>
               			   			<div class="form-group">
               			   				<input type="submit" name="fc_prefix" class="btn btn-primary" value="Update">
               			   			</div>
               			   		</form>
               			   </div>
               			   <div class="col-xs-10 col-sm-4 col-md-4 col-lg-6">
               			   		<form action="" method="post">
               			   			<div class="form-group">
               			   				<label>Set card prefix for second cylce: </label>
               			   				<input type="text" name="s_prefix" class="form-control" value="<?php echo $sp; ?>" required="true">
               			   			</div>
               			   			<div class="form-group" align="right">
               			   				<input type="submit" name="sc_prefix" class="btn btn-primary" value="Update">
               			   			</div>
               			   		</form>
               			   </div>

               			   <div class="col-xs-10 col-sm-4 col-lg-6">
               			   		<form action="" method="post">
               			   			<div class="form-group">
               			   				<label>Set payment after due date: </label>
               			   				<input type="phone" name="due_fine" class="form-control" value="<?php echo $fne; ?>" required="">
               			   			</div>
               			   			<div class="form-group">
               			   				<input type="submit" name="set_fine" class="btn btn-primary" value="Update">
               			   			</div>
               			   		</form>
               			   </div>
               			</div>
               			
						<?php 
               		    } mysqli_free_result($rst);

               		    #------------update max book borrow in time----------
               		    if (isset($_REQUEST['max_borrow'])) {
               		    	
               		    	$max = $_POST['max_book'];

               		    	$set_max_book = "UPDATE default_options SET max_book='$max'";

               		    	$max_save = mysqli_query($conn, $set_max_book);

               		    	if ($max_save) {
               		    		
               		    ?>
               		    		<div class="alert alert-success">
               		    			<strong>Max book borrow updated</strong>
               		    		</div>
               		    <?php
               		    	} else {
               		    ?>
               		    		<div class="alert alert-danger">
               		    			<strong><?php echo mysqli_error(); ?></strong>
               		    		</div>
               		    <?php
               		    	}
               		    }

               			#-------------Update Signature---------------------

               			if (isset($_REQUEST['_signature'])) {
               				
               				$sig       = $_FILES['signature']['name'];
               				$file_s    = $_FILES['signature']['tmp_name'];
               				$directory = "defaults/";

               				$store_sig = move_uploaded_file($file_s, $directory.$sig);

               				if ($store_sig) {
               					
               					$set_sig = "UPDATE default_options SET signature='$sig'";
               					$sig = mysqli_query($conn, $set_sig);

               					if ($sig) {
               						
               			?>
               						<div class="alert alert-success">
               							<strong>Signature updated succesfully</strong>
               						</div>
               			<?php
               					} else{
               			?>
               						<div class="alert alert-danger">
               							<strong><?php echo mysqli_error(); ?></strong>
               						</div>
               			<?php 
               					}

               				} else {
               			?>
               					<div class="alert alert-warning">
               						<strong>Invalid upload attempt!</strong>
               					</div>
               			<?php
               				}
               			}

               			#-------------UPDATE LOGO-------------------
               			if (isset($_REQUEST['u_logo'])) {
               				
               				$logo   = $_FILES['logo']['name'];
               				$file_l = $_FILES['logo']['tmp_name'];
               				$directory = "defaults/";

               				$store_logo = move_uploaded_file($file_l,$directory.$logo);

               				if ($store_logo) {
               					
               				    $set_logo = "UPDATE default_options SET logo='$logo'";
               				    $log = mysqli_query($conn, $set_logo);

               				    if ($log) {
               				    	
               				?>
               				    	<div class="alert alert-success">
               				    		<strong>Logo updated successfully</strong>
               				    	</div>
               				<?php
               				    }else{
               				?>
               				    	<div class="alert alert-danger">
               				    		<strong><?php echo mysqli_error(); ?></strong>
               				    	</div>
               				<?php
               				    }
               				} else {
               				?>
               					<div class="alert alert-warning">
               						<strong>Invalid upload attempt!</strong>
               					</div>
               				<?php
               				}
               			}

               			#---------------UPDATE SCHOOL NAME-----------------------

               			if (isset($_REQUEST['school'])) {
               				
               				$school = $_POST['school_name'];

               				$set_school = "UPDATE default_options SET school_name='$school'";

               				$schl = mysqli_query($conn, $set_school);

               				if ($schl) {
               					
               				?>
               					<div class="alert alert-success">
               						<strong>School updated successfully</strong>
               					</div>
               				<?php

               				} else {
               				?>
               					<div class="alert alert-danger">
               						<strong><?php echo mysqli_error(); ?></strong>
               					</div>
               				<?php
               				}
               			}

               			#------------- UPDATE DUE DAY -----------------
               		if (isset($_REQUEST['day'])) {
               			
               			$exp = $_POST['due_day'];

               			$set_day = "UPDATE default_options SET due_day='$exp'";

               			$day = mysqli_query($conn, $set_day);

               			if ($day) {
               				?>
               				<div class="alert alert-success">
               					<strong>Day updated successfully</strong>
               				</div>
               				<?php
               			}else{
               				?>
               				<div class="alert alert-danger">
               					<strong><?php echo mysqli_error(); ?></strong>
               				</div>
               				<?php
               			}
               		}

               		#-----------UPDATE SCHOOL STAMP---------------------

               		if (isset($_REQUEST['s_stamp'])) {
               			
               			$stmp   = $_FILES['stamp']['name'];
               			$stmp_l = $_FILES['stamp']['tmp_name'];
               			$directory = "defaults/";

               			$store_stamp = move_uploaded_file($stmp_l,$directory.$stmp);

               			if ($store_stamp) {
               				
               				$set_stamp = "UPDATE default_options SET stamp='$stmp'";

               				$st = mysqli_query($conn, $set_stamp);

               				if ($st) {
               					?>
               					<div class="alert alert-success">
               						<strong>Stamp updated successfully</strong>
               					</div>
               					<?php
               				}else{
               					?>
               					<div class="alert alert-danger">
               						
               					</div>
               					<?php
               				}
               			}else{
               				?>
               				<div class="alert alert-danger">
               					<strong>Invalid upload attempt</strong>
               				</div>
               				<?php
               			}
               		}

               		#-------------update first cycle prefix-----------

               		if (isset($_REQUEST['fc_prefix'])) {
               			
               			$fc_p = $_POST['f_prefix'];

               			$update_pr1 = "UPDATE default_options SET fc_prefix='$fc_p'";

               			$pr1_update = mysqli_query($conn, $update_pr1);

               			if ($pr1_update) {
               				?>
               				<div class="alert alert-success">
               					Prefix updated successfully for first cycle.
               				</div>
               				<?php 
               			} else {
               				?>
               				<div class="alert alert-danger">
               					
               				</div>
               		<?php
               			}
               		}

               		#--------------end for fc--------------

               		#----------Update second cycle prefix------------
               		if (isset($_REQUEST['sc_prefix'])) {
               			
               			$sc_p = $_POST['s_prefix'];

               			$update_pr2 = "UPDATE default_options SET sc_prefix='$sc_p'";

               			$pr2_update = mysqli_query($conn, $update_pr2);

               			if ($pr2_update) {
               		?>
               				<div class="alert alert-success">
               					Prefix updated successfully for second cycle.
               				</div>
               		<?php }  }

               		#------------end sc-----------------------------

               		#---------update due date fine------------------
               		if (isset($_REQUEST['set_fine'])) {
               			
               			$fine = $_POST['due_fine'];

               			$set_fine = "UPDATE default_options SET due_fine='$fine'";
               			$q_fine = mysqli_query($conn, $set_fine);

               			if ($q_fine) {
               		?>
               				<div class="alert alert-success">
               					Fine amount updated successfully.
               				</div>
               				<?php }else{ ?>

               				<div class="alert alert-danger">
               					Error!
               				</div>
							   
               		<?php 
               			}
               		}
               		#-----------End due fine---------------------------
               		?>

               		</div>
               			<!-- Ends -->
               		<div class="col-lg-4 col-xs-6">
               			  
               			<?php 

               			  $preview = "SELECT * FROM default_options";

               			  $stm = mysqli_query($conn, $preview);

               			  while ($prev = mysqli_fetch_assoc($stm)) {
               			  	
               			  	$scn = $prev['school_name'];
               			  	$lg  = $prev['logo'];
               			  	$pd  = $prev['due_day'];

               			?>
               			  	<div>
               			  		<label>Shool Name:</label><br>
               			  		<strong><h3><?php echo $scn; ?></h3></strong>
               			  	</div> 
							<hr>
               			  	<div>
               			  		<label>School Logo</label><br>
               			  		<img src="defaults/<?php echo $lg; ?>" alt="Logo" height="150px" width="150px">
               			  	</div>
               			<?php
               			  } mysqli_free_result($stm);
               			?>
               			</div>
               		</div>
               		<?php } #-------------End------------------------------------ ?>
               </div>
            </div>
		<div>
			<a href="dashboard.php"><button class="btn btn-defalut">Back</button></a>
		</div>
		</div>
		<?php
		} else {
		header("Location: ../index.php");
	}
 ?>