<?php
$access_token = 'UAQF058OK6XC84MO1l1++Z9OO51IVMBz6oM9/h9kCk5H38ncTorvcrjZdfVSBlpzsBEqkth8MWoJpijZ2S46nYnRFPLzuvEE/pCrprlPqXler3II+NFqk2azgqLxTFJZugsB1JY2cKHfbMhbkzTDlgdB04t89/1O/w1cDnyilFU=';
$host= "sql6.freemysqlhosting.net";
$db = "sql6157803";
$CHAR_SET = "charset=utf8"; 

$username = "sql6157803";    
$password = "XErmELW5R3"; 
	

$link = mysqli_connect($host, $username, $password, $db);
if (!$link) {
    	die('Could not connect: ' . mysqli_connect_errno());
}
else
{
	echo "connect";
}
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		//1: jayroom Ub5f45b12f0f8f8a3a08e5b52ebbcc96b
		$text = $event['message']['text'];
		if($event['source']['userId']=='Ub5f45b12f0f8f8a3a08e5b52ebbcc96b' || $event['source']['groupId'] =='C26d889d89b336a786c06358c1e2df27c')
		{
			
		}
		else
		{
			if($text == '##addroombyjay')
			{
					$replyToken = $event['replyToken'];
					$messages55 = ['type' => 'text','text' => $event['source']['groupId']];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
								'replyToken' => $replyToken,
								'messages' => [$messages55]
							];
					$post = json_encode($data);
					$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
							
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					$result = curl_exec($ch);
					curl_close($ch);
			}	
		}
	}//foreach
}//if(!is_null)
echo "OK";