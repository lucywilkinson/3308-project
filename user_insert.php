<?php 
include("includes/connection.php");
if(isset($_POST['sign_up'])){
			$manager = "None";
			$employees = "None";
			$name = $_POST['u_name'];
			$title = "None";
			$email = $_POST['u_email'];
			$pass = $_POST['u_pass'];

			$get_email = "select * from users where username='$email'";
			$run_email = mysqli_query($con,$get_email);
			$check = mysqli_num_rows($run_email);

			if($check==1){
				echo "<script>alert('Email is already registered, please try another.')</script>";
				exit();
			}

			if(strlen($pass)<8){
				echo "<script>alert('Password must have a minimum of 8 characters.')</script>";
				exit();
			}else{
				$insert = "insert into users values ('$manager','$employees','$name','$title','$email','$pass',NULL,'$date','0','123')";

				$run_insert = mysqli_query($con,$insert);

				if($run_insert){
					$_SESSION['user_email']=$email;
					echo "<script>alert('Registration Successful!')</script>";
					echo "<script>window.open('home.php','_self')</script>";
				}

			}
}
			
?>