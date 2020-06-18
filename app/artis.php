<?php 

namespace app;

class artis extends controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function tambah()
	{
		$nama = $_POST['nama_artis'];

		$sql = "INSERT INTO artist (artist_name) VALUES (:artist_name)";
		$stmt = $this->db->prepare($sql);
		$stmt->BindParam(":artist_name",$nama);
		$stmt->execute();

		return false;
	}

	public function tampil()
	{
		$sql = "SELECT * FROM artist ORDER BY artist_name";
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
		$sql = "SELECT * FROM artist WHERE artist_id=:artist_id";
		$stmt= $this->db->prepare($sql);
		$stmt->bindParam(":artist_id", $id);
		$stmt->execute();
		$row = $stmt->fetch();

		return $row;
	}

	public function update()
	{
		$nama = $_POST['nama_artis'];
		$id = $_POST['artis_id'];

		$sql = "UPDATE artist SET artist_name=:artist_name WHERE artist_id=:artist_id";
		$stmt=$this->db->prepare($sql);
		$stmt->bindParam(":artist_name", $nama);
		$stmt->bindParam(":artist_id", $id);
		$stmt->execute();

		return false;
	}

	public function hapus($id)
	{
		$sql = "DELETE FROM artist WHERE artist_id=:artist_id";
		$stmt=$this->db->prepare($sql);
		$stmt->bindParam(":artist_id", $id);
		$stmt->execute();

		return false;
	}
}

 ?>