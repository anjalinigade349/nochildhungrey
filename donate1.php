<?php
  $name= $_POST['name'];
  $email= $_POST['email'];
  $phone= $_POST['phone'];
  $amount= $_POST['amount'];

  include 'instamojo/Instamojo.php';
  $api = new Instamojo\Instamojo('test_b0cc495920312110ec464000599', 'test_5d97d8fc233388660b7ebf851c3',
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
        "redirect_url" => "https://nochildhungrey.herokuapp.com/form.php"
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
