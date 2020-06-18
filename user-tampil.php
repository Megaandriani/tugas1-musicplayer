<?php 

$user = new app\user();
$rows = $user->tampil();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Musik</title>
	<link rel="stylesheet" type="text/css" href="layout/css/style.css">
</head>
<body>
	<div class="container">
		<h2>Daftar User</h2>
		<button>
				<a href="dashboard.php?page=user-input">Tambah Data User</a>
		</button>
		<table class="tabletampil">
			<tr>
				<th>NO</th>
				<th>Nama User</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>AKSI</th>
			</tr>
			<?php 
			$no=1;
			 ?>
			<?php foreach ($rows as $row) { ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row['user_name']; ?></td>
				<td><?php echo $row['user_email']; ?></td>
				<td><?php echo $row['user_address']; ?></td>
				<td>
					<button>
						<a href="dashboard.php?page=user-edit&id=<?php echo $row['user_id']; ?>">Edit</a>
					</button>

					<button>
						<a href="dashboard.php?page=user-proses&delete-id=<?php echo $row['user_id']; ?>">Hapus</a>
					</button>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>

</body>
</html>