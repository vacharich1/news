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
		//2: new room 1 C2363d2668ed92919faff4bb70ca6179c
		if($event['source']['userId'] == 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b' || $event['source']['groupId'] == 'C08e9253e559cd164b554ddf4e2d886ca' || $event['source']['groupId'] == 'C22f27adcdfb0d1c7d3808b5b8db98f82' || $event['source']['groupId'] == 'C2363d2668ed92919faff4bb70ca6179c' || $event['source']['groupId'] == 'C2787c6f41f988ddb927bebd44bce1400' || $event['source']['groupId'] == 'C2b9f74004bc9f5220d7349908d04aeb7' || $event['source']['groupId'] == 'Ce512b29b5419ec1d22af4606a6936113')
		{
			// Reply only when message sent is in 'text' format
				if ($event['type'] == 'message' && $event['message']['type'] == 'text') 
				{
						// Get text sent
						$text1 = $event['message']['text'];
						
						if($text == '@@@@')
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
									
						$text = strtoupper($text1);
						if($text=="#S & J" || $text=="#s & J")
						{
							$text="#S&J";
						}
						$arr1 = str_split($text);
						if($arr1[0] == "#")
						{
							$textcut = explode(" ", $text);
							$result = count($textcut);
							
							//send graph
							if($textcut[0]=="@g" and $result <=3)
							{
								if($room == "33" or $room == "333")//close 15 111
								{
									/*$messages556 = ['type' => 'text','text' => "คำสั่งเรียกกราฟ ไม่สามารถเรียกในกลุ่มทดลอง โปรติดต่อ line : vacharich หรือ line : @jfourtwins\n\n ตัวอย่าง กราฟด้านล่าง aot 60 นาที"];
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
									
									
									$messages55 = ['type' => 'image',
															 'originalContentUrl' => 'https://kumishabu.com/pic/picture2.JPG',
															 'previewImageUrl' => 'https://kumishabu.com/pic/picture2.JPG'
												  ];
												  
									$format_text = [
											"type" => "text",
											"text" => $text
										];
									$post_data = [
												'to' => $userid,
												'messages' => [$messages55]
									];
									$header = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
									echo "ssss";
								 
									$ch = curl_init('https://api.line.me/v2/bot/message/push');
									curl_setopt($ch, CURLOPT_POST, true);
									curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
									curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
								 
									$result = curl_exec($ch);
									curl_close($ch);*/
									
									
								}
								else
								{
									$check ="check1";
									if($result<3)
									{	
										$text=$text." d";
									}
									
									$hoon_low = strtolower($textcut[1]);
									$textcut = explode(" ", $text);
									$result = count($textcut);
									$timeframe="0";

									$timeframe=$textcut[2];		
									
									$sql = "INSERT INTO hoon_check (id, hoonname, room, timeframe, type) VALUES ('', '$hoon_low', '$room' ,'$timeframe', '6666')";
															
									if (mysqli_query($link, $sql)) {
											echo "New record created successfully";
									} 
									else {
											echo "Error: " . $sql . "<br>" . mysqli_error($link);
									}
									$sql = "INSERT INTO `check_capture`(`id`, `check1`) VALUES ('','$check')";
									if (mysqli_query($link, $sql)) {
										echo "New record created successfully";
									} 
									else {
										echo "Error: " . $sql . "<br>" . mysqli_error($link);
									}
									sleep(0.3);
								}
								
							}
							
							
							
							
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
								if(preg_match("/^[a-zA-Z&0-9-_]+$/", $hoonname) == 1) 
								{
									//if($hoonname!="S50H17" && $hoonname!="S50M17" && $hoonname!="S50U17")
									{
										$sql = "INSERT INTO hoon_check (id, hoonname, room, timeframe, type) VALUES ('', '$hoonname', '$room' , 'aaa', 'old')";
										//$sql = "INSERT INTO hoon_check (id, hoonname, room)
										//		VALUES ('', '$hoonname', '$room')";
												
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
			if($text == '@@@@')
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