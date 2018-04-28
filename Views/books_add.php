<?php 

session_start();

if (!empty($_SESSION['username'])) {
	
	
	$user = $_SESSION['username'];

	include("../layout/session_head.php");
	?>
	<div class="e-container">
		<div align="center">
			<div class="alert alert-success">
			<strong>Hello <?php echo " <span style='color: red;'>".$user."</span> "; ?>welcome to e-Library</strong>
		    </div>
		</div><hr>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<form action="" method="post" role="form" data-toggle="validator">
					<div class="form-group">
						<label for="bt" class="control-label">BOOK TITLE: </label>
						<input type="text" name="book_title" id="bt" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="ba" class="control-label">BOOK AUTHOR: </label>
						<input type="text" name="author" id="ba" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="cost" class="control-label">COST: </label>
						<input type="phone" name="cost" id="cost" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="date" class="control-label">DATE PUBLISHED: </label>
						<input type="date" name="published_date" id="date" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="submit" name="add" class="btn btn-success" value="Save">
						<input type="reset" value="Reset" class="btn btn-danger" style="float: right;">
					</div>
				</form>
				<hr>
				<div>
					<a href="dashboard.php"><button class="btn btn-default">Back</button></a>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
		
	
	<?php

	include('../controller/e_config.php');

	if (isset($_REQUEST['add'])) {
		
		$sn     = $_POST['serial_number'];
		$bt     = $_POST['book_title'];
		$author = $_POST['author'];
		$cost   = $_POST['cost'];
		$pd     = $_POST['published_date'];

		#if ( $bt != '' && $author != '' && $cost != '' && $pd != '') {

		$add_q = "INSERT INTO e_books(book_title, author, cost, published_date)
				  VALUES('$bt','$author','$cost','$pd')";
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
	  #} else{

	  	?>
			<!-- <br>
	  		<div class="alert alert-warning" align="center">
	  			<strong>All Fields are required!</strong>
	  		</div> -->
</div>
	  	<?php
	  #}
	}

	include("../layout/footer.php");

} else {

	header("Location: ../index.php");
}

 ?>