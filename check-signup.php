<?php
$postdata 	= file_get_contents("php://input");
$request 	= json_decode($postdata);
$firstname 	= $request->firstname;
$lastname 	= $request->lastname;
$Email1 	= $request->Email1;
$Password1 	= $request->Password1;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "
http://private-anon-afae6eb17-dropsign.apiary-proxy.com/users/signup
");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, '{
"first_name": $firstname,
"last_name": $lastname,
"email": $Email1,
"password": $Password1
}');

///////////////////////////////
//$postfields = array("first_name" => "John","last_name" => "Doe","email" => "john@doe.com","password" => "pass");

//curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields); 
///////////////////////////////

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));

$response = curl_exec($ch);

if(curl_exec($ch) === false)
{
    echo 'Curl error: ' . curl_error($ch);
}
else
{
    echo 'Operation completed without any errors';
}

curl_close($ch);

echo var_dump($response);
?>