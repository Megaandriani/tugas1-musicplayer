<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Musik</title>
	<link rel="stylesheet" type="text/css" href="layout/css/style.css">
</head>
<body>
	<div class="container">
		<br>
		<form method="POST" action="artis-proses.php">
				<h2>Input Data Artis</h2>
				
				<div class="control-group">
					<label for="artis[namaartis]">Nama Artis</label>
					<input type="text" name="nama_artis" id="nama" required>
				</div>
				<div class="control-group">
					<input type="submit" name="btn-simpan" value="SIMPAN">
				</div>
		</form>
	</div>
</body>
</html>