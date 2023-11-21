<?php
require_once "admin/bdb.php";

$tkn = getenv('tk');
$chn = getenv('chn');
$admin1 = getenv('admin1');
$admin2 = getenv('admin2');

$t = // your value to check




$path = "https://api.telegram.org/bot$tkn";
$inf = file_get_contents("php://input");
$update = json_decode($inf, TRUE);




$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$msgid = $update["message"]["message_id"];
$msgf = $update["message"]["document"];
$videof = $update["message"]["video"];
$unm = $update["message"]["from"]["username"];
$usid = $update["message"]["from"]["id"];
$isAdmin = ($usid == $admin1 || $usid == $admin2) ? true : false;
$iadmins = $isAdmin ? 'yes' : 'no';

if (strpos($message, "/start") === 0) {
$filereq = substr($message, 9);


  
if (!empty($filereq)){
  file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=The file you requested is provided below.. (id $filereq)  ");

  file_get_contents($path."/copyMessage?chat_id=".$chatId."&from_chat_id=".$chn."&message_id=".$filereq."");
  
} else {
file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Hello!, this is zoomlink hub's file bot developed by @zaanind (http://zaanind.fanclub.rocks). please forward me a file as document so then you can get sharable link of it.");}
  
}
 

if (strpos($message, "/ping") === 0) {
  

file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the server info - 200-ok $inf ");
}

if (!empty($msgf) || !empty($videof)) {
if ($isAdmin) {
    file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=file is avalible, copying to db");

  
    $lgoc = file_get_contents($path."/copyMessage?chat_id=".$chn."&from_chat_id=".$chatId."&message_id=".$msgid."");

    $lgoc = json_decode($lgoc, TRUE);
    $lgoc = $lgoc["result"]["message_id"];
    $fid = $lgoc;
    $fileinfo = [
          "file_id" => "$fid"
    ];
    //$dbr =  $postStore->insert($fileinfo);
  
    file_get_contents($path."/sendmessage?chat_id=".$chatId."&text= New file added. | link =  https://t.me/zoomlinkhubbot?start=fi$lgoc");
} else {
    file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=You don't have admin rights");
}
  
  }


  if (strpos($message, "/usr") === 0) {



file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the user info usrnm - $unm | usrid - $usid | Is Admin - $iadmins ");
  }


//file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the server info - 200-ok $inf ");
    
?>