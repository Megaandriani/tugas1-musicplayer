<?php

$album = new app\track();
$rowsalbum = $album->daftaralbum();

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
		<h2>Input Data Lagu</h2>
		<form method="POST" action="track-proses.php" enctype="multipart/form-data">
			
				
				<div class="control-group">
					<label>Judul</label>
					<input type="text" name="nama_track" required>
				</div>

				<div class="control-group">
					<label>Nama Album</label>
					<select name="nama_album">
            		<?php foreach($rowsalbum as $row) { ?>
            			<option value="<?php echo $row['album_id'] ?>"><?php echo $row['album_name'] ?></option>
            		<?php } ?>
          		</select>

				</div>

				<div class="control-group">
					<label>Durasi</label>
					<input type="text" name="waktu" required>
				</div>

				<div class="control-group">
					<label>File (MP3)</label>
					<input type="file" name="track_file">
				</div>

				<div class="control-group">
					<input type="submit" name="btn-simpan" value="SIMPAN">
				</div>
		</form>
	</div>
</body>
</html>