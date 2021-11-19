<?php
session_start();

$xml = new DOMDocument();
$xml->load("accounts.xml");

$accounts = $xml->getElementsByTagName("account");
$html="<p><b>Registered Users: </b></p><br/>";

foreach($accounts as $account){
    $email = $account->getElementsByTagName("email")->item(0)->nodeValue;
    $fname = $account->getElementsByTagName("firstName")->item(0)->nodeValue;
    $lname = $account->getElementsByTagName("lastName")->item(0)->nodeValue;
    if ($email != $_SESSION['email']){
        $html.="
        <p onclick=\"showMessage('$email');\">".ucfirst($fname)." ".ucfirst($lname)."</p>";
    }
}

echo $html;

?>