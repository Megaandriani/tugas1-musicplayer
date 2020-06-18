<?php
$id = $_GET['id'];

$played = new app\played();
$rows = $played->tampil();

$artis = new app\artis();
$rowsartis = $artis->tampil();

$album = new app\album();
$rowsalbum = $album->tampil();

$track = new app\track();
$rowstrack = $track->tampil();

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
		<form method="POST" action="played-proses.php">
			<h2>Input Daftar Putar</h2>
				<input type="hidden" name="id_played" value="<?php echo $id; ?>">

				<div class="control-group">
					<label>Waktu Putar</label>
					<input type="date" name="waktu" value="<?php echo $rows['played']; ?>" required>
				</div>

				<div class="control-group">
					<label>Nama Artis</label>
					<select name="nama_artis">
            		<?php foreach($rowsartis as $row) { ?>
            			<option value="<?php echo $row['artist_id'] ?>"><?php echo $row['artist_name'] ?></option>
            		<?php } ?>
          		</select>

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
					<label>Nama Track</label>
					<select name="nama_track">
            		<?php foreach($rowstrack as $row) { ?>
            			<option value="<?php echo $row['track_id'] ?>"><?php echo $row['track_name'] ?></option>
            		<?php } ?>
          		</select>
				</div>

				<div class="control-group">
					<input type="submit" name="btn-edit" value="UPDATE">
				</div>
		</form>
	</div>
</body>
</html>