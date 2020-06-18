<?php 

$track = new app\track();
$rows = $track->tampil();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Musik</title>
	<link rel="stylesheet" type="text/css" href="layout/css/style.css">
</head>
<body>
	<div class="container">
		<h2>Daftar Track</h2>
		<button>
				<a href="dashboard.php?page=track-input">Tambah Data Track</a>
		</button>
		<table class="tabletampil">
			<tr>
				<th>NO</th>
				<th>Judul</th>
				<th>Nama Album</th>
				<th>Putar</th>
				<th>Durasi</th>
				<th>AKSI</th>
			</tr>
			<?php 
			$no=1;
			 ?>
			<?php foreach ($rows as $row) { ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row['track_name']; ?></td>
				<td><?php echo $row['ART'] . " - " . $row['ALB']; ?></td>
				<td>
					<?php if (!empty($row['track_file'])) { ?>
					<audio controls>
						<source src="<?php echo "./layout/assets/uploads/" . $row['track_file']; ?>" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio>					
					<?php } ?>
				</td>
				<td><?php echo $row['track_time']; ?></td>
				<td>
					<button>
						<a href="dashboard.php?page=track-edit&id=<?php echo $row['track_id']; ?>">Edit</a>
					</button>

					<button>
						<a href="dashboard.php?page=track-proses&delete-id=<?php echo $row['track_id']; ?>">Hapus</a>
					</button>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>

</body>
</html>