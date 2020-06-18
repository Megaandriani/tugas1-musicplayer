<?php
namespace app;
class login extends controller {
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function login($user_email, $user_password)
    {
        if (!empty($user_email) && !empty($user_password)) {
            $stmt = $this->db->prepare("select * from tb_user where user_email=? AND user_password=?");
            $stmt->bindParam(1, $user_email);
            $stmt->bindParam(2, $user_password);
            $stmt->execute();
            $data = $stmt->fetchAll();
            foreach ($data as $rows_user) {
                $_SESSION['user_id'] = $rows_user['user_id'];
                $_SESSION['user_name'] = $rows_user['user_name'];
                $_SESSION['user_password'] = $rows_user['user_password'];
                $_SESSION['user_email'] = $rows_user['user_email'];
                $_SESSION['user_address'] = $rows_user['user_address'];
            }
            if ($stmt->rowCount() == 1) {
                 ?>
                <script>
                alert("Berhasil Login");
                window.location.href=('index2.php');
            </script>
            <?php 
            } else {
                 ?>
                <script>
                    alert('Email dan Password Salah');
                    window.location.href=('index.php');
                </script>;
                
                <?php 
            }
        } else {
             ?>
           <script>
                    alert('Masukkan Email dan Password');
                    window.location.href=('index.php');
                </script>;
            <?php 
            }

        }
    }

?>