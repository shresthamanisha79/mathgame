<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2><a href="game/add.php">Click Here to Play Math Game</a></h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
		<div class="error success" >
			<h3>
			<?php 
				echo $_SESSION['success']; 
				unset($_SESSION['success']);
			?>
			</h3>
		</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			
			<h2>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h2>
			<h3>My GITHUB Profile</h3>
			<div class="profile">
				<img height="100" width="100" id="profileImage">
				<h4 id="fullName"></h4>
				<p id="bio"></p>
				<p id="followerInformation"></p>
				<p>Check me on <a id="githubLink">Github</a></p>
			</div>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
<script>
	
	fetch("https://api.github.com/users/shresthamanisha79")
	.then(response => response.json())
	.then(function(data){
		console.log("username is")
		// console.log(<?php echo $_SESSION['username'] ?>)
		let followerCount = data["followers"]
		let followerInfo = `I have been followed by ${followerCount} people in github`
		document.getElementById("profileImage").src = data['avatar_url']
		document.getElementById("fullName").textContent = data['name']
		document.getElementById("bio").textContent = data['bio']
		document.getElementById("followerInformation").textContent = followerInfo
		document.getElementById("githubLink").href = data["html_url"]
	})
</script>
		
</body>
</html>