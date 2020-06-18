<?php 

namespace app;

class user extends controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function tambah()
	{
		$nama = $_POST['nama_user'];
		$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$em = $_POST['email'];
		$adr = $_POST['alamat'];

		$sql = "INSERT INTO tb_user (user_name, user_password, user_email, user_address) 
		VALUES (:user_name, :user_password, :user_email, :user_address)";
		$stmt = $this->db->prepare($sql);
		$stmt->BindParam(":user_name",$nama);
		$stmt->BindParam(":user_password",$password);
		$stmt->BindParam(":user_email",$em);
		$stmt->BindParam(":user_address",$adr);
		$stmt->execute();

		return false;
	}

	public function tampil()
	{
		$sql = "SELECT * FROM tb_user";
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
		$sql = "SELECT * FROM tb_user WHERE user_id=:user_id";
		$stmt= $this->db->prepare($sql);
		$stmt->bindParam(":user_id", $id);
		$stmt->execute();
		$row = $stmt->fetch();

		return $row;
	}

	public function update()
	{
		$nama = $_POST['nama_user'];
		$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$em = $_POST['email'];
		$adr = $_POST['alamat'];
		$id = $_POST['id_user'];

		$sql = "UPDATE tb_user SET user_name=:user_name, user_password=:user_password, 
					   user_email=:user_email, user_address=:user_address WHERE user_id=:user_id";
		$stmt=$this->db->prepare($sql);
		$stmt->bindParam(":user_name", $nama);
		$stmt->BindParam(":user_password",$password);
		$stmt->BindParam(":user_email",$em);
		$stmt->BindParam(":user_address",$adr);
		$stmt->bindParam(":user_id", $id);
		$stmt->execute();

		return false;
	}

	public function hapus($id)
	{
		$sql = "DELETE FROM tb_user WHERE user_id=:user_id";
		$stmt=$this->db->prepare($sql);
		$stmt->bindParam(":user_id", $id);
		$stmt->execute();

		return false;
	}
}

 ?>