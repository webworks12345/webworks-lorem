<?php
require_once 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
       
        $paymongoSecretKey = 'sk_test_McfYB6NLVEd3oYgQMsyXTW6d';

       
        $packCode = $_POST['packCode'];
        $packageDetailsQ = $DB->query("SELECT p.*, c.*, s.*
            FROM package p
            JOIN category c ON p.packCode = c.packCode
            JOIN service s ON c.categoryCode = s.categoryCode
            WHERE p.packCode = '$packCode'");


        $lineItems = [];

        while ($packageDetails = $packageDetailsQ->fetch_assoc()) {
            $productName = $packageDetails['serviceName'];
            $quantity = (int)$packageDetails['quantity'];
            $amount = (int)$packageDetails['price'] * 100;
            $description = $packageDetails['packName']; 
           
            $lineItems[] = [
                'name' => $productName,
                'quantity' => $quantity,
                'amount' => $amount,
                'currency' => 'PHP',
            ];
        }

        $client = new \GuzzleHttp\Client();

     
        $response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
            'json' => [
                'data' => [
                    'attributes' => [
                        'send_email_receipt' => true,
                        'show_description' => true,
                        'show_line_items' => true,
                        'line_items' => $lineItems, // Use the array of line items
                        'payment_method_types' => ['card', 'gcash'],
                        'description' => $description ,
                    ],
                ],
            ],
            'headers' => [
                'Content-Type' => 'application/json',
                'accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($paymongoSecretKey . ':'),
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        
        if ($statusCode >= 200 && $statusCode < 300) {
            $responseData = json_decode($body, true);

           
            header('Location: ' . $responseData['data']['attributes']['checkout_url']);
            exit; 
        } else {
           
            echo 'Error: HTTP ' . $statusCode . ' - ' . $body;
        }
    } catch (\Exception $e) {
      
        echo 'Error: ' . $e->getMessage();

        if ($e->hasResponse()) {
            echo 'Response Body: ' . $e->getResponse()->getBody()->getContents();
        }
    }
}
?>