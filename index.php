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
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
				
			$textcut = explode(" ", $text);
			$result = count($textcut);
			if($result <= 1)
			{
				$arr1 = str_split($textcut[0]);
				if($arr1[0] == "@")
				{
					$hoonname = substr($textcut[0], 1); // cut@
					$room=$event['source']['userId'];
					if(preg_match("/^[a-zA-Z]+$/", $hoonname) != 1) 
					{
						$sql = "INSERT INTO hoon_check (id, hoonname, room)
								VALUES ('', '$hoonname', '$room')";
								
						if (mysqli_query($link, $sql)) {
								echo "New record created successfully";
						} 
						else {
								echo "Error: " . $sql . "<br>" . mysqli_error($link);
						}
						sleep(0.3);
						$check ="check1";
						#echo "work code";
						$sql = "INSERT INTO `check_capture`(`id`, `check1`) VALUES ('','$check')";
						if (mysqli_query($link, $sql)) {
								echo "New record created successfully";
						} 
						else {
								echo "Error: " . $sql . "<br>" . mysqli_error($link);
						}
						
						sleep(10);
						$messages556 = ['type' => 'image',
									   'originalContentUrl' => 'https://newsistatus.com/test1.jpg',
									   'previewImageUrl' => 'https://newsistatus.com/test1.jpg'
																	 
						];
						
						$replyToken = $event['replyToken'];
						
						$url = 'https://api.line.me/v2/bot/message/reply';
						$data = [
							'replyToken' => $replyToken,
							'messages' => [$messages556]
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
			}
			else
			{
				$replyToken = $event['replyToken'];
	
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'กรุณาพิมพ์ @hoonname --> @aot'
				];
	
				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
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
	
				echo $result . "\r\n";
				
			}
		}
	}
}
echo "OK";