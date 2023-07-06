<?php

require_once 'api/controllers/read.php';
require_once 'api/controllers/create.php';
require_once 'api/controllers/update.php';
require_once 'api/controllers/delete.php';
require_once 'api/core/statusMessage.php';

$request_method = $_SERVER['REQUEST_METHOD'];

if(isset($_GET['url'])) {
   $request_uri = $_GET['url'];
} else {
   $request_uri = '/';
}
$endpoint = rtrim(substr($request_uri, strlen('api/')), '/'); //lấy endpoint sau api/
$params = [];
if ($endpoint !== '') {
    $params = explode('/', $endpoint);
}

$read = new read();
$create = new create();
$update = new update();
$delete = new delete();

switch ($request_method) {
    case 'GET':
        if($params[0] == "product"){
            if (count($params) === 1 ) {
                $read->getProductList();
            } elseif (count($params) === 2) {
                $product_id = $params[1];
                $read->getProduct($product_id);
            } else {
                $status = 406;
                header('HTTP/1.0 406'.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "distributor"){
            if (count($params) === 1 ) {
                $read->getDistributorList();
            } elseif (count($params) === 2 ) {
                $distributor_id = $params[1];
                $read->getDistributor($distributor_id);
            } else {
                $status = 406;
                header('HTTP/1.0 406'.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "user"){
            if (count($params) === 1 ) {
                $read->getUser();
            }elseif (count($params) === 2 ) {
                    $user_name = $params[1];
                    $read->getUserByName($user_name); 
            }elseif(count($params) === 3 ){
                $user_role = $params[2];
                $read->getUserByRole($user_role);
            }else{
                $status = 406;
                header('HTTP/1.0 406'.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "import"){
            if (count($params) === 1 ) {
                $read->getImportCoupon();
            }elseif (count($params) === 2 ) {
                $coupon_id = $params[1];
                $read->getImportById($coupon_id); 
            }else {
                $status = 406;
                header('HTTP/1.0 406'.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "export"){
            if (count($params) === 1 ) {
                $read->getExportCoupon();
            }elseif (count($params) === 2 ) {
                $coupon_id = $params[1];
                $read->getExportById($coupon_id); 
            }else {
                $status = 406;
                header('HTTP/1.0 406'.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "warehouse"){
            if (count($params) === 2 ) {
                $product_id = $params[1];
                $read->getWarehouse( $product_id);
            }else {
                $status = 406;
                header('HTTP/1.0 406'.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }
        break;
    case 'POST':
        if($params[0] == "product"){
            if (count($params) === 1 ) {
                $create->createProduct();
            }else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "distributor"){
            if (count($params) === 1 ) {
                $create->createDistributor();
            }else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "user"){
            if (count($params) === 1 ) {
                $create->createUser();
            }else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "import"){
            if (count($params) === 1 ) {
                $create->createImportCoupon();
            }else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "export"){
            if (count($params) === 1 ) {
                $create->createExportCoupon();
            }else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }
        break;
     case 'PUT':

        if($params[0] == "product"){
            if(count($params) === 2  ) {
                $product_id = $params[1];
                $update->updateProduct($product_id);
            } else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "distributor"){
            if(count($params) === 2  ) {
                $distributor_id = $params[1];
                $update->updateDistributor($distributor_id);
            } else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "user"){
            if (count($params) === 2 ) {
                $user_name = $params[1];
                $update->updateUser($user_name);
            } else {
                $status = 406;
                header('HTTP/1.0 406'.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "warehouse"){
            if (count($params) === 2 ) {
                $product_id = $params[1];
                $update->updateWarehouse($product_id);
            } else {
                $status = 406;
                header('HTTP/1.0 406'.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }
        break; 
    case 'DELETE':
        if($params[0] == "product"){
            if (count($params) === 2 ) {
                $product_id = $params[1];
                $delete->deleteProduct($product_id);
            } else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "distributor"){
            if (count($params) === 2 ) {
                $distributor_id = $params[1];
                $delete->deleteDistributor($distributor_id);
            } else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "user"){
            if (count($params) === 2 ) {
                $user_name = $params[1];
                $delete->deleteUser($user_name);
            } else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "import"){
            if (count($params) === 3 ) {
                $coupon_id = $params[1];
                $product_id = $params[2];
                $delete->deleteImportCoupon($coupon_id,$product_id );
            } else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }elseif($params[0] == "export"){
            if (count($params) === 3 ) {
                $coupon_id = $params[1];
                $product_id = $params[2];
                $delete->deleteExportCoupon($coupon_id,$product_id);
            } else {
                $status = 406;
                header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
                echo json_encode(array(
                    'status' => $status,
                    'message' => getStatusCodeMessage($status))
                );
            }
        }
        break;
    default:
    $status = 405;
    header('HTTP/1.0 '.$status.' '.getStatusCodeMessage($status));
    echo json_encode(array(
        'status' => $status,
        'message' => getStatusCodeMessage($status))
    );
}    


?>
