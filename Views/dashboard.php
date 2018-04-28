
<?php 

include("../layout/header.php");

// $conn = mysqli_connect("localhost", "root", "", "elibrary");
// 	if (mysqli_connect_errno($conn)) {
// 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
// 	} else {
// 		echo 'Connection success';
// }

include('../controller/e_config.php');

session_start();

if (!empty($_SESSION['username'])) {

	// include('../functions.php');

	$user = $_SESSION['username'];
	
	include("../layout/session_head.php");
	
	?>
	<div class="e-container">
		<script type="text/javascript">
			$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15 // Creates a dropdown of 15 years to control year
			});
		</script>

		<div align="center" onload="time()">
			<div class="alert alert-info">
				<strong>Hello <i class="fa fa-user"></i><?php echo " <span style='color: red;'>".$user."</span> "; ?> welcome to e-Library <i class="fa fa-dashboard"></i> <h5 id="time"></h5> <h5 id="date"></h5>
			</div>
		</div>
		<hr>
		<div class="row">
			 <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h5>Add Book <i class="fa fa-plus-square"></i></h5>
                  <p>Add new book to e-library</p>
                </div>
                <a href="dashboard.php?add-book" class="small-box-footer">Go <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h5>View Books <i class="fa fa-eye"></i></h5>
                  <p>Check books in stock</p>
                </div>
                <a href="view_book.php" class="small-box-footer">Go <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h5>Borrow Desk <i class="fa fa-shopping-cart"></i></h5>
                  <p>Book lending and return</p>
                </div>
                <a href="dashboard.php?borrow-desk" class="small-box-footer">Go <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h5>Manage <i class="fa fa-gears"></i></h5>
                  <p>Library configurations</p>
                </div>
                <a href="manage_lib.php" class="small-box-footer">Go <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

		</div>

		<?php 
    #----------------------------ADD BOOKS TO LIBRARY----------------------------------------------#
	#----------------------------------------------------------------------------------------------#
if (isset($_GET['add-book']) && is_string($_GET['add-book'])) {
	?>
		<hr>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<form action="" method="post" id="form">
					<div class="form-group">
						<label for="bt">BOOK TITLE: </label>
						<input type="text" name="book_title" id="bt" class="form-control">
					</div>
					<div class="form-group">
						<label for="ba">BOOK AUTHOR: </label>
						<input type="text" name="author" id="ba" class="form-control">
					</div>
					<div class="form-group">
						<label for="cost">COST: </label>
						<input type="phone" name="cost" id="cost" class="form-control">
					</div>
					<div class="form-group">
					<label>SELECT BOOK CATEGORY:</label>
					<select name="category[]" class="browser-default">
						<option value="" disabled selected>------</option>
						<option value="p_art">Pure Art</option>
						<option value="p_scn">Pure Science</option>
						<option value="s_scn">Social Science</option>
					</select>
					</div>
					<div class="form-group">
						<label for="edition">EDITION: </label>
						<input type="number" name="edition" id="edition" class="form-control" min="1">
					</div>
					<div class="form-group">
						<label for="date">DATE PUBLISHED: </label>
						<input type="date" name="published_date" class="datepicker">
					</div>
					<div class="form-group">
						<input type="submit" id="submit" name="add" class="btn btn-info" value="Save">
						<input type="reset" value="Reset" class="btn btn-danger" style="float: right;">
					</div>
				</form>
				<hr>
				<div>
					<a href="dashboard.php"><button class="btn btn-default">Reload...</button></a>
				</div><br>

				
			</div>
			<div class="col-sm-3"></div>
		</div>

	<?php
}
#--------------START ADD BOOK PROCESS ---------------------#

if (isset($_REQUEST['add']) && array_key_exists('add', $_POST)) {

		$bt     = $_POST['book_title'];
		$author = $_POST['author'];
		$cost   = $_POST['cost'];
		$edition = $_POST['edition'];
		$pd     = $_POST['published_date'];
        $cat    = join('', $_POST['category']);

		if ($bt != '' && $author != '' && $cost != '' && $pd != '') {

		$add_q = "INSERT INTO e_books(book_title, author, cost, category, edition, published_date)
				  VALUES('$bt','$author','$cost','$cat','$edition','$pd')";
		$add = mysqli_query($conn, $add_q);

		if ($add) {
			
			?>
		
				<div class="alert alert-success" align="center">
					<strong>Success!</strong> a book added.
				</div>
			<?php
			} else {
			?>
	
				<div class="alert alert-danger" align="center">
					<strong><?php echo mysqli_error(); ?></strong>
				</div>
			<?php
		}
	  } else{

	  	?>
			
	  		<div class="alert alert-warning" align="center">
	  			<strong>All Fields are required!</strong>
	  		</div>
 
	  	<?php
	  }
}

#............../END ADD BOOK PROCESS ----------------------#

#----------BORROW OPERATIONS------------------------------------

if (isset($_GET['borrow-desk']) && is_string($_GET['borrow-desk'])) {
		
		?>
		<hr>
		<div class="row">
			<div class="col-sm-8">
				<div class="alert alert-info">
					 
					 <strong><center>Borrow Desk</center></strong>	
					 
				</div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<form action="" method="post">
							<div class="form-group">
								<label>Student's card number:</label>
								<input type="text" name="card_number" class="form-control" placeholder="card number">
							</div>
							<div class="form-group">
								<label>Book registration Code:</label>
								<input type="text" name="book_code" class="form-control" placeholder="Book code">
							</div>
							<div class="form-group">
								<input type="submit" name="request" class="btn btn-primary" value="Request">
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="alert alert-info">
					<strong>
						<center>Account check Desk</center>
					</strong>
				</div>

				<?php 
				if (isset($_REQUEST['request'])) {

					$c_num  = $_POST['card_number'];
					$b_code = $_POST['book_code'];



					$get_reg = "SELECT * FROM book_registry WHERE serial_number='$b_code'";
					$reg_book = mysqli_query($conn, $get_reg);

					if (!mysqli_num_rows($reg_book) > 0) {
						
					?>
						<div class="alert alert-danger">
							Unknown card number or book code!
						</div>
					<?php
					}

					while ($checks = mysqli_fetch_assoc($reg_book)) {
						
					$b_id  = $checks['book_id'];
					$b_num = $checks['serial_number'];

					$check = "SELECT * FROM user_borrow WHERE card_number='$c_num'";

					$rst = mysqli_query($conn, $check);

					#------check expiry date---------------

					$count = mysqli_num_rows($rst); #------Check default count
					

					#check expiry date ends.....

					

					$get_user = "SELECT * FROM user_reg_card WHERE card_number='$c_num'";
					$result = mysqli_query($conn, $get_user);

					$get_books = "SELECT * FROM e_books WHERE id='$b_id'";
					$set_book  = mysqli_query($conn, $get_books);

					while ($bk = mysqli_fetch_assoc($set_book)) {
						
						$bk_name = $bk['book_title'];
						$bk_auth = $bk['author'];
						$bk_edit = $bk['edition'];
						$bk_cost = $bk['cost'];

					while ($user_info = mysqli_fetch_assoc($result)) {
						
						$stu_tb_id   = $user_info['id'];
						$stu_name    = $user_info['f_name'].' '.$user_info['l_name']; 



						$get_max = "SELECT * FROM default_options";
						$max = mysqli_query($conn, $get_max); 

						?> <table class="table"> <?php
                         
					    while ($row = mysqli_fetch_assoc($max)) {

								
								$mx_b = $row['max_book'];
								$max_day = $row['due_day'];


						   while ($_row == mysqli_fetch_assoc($rst)) {
											
								    $user = $_row['student_name'];
									$book = $_row['book_title'];
									$edit = $_row['edition'];

									$d_brwd = $_row['date_borrowed'];

									$current_date = time();
									$proc_date = strtotime($d_brwd);

									$cal_date = $current_date - $proc_date;

									$day = floor($cal_date/(60 * 60 * 24));

									$day_diff = $day - $max_day;

									$fine = getDueDateFine();

									$cost = $fine * $day_diff * $count;


				           if ($day > $max_day && $day_diff > 0) {
										
								?>
								<div class="alert alert-danger">
									Mr/Ms. <?php echo $user; ?>
									Exeeded return date for: <?php echo $book; ?> <br>
									Borrowed on: <?php echo $d_brwd; ?> <br>
									Lasted with you for: <?php 
												
									if ($day_diff > 1) {

										echo $day_diff . " days";
									} else {

										echo $day_diff . " day"; 
									}

									?> <br>
									You fine is : <?php echo $cost; ?>

								</div>
								
								<?php 			
								
									
						  }
							   


						} mysqli_free_result($rst);

						if (!$count > 0) {
							
							$brw_req = "INSERT INTO user_borrow(card_number,stu_tb_id,book_id,student_name,book_code,book_title,book_author,edition,book_cost)
						VALUES('$c_num','$stu_tb_id','$b_id','$stu_name','$b_code','$bk_name','$bk_auth','$bk_edit','$bk_cost')";

							$save_brw = mysqli_query($conn, $brw_req);

							if ($save_brw) {
									
									?>
								<div class="alert alert-success">
									You Borrowed successfully
								</div>
									<?php

							} else {

								?>
								<div class="alert alert-danger">
									<?php echo mysqli_error(); ?>
								</div>
								<?php
							}
						}				

			    } mysqli_free_result($max);

				?>
				</table>
				<?php 
		   } mysqli_free_result($result);

	   } mysqli_free_result($set_book);

	} mysqli_free_result($reg_book);

}  ?>
			</div>

		</div>
<?php } }?>
</div>
