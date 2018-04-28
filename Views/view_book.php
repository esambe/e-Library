<?php 


session_start();

if (!empty($_SESSION['username'])) {
	

	$user = $_SESSION['username'];

	include("../layout/session_head.php");

	?>
	<div class="e-container">
	<div class="alert alert-info" align="center">
		<strong>Books categories <i class="fa fa-book"></i></strong>
	</div>
	<hr>
		<div class="row">
			<div class="col-lg-4 col-xs-6">
		      <div class="small-box bg-aqua">
                <div class="inner">
                <?php 

                $count = "SELECT * FROM e_books WHERE category='p_art'";
                $get_count = mysqli_query($conn, $count);

                $row = mysqli_num_rows($get_count);
                 ?>
                  <h5>
                    <?php 
                    if ($row == 1) {
                    	echo $row . '  Subject';
                    } else{
                    	echo $row . '  Subjects';
                    }
                     ?>
                  </h5>
                  <p>
                    Arts Books
                  </p>
                </div>
                <a href="view_book.php?p_art" class="small-box-footer">
                  View Books <i class="fa fa-level-down"></i>
                </a>
              </div>
            </div>
         	<div class="col-lg-4 col-xs-6">
         	<div class="small-box bg-aqua">
                <div class="inner">
	            <?php 

	                $count = "SELECT * FROM e_books WHERE category='p_scn'";
	                $get_count = mysqli_query($conn, $count);

	                $row = mysqli_num_rows($get_count);
                 ?>
                  <h5>
                    <?php 
                    if ($row == 1) {
                    	echo $row . '  Subject';
                    } else{
                    	echo $row . '  Subjects';
                    }
                    ?>
                  </h5>
	                  <p>
	                    Pure Science
	                  </p>
	                </div>
	                <a href="view_book.php?p_scn" class="small-box-footer">
	                  View Book <i class="fa fa-level-down"></i>
	                </a>
	              </div>
	          </div>
         	<div class="col-lg-4 col-xs-6">
         	  <div class="small-box bg-aqua">
	                <div class="inner">
	                 <?php 

		                $count = "SELECT * FROM e_books WHERE category='s_scn'";
		                $get_count = mysqli_query($conn, $count);

		                $row = mysqli_num_rows($get_count);
                     ?>
                  <h5>
                    <?php 
                    if ($row == 1) {
                    	echo $row . '  Subject';
                    } else{
                    	echo $row . '  Subjects';
                    }
                    ?>
                  </h5>
	                  <p>
	                    Social Science
	                  </p>
	                </div>
	                <a href="view_book.php?s_scn" class="small-box-footer">
	                  View Book <i class="fa fa-level-down"></i>
	                </a>
              </div>
         	</div>
		</div>

		<?php 
 			
 			

			if (isset($_GET['p_art']) && is_string($_GET['p_art'])) {
             

            $get_cat = "SELECT * FROM e_books WHERE category='p_art'";

            $cat_proc = mysqli_query($conn, $get_cat);

				?>
				<hr>
				<div align="center">
					<strong>CATEGORY: ART BOOKS</strong>
				</div>
				<hr>
					<div class="form-group">
						<input id="inputfilter" type="text" class="col-sm-4 form-control" placeholder="Search filter">
					</div>
				<hr>
				<div>
					<table class="table" id="filterme">
			
						<thead>
							<tr>
								<th>TITLE</th>
								<th>AUTHOR</th>
								<th>COST</th>
								<th>EDITION</th>
								<th>PUBLISHED</th>
								<th>STOCK</th>
								<th>CURRENT QTY</th>
							</tr>
						</thead>
						<tbody>

						<?php 

						while ($row = mysqli_fetch_assoc($cat_proc)) {
							
							$bt       = $row['book_title'];
							$author   = $row['author'];
							$cost     = $row['cost'];
							$edition  = $row['edition'];
							$publ     = $row['published_date'];
							$id       = $row['id'];

							$count = "SELECT * FROM book_registry WHERE book_id='$id'";

							$get_count = mysqli_query($conn, $count);

							$row = mysqli_num_rows($get_count);

							$current = "SELECT * FROM user_borrow WHERE book_id='$id'";
							$set_count = mysqli_query($conn, $current);
							$cur_count = mysqli_num_rows($set_count);

							$cal_cur = $row - $cur_count;
						 ?>

							<tr>
								<td><?php echo $bt; ?></td>
								<td><?php echo $author; ?></td>
								<td><?php echo $cost; ?></td>
								<td><?php echo $edition; ?></td>
								<td><?php echo $publ; ?></td>
								<td><?php echo $row; ?></td>
								<td><?php echo $cal_cur; ?></td>
								<td><a href="../controller/edit_book.php?id=<?php echo $id; ?>&&p_art" class="btn btn-app"><i class="fa fa-edit"></i>Edit</a></td>
								<td><a href="view_book.php?id=<?php echo $id; ?>&&p_art" class="btn btn-app"><i class="fa fa-trash-o"></i>Delete</a></td>
							</tr>
						<?php 
						}

						mysqli_free_result($cat_proc);
						 ?>
						</tbody>	
					</table>
				</div>
				<?php
			}
			if (isset($_GET['p_scn']) && is_string($_GET['p_scn'])) {

				 $get_cat = "SELECT * FROM e_books WHERE category='p_scn'";

                 $cat_proc = mysqli_query($conn, $get_cat);

				?>
				<hr>
				<div align="center">
					<strong>CATEGORY: PURE SCIENCE BOOKS</strong>
				</div>
				<hr>
					<div class="form-group">
						<input id="inputfilter" type="text" class="col-sm-4 form-control" placeholder="Search filter">
					</div>
				<hr>
				<div style="overflow-x: auto; overflow-y: auto;">
					
					<table class="table" id="filterme">
					
						<thead>
							<tr>
								<th>TITLE</th>
								<th>AUTHOR</th>
								<th>COST</th>
								<th>EDITION</th>
								<th>PUBLISHED</th>
								<th>STOCK</th>
								<th>CURRENT QTY</th>
							</tr>
						</thead>
						<tbody>
						<?php 

						while ($row = mysqli_fetch_assoc($cat_proc)) {
							
							$bt       = $row['book_title'];
							$author   = $row['author'];
							$cost     = $row['cost'];
							$edition  = $row['edition'];
							$publ     = $row['published_date'];
							$id       = $row['id'];

							$count = "SELECT * FROM book_registry WHERE book_id='$id'";

							$get_count = mysqli_query($conn, $count);

							$row = mysqli_num_rows($get_count);

							$current = "SELECT * FROM user_borrow WHERE book_id='$id'";
							$set_count = mysqli_query($conn, $current);
							$cur_count = mysqli_num_rows($set_count);

							$cal_cur = $row - $cur_count; 
						 ?>
							<tr>
								<td><?php echo $bt; ?></td>
								<td><?php echo $author; ?></td>
								<td><?php echo $cost; ?></td>
								<td><?php echo $edition; ?></td>
								<td><?php echo $publ; ?></td>
								<td><?php echo $row; ?></td>
								<td><?php echo $cal_cur; ?></td>
								<td><a href="../controller/edit_book.php?id=<?php echo $id; ?>&&p_art" class="btn btn-app"><i class="fa fa-edit"></i>Edit</a></td>
								<td><a href="view_book.php?id=<?php echo $id; ?>&&p_art" class="btn btn-app"><i class="fa fa-trash-o"></i>Delete</a></td>
							</tr>

						<?php 
						} 
						mysqli_free_result($cat_proc);
						?>
						</tbody>	
					</table>

				</div>
				<?php
			}
			if (isset($_GET['s_scn']) && is_string($_GET['s_scn'])) {

				$get_cat = "SELECT * FROM e_books WHERE category='s_scn'";

                $cat_proc = mysqli_query($conn, $get_cat);

				?>
				<hr>
				<div align="center">
					<strong>CATEGORY: SOCIAL SCIENCE BOOKS</strong>
				</div>
				<hr>
					<div class="form-group">
						 <input id="inputfilter" type="text" class="col-sm-4 form-control" placeholder="Search filter">
					</div>
				<hr>
				<div>
					<table class="table" id="filterme">
						<thead>
							<tr>
								<th>TITLE</th>
								<th>AUTHOR</th>
								<th>COST</th>
								<th>EDITION</th>
								<th>PUBLISHED</th>
								<th>STOCK</th>
								<th>CURRENT QTY</th>
							</tr>
						</thead>
						<tbody>
					   <?php 

						while ($row = mysqli_fetch_assoc($cat_proc)) {
							
							$bt       = $row['book_title'];
							$author   = $row['author'];
							$cost     = $row['cost'];
							$edition  = $row['edition'];
							$publ     = $row['published_date'];
							$id       = $row['id'];

							$count = "SELECT * FROM book_registry WHERE book_id='$id'";

							$get_count = mysqli_query($conn, $count);

							$row = mysqli_num_rows($get_count);

							$current = "SELECT * FROM user_borrow WHERE book_id='$id'";
							$set_count = mysqli_query($conn, $current);
							$cur_count = mysqli_num_rows($set_count);

							$cal_cur = $row - $cur_count;
						 ?>
							<tr>
								<td><?php echo $bt; ?></td>
								<td><?php echo $author; ?></td>
								<td><?php echo $cost; ?></td>
								<td><?php echo $edition; ?></td>
								<td><?php echo $publ; ?></td>
								<td><?php echo $row; ?></td>
								<td><?php echo $cal_cur; ?></td>
								<td><a href="../controller/edit_book.php?id=<?php echo $id; ?>&&p_art" class="btn btn-app"><i class="fa fa-edit"></i>Edit</a></td>
								<td><a href="view_book.php?id=<?php echo $id; ?>&&p_art" class="btn btn-app"><i class="fa fa-trash-o"></i>Delete</a></td>

							</tr>
						<?php 
						} 
						mysqli_free_result($cat_proc);
						?>
						</tbody>	
					</table>
				</div>
				<?php
			}
#---------------------To handle delete and rollback------------------------------------------#
			if (isset($_GET['id'])) {
				
				$id = $_GET['id'];



				$del_frm_bk = "DELETE FROM e_books WHERE id='$id'";
				$del_frm_reg= "DELETE FROM book_registry WHERE book_id='$id'";

				$rst1 = mysqli_query($conn, $del_frm_bk);
				$rst2 = mysqli_query($conn, $del_frm_reg);

				if ($rst1 && $rst2) {
					
					?>
					<div class="alert alert-success">
						<strong>Deleted successfully</strong>
					</div>
					<?php

					header("Location: view_book.php");
				}else {

					?>
					<div class="alert alert-danger">
					 	 No matching field found! 
					 	 Check if any book has been registered with this title.
					</div>
					<?php
				}
			}
		 ?>
	<hr>
	<div>
		<a href="dashboard.php"><button class="btn btn-default">Back</button></a>
	</div>
	</div>

	<?php

	include('../layout/footer.php');

} else {

	header('Location: ../index.php');
}

 ?>
