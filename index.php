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
// Get POST body content dsfsdfdf
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
		//Cf9df494a98bb90fbee2ef4927ff132cd
		//C94b55f6238028e08e95f282db5da0a1d
		if($event['source']['groupId'] == 'Cf9df494a98bb90fbee2ef4927ff132cd' || $event['source']['groupId'] == 'C94b55f6238028e08e95f282db5da0a1d' || $event['source']['groupId'] == 'C4fc5bab92fdc9d5f740cf2f8d19b14a1' || $event['source']['groupId'] == 'C761d620d4e3a5c459f5c80e01518c6de' || $event['source']['groupId'] == 'Ca3769d1dbabc257a5763d020bd86e60c' ||  $event['source']['groupId'] == 'C6891ea6174cd762901279873c7188c78' || $event['source']['groupId'] == 'C590f3dac822b0c468241bcbe0c55393e' || $event['source']['groupId'] == 'Cefe1b847f360c13579996d5611a24246' || $event['source']['groupId'] == 'C5d4cb4d85ba666d04f1c6b19d99395f0' || $event['source']['userId'] == 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b' || $event['source']['groupId'] == 'C08e9253e559cd164b554ddf4e2d886ca' || $event['source']['groupId'] == 'C22f27adcdfb0d1c7d3808b5b8db98f82' || $event['source']['groupId'] == 'C2363d2668ed92919faff4bb70ca6179c' || $event['source']['groupId'] == 'C2787c6f41f988ddb927bebd44bce1400' || $event['source']['groupId'] == 'C2b9f74004bc9f5220d7349908d04aeb7' || $event['source']['groupId'] == 'Ce512b29b5419ec1d22af4606a6936113')
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
						if($text == 'วิธีใช้')
						{
								$replyToken = $event['replyToken'];
								$messages66 = ['type' => 'text','text' => "คำสั่ง \n\n เรียก กราฟ\n C honname timeframe\nEx : C aot 60 โดยเรียกได้ทุก timeframe \n\nข้อมูลหุ้น #hoonname\nEx : #aot \n\n+1 -1 และ  #O\n"];
								$url = 'https://api.line.me/v2/bot/message/reply';
								$data = [
											'replyToken' => $replyToken,
											'messages' => [$messages66]
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
						if($text1=="#10")
						{
							$text1="100";
						}
						if($text1=="#11")
						{
							$text1="111";
						}
						if($text1=="+1")
						{
							$text1="#10";
						}
						if($text1=="-1")
						{
							$text1="#11";
						}
						
									
						$text = strtoupper($text1);
						if($text=="#S & J" || $text=="#s & J")
						{
							$text="#S&J";
						}
						
						$arr1 = str_split($text);
						if($arr1[0] == "!" || $arr1[0] == "#" || $arr1[0] == "c" || $arr1[0] == "C")
						{
							$textcut = explode(" ", $text);
							$result = count($textcut);
							
							if($arr1[0] == "!" and $result <= 1)
							{
								$hoonname = substr($text, 1); // cut@
								$room=$event['source']['groupId'];
								if(preg_match("/^[a-zA-Z&0-9-_]+$/", $hoonname) == 1) 
								{
									if($event['source']['groupId'] == 'Cefe1b847f360c13579996d5611a24246')
									{
										$sql = "INSERT INTO hoon_check (id, hoonname, room, timeframe, type, send) VALUES ('', '$hoonname', '$room' , 'fibo', 'old', '1')";
									}
									else if($event['source']['userId'] == 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b')
									{
										$sql = "INSERT INTO hoon_check (id, hoonname, room, timeframe, type, send) VALUES ('', '$hoonname', '$room' , 'fibo', 'old', '1')";
									}
									else
									{
										$sql = "INSERT INTO hoon_check (id, hoonname, room, timeframe, type, send) VALUES ('', '$hoonname', '$room' , 'fibo', 'old', '2')";
									}
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
									if (mysqli_query($link, $sql)) 
									{
											echo "New record created successfully";
									} 
									else 
									{
											echo "Error: " . $sql . "<br>" . mysqli_error($link);
									}	
								}		
							}
							
							//send graph
							if($textcut[0]=="C" and $result <=3 and $result >1)
							{
								  $check ="check1";
								  $room=$event['source']['groupId'];
								  if($result<3)
								  {	
									  $text=$text." d";
								  }
								  $hoon_low = strtolower($textcut[1]);
								  $textcut = explode(" ", $text);
								  $result = count($textcut);
								  $timeframe=$textcut[2];		
								  
								  $sql = "INSERT INTO hoon_check (id, hoonname, room, timeframe, type) VALUES ('', '$hoon_low', '$room' ,'$timeframe', '6666')";
														  
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

							if($arr1[0] == "#" and $result <= 1)
							{
								$hoonname = substr($text, 1); // cut@
								$room=$event['source']['groupId'];
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