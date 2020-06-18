<?php
$id = $_GET['id'];

$track = new app\track();

$rows = $track->edit($id);
$alb = $track->daftaralbum();

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
		<form method="POST" action="track-proses.php">
			<h2>Edit Data Lagu</h2>
				<input type="hidden" name="id_track" value="<?php echo $id; ?>">
				<div class="control-group">
					<label>Judul</label>
					<input type="text" name="nama_track" value="<?php echo $rows['track_name']; ?>" required>
				</div>

				<div class="control-group">
					<label>Nama Album</label>
					<select name="nama_album">
            		<?php foreach($alb as $row) { ?>
            			<option value="<?php echo $row['album_id']; ?>"<?php echo $rows['album_id']==$row['album_id'] ? " selected" : ""; ?>><?php echo $row['album_name']; ?></option>
					<?php } ?>
          		</select>

				</div>

				<div class="control-group">
					<label>Durasi</label>
					<input type="text" name="waktu" value="<?php echo $rows['track_time']; ?>" required>
				</div>

				<div class="control-group">
					<label>File(MP3)</label>
					<input type="file" name="track_file">
				</div>


				<div class="control-group">
					<input type="submit" name="btn-edit" value="UPDATE">
				</div>
		</form>
	</div>
</body>
</html>