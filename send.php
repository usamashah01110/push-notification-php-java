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
    "dp5kVKlho9s58spHJoy0uk:APA91bFCa4TZ1CZ9OyUuz1aYHJmzLuHdU9ntfz-UkU91zvYhbisYrJ35NMdjCEyOwUjBIc5scENCmSZGUJ5FYthcqQa95UhG1qGYx05uprbKdL0bT4xhmilycaLkFvlZVXZbO4dI5abt"
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




// include "./get_access_token.php";
// function sendFCMNotification($access_token, $token) {
//     $url = "https://fcm.googleapis.com/v1/projects/push-notification-acca2/messages:send";
//     $data = [
//         'message' => [
//             "data"=> [
//                 "title" => "Title",
//                 "body" => "This is message body.",
//                 "icon" => "https://www.clipscutter.com/image/brand/brand-256.png",
//                 "image" => "https://images.unsplash.com/photo-1514473776127-61e2dc1dded3?w=871&q=80",
//                 "click_action" => "https://example.com"
//             ],
//             'token' => $token
//         ]
//     ];
//     $options = array(
//         CURLOPT_URL => $url,
//         CURLOPT_POST => true,
//         CURLOPT_HTTPHEADER => array(
//             "Authorization: Bearer " . $access_token,
//             "Content-Type: application/json",
//         ),
//         CURLOPT_POSTFIELDS => json_encode($data),
//     );
//     $curl = curl_init();
//     curl_setopt_array($curl, $options);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//     $response = curl_exec($curl);
//     curl_close($curl);
//     return $response;
// }

// $access_token = get_access_token("push-notification-acca2-firebase-adminsdk-ixqhr-631512016c.json");
// $device_tokens = [
//     "device-token-here",
//     "device-token-here"
// ];

// foreach ($device_tokens as $token) {
//     $response = sendFCMNotification($access_token, $token);
//     echo $response . '<br>';
// }