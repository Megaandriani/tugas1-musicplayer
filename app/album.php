<?php 

namespace app;

class album extends controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function tambah()
	{
		$artis = $_POST['nama_artis'];
		$album = $_POST['nama_album'];

		$sql = "INSERT INTO album (artist_id, album_name) VALUES (:artist_id, :album_name)";
		$stmt = $this->db->prepare($sql);
		$stmt->BindParam(":artist_id",$artis);
		$stmt->BindParam(":album_name",$album);
		$stmt->execute();

		return false;
	}

	public function tampil()
	{
		$sql = "SELECT album.*, artist.artist_name as ART 
		FROM album, artist
		WHERE album.artist_id=artist.artist_id ORDER BY album.album_name";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($rows = $stmt->fetch()){
			$data[] = $rows;
		}

		return $data;
	}

	public function daftarartis()
	{
		$sql = "SELECT * FROM artist";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($row = $stmt->fetch()) {
			$data[] = $row;
		}

		return $data;
	}


	public function edit($id)
	{
		$sql = "SELECT * FROM album WHERE album_id=:album_id";
		$stmt= $this->db->prepare($sql);
		$stmt->bindParam(":album_id", $id);
		$stmt->execute();
		$row = $stmt->fetch();

		return $row;
	}

	public function update()
	{
		$artis = $_POST['nama_artis'];
		$album = $_POST['nama_album'];
		$id = $_POST['id_album'];

		$sql = "UPDATE album SET artist_id=:artist_id, album_name=:album_name WHERE album_id=:album_id";
		$stmt=$this->db->prepare($sql);
		$stmt->BindParam(":artist_id",$artis);
		$stmt->BindParam(":album_name",$album);
		$stmt->bindParam(":album_id", $id);
		$stmt->execute();

		return false;
	}

	public function hapus($id)
	{
		$sql = "DELETE FROM album WHERE album_id=:album_id";
		$stmt=$this->db->prepare($sql);
		$stmt->bindParam(":album_id", $id);
		$stmt->execute();

		return false;
	}
}

 ?>