<?php

$json_response = file_get_contents('php://input');

function formQuery($arguments){
	$query = "";
	foreach ($arguments as $key => $value) {
		$query .= $key."=".$value. "&";
	}

	$formQuery = substr($query, 0, -1);

	return $formQuery;
}

$greetings = array("Hello", "Hi", "Niaje", "Hae", "Hey");

$botToken = "641626770:AAEILAbMCD-2NX5OBSXpdRZepInEWDeXl1c";

$url = "https://api.telegram.org/bot".$botToken;

$updates_url = $url."/getUpdates";

$json_response = file_get_contents('php://input');

$response_array = json_decode($json_response, true);

$user_id = $response_array['message']['chat']['id'];

$text = $response_array['message']['text'];

if ($text == "Talk to me man") {
	$response = "Command me master";
	$chat_arguments = array('chat_id'=>$user_id, 'text'=>$response);
	$sendMessage_url = $url."/sendMessage?".formQuery($chat_arguments);
	file_get_contents($sendMessage_url);
}

elseif (in_array($text, $greetings)) {
	$response = "Greeting!!";
	$chat_arguments = array('chat_id'=>$user_id, 'text'=>$response);
	$sendMessage_url = $url."/sendMessage?".formQuery($chat_arguments);
	file_get_contents($sendMessage_url);
}

elseif ($text == "Thank God you are alive bro") {
	$response = "Haha, I don't die so easily.";
	$chat_arguments = array('chat_id'=>$user_id, 'text'=>$response);
	$sendMessage_url = $url."/sendMessage?".formQuery($chat_arguments);
	file_get_contents($sendMessage_url);
}

elseif ($text == "How are you?") {
	$response = "I'm good, and you?";
	$chat_arguments = array('chat_id'=>$user_id, 'text'=>$response);
	$sendMessage_url = $url."/sendMessage?".formQuery($chat_arguments);
	file_get_contents($sendMessage_url);
}

elseif ($text == "When is today?") {
	$response = "Today is ". date('l jS \of F Y');
	$chat_arguments = array('chat_id'=>$user_id, 'text'=>$response);
	$sendMessage_url = $url."/sendMessage?".formQuery($chat_arguments);
	file_get_contents($sendMessage_url);
}

elseif ($text == "What time is it?") {
	$response = "It is ". date('h:i:s A');
	$chat_arguments = array('chat_id'=>$user_id, 'text'=>$response);
	$sendMessage_url = $url."/sendMessage?".formQuery($chat_arguments);
	file_get_contents($sendMessage_url);
}

elseif ($text == "I'm good too") {
	$response = "Thanks fantastic. What can I do for you today?";
	$chat_arguments = array('chat_id'=>$user_id, 'text'=>$response);
	$sendMessage_url = $url."/sendMessage?".formQuery($chat_arguments);
	file_get_contents($sendMessage_url);
}

elseif ($text == "send me a picture") {
	$response = "https://images.pexels.com/photos/462118/pexels-photo-462118.jpeg?auto=compress&cs=tinysrgb&h=350";
	$chat_arguments = array('chat_id'=>$user_id, 'photo'=>$response, 'caption'=>"Bazinga!!");
	$sendPhoto_url = $url."/sendPhoto?".formQuery($chat_arguments);
	file_get_contents($sendPhoto_url);
}

else{
	$response = "Sorry man, I didn't get that.";
	$chat_arguments = array('chat_id'=>$user_id, 'text'=>$response);
	$sendMessage_url = $url."/sendMessage?".formQuery($chat_arguments);
	file_get_contents($sendMessage_url);
}


?>