
<?php 

 function setCycleOnePrefix() {

 	$pref1 = "SELECT fc_prefix FROM default_options";

 	$get_pref1 = mysqli_query($conn, $pref1);

 	while ($row = mysqli_fetch_assoc($get_pref1)) {
 		
 		$prefix = $row['fc_prefix'];

 		return $prefix;

 	}
 	mysqli_free_result($get_pref1);
 }

function setCycleTwoPrefix(){

	$pref2 = "SELECT sc_prefix FROM default_options";
	$get_pref2 = mysqli_query($conn, $pref2);

	while ($_row = mysqli_fetch_assoc($get_pref2)) {
		
		$_prefix = $_row['sc_prefix'];

		return $_prefix;
	}
	mysqli_free_result($get_pref2);

}

 function getCountryFlag() {

 }

function getDueDateFine() {

 	$query_fine = "SELECT due_fine FROM default_options";
 	$set_fine = mysqli_query($conn, $query_fine);

 	while ($_fine = mysqli_fetch_assoc($set_fine)) {
 		
 		$get_fine = $_fine['due_fine'];

 		return $get_fine;
 	}
 	mysqli_free_result($set_fine);
}

function getUserStatus() {

	$id = $_GET['si'];

	$query_st = "SELECT * FROM user_borrow WHERE stu_tb_id=$id";

	$st = mysqli_query($conn, $query_st);

	while ($row = mysqli_fetch_assoc($st)) {
		
		$_book    = $row['book_title'];
		$_author  = $row['book_author'];
		$_edition = $row['edition'];
		$_cost    = $row['book_cost'];
		$_date_b  = $row['date_borrowed'];


		?>
		 <div class="alert alert-danger">
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
		<?
	}

	mysqli_free_result($st);
}
 ?>
}
