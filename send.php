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

$userid="";
$sql1 = "SELECT * FROM `send_alert` WHERE 1";
$result = $link->query($sql1);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$userid=$row["room"];
	}

}

		
$messages55 = ['type' => 'image',
			   'originalContentUrl' => 'https://newsistatus.com/test.png',
			   'previewImageUrl' => 'https://newsistatus.com/test.png'
											 
];

$data = [
			'to' => $userid,
			'messages' => [$messages55]
];
		
$header = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

echo "ssss";

$ch = curl_init('https://api.line.me/v2/bot/message/push');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$result = curl_exec($ch);
curl_close($ch);

?>