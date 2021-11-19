<?php
$passedFN = $_POST['newFN'];
$passedLN = $_POST['newLN'];
$passedEmail = $_POST['newEmail'];
$passedContact = $_POST['newContact'];
$passedAddress = $_POST['newAddress'];
$passedPass = $_POST['newPass'];
$passedConfPass = $_POST['confPass'];
$confCapt = $_POST['captValue'];
$confCaptUser = $_POST['captUser'];
$response="";

$xml = new DOMDocument();
$xml->load("accounts.xml");

if ($confCaptUser != $confCapt){
    $response = "Wrong Captcha Entered! Try Again.";
} else {
    if ($passedPass == $passedConfPass) {
        $response = "valid";
        $status = "Offline";
        $defaultPic = "images/defaultPicture.png";

        $newUser = $xml->createElement("account");
        $newUserEmail = $xml->createElement("email", $passedEmail);
        $newUserPassword = $xml->createElement("password", $passedPass);
        $newFirstName = $xml->createElement("firstName",$passedFN);
        $newLastName = $xml->createElement("lastName", $passedLN);
        $newUserContact = $xml->createElement("contact", $passedContact);
        $newUserAddress = $xml->createElement("address", $passedAddress);
        $newProfilePic = $xml->createElement("profilePic",$defaultPic);
        $newStatus = $xml->createElement("status",$status);

        $newUser->appendChild($newUserEmail);
        $newUser->appendChild($newUserPassword);
        $newUser->appendChild($newFirstName);
        $newUser->appendChild($newLastName);
        $newUser->appendChild($newUserContact);
        $newUser->appendChild($newUserAddress);
        $newUser->appendChild($newProfilePic);
        $newUser->appendChild($newStatus);

        $xml->getElementsByTagName("accounts")->item(0)->appendChild($newUser);
        $xml->save("accounts.xml");
    }
    else{
        $response = "Inputted Password does not Match.";
    }
}
echo $response;
?>