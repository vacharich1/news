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
		//1: jayroom Ub5f45b12f0f8f8a3a08e5b52ebbcc96b
		if($event['source']['userId'] == 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b' || $event['source']['groupId'] == 'C08e9253e559cd164b554ddf4e2d886ca')
		{
			// Reply only when message sent is in 'text' format
				if ($event['type'] == 'message' && $event['message']['type'] == 'text') 
				{
						// Get text sent
						$text1 = $event['message']['text'];
						
						$text = strtolower($text1);
						if($text=="@s & j" || $text=="@s & J")
						{
							$text="@s&j";
						}
						$arr1 = str_split($text);
						if($arr1[0] == "@")
						{
							$textcut = explode(" ", $text);
							$result = count($textcut);
							if($result <= 1)
							{
								$hoonname = substr($text, 1); // cut@
								if($event['source']['userId'] == 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b')
								{
									$room=$event['source']['userId'];
								}
								else
								{
									$room=$event['source']['groupId'];
								}
								if(preg_match("/^[a-zA-Z&]+$/", $hoonname) == 1) 
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
									
									#sleep(10);
									#$messages556 = ['type' => 'image',
									#			   'originalContentUrl' => 'https://newsistatus.com/test.png',
									#			   'previewImageUrl' => 'https://newsistatus.com/test.png'
																				 
									#];
									
									#$replyToken = $event['replyToken'];
									
									#$url = 'https://api.line.me/v2/bot/message/reply';
									#$data = [
									#	'replyToken' => $replyToken,
									#	'messages' => [$messages556]
									#];
									#$post = json_encode($data);
									#$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
						#
									#$ch = curl_init($url);
									#curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
									#curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									#curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
									#curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
									#curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
									#$result = curl_exec($ch);
									#curl_close($ch);	
								}					
							}
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
					
				}
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