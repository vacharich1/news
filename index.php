﻿<?php
$access_token = "EAAGThEMKbNgBAMWK53A6jbtRCE9AYOuzjIMv6s0AiQ3AzSwdb45ZBbASp4Y27vGnFZB93bgWfvZBdKZC9AHCP0RZA2hHRzZCf1MZClfun8bqK6rfs9nvfVMQR4WXakUEz3GW59rO8XvLIyZCH4Vi6fXnQsT5Adp4OZCXqZCzJIrK1kXQZDZD";
$verify_token = "linebot";
$hub_verify_token = null;
if(isset($_REQUEST['hub_challenge'])) {
 $challenge = $_REQUEST['hub_challenge'];
 $hub_verify_token = $_REQUEST['hub_verify_token'];
}
if ($hub_verify_token === $verify_token) {
 echo $challenge;
}
$input = json_decode(file_get_contents('php://input'), true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];
$message_to_reply = '';
/**
 * Some Basic rules to validate incoming messages
 */



$message_to_reply = 'ก๊าบบ คุณสามารถสอนให้ฉลาดได้เพียงพิมพ์';


//API Url
$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
//Initiate cURL.
$ch = curl_init($url);
//The JSON data.
$jsonData = '{
    "recipient":{
        "id":"'.$sender.'"
    },
    "message":{
        "text":"'.$message_to_reply.'"
    }
}';
//Encode the array into JSON.
$jsonDataEncoded = $jsonData;
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
//Execute the request
if(!empty($input['entry'][0]['messaging'][0]['message'])){
    $result = curl_exec($ch);
}
?>