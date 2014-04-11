<?php
function generateRandomString($len = 10) {
  $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $rand = ''; 
  for ($i = 0; $i < $len; $i++) {
    $rand .= $chars[rand(0, strlen($chars) - 1)];
  }
  return $rand;
}

$pass = generateRandomString(10);
echo json_encode(array('result' => 'worked', 'password' => $pass));                                                                                                               
