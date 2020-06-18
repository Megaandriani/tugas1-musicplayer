<?php

$album = new app\album();
$rowsartis = $album->daftarartis();

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
		<form method="POST" action="album-proses.php">
			<h2>Input Data Album</h2>
				
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
					<input type="text" name="nama_album" required>
				</div>

				<div class="control-group">
					<input type="submit" name="btn-simpan" value="SIMPAN">
				</div>
		</form>
	</div>
</body>
</html>