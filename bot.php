<?php
/*
BY:- @BenchamXD

CHANNEL:- @IndusBots
*/
error_reporting(0);

set_time_limit(0);

flush();
$API_KEY = $_ENV['BOT_TOKEN']; //Your token
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	
//==============BENCHAM======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$chat_id = $message->chat->id;
$name = $from_id = $message->from->first_name;
$from_id = $message->from->id;
$text = $message->text;
$fromid = $update->callback_query->from->id;
$username = $update->message->from->username;
$chatid = $update->callback_query->message->chat->id;
$START_MESSAGE = $_ENV['START_MESSAGE'];
if($text == '/start')
bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"***$START_MESSAGE

Use /joke to get jokes.***",
'parse_mode'=>"MarkDown",
]);
if($text == '/joke'){
$jok = json_decode(file_get_contents('https://sv443.net/jokeapi/v2/joke/Any?type=single'),true);
$joke = $jok['joke'];
$catg = $jok['category'];
bot('sendmessage',[
'chat_id'=>$from_id,
'text'=>"`$joke`

Catogery:- `$catg`

_Type /joke for more_",
'parse_mode'=>"MarkDown",
]);
}
