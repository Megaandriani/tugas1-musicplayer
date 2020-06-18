<?php 

$artis = new app\artis();
$rows = $artis->tampil();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Musik</title>
	<link rel="stylesheet" type="text/css" href="layout/css/style.css">
</head>
<body>
	<div class="container">
		<h2>Daftar Artis</h2>
		<button>
				<a href="dashboard.php?page=artis-input">Tambah Data Artis</a>
		</button>
		<table class="tabletampil">
			<tr>
				<th>NO</th>
				<th>Nama Artis</th>
				<th>AKSI</th>
			</tr>
			<?php 
			$no=1;
			 ?>
			<?php foreach ($rows as $row) { ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row['artist_name']; ?></td>
				<td>
					<button>
						<a href="dashboard.php?page=artis-edit&id=<?php echo $row['artist_id']; ?>">Edit</a>
					</button>

					<button>
						<a href="dashboard.php?page=artis-proses&delete-id=<?php echo $row['artist_id']; ?>">Hapus</a>
					</button>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>

</body>
</html>