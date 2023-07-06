<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: PUT');
    header('Access-Control-Allow-Header: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
   
    require_once 'api/core/statusMessage.php';

    class update extends controller{
        public function updateProduct($product_id){
            $data = json_decode(file_get_contents("php://input"),true);

            $error= false;
            $errorMessage = [];
            $status = 0;
            
            $product_name = $data['Hanghoa_ten'];
            $product_unit = $data['Hanghoa_dvt'];
            $product_price = $data['Hanghoa_gia'];
            $product_salePrice = $data['Hanghoa_xuat'];
    
            $productModel = $this->model('productModels');
            $result = $productModel->getAllProduct();
            
            if(empty(trim($product_name))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter product name'
                ];
                echo json_encode($data);
            }else if(empty(trim($product_unit))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter product unit'
                ];
                echo json_encode($data);
            }else if(empty(trim($product_price))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter product price'
                ];
                echo json_encode($data);
            }else if(empty(trim($product_salePrice))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter product sale Price'
                ];
                echo json_encode($data);
            }else{
                while($row = mysqli_fetch_assoc($result)) {
                    if($row['Hanghoa_ma'] != $product_id) {
                        if($row['Hanghoa_ten'] == $product_name) {
                            $status = 409;
                            $error = true;
                            $errorMessages[] = "Tên sản phẩm đã tồn tại.";
                        } 
                    }
                }
    
                if ($error) {
                    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                    echo json_encode([
                        "status" => $status,
                        "message" => $errorMessages
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    $result = $productModel->updateProduct($product_id, $product_name, $product_unit, $product_price, $product_salePrice);
                    if($result) {
                        $status = 200;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "Cập nhật sản phẩm thành công!!",
                    ], JSON_UNESCAPED_UNICODE);
                    }else {
                        $status = 400;
                        $error = false;
                        $errorMessages[] = "Cập nhật thất bại!!";
                    }
                }
            }


        }

        public function updateDistributor($distributor_id){
            $data = json_decode(file_get_contents("php://input"),true);

            $error= false;
            $errorMessage = [];
            $status = 0;
            
            $distributor_name = $data['Npp_ten'];
    
            $distributorModel = $this->model('distributorModels');
            $result = $distributorModel->getDistributor();
            
            if(mysqli_num_rows($result) > 0 ){
                if(empty(trim($distributor_name))){
                    $status = 422;
                    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                    $data = [
                        'status' => $status,
                        'message' => 'enter distributor name'
                    ];
                    echo json_encode($data);
                }else{
    
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row['Npp_ma'] != $distributor_id) {
                            if($row['Npp_ten'] == $distributor_name) {
                                $status = 409;
                                $error = true;
                                $errorMessages[] = "Tên nhà phân phối tồn tại đã tồn tại.";
                            } 
                        }
                    }
    
                    if ($error) {
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => $errorMessages
                        ], JSON_UNESCAPED_UNICODE);
                    } else {
                        $result2 = $distributorModel->updateDistributor($distributor_id, $distributor_name);
                        if($result2) {
                            $status = 200;
                            header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                            echo json_encode([
                                "status" => $status,
                                "message" => "Cập nhật thành công!!",
                        ], JSON_UNESCAPED_UNICODE);
                        }else {
                            $status = 400;
                            $error = false;
                            $errorMessages[] = "Cập nhật thất bại!!";
                        }
                    }
                }   
            }else{
                $data = [
                    'status' => 404,
                    'message'=> getStatusCodeMessage(404),
                ];
                header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                echo json_encode($data);
            }

        }

        public function updateWarehouse($product_id){
            $data = json_decode(file_get_contents("php://input"),true);
            $status = 0;
            
            $product_quantity = $data['Kho_sl'];
    
            $warehouseModel = $this->model('warehouseModels');
            
            
                if(empty(trim($product_quantity)) && trim($product_quantity) != 0){
                    $status = 422;
                    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                    $data = [
                        'status' => $status,
                        'message' => 'enter product quantity'
                    ];
                    echo json_encode($data);
                }else{

                    
                    $result = $warehouseModel->updateWarehouse($product_id, $product_quantity);
                    if($result) {
                        $status = 200;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "Cập nhật thành công!!",
                    ], JSON_UNESCAPED_UNICODE);
                    }else {
                        $status = 400;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "Cập nhật thất bại!!",
                    ], JSON_UNESCAPED_UNICODE);
                    }
                }

        }

        public function updateUser($user_name){
            $data = json_decode(file_get_contents("php://input"),true);

            $error= false;
            $errorMessage = [];
            $status = 0;
            
            $user_password = $data['Nguoidung_mk'];
            $user_role = $data['Nguoidung_cap'];

    
            $userModel = $this->model('userModels');
            $result = $userModel->getUser();

            if(mysqli_num_rows($result) > 0 ){
                if(empty(trim($user_password))){
                    $status = 422;
                    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                    $data = [
                        'status' => $status,
                        'message' => 'enter your password'
                    ];
                    echo json_encode($data);
                }elseif(empty(trim($user_role))){
                    $status = 422;
                    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                    $data = [
                        'status' => $status,
                        'message' => 'enter your role'
                    ];
                    echo json_encode($data);
                }else{
    
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row['Nguoidung_ten'] == $user_name) {
                            if($row['Nguoidung_mk'] == $user_password || $row['Nguoidung_cap'] == $user_role) {
                                $status = 409;
                                $error = true;
                                $errorMessages[] = "The new password is the same as the old password";
                            } 
                        }
                    }
    
                    if ($error) {
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => $errorMessages
                        ], JSON_UNESCAPED_UNICODE);
                    } else {
                        $result = $userModel->updateUser($user_name, $user_password, $user_role);
                        if($result) {
                            $status = 200;
                            header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                            echo json_encode([
                                "status" => $status,
                                "message" => "Update successful!!",
                        ], JSON_UNESCAPED_UNICODE);
                        }else {
                            $status = 400;
                            $error = false;
                            $errorMessages[] = "Update fail!!";
                        }
                    }
                }   
            }else{
                $data = [
                    'status' => 404,
                    'message'=> getStatusCodeMessage(404),
                ];
                header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                echo json_encode($data);
            }

        }
    }

?>