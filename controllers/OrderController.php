<?php
sleep(1.5);
class OrderController {

    public function Send(){

        function ifAjaxSuccess() {
          return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
          $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
        }

        $bookId = isset($_POST['bookId']) ? (int) $_POST['bookId'] : '';
        $bookTitle = isset($_POST['bookTitle']) ? (string) $_POST['bookTitle'] : '';
        $price = isset($_POST['bookPrice']) ? (int) $_POST['bookPrice'] : '';
        $userAddress = isset($_POST['userAddress']) ? (string) $_POST['userAddress'] : '';
        $userName = isset($_POST['userName']) ? (string) $_POST['userName'] : '';
        $count = isset($_POST['count']) ? (int) $_POST['count'] : '';

        $errors = [];
          if($userAddress == '') { $errors[] = 'userAddress'; }
          if($userName == '') { $errors[] = 'userName'; }
          if($count == '') { $errors[] = 'count'; }
          if(!empty($errors)) {
            $result_array = array('errors' => $errors);
            echo json_encode($result_array);
            exit;
          }

          $status  = "Order form: " . $userName . "<br/>";
          $status .= "ID good: " . $bookId . "<br/>";
          $status .= "Title: " . $bookTitle . "<br/>";
          $status .= "Count: " . $count . "<br/>";
          $status .= "Price: " . $price . "<br/>";
          $status .= "Order send to address: " . $userAddress;

          if(ifAjaxSuccess()){
            echo json_encode(array('status' => $status));
            Order::send_mail($status);
          } else {
            exit;
          }
    }
}
