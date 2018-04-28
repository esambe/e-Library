
<?php 
include("layout/header.php");

$conn = mysqli_connect("localhost", "root", "", "elibrary");
	if (mysqli_connect_errno($conn)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} else {
		echo 'Connection success';
}

?>
<?php 

if (empty($_SESSION)) {
	
	session_start();
 ?>
<hr><br>
<div class="row">
	<div class="col-sm-4">
		
	</div>
	<div class="col-sm-4">
		<h1>e-Library</h1><hr>
		<form method="post" action="">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="username" id="username" class="form-control" placeholder="username">
			
			</div><br>
			<div class="input-group">
			    <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
				<input type="password" name="password" id="pass" class="form-control">
			</div><br>
			
			<div class="form-group">
				<input type="submit" name="login" class="btn btn-success" value="Login">
			
				<input type="reset" class="btn btn-danger" value="Reset" style="float: right;">
			</div>
		</form>
		<div>
			<strong>Forgoten password <a href="#">Reset</a></strong>
		</div>
	</div>
	<div class="col-sm-4">
		
	</div>
</div>

<?php 

if (isset($_REQUEST['login'])) {
	
	$auth_admin_user = $_POST['username'];
	$auth_admin_pass = $_POST['password'];

	$auth_admin = "SELECT username, password FROM e_admin_login";

	$rst = mysqli_query($conn, $auth_admin);

	while ($row =  mysqli_fetch_assoc($rst)) {
		
		$user = $row['username'];
		$pass = $row['password'];

		if ($user == $auth_admin_user && $pass == md5($auth_admin_pass) && mysqli_num_rows($rst) > 0) {
			
			$_SESSION['username'] = $user;

			header("Location: Views/dashboard.php");
		}else {

			?>
			<br>
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<div class="alert alert-danger">
						<strong>Invalid username or password</strong>
					</div>
				</div>
				<div class="col-sm-4"></div>
			</div>
			<?php
		}
	}
	mysqli_free_result($rst);
}

}
 ?>