<?php
//echo "Good Morning";

$mysqli = new mysqli("db","root","example","6470");
if($mysqli->connect_error){
	echo "Connection Error,create the database";
}


	if (isset($_POST['submit_login'])){
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
		
		$sql = "SELECT * FROM 6470exerciseusers where username=\"".$uname."\" and password=\"".$pass."\"";
		$result = $mysqli->query($sql);
		
		$cnt=0;
		while ($data=$result->fetch_object()) {
		 		$cnt=$nt+1;
		}
		if ($cnt==1) {
			echo $uname." has Logged In Successfully";
			
		}
		else{
			echo "Invalid Username or password , Try Again or SignUp";
		}

	}
	else if (isset($_POST['submit_register'])){
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
		$phone=$_POST['phone'];

		$sql = "SELECT * FROM 6470exerciseusers where username=\"".$uname."\"";
		$result = $mysqli->query($sql);

		$cnt=0;
		while ($data=$result->fetch_object()) {
		 		$cnt=$nt+1;
		}
		if ($cnt==1) {
			echo "Username is Taken";
			
		}
		else{
			$sql="INSERT INTO 6470exerciseusers(USERNAME,PASSWORD,PHONE) VALUES(\"".$uname."\",\"".$pass."\",\"".$phone."\")";
			$mysqli->query($sql);
			echo "USER REGISTERED,Its Details are NAME: ".$uname." and PHONE NUMBER: ".$phone;
		}

	}
	else if (isset($_POST['submit_rp'])){
		$uname=$_POST['uname2'];
		$pass=$_POST['pass2'];
		$newp=$_POST['newp'];

		$sql = "SELECT * FROM 6470exerciseusers where username=\"".$uname."\" and password=\"".$pass."\"";
		$result = $mysqli->query($sql);

		$cnt=0;
		while ($data=$result->fetch_object()) {
		 		$cnt=$nt+1;
		}
		if ($cnt==1) {
			//echo "Username Found";
			//echo "IN here";
			//echo $newp;
				//echo "In update";
				$sql="UPDATE 6470exerciseusers SET password=\"".$newp."\" WHERE username=\"".$uname."\" and password=\"".$pass."\"";
				$mysqli->query($sql);
				
				echo "Password Updated";

		}
		else{
			
			echo "User Not Found";
		}

	}
	else if (isset($_POST['submit_fp'])){
		$uname=$_POST['uname3'];
		$phone=$_POST['phone2'];

		$sql = "SELECT * FROM 6470exerciseusers where username=\"".$uname."\" and phone=\"".$phone."\"";
		$result = $mysqli->query($sql);

		$cnt=0;
		while ($data=$result->fetch_object()) {
		 		$cnt=$nt+1;
		}
		if ($cnt==1) {
				$newp=rand(10000,99999);
				$sql="UPDATE 6470exerciseusers SET password=\"".$newp."\" WHERE username=\"".$uname."\" and phone=\"".$phone."\"";
				$mysqli->query($sql);
				
				echo "Password Set to ".$newp." Use the Reset Password Feature for better usage of the account";

		}
		else{
			
			echo "User Not Found";
		}

	}

?>

<form action="<?php echo $PHP_SELF ;?>" method="post">
	Welcome to Login System
	<br>
	<label for="uname">Enter User Name:</label>
	<input type="text" name="uname" id="uname">
	<br>
	<label for="pass">Enter Password:</label>
	<input type="password" name="pass" id="pass">
	<br>
	<input type="submit" name="submit_login" value="Login">
	<br>
	<label for="phone">Enter Phone Number:</label>
	<input type="text" name="phone" id="phone">
	<br>
	<input type="submit" name="submit_register" value="Register">
	<br>
	<br>
	<br>
	<br>
	<hr>
	<hr>
	Change Password
	<br>
	<label for="uname2">Enter User Name:</label>
	<input type="text" name="uname2" id="uname2">
	<br>
	<label for="pass2">Enter Current Password:</label>
	<input type="password" name="pass2" id="pass2">
	<br>
	<label for="newp">Enter New Password:</label>
	<input type="password" name="newp" id="newp">
	<br>
	<input type="submit" name="submit_rp" value="Update Password" >
	<br>
	<br>
	<br>
	<br>
	<br>
	<hr>
	<hr>
	Forgot Password
	<br>
	<label for="uname3">Enter User Name:</label>
	<input type="text" name="uname3" id="uname3">
	<br>
	<label for="phone2">Enter Phone Number:</label>
	<input type="text" name="phone2" id="phone2">
	<br>
	<input type="submit" name="submit_fp" value="Forgot Password">

	<br>

</form>