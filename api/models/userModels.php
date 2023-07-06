<?php

class userModels extends connectDB{
    public function getUser(){
        $query = "SELECT * From tblnguoidung";
        return mysqli_query($this->conn,$query);
    }

    public function getUserByName($user_name){
        $query = "SELECT * From tblnguoidung where Nguoidung_ten ='$user_name'";
        return mysqli_query($this->conn,$query);
    }

    public function getUserByRole($user_role){
        $query = "SELECT * From tblnguoidung where Nguoidung_cap ='$user_role'";
        return mysqli_query($this->conn,$query);
    }

    public function updateUser($user_name, $user_password, $user_role){
        $query = "UPDATE tblnguoidung set Nguoidung_mk ='$user_password', Nguoidung_cap = '$user_role' where Nguoidung_ten = '$user_name'";
        return mysqli_query($this->conn,$query);
    }

    public function createUser($user_name, $user_password, $user_role){
        $query = "INSERT INTO tblnguoidung values ('$user_name','$user_password','$user_role' )";
        return mysqli_query($this->conn,$query);
    }

    public function deleteUser($user_name){
        $query = "DELETE FROM tblnguoidung WHERE Nguoidung_ten = '$user_name'";
        return mysqli_query($this->conn, $query);
    }

    public function checkUserName($user_name){
        $query = "SELECT count(*) from tblnguoidung where Nguoidung_ten = '$user_name'";
        return mysqli_query($this->conn, $query);
    }

}


?>