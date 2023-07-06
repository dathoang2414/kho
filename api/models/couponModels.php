<?php
    class couponModels extends connectDB{
        //lấy dữ liệu phiếu nhập
        public function getImportCoupon(){
            $query = "SELECT * from tblphieunhap";
            return mysqli_query($this->conn, $query);
        }

        public function createImportCoupon($coupon_id,$product_id,$distributor_id,$user_name,$coupon_date,$coupon_quantity,$coupon_cost ){
            $query = "INSERT INTO tblphieunhap (`Phieunhap_ma`, `Hanghoa_ma`, `NPP_ma`, `Nguoidung_ten`, `Phieunhap_ngay`, `Phieunhap_sl`, `Phieunhap_cost`) VALUES ('$coupon_id','$product_id','$distributor_id','$user_name','$coupon_date','$coupon_quantity','$coupon_cost')";
            return mysqli_query($this->conn, $query);
        }

        public function deleteImportCoupon($coupon_id, $product_id){
            $query = "DELETE FROM `tblphieunhap` WHERE Phieunhap_ma = '$coupon_id' and Hanghoa_ma = '$product_id'";
            return mysqli_query($this->conn, $query);
        }

        public function getImportById($coupon_id){
            $query = "SELECT * FROM tblphieunhap WHERE Phieunhap_ma = '$coupon_id'";
            return mysqli_query($this->conn, $query);
        }

        public function checkImportId($coupon_id){
            $query = "SELECT COUNT(*) FROM tblphieunhap WHERE Phieunhap_ma = '$coupon_id'";
            return mysqli_query($this->conn, $query);
        }



        //lấy dữ liệu phiếu xuất
        public function getExportCoupon(){
            $query = "SELECT * from tblphieuxuat";
            return mysqli_query($this->conn, $query);
        }  

        public function createExportCoupon($coupon_id, $product_id, $user_name, $coupon_date, $coupon_quantity, $coupon_cost, $customer, $numberPhone, $profit){
            $query = "INSERT INTO tblphieuxuat(Phieuxuat_ma,Hanghoa_ma,Nguoidung_ten,Phieuxuat_ngay,Phieuxuat_sl,Phieuxuat_cost,Phieuxuat_customer,Phieuxuat_sdt,Profit) 
                          VALUES ('$coupon_id','$product_id','$user_name','$coupon_date',$coupon_quantity,$coupon_cost,'$customer','$numberPhone',$profit)";
             
            return mysqli_query($this->conn,$query);
        }

        public function deleteExportCoupon($coupon_id, $product_id){
            $query = "DELETE FROM `tblphieuxuat` WHERE Phieuxuat_ma = '$coupon_id' and Hanghoa_ma = '$product_id'";
            return mysqli_query($this->conn, $query);
        }

        public function getExportById($coupon_id){
            $query = "SELECT * FROM tblphieuxuat WHERE Phieuxuat_ma = '$coupon_id'";
            return mysqli_query($this->conn, $query);
        }

        public function checkExportId($coupon_id){
            $query = "SELECT COUNT(*) FROM tblphieuxuat WHERE Phieuxuat_ma = '$coupon_id'";
            return mysqli_query($this->conn, $query);
        }

    }

?>