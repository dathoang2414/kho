<?php

    class productModels extends connectDB{
        
        public function getAllProduct() {
            $query = "SELECT * FROM `tblhanghoa` c INNER JOIN `tblkho` d ON c.Hanghoa_ma = d.Hanghoa_ma";
            return mysqli_query($this->conn, $query);
        }

        public function getProductById($product_id) {
            $query = "SELECT * FROM tblhanghoa WHERE Hanghoa_ma = '$product_id'";
            return mysqli_query($this->conn, $query);
        }

        public function createProduct($product_id, $product_name, $unit, $price, $salePrice) {
            $query = "INSERT INTO tblhanghoa(Hanghoa_ma, Hanghoa_ten, Hanghoa_dvt, Hanghoa_gia, Hanghoa_xuat) VALUES ('$product_id', '$product_name', '$unit', '$price', '$salePrice')";
            return mysqli_query($this->conn, $query);
        }

        public function updateProduct($product_id, $product_name, $unit, $price, $salePrice){
            $query = "UPDATE tblhanghoa SET  Hanghoa_ten = '$product_name',Hanghoa_dvt = '$unit', Hanghoa_gia = '$price', Hanghoa_xuat = '$salePrice' WHERE Hanghoa_ma = '$product_id'";
            return mysqli_query($this->conn, $query);
        }

        public function deleteProduct($product_id) {
            $query = "DELETE FROM tblhanghoa WHERE Hanghoa_ma = '$product_id'";
            return mysqli_query($this->conn, $query);
        }

        public function checkProductId($product_id){
            $query = "SELECT count(*) from tblhanghoa where Hanghoa_ma = '$product_id'";
            return mysqli_query($this->conn, $query);
        }

    }

?>