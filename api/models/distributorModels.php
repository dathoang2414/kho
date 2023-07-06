<?php

    class distributorModels extends connectDB{
        public function getDistributor(){
            $query = 'SELECT * from tblnhaphanphoi';
            return mysqli_query($this->conn,$query);
        }

        public function getDistributorById($distributor_id){
            $query = "SELECT * FROM tblnhaphanphoi WHERE Npp_ma = '$distributor_id' ";
            return mysqli_query($this->conn, $query);
        }

        public function createDistributor($distributor_id,$distributor_name){
            $query = "INSERT INTO tblnhaphanphoi VALUES('$distributor_id','$distributor_name')";
            return mysqli_query($this->conn, $query);
        }

        public function updateDistributor($distributor_id,$distributor_name){
            $query = "UPDATE tblnhaphanphoi SET Npp_ten = '$distributor_name' where Npp_ma = '$distributor_id'";
            return mysqli_query($this->conn, $query);
        }
        public function deleteProduct($distributor_id){
            $query = "DELETE FROM tblnhaphanphoi WHERE Npp_ma = '$distributor_id'";
            return mysqli_query($this->conn, $query);
        }
        public function checkDistributorId($distributor_id){
            $query = "SELECT count(*) from tblnhaphanphoi where Npp_ma = '$distributor_id'";
            return mysqli_query($this->conn, $query);
        }
    }


?>