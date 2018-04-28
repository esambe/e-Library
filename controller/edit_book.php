<?php 

session_start();

if (isset($_SESSION['username'])) {

	$user = $_SESSION['username'];
	
	include("../layout/session_head.php");

	?>
	<div class="e-container">
		<div class="alert alert-info">
			<strong>Editing Book</strong>
		</div>

		<?php 

		if (isset($_GET['id'])) {
			
			$id = $_GET['id'];

			?>
				<div class="row">
					<div class="col-sm-6">
						<form action="" method="post">
							<div class="form-group">
								<label for="cost">ADD SERIAL NUMBER: </label>
								<input type="phone" name="serial_number" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="save" class="btn btn-success" value="Update">
							</div>
						</form>
						<div align="center">
							<a href="../Views/view_book.php"><button class="btn btn-warning">Back to Books</button></a>
						</div>
					</div>
					<div class="col-sm-5">
						<?php 
							$get_book = "SELECT book_title FROM e_books WHERE id='$id'";
							$get = mysqli_query($conn, $get_book);

							while ($bt = mysqli_fetch_assoc($get)) {
								$book_t = $bt['book_title'];
							
						 ?>
						<div>
							SERIAL NUMBERS FOR: <?php echo $book_t; ?>
						</div>
						<?php 
							}
							mysqli_free_result($get);

						#--------------------SERIAL DISPLAY--------------------------------

							$get_input = "SELECT * FROM book_registry WHERE book_id='$id'";
							$input = mysqli_query($conn, $get_input);

							while ($row = mysqli_fetch_assoc($input)) {
								
								$entered = $row['serial_number'];

								?>
								<table class="table">
									<tbody>
										<tr>
											<td align="center"><?php echo $entered; ?></td>
										</tr>
									</tbody>
								</table>
								<?php
							} 
							mysqli_free_result($input);
						 ?>
					</div>
				</div>
				<?php

				if (isset($_REQUEST['save'])) {
					
					$sn = $_POST['serial_number'];

					$update = "INSERT INTO book_registry(book_id, serial_number)VALUES('$id','$sn')";

					$done = mysqli_query($conn, $update);

					if ($done) {

						// header("Location: edit_book.php?id=$id");
					} else {

						?>
						<div class="alert alert-danger">
							<strong><?php echo mysqli_error(); ?></strong>
						</div>
						<?php
					}
				}
		}
		 ?>
	</div>
	<?php
} else {

	header("Location: ../index.php");
}

 ?>