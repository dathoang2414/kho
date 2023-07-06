<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: GET');
    header('Access-Control-Allow-Header: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
   
    require_once 'api/core/statusMessage.php';

    class read extends controller{

        //lấy dữ liệu hàng hóa
        public function getProductList(){
            $productModel = $this->model('productModels');
            $result = $productModel->getAllProduct();

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }

            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }

        }

        //lấy dữ liệu hàng hóa theo id
        public function getProduct($product_id){
            $productModel = $this->model('productModels');
            $result = $productModel->getProductById($product_id);

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                        'status' => 404,
                        'message'=> getStatusCodeMessage(404),
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }

            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }
        }

        public function getWarehouse($product_id){
            $warehouseModel = $this->model('warehouseModels');
            $result = $warehouseModel->getWarehouse($product_id);

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }

            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }
        }
        
        // lấy dữ liệu nhà phân phối
        public function getDistributorList(){
            $distributorModel = $this->model('distributorModels');
            $result = $distributorModel->getDistributor();

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }

            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }
        }

        //lấy dữ liệu nhà phân phối theo id
        public function getDistributor($distributor_id){
            $distributorModel = $this->model('distributorModels');
            $result = $distributorModel->getDistributorById($distributor_id);

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }

            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }
        }

        // lấy dữ liệu user
        public function getUser(){
            $userModel = $this->model('userModels');
            $result = $userModel->getUser();

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                        'status' => 404,
                        'message'=> getStatusCodeMessage(404),
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }
            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }
        }
        //lấy dữ liệu user bằng username
        public function getUserByName($user_name){
            $userModel = $this->model('userModels');
            $result = $userModel->getUserByName($user_name);

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                        'status' => 404,
                        'message'=> getStatusCodeMessage(404),
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }
            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }
        }

        public function getUserByRole($user_role){
            $userModel = $this->model('userModels');
            $result = $userModel->getUserByRole($user_role);

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }
            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }
        }

        //lấy dữ liệu phiếu nhập
        public function getImportCoupon(){
            $couponModel = $this->model('couponModels');
            $result = $couponModel->getImportCoupon();

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }

            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }

        }

        public function getImportById($coupon_id){
            $couponModel = $this->model('couponModels');
            $result = $couponModel->getImportById($coupon_id);

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }

            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }

        }

        public function getExportCoupon(){
            $couponModel = $this->model('couponModels');
            $result = $couponModel->getExportCoupon();

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }

            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }

        }

        public function getExportById($coupon_id){
            $couponModel = $this->model('couponModels');
            $result = $couponModel->getExportById($coupon_id);

            if($result){
                if(mysqli_num_rows($result)>0){
                    $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $data = json_encode($res);
                    header('HTTP/1.0 200 '.getStatusCodeMessage(200));
                    echo $data;
                }else{
                    $data = [
                    ];
                    header('HTTP/1.0 404 '.getStatusCodeMessage(404));
                    echo json_encode($data);
                }

            }else{
                $data = [
                    'status' => 500,
                    'message'=> getStatusCodeMessage(500),
                ];
                header('HTTP/1.0 505 '.getStatusCodeMessage(500));
                echo json_encode($data);
            }

        }
    }

?>