<?php
$postdata 	= file_get_contents("php://input");
$request 	= json_decode($postdata);
$uname 		= $request->username;
$pass 		= $request->password;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "
http://private-anon-afae6eb17-dropsign.apiary-proxy.com/users/login
");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

/*$postfields = array("email" => $uname,
                    "password" => $pass);

curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields); */

curl_setopt($ch, CURLOPT_POSTFIELDS, '{
"email": $uname,
"password": $pass
}');


curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));

$response = curl_exec($ch);
curl_close($ch);

//var_dump($response);

echo var_dump($response);

?>