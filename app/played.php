<?php 

namespace app;

class played extends controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function tambah()
	{
		$wkt = $_POST['waktu'];
		$artis = $_POST['nama_artis'];
		$album = $_POST['nama_album'];
		$trck = $_POST['nama_track'];

		$sql = "INSERT INTO played (played, artist_id, album_id, track_id) 
				VALUES (:played, :artist_id, :album_id, :track_id)";
		$stmt = $this->db->prepare($sql);
		$stmt->BindParam(":played",$wkt);
		$stmt->BindParam(":artist_id",$artis);
		$stmt->BindParam(":album_id",$album);
		$stmt->BindParam(":track_id",$trck);
		$stmt->execute();

		return false;
	}

	public function tampil()
	{
		$sql = "SELECT * FROM played
				JOIN artist ON played.artist_id=artist.artist_id
				JOIN album ON played.album_id=album.album_id
				JOIN track ON played.track_id=track.track_id";
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
		$sql = "SELECT * FROM played WHERE artist_id=:artist_id";
		$stmt= $this->db->prepare($sql);
		$stmt->bindParam(":artist_id", $id);
		$stmt->execute();
		$row = $stmt->fetch();

		return $row;
	}

	public function update()
	{
		$wkt = $_POST['waktu'];
		$artis = $_POST['nama_artis'];
		$album = $_POST['nama_album'];
		$trck = $_POST['nama_track'];
		$id = $_POST['id_played'];

		$sql = "UPDATE played SET played=:played, artist_id=:artist_id, album_id=:album_id, track_id=:track_id 
				WHERE played=:played";
		$stmt=$this->db->prepare($sql);
		$stmt->BindParam(":played",$wkt); 
		$stmt->BindParam(":artist_id",$artis);
		$stmt->BindParam(":album_id",$album);
		$stmt->BindParam(":track_id",$trck);
		$stmt->bindParam(":played", $id);
		$stmt->execute();

		return false;
	}
	public function hapus($id)
	{
		$sql = "DELETE FROM played WHERE played=:played";
		$stmt=$this->db->prepare($sql);
		$stmt->bindParam(":played", $id);
		$stmt->execute();
		return false;
	}
}