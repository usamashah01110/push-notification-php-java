<?php

$url = "https://fcm.googleapis.com/fcm/send";
$server_key = "AAAALbwA93g:APA91bHcaaA3KwOJRn42EDPJqmWTvRRTKREVL8Om4VNG__A3wLJcDZi_PnV6CvQMuex6MwMIEQESQRpe4gqq7B3nzl2ShA_VRb5r5PlpnVO1Fnm8Ra7CFgWqAc9y2EJsV2jbi9HSTDHr";

 $message = array( "data" => array( 
    "title" => "Title", 
    "body" => "This is message body.",
 "icon" => "https://www.clipscutter.com/image/brand/brand-256.png",
  "image" => "https://images.unsplash.com/photo-1514473776127-61e2dcldded3?w=871&q=80",
   "click_action" => "http ://example.com"),
   "registration_ids" => [
    "dp5kVKlho9s58spHJoy0uk:APA91bHLZPpUwbTnCHvZv8Zk493tbyU2X0Q2eyfUnGS_6jVwrc7InAVBU17NtR7GTULLhG18467L7GPgBuxOadQ-6SqmP7XwBoJtXmWJ9v5mfht0w2QAsacTs4hSd9SZIdUlDrV49uX6"
   ]
   );

 $options = array(
    CURLOPT_URL => $url,
  CURLOPT_POST => true, CURLOPT_HTTPHEADER => array( "Authorization: key=" . $server_key, "Content-Type: application/json", 
), CURLOPT_POSTFIELDS => json_encode($message), 
); 

$curl = curl_init(); curl_setopt_array($curl, $options); $response = curl_exec($curl); 
if($response === false){
     echo "Error sending messages: " . curl_error ($curl); 
    }else
    
    { echo "Message sent successfully"; } 
    
    curl_close($curl); 
