<!DOCTYPE html>
<html>
<head>
	<style>
	.error{color:#FF0000;}
	</style>
	<title></title>
</head>
<body>
	<?php 
	//Pendeklarasian variabel dan set ke nilai kosong 
	$namaErr = $emailErr = $gendErr = $websiteErr = "";
	$nama = $email = $gender = $comment = $website = "";

	//Terdapat sebuah kondisi yang dimana didalamya terdapat fungsi khusus yang digunakan untuk menampilkan data 
	//Dari server.
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Jika kondisi sesuai dengan parameternya maka akan memanggil data yang telah diinputkan.
 		if (empty($_POST["nama"])) {
 			$namaErr = "Nama harus diisi";	//Kondisi dimana nama yang dimasukkan tidak sesuai
 		}
 		else {
 			$nama = test_input($_POST["nama"]);	//Kondisi dimana pendeklarasian variabel nama yang dimana akan memanggil data nama.
 		}
 
 	if (empty($_POST["email"])) {	//Sebuah kondisi yang dimana emailnya kosong maka akan mengoutputkan email harus diisi.
 		$emailErr = "Email harus diisi";
 	}
 	else {	//Sebuah kondisi yang dimana akan memnaggil variabel email
 		$email = test_input($_POST["email"]);
 
 	// Kondisi untuk memerika alamat email apakah sudah benar atu belum.
 	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 		//Kondisi jika email yang dimasukkan tidak sesuai.
 		$emailErr = "Email tidak sesuai format"; 
 	}
 	}
 	//
 	if (empty($_POST["website"])) {	//kondisi dimana penanda suatu kondisi yang memanggil variabel website.
 		$website = "";	//Variabel website yang isinya.
 	}
 	else {	//Kondisi diamana variabel website memanggil website.
 		$website = test_input($_POST["website"]);
 	}
 
 	if (empty($_POST["comment"])) {	//kondisi dimana penanda suatu kondisi yang memanggil variabel comment.
 		$comment = "";
 	}
 	else {	//Kondisi diamana variabel cemment memanggil comment.
 		$comment = test_input($_POST["comment"]);
 	}
 
 	if (empty($_POST["gender"])) {	//kondisi dimana penanda suatu kondisi yang memanggil variabel gender.
 		$genderErr = "Gender harus dipilih";	//Jika suatu variabel gender error maka akan mengoutputkan "gender harus dipilih".
 	}
 	else {
 		$gender = test_input($_POST["gender"]);	//Kondisi diamana variabel $gender memanggil gender.
 	}
 }
 
 function test_input($data) {	//Fungsi untuk mengetes inputan suatu data.
 	$data = trim($data);
 	$data = stripslashes($data);
 	$data = htmlspecialchars($data);
 	return $data;
 	}
?>

<h2>Posting Komentar </h2>	<!--Menamilkan Posting Komentar-->
	<p><span class = "error">* Harus Diisi.</span></p>	<!--Jika terjadi erroor maka akan mengOutputkan Harus diisi-->
 	<form method = "post" action = "<?php 
 		echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	<!--Mengatur hak akses ke dalam jaringan yang dimana dapat mengembalikan nama file yang sedang dijalankan-->
 	<table>
 	<tr>	<!--Digunakan untuk membuat baris-->
 			<td>Nama:</td>	<!--Digunakan untuk membuat columns-->
 		<td><input type = "text" name = "nama">
 		<span class = "error">* <?php echo $namaErr;?></span>
 		</td>
 	</tr>
 
 	<tr>	<!--Digunakan untuk membuat baris-->
 		<td>E-mail: </td>
 		<td><input type = "text" name = "email">
 		<span class = "error">* <?php echo $emailErr;?></span>
 		</td>
 	</tr>
 
 	<tr>	<!--Digunakan untuk membuat baris-->
 		<td>Website:</td>
 		<td> <input type = "text" name = "website">
 		<span class = "error"><?php echo $websiteErr;?></span>
 		</td>
 	</tr>
 
 	<tr>	<!--Digunakan untuk membuat baris-->
 		<td>Komentar:</td>
 		<td> <textarea name = "comment" rows = "5" cols = "40"></textarea></td>
 	</tr>
 
 	<tr>	<!--Digunakan untuk membuat baris-->
 		<td>Gender:</td>
 		<td>
 		<input type = "radio" name = "gender" value = "L">Laki-Laki
 		<input type = "radio" name = "gender" value = "P">Perempuan
 		<span class = "error">*<?php echo $genderErr;?></span>
 		</td>	
 	</tr>

 	<td>
 		<input type = "submit" name = "submit" value = "Submit"> 
 	</td>
 	</table>
 	</form>

 	<!--Kondisi dibawah merupakan bahasa pemrograman PHP yang berguna untuk menampilkan data yang sebelumnya sudah di Inputkan Di atas-->
 	<?php 	
 	echo "<h2>Data yang anda Isi</h2>";

 	echo "<table style='border: 1px solid black;'>";
 	echo "<thead><tr>
 			<th>Nama</th>
 			<th>Email</th>
 			<th>Website</th>
 			<th>Comment</th>
 			<th>Gender</th>
 		</tr></thead>";

 	echo "<tr>
 			<td>$nama</td>
 			<td>$email</td>
 			<td>$website</td>
 			<td>$comment</td>
 			<td>$gender</td>
 		</tr>";

 	echo "</table>";
 	?>

	</body>
</html>