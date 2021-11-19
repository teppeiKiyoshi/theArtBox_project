<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login_register.php");
}

$bago_email = $_POST['newEmail'];
$bago_fName = $_POST['newFname'];
$bago_lName = $_POST['newLname'];
$bago_cont = $_POST['newCont'];
$bago_adrs = $_POST['newAdrs'];
$pict = $_POST['newDpic'];
$newPict = str_replace('C:\fakepath\\', "images/", $pict);

$response;
$xml = new domdocument();
$xml->load("accounts.xml");

$accounts = $xml->getElementsByTagName("account");

foreach($accounts as $account){
    $email = $account->getElementsByTagName("email")->item(0)->nodeValue;
    $oldPW = $account->getElementsByTagName("password")->item(0)->nodeValue;
    $status = $account->getElementsByTagName("status")->item(0)->nodeValue;

    if ($email == $_SESSION['email']) {
        $newNode = $xml->createElement('account');
        $newNode->appendChild($xml->createElement("email", $bago_email));
        $newNode->appendChild($xml->createElement("password", $oldPW));
        $newNode->appendChild($xml->createElement("firstName", $bago_fName));
        $newNode->appendChild($xml->createElement("lastName", $bago_lName));
        $newNode->appendChild($xml->createElement("contact", $bago_cont));
        $newNode->appendChild($xml->createElement("address", $bago_adrs));
        $newNode->appendChild($xml->createElement("profilePic", $newPict));
        $newNode->appendChild($xml->createElement("status", $status));

        $oldNode = $account;

        $xml->getElementsByTagName('accounts')->item(0)->replaceChild($newNode, $oldNode);           
        $xml->save("accounts.xml");
        $response = "valid";
        break;
    }
    else {
        $response = "Invalid. Not Updated"; 
    }
  
}
echo $response;
   
?>