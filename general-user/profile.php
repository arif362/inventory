<?php
session_start();

if(isset($_SESSION['username']))
{
	$username=$_SESSION['username'];
	
}
include("../config.php");
?>



<!--Header Call-->
<?php include('header.php');?>

<div id="site_content">	
	<div class="main2">
		<div class="main_registraion">
				<div class="login error success">
					<h2>&nbsp; &nbsp; &nbsp;<a href="profile-update.php">Update Profile</a><h2>
				
				</div>
			
				<div class="registration_box fix">
				<form action="" method="post">
					<?php
						$statement = $db->prepare("SELECT * FROM user_list WHERE username=? ");
						$statement->execute(array($username));
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row)
					{	
						$user_pic = $row['user_pic'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$contact_num = $row['contact_num'];
						$address = $row['address'];
						$email = $row['email'];
					}
					?>
					<table>
		
					<tr>
						<td class="profile_image2"><a href="../uploads/<?php echo $row['user_pic']; ?>"><img class="Pimg" src="../uploads/<?php echo $row['user_pic']; ?>" alt="" width="230" height="280"/></a></td>
					</tr>					
					<tr class="f_name">
						<td><b>First Name :  <?php echo $firstname;?></b></td>
					</tr>
					<tr class="l_name">
						<td><b>Last Name :  <?php echo $lastname;?></b></td>
					</tr>
		
					<tr class="contact">
						<td><b>Contact Number :  <?php echo $contact_num;?></b></td>
					</tr>
				
					<tr class="address">
						<td><b>Address : <?php echo $address;?></b></td>
					</tr>
					<tr class="email">
						<td><b>E-mail : <?php echo $email;?></b></td>
					</tr>
					</table>
				</form>
				</div>
		</div>
	</div>	
</div>
<!--Footer Text Part-->		
<?php include('footer.php');?>	