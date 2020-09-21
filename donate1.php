<?php
  $name= $_POST['name'];
  $email= $_POST['email'];
  $phone= $_POST['phone'];
  $amount= $_POST['amount'];

  include 'instamojo/Instamojo.php';
  $api = new Instamojo\Instamojo('', '',
  'https://test.instamojo.com/api/1.1/');

  try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "Donation for poor childern",
        "amount" => $amount,
        "send_email" => true,
		"name" => $name,
        "email" => $email,
        "phone" => $phone,
        "send_sms" => true,
		"allow repeated payment"=>false,
        "redirect_url" => "https://no-child-hungrey.herokuapp.com/thankyou.php"
        //"webhook" =>
        ));
        //print_r($response);
        $pay_url=$response['longurl'];
        header("location:$pay_url");
  }
  catch (Exception $e) {
      print('Error: ' . $e->getMessage());
  }
?>
