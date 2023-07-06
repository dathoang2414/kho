<?php

    class warehouseModels extends connectDB{

        public function getWarehouse($product_id){
            $query = "SELECT * FROM tblkho where Hanghoa_ma = '$product_id'";
            return mysqli_query($this->conn, $query);
        }

        public function updateWarehouse($product_id,$product_quantity){
            $query = "UPDATE tblkho set Kho_sl = '$product_quantity' where Hanghoa_ma = '$product_id'";
            return mysqli_query($this->conn, $query);
        }


    }


?>