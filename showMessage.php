<?php
session_start();

$activeUser = $_SESSION['email'];
$email = $_POST['email'];
$xml = new DOMDocument();
$xml->load("messages.xml");

$messages = $xml->getElementsByTagName("message");

$response = "";


foreach($messages as $message){
    $sender = $message->getElementsByTagName("sender")->item(0)->nodeValue;
    $receiver = $message->getElementsByTagName("receiver")->item(0)->nodeValue;
    $content = $message->getElementsByTagName("content")->item(0)->nodeValue;
    $date = $message->getElementsByTagName("date")->item(0)->nodeValue;

    if($sender == $activeUser && $email == $receiver){
        $response.= "
            <div class=\"sender\" id=\"sender\">
                <p>$date</p>
                <p>$content</p>
            </div>";
    }
    else if ($receiver == $activeUser && $email == $sender) {
        $response.= "
            <div class=\"receiver\" id=\"receiver\">
                <p>$date</p>
                <p>$content</p>
            </div>";
    }
}

echo $response;
?>
