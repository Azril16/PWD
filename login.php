<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<?php

$name = $pass = "";
$name_error = $pass_error = "";


if($_SERVER['REQUEST_METHOD'] == "POST"){
if(empty($_POST["name"])){
	$name_error = "Username Tidak Boleh Kosong";
}else{
	$name = test_input($_POST["name"]);
}

if(empty($_POST['pass'])){
	$pass_error = "Harap masukkan Password";
}else{
	$pass = test_input($_POST["pass"]);
}

}

function test_input ($data) {
	$data = trim ($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<?php

    echo "<h2>Login</h2>
    <form method=POST action=cek_login.php>
    <table>
    <tr><td>Username</td><td> : <input name='id_user' type='text'></td></tr>
    <tr><td>Password</td><td> : <input name='password' type='password'></td></tr>
    <tr><td>Captcha<br>
    <img src='captcha.php'/></td><td> : <input name='captcha_code' type='text'></td></tr>
    <tr><td colspan=2><input type='submit' value='LOGIN'></td></tr>
    </table>
    </form>";

?>
	<!-- <h2>LOGIN</h2>
		<div class="container">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label><b>USERNAME</b></label>
			<input type="text" placeholder="Enter Username" name="name" values="<?php echo $name;?>">
			<span class="error"><?php echo  $name_error;?></span>
			<br>
			<label><b>PASSWORD</b></label>
			<input type="password" placeholder="Enter Password" name="pass" required>
			<span class="error1"><?php echo $pass_error;?></span>
			<label><b>Captcha</b></label>
			<center>
				<button onclick="location.href='index.php'">BACK</button>
				<button type="submit">LOGIN</button></center>
			</form>	
		</div> -->
</body>
</html>

