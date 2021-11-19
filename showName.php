<?php
$active = $_POST['email'];

$userxml = new DOMDocument();
$userxml->load("accounts.xml");

$userAccs = $userxml->getElementsByTagName("account");
$response="";

foreach($userAccs as $userAcc){
    $mail = $userAcc->getElementsByTagName("email")->item(0)->nodeValue;
    $dPic = $userAcc->getElementsByTagName("profilePic")->item(0)->nodeValue;
    $fname = $userAcc->getElementsByTagName("firstName")->item(0)->nodeValue;
    if($mail == $active){
        $response.="
            <img src=\"$dPic\" alt=\"User Pic\" id=\"user-pic\"/>
            <p id=\"username\">$fname</p>
            <i class=\"fas fa-times\" id=\"close-chat\" onclick=\"closeMessage();\"></i>";
        break;
    }
}

echo $response;

?>