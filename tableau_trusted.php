<?php

$servername = $_POST["server"]; 
$username = $_POST["user"];     
$trusted_ticket = get_ticket($servername, $username);
echo $trusted_ticket;

function get_ticket($wgserver, $user){
  $params = array(
    'username' => $user
  );
  $ch = curl_init();
  $url = "https://".$wgserver."/trusted";
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST, 1); 
  curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
  $response = curl_exec($ch);
  curl_close ($ch);
  return $response;
}
?>