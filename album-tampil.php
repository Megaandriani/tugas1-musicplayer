<?php 

$album = new app\album();
$rows = $album->tampil();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Musik</title>
	<link rel="stylesheet" type="text/css" href="layout/css/style.css">
</head>
<body>
	<div class="container">
		<h2>Daftar Album</h2>
		<button>
				<a href="dashboard.php?page=album-input">Tambah Data Album</a>
		</button>
		<table class="tabletampil">
			<tr>
				<th>NO</th>
				<th>Nama Artis</th>
				<th>Nama Album</th>
				<th>AKSI</th>
			</tr>
			<?php 
			$no=1;
			 ?>
			<?php foreach ($rows as $row) { ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row['ART']; ?></td>
				<td><?php echo $row['album_name']; ?></td>
				<td>
					<button>
						<a href="dashboard.php?page=album-edit&id=<?php echo $row['album_id']; ?>">Edit</a>
					</button>

					<button>
						<a href="dashboard.php?page=album-proses&delete-id=<?php echo $row['album_id']; ?>">Hapus</a>
					</button>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
	

</body>
</html>