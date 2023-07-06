<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-Control-Allow-Header: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
   
    require_once 'api/core/statusMessage.php';



    class create extends controller{
        public function createProduct(){

            $error= false;
            $errorMessage = [];
            $status = 0;
    
            $product_id = $_POST['Hanghoa_ma'];
            $product_name = $_POST['Hanghoa_ten'];
            $product_unit = $_POST['Hanghoa_dvt'];
            $product_price = $_POST['Hanghoa_gia'];
            $product_salePrice = $_POST['Hanghoa_xuat'];
    
            $productModel = $this->model('productModels');
            $result = $productModel->getAllProduct();
    
            if(empty(trim($product_id))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter product id'
                ];
                echo json_encode($data);
            }else if(empty(trim($product_name))){
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
            }else {
                while($row = mysqli_fetch_assoc($result)) {
                    if($row['Hanghoa_ma'] == $product_id) {
                        $status = 409;
                        $error = true;
                        $errorMessages[] = "mã sản phẩm đã tồn tại.";
                        break;
                    } else if($row['Hanghoa_ten'] == $product_name) {
                        $status = 409;
                        $error = true;
                        $errorMessages[] = "tên sản phẩm đã tồn tại.";
                        break;
                    } 
                }
        
                if ($error) {
                    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                    echo json_encode([
                        "status" => $status,
                        "message" => $errorMessages
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    $result = $productModel->createProduct($product_id, $product_name, $product_unit, $product_price, $product_salePrice);
                    if($result) {
                        $status = 201;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "Thêm san pham thành công!!",
                    ], JSON_UNESCAPED_UNICODE);
                    }else {
                        $status = 400;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "Thêm san pham thất bại!!",
                    ], JSON_UNESCAPED_UNICODE);
                    }
                }
            }
        
        }

        public function createDistributor(){
            $error= false;
            $errorMessage = [];
            $status = 0;
            
            $distributor_id = $_POST['Npp_ma'];
            $distributor_name = $_POST['Npp_ten'];
    
            $distributorModel = $this->model('distributorModels');
            $result = $distributorModel->getDistributor();
            
            if(empty(trim($distributor_id))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter distributor id'
                ];
                echo json_encode($data);
            }elseif(empty(trim($distributor_name))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter distributor name'
                ];
                echo json_encode($data);
            }else{

                while($row = mysqli_fetch_assoc($result)) {
                    if($row['Npp_ma'] == $distributor_id) {
                        $status = 409;
                        $error = true;
                        $errorMessages[] = "mã nhà phân phối đã tồn tại.";
                        break;
                    }elseif($row['Npp_ten'] == $distributor_name) {
                        $status = 409;
                        $error = true;
                        $errorMessages[] = "tên nhà phân phối đã tồn tại.";
                        break;
                    }
                }

                if ($error) {
                    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                    echo json_encode([
                        "status" => $status,
                        "message" => $errorMessages
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    $result = $distributorModel->createDistributor($distributor_id, $distributor_name);
                    if($result) {
                        $status = 200;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "Thêm thành công!!",
                    ], JSON_UNESCAPED_UNICODE);
                    }else {
                        $status = 400;
                        $error = false;
                        $errorMessages[] = "Thêm thất bại!!";
                    }
                }
            }

        }

        public function createUser(){
            $error= false;
            $errorMessage = [];
            $status = 0;

            $user_name = $_POST['Nguoidung_ten'];
            $user_password = $_POST['Nguoidung_mk'];
            $user_role = $_POST['Nguoidung_cap'];

            $userModel = $this->model('userModels');
            $result = $userModel->getUser();
            if(empty(trim($user_name))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter your username'
                ];
                echo json_encode($data);
            }elseif(empty(trim($user_password))){
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

                while($row = mysqli_fetch_assoc($result)){
                    if($row['Nguoidung_ten'] == $user_name){
                        $error = true;
                        $status = 409;
                        $errorMessages[]= "Username already exists!!";
                        break;
                    }
                }

                if ($error) {
                    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                    echo json_encode([
                        "status" => $status,
                        "message" => $errorMessages
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    $result = $userModel->createUser($user_name, $user_password, $user_role);
                    if($result) {
                        $status = 200;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "create successful!!",
                    ], JSON_UNESCAPED_UNICODE);
                    }else {
                        $status = 400;
                        $error = false;
                        $errorMessages[] = "create fail!!";
                    }
                }

            }
        }

        //tạo phiếu nhập hàng
        public function createImportCoupon(){
            $error= false;
            $errorMessage = [];
            $status = 0;

            //lấy dữ liệu từ post
            $coupon_id = $_POST['Phieunhap_ma'];
            $product_id = $_POST['Hanghoa_ma'];
            $distributor_id = $_POST['NPP_ma'];
            $user_name = $_POST['Nguoidung_ten'];
            $coupon_date = $_POST['Phieunhap_ngay'];
            $coupon_quantity = $_POST['Phieunhap_sl'];
            $coupon_cost = $_POST['Phieunhap_cost'];

            //lấy danh sách các model
            $couponModel = $this->model('couponModels');
            $result = $couponModel->checkImportId($coupon_id);

            $productModel = $this->model('productModels');
            $result1 = $productModel->checkProductId($product_id);

            $distributorModel = $this->model('distributorModels');
            $result2 = $distributorModel->checkDistributorId($distributor_id);

            $userModel = $this->model('userModels');
            $result3 = $userModel->checkUserName($user_name);

            //kiểm tra các trường đã đc nhập chưa
            if(empty(trim($coupon_id))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter import coupon'
                ];
                echo json_encode($data);
            }elseif(empty(trim($product_id))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter product id'
                ];
                echo json_encode($data);
            }elseif(empty(trim($distributor_id))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter distributor id'
                ];
                echo json_encode($data);
            }elseif(empty(trim($user_name))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter employee id'
                ];
                echo json_encode($data);
            }elseif(empty(trim($coupon_date))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter import coupon'
                ];
                echo json_encode($data);
            }elseif(empty(trim($coupon_quantity))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter import coupon'
                ];
                echo json_encode($data);
            }elseif(empty(trim($coupon_cost))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter import coupon cost'
                ];
            }else{
                $row = mysqli_fetch_array($result);
                $count = $row[0];
                $row1 = mysqli_fetch_array($result1);
                $count1 = $row1[0];
                $row2 = mysqli_fetch_array($result2);
                $count2 = $row2[0];
                $row3 = mysqli_fetch_array($result3);
                $count3 = $row3[0];

                //kiểm tra các trường vừa nhập có trùng với dữ liệu trên db
                if ($count > 0) {
                    $error = true;
                    $status = 409;
                    $errorMessages[]= "coupon id already exists!!";
                }elseif ($count1 == 0) {
                    $error = true;
                    $status = 409;
                    $errorMessages[]= "Product id does not exist!!";
                }elseif ($count2 == 0) {
                    $error = true;
                    $status = 409;
                    $errorMessages[]= "distributor id does not exist!!";
                }elseif ($count3 == 0) {
                    $error = true;
                    $status = 409;
                    $errorMessages[]= "username does not exist!!";
                }

                if ($error) {
                    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                    echo json_encode([
                        "status" => $status,
                        "message" => $errorMessages
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    $result = $couponModel->createImportCoupon($coupon_id, $product_id, $distributor_id, $user_name, $coupon_date, $coupon_quantity, $coupon_cost);
                    if($result) {
                        $status = 200;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "create successful!!",
                    ], JSON_UNESCAPED_UNICODE);
                    }else {
                        $status = 400;
                        $error = false;
                        $errorMessages[] = "create fail!!";
                    }
                }
            }
        }

        public function createExportCoupon(){
            $error= false;
            $errorMessage = [];
            $status = 0;

            //lấy dữ liệu từ post
            $coupon_id = $_POST['Phieuxuat_ma'];
            $product_id = $_POST['Hanghoa_ma'];
            $user_name = $_POST['Nguoidung_ten'];
            $coupon_date = $_POST['Phieuxuat_ngay'];
            $coupon_quantity = $_POST['Phieuxuat_sl'];
            $coupon_cost = $_POST['Phieuxuat_cost'];
            $customer = $_POST['Phieuxuat_customer'];
            $numberPhone = $_POST['Phieuxuat_sdt'];
            $profit = $_POST['Profit'];

            //lấy danh sách các model
            $couponModel = $this->model('couponModels');
            $result = $couponModel->checkExportId($coupon_id);

            $productModel = $this->model('productModels');
            $result1 = $productModel->checkProductId($product_id);

            $userModel = $this->model('userModels');
            $result3 = $userModel->checkUserName($user_name);

            //kiểm tra các trường đã đc nhập chưa
            if(empty(trim($coupon_id))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter import coupon'
                ];
                echo json_encode($data);
            }elseif(empty(trim($product_id))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter product id'
                ];
                echo json_encode($data);
            }elseif(empty(trim($user_name))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter employee id'
                ];
                echo json_encode($data);
            }elseif(empty(trim($coupon_date))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter import coupon'
                ];
                echo json_encode($data);
            }elseif(empty(trim($coupon_quantity))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter import coupon'
                ];
                echo json_encode($data);
            }elseif(empty(trim($coupon_cost))){
                $status = 422;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                $data = [
                    'status' => $status,
                    'message' => 'enter import coupon cost'
                ];
            }else{
                $row = mysqli_fetch_array($result);
                $count = $row[0];
                $row1 = mysqli_fetch_array($result1);
                $count1 = $row1[0];
                $row3 = mysqli_fetch_array($result3);
                $count3 = $row3[0];

                //kiểm tra các trường vừa nhập có trùng với dữ liệu trên db
                if ($count > 0) {
                    $error = true;
                    $status = 409;
                    $errorMessages[]= "coupon id already exists!!";
                }elseif ($count1 == 0) {
                    $error = true;
                    $status = 409;
                    $errorMessages[]= "Product id does not exist!!";
                }elseif ($count3 == 0) {
                    $error = true;
                    $status = 409;
                    $errorMessages[]= "username does not exist!!";
                }

                if ($error) {
                    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                    echo json_encode([
                        "status" => $status,
                        "message" => $errorMessages
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    $result = $couponModel->createExportCoupon($coupon_id, $product_id, $user_name, $coupon_date, $coupon_quantity, $coupon_cost, $customer, $numberPhone, $profit);
                    if($result) {
                        $status = 200;
                        header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                        echo json_encode([
                            "status" => $status,
                            "message" => "create successful!!",
                    ], JSON_UNESCAPED_UNICODE);
                    }else {
                        $status = 400;
                        $error = false;
                        $errorMessages[] = "create fail!!";
                    }
                }
            }
        }
    }

?>