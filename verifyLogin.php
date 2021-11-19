<?php
session_start();

$passedEmail = $_POST['user'];
$passedPass = $_POST['pass'];

$xml = new DOMDocument();
$xml->load("accounts.xml");

$accounts = $xml->getElementsByTagName("account");

$response;

if ($passedEmail == "" || $passedPass == "") {
    $response = "All fields are required.";
} else {
    $status = "Online";
    foreach ($accounts as $account) {
        $email = $account->getElementsByTagName("email")[0]->nodeValue;
        $password = $account->getElementsByTagName("password")[0]->nodeValue;
        $fName = $account->getElementsByTagName("firstName")[0]->nodeValue;
        $lName = $account->getElementsByTagName("lastName")[0]->nodeValue;
        $contact = $account->getElementsByTagName("contact")[0]->nodeValue;
        $address = $account->getElementsByTagName("address")[0]->nodeValue;
        $displayPic = $account->getElementsByTagName("profilePic")[0]->nodeValue;
        $stat = $account->getElementsByTagName("status")[0]->nodeValue;

        if ($passedEmail == $email && $passedPass == $password) {
            $newNode = $xml->createElement('account');
            $newNode->appendChild($xml->createElement("email", $email));
            $newNode->appendChild($xml->createElement("password", $password));
            $newNode->appendChild($xml->createElement("firstName", $fName));
            $newNode->appendChild($xml->createElement("lastName", $lName));
            $newNode->appendChild($xml->createElement("contact", $contact));
            $newNode->appendChild($xml->createElement("address", $address));
            $newNode->appendChild($xml->createElement("profilePic", $displayPic));
            $newNode->appendChild($xml->createElement("status", $status));
            $oldNode = $account;
            $xml->getElementsByTagName('accounts')->item(0)->replaceChild($newNode, $oldNode);           
            $xml->save("accounts.xml");

            $response = "valid";
            $_SESSION['email'] = $email;
            break;
        } else {
            $response = "Username or password is incorrect.";
        }
    }
}
echo $response;
?>
