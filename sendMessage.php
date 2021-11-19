<?php

session_start();
date_default_timezone_set("Asia/Manila");

$receiverist = $_POST['receiver'];
$getContent = $_POST['content'];
$activeUser = $_SESSION['email'];

$xml = new DOMDocument();
$xml->load("messages.xml");

$newMessage = $xml->createElement("message");
$sender = $xml->createElement("sender", $activeUser);
$receiver = $xml->createElement("receiver", $receiverist);
$date = $xml->createElement("date", date("Y-m-d h:i:s A"));
$content = $xml->createElement("content", $getContent);
        
$newMessage->appendChild($sender);
$newMessage->appendChild($receiver);
$newMessage->appendChild($date);
$newMessage->appendChild($content);
    
$xml->getElementsByTagName("messages")->item(0)->appendChild($newMessage);
$xml->save("messages.xml");

echo "valid";
?>