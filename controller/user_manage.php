<?php 
	

session_start();

if (isset($_SESSION['username'])) {
	
	include("../layout/session_head.php");

#--------Delete user --------

	if (isset($_GET['id'])) {
	               				
	        $id = $_GET['id'];

	        $get_user = "SELECT * FROM user_reg_card WHERE id='$id'";

	        $user_tmp = mysqli_query($conn, $get_user);

	        $del_from_brw = "DELETE FROM user_borrow WHERE id='$id'";

	        $save_from_brw = mysqli_query($conn, $del_from_brw);

	        $del_account = "DELETE FROM user_reg_card WHERE id='$id'";

	        $del_to_tmp = mysqli_query($conn, $del_account);


	       if ($del_to_tmp && $save_from_brw) {
	               					
	            header("Location: ../Views/manage_lib.php?v_card");

	       }else{
	        ?>
	        <div class="alert alert-danger">
	            <?php echo mysql_error(); ?>
	        </div>
	        <?
	    }
	}
} else {

	header('Location: ../index.php');
}
               			#-----end delete user---------
?>