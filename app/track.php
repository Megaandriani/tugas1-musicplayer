<?php 

namespace app;

class track extends controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function tambah()
	{
		$track = $_POST['nama_track'];
		$album = $_POST['nama_album'];
		$time = $_POST['waktu'];

		if(isset($_FILES['track_file']) && $_FILES['track_file']['error'] === UPLOAD_ERR_OK) {

			// Upload file, sederhana dan tidak ada filter serta keamanan
			$file_name = $_FILES['track_file']['name'];
			$file_tmp = $_FILES['track_file']['tmp_name'];
			$file_ext = strtolower(end(explode('.',$_FILES['track_file']['name'])));
			//$file_size = $_FILES['track_file']['size'];
			//$file_type = $_FILES['track_file']['type'];			

			$file_name_new = md5(time() . $file_name) . '.' . $file_ext;

			$file_dir = "./layout/assets/uploads/";

			if(move_uploaded_file($file_tmp, $file_dir . $file_name_new)) {
				$sql = "INSERT INTO track (track_name, album_id, track_file, track_time) VALUES (:track_name, :album_id, :track_file, :track_time)";
				$stmt = $this->db->prepare($sql);
				$stmt->bindParam(":track_name", $track);
				$stmt->bindParam(":album_id", $album);
				$stmt->bindParam(":track_file", $file_name_new);
				$stmt->bindParam(":track_time", $time);
				$stmt->execute();
			} 

		} else {

			$sql = "INSERT INTO track (track_name, album_id, track_time) VALUES (:track_name, :album_id, :track_time)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":track_name", $track);
			$stmt->bindParam(":album_id", $album);
			$stmt->bindParam(":track_time", $time);
			$stmt->execute();
		}

		return false;
	}

	public function daftaralbum()
	{
		$sql = "SELECT * FROM album";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($row = $stmt->fetch()) {
			$data[] = $row;
		}

		return $data;
	}

	public function tampil()
	{
		$sql = "SELECT tr.*, al.album_name as ALB, ar.artist_name as ART
		FROM track tr 
		INNER JOIN album al ON tr.album_id=al.album_id
		LEFT JOIN artist ar ON al.artist_id=ar.artist_id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($rows = $stmt->fetch()){
			$data[] = $rows;
		}

		return $data;
	}

	public function edit($id)
	{
		$sql = "SELECT * FROM track WHERE track_id=:track_id";
		$stmt= $this->db->prepare($sql);
		$stmt->bindParam(":track_id", $id);
		$stmt->execute();
		$row = $stmt->fetch();

		return $row;
	}

	public function update()
	{
		$track = $_POST['nama_track'];
		$album = $_POST['nama_album'];
		$time = $_POST['waktu'];
		$id = $_POST['id_track'];

		if(isset($_FILES['track_file']) && $_FILES['track_file']['error'] === UPLOAD_ERR_OK) {

			// Upload file, sederhana dan tidak ada filter serta keamanan
			$file_name = $_FILES['track_file']['name'];
			$file_tmp = $_FILES['track_file']['tmp_name'];
			$file_ext = strtolower(end(explode('.',$_FILES['track_file']['name'])));
			//$file_size = $_FILES['track_file']['size'];
			//$file_type = $_FILES['track_file']['type'];			

			$file_name_new = md5(time() . $file_name) . '.' . $file_ext;

			$file_dir = "./layout/assets/uploads/";

			if(move_uploaded_file($file_tmp, $file_dir . $file_name_new)) {
				$sql = "UPDATE track SET 
				track_name=:track_name, 
				album_id=:album_id, track_file=:track_file, track_time=:track_time
				WHERE track_id=:track_id";
				$stmt = $this->db->prepare($sql);
				$stmt->bindParam(":track_name", $track);
				$stmt->bindParam(":album_id", $album);
				$stmt->bindParam(":track_time", $time);
				$stmt->bindParam(":track_file", $file_name_new);
				$stmt->bindParam(":track_id", $id);
				$stmt->execute();
			} 

		} else {

			$sql = "UPDATE track SET 
			track_name=:track_name, 
			album_id=:album_id,
			track_time=:track_time
			WHERE track_id=:track_id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":track_name", $track);
			$stmt->bindParam(":album_id", $album);
			$stmt->bindParam(":track_time", $time);
			$stmt->bindParam(":track_id", $id);
			$stmt->execute();
		}

		return false;
	}

	public function hapus($id)
	{
		$sql = "DELETE FROM track WHERE track_id=:track_id";
		$stmt=$this->db->prepare($sql);
		$stmt->bindParam(":track_id", $id);
		$stmt->execute();

		return false;
	}
}

 ?>