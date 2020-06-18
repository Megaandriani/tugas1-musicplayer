<?php 
$id = $_GET['id'];

$user = new app\user();
$row = $user->edit($id);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Musik</title>
</head>
<body>
	<div class="container">
		<br>
		<br>
		<form method="POST" action="user-proses.php">
			<h2>Edit Data Pengguna</h2>
				
			<input type="hidden" name="id_user" value="<?php echo $id; ?>">

				<div class="control-group">
					<label>Nama Pengguna</label>
					<input type="text" name="nama_user" value="<?php echo $row['user_name']; ?>" required>
				</div>

				<div class="control-group">
					<label>Password</label>
					<input type="text" name="pass" value="<?php echo $row['user_password']; ?>" required>
				</div>

				<div class="control-group">
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $row['user_email']; ?>" required>
				</div>

				<div class="control-group">
					<label>Alamat</label>
					<input type="text" name="alamat" value="<?php echo $row['user_address']; ?>" required>
				</div>

				<div class="control-group">
					<input type="submit" name="btn-edit" value="UPDATE">
				</div>
		</form>
	</div>
</body>
</html>