<?php
session_start();
?>
<!DOCTYPE html>
<html>
<style>
	/*add full-width input fields*/
	
	input[type=text],
	input[type=password] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 2px solid #ccc;
		box-sizing: border-box;
	}
	/* set a style for all buttons*/
	
	button {
		background-color: Green;
		color: white;
		padding: 15px 20px;
		margin: 8px 0;
		cursor: pointer;
		width: 100%;
	}
	/*set styles for the cancel button*/
	
	.cancelbtn {
		padding: 15px 20px;
		background-color: #FF2E00;
	}
	/*float cancel and signup buttons and add an equal width*/
	
	.cancelbtn,
	.signupbtn {
		float: left;
		width: 50%;
	}
	/*add padding to container elements*/
	
	.container {
		padding: 16px;
	}
	/*clear floats*/
	
	.clearfix::after {
		content: "";
		clear: both;
		display: table;
	}
	/*styles for cancel button and signup button 
	on extra small screens*/
	
	@media screen and (max-width: 300px) {
		.cancelbtn,
		.signupbtn {
			width: 100%;
		}
	}
</style>

<body background=bg.gif>

	<h2>Login Form</h2>
	<!--Step 1:Adding HTML-->
	<form action="./login.php" method="post" style="border:1px solid #ccc">
		<div class="container">
			<label><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<div class="clearfix">
				<button type="button" class="cancelbtn" onclick="window.location.href='index.php'">Cancel</button>
				<button type="submit" class="signupbtn">Log In</button>
			</div>
		</div>
	</form>

</body>
</html>
