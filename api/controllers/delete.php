<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: DELETE');
    header('Access-Control-Allow-Header: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
   
    require_once 'api/core/statusMessage.php';

    class delete extends controller{
        public function deleteProduct($product_id) {
            $productModel = $this->model('productModels');
            $result = $productModel->deleteProduct($product_id);
            if($result) {
                $status = 201;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "Xóa sản phẩm thành công!!",
                    ], JSON_UNESCAPED_UNICODE);
            } else {
                $status = 400;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "xóa sản phẩm thất bại!!",
                    ], JSON_UNESCAPED_UNICODE);
            }
        }

        public function deleteDistributor($distributor_id) {
            $distributorModel = $this->model('distributorModels');
            $result = $distributorModel->deleteProduct($distributor_id);
            if($result) {
                $status = 201;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "Xóa thành công!!",
                    ], JSON_UNESCAPED_UNICODE);
            } else {
                $status = 400;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "xóa thất bại!!",
                    ], JSON_UNESCAPED_UNICODE);
            }
        }

        public function deleteUser($user_name){
            $userModel = $this->model('userModels');
            $result = $userModel->deleteUser($user_name);
            if($result) {
                $status = 201;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "delete successful!!",
                    ], JSON_UNESCAPED_UNICODE);
            } else {
                $status = 400;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "delete fail!!",
                    ], JSON_UNESCAPED_UNICODE);
            }
        }

        public function deleteImportCoupon($coupon_id, $product_id){
            $couponModel = $this->model('couponModels');
            $result = $couponModel->deleteImportCoupon($coupon_id, $product_id);
            if($result) {
                $status = 201;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "delete successful!!",
                    ], JSON_UNESCAPED_UNICODE);
            } else {
                $status = 400;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "delete fail!!",
                    ], JSON_UNESCAPED_UNICODE);
            }
        }

        public function deleteExportCoupon($coupon_id, $product_id){
            $couponModel = $this->model('couponModels');
            $result = $couponModel->deleteExportCoupon($coupon_id, $product_id);
            if($result) {
                $status = 201;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "delete successful!!",
                    ], JSON_UNESCAPED_UNICODE);
            } else {
                $status = 400;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "delete fail!!",
                    ], JSON_UNESCAPED_UNICODE);
            }
        }
    }

?>