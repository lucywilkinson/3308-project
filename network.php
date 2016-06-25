<?php 
session_start();
include("includes/connection.php");
include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
  
  header("location: index.php"); 
}
else {

          $user = $_SESSION['user_email'];
          $get_user = "select * from users where username='$user'";
          $run_user = mysqli_query($con,$get_user);
          $row = mysqli_fetch_array($run_user);

          $user_id = $row['id'];
          $user_name = $row['name'];
          $user_email = $row['username'];
          $user_key = $row['key']
?>

<!DOCTYPE HTML>
<html>
	<header>
		<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="/3308-project/home.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="active treeview">
          <a href="/3308-project/network.php">
            <i class="fa fa-dashboard"></i> <span>Network</span>
          </a>
        </li><!--
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <small class="label pull-right bg-red">3</small>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <small class="label pull-right bg-yellow">12</small>
          </a>
        </li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Urgent</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>New</span></a></li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
	</header>
	<body>
		<?php echo "Your employment key: $user_key" ?>
		<br>
		<div>
			<form action="" method="post">
				<table>
					<tr>
						<td><input type="text" name="empkey" placeholder = "Enter key here" required = "required"/></td>
					</tr>
					<br>
					<tr>
						<td><button name="enter_empkey">Enter Employment Request</button></td>
					</tr>
				</table>
			</form>
			<?php
			include("emp_req.php")
			?>
		</div>
		<br>
		<?php echo "Your employment requests: " ?>
	</body>
</html>
<?php } ?>