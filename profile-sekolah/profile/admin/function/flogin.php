<?php

include('database.php');

class flogin extends database {
    public function getUserByusername($username, $passw) {
        $sql = mysqli_query($this->koneksi, "select * from tbl_user where username='$username'");
        $number = mysqli_num_rows($sql);

        if ($number == 0) {
            echo "Username dan Password Salah...";
            exit;
        }
        while ($d = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
            $encrypted_password = $d['passw'];
            $hash = md5($passw); 
      
            if ($encrypted_password == $hash) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function getdataUserByusername($username, $passw) {
        $sql = mysqli_query($this->koneksi, "select * from tbl_user where username='$username'");
        $number = mysqli_num_rows($sql);
        if ($number == 0) {
            echo "Username dan Password Salah...";
            exit;
        }
        while ($d = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
            $result[] = $d;
        }
        return $result;
    }
}