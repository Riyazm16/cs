<?php

require_once 'vendor/autoload.php';
 
$base_url 		= 'https://www.clearskin.in/gravityformsapi/';
$method  		= 'POST';
$route 			= 'forms/7/submissions';

$data = array(
    'input_values' => array(
            'input_1_3'   => 'First Name', // First Name
            'input_1_6'   => 'Last Name', // Last Name
            'input_2'     => '123456', // Contact
            'input_3'     => 'test@email.com', // Email
            'input_4'     => 'Acne Pimples' // Treatment
      ),
);

$url = $base_url . $route;
 
$response = Requests::request( $url, array(), json_encode( $data ), 'POST' );

echo "<pre>";
print_r( json_decode( $response->body, 1 ) );
echo "</pre>";