<?php 

$played = new app\played();
$rows = $played->tampil();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Musik</title>
	<link rel="stylesheet" type="text/css" href="layout/css/style.css">
</head>
<body>
	<div class="container">
		<h2>Daftar Putar</h2>
		<button>
				<a href="index2.php?page=played-input">Tambah Daftar Putar</a>
		</button>
		<table class="tabletampil">
			<tr>
				<th>NO</th>
				<th>Nama Artis</th>
				<th>Nama Album</th>
				<th>Nama Track</th>
				<th>Waktu Putar</th>
				<th>AKSI</th>
			</tr>
			<?php 
			$no=1;
			 ?>
			<?php foreach ($rows as $row) { ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row['artist_name']; ?></td>
				<td><?php echo $row['album_name']; ?></td>
				<td><?php echo $row['track_name']; ?></td>
				<td><?php echo $row['played']; ?></td>
				<td>
					<button>
						<a href="index2.php?page=played-edit&id=<?php echo $row['played']; ?>">Edit</a>
					</button>

					<button>
						<a href="index2.php?page=played-proses&delete-id=<?php echo $row['played']; ?>">Hapus</a>
					</button>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>

</body>
</html>