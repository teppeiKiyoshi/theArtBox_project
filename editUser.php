<?php
session_start();
$activeUser = $_SESSION['email'];

$xml = new DOMDocument();
$xml->load("accounts.xml");

$accounts = $xml->getElementsByTagName("account");

$response="";

foreach($accounts as $account){
    $userEmail = $account->getElementsByTagName("email")[0]->nodeValue;

    if($userEmail == $activeUser){
        $fName = $account->getElementsByTagName("firstName")[0]->nodeValue;
        $lName = $account->getElementsByTagName("lastName")[0]->nodeValue;
        $cont = $account->getElementsByTagName("contact")[0]->nodeValue;
        $adrs = $account->getElementsByTagName("address")[0]->nodeValue;
        
        $response.="
        <form method=\"POST\" id=\"form-edit\" onsubmit=\"updateAcc(this.uEmail.value, this.uFname.value, this.uLname.value, this.uCont.value, this.uAdrs.value, this.uDpic.value); return false\">

            <label for=\"c_email\"> Email Address: </label>
            <input type=\"text\" name=\"c_email\" id=\"uEmail\">
 
            <label  for=\"c_fname\"> First Name: </label>
            <input type=\"text\" name=\"c_fname\" id=\"uFname\" required>
  
            <label  for=\"c_lname\"> Last Name: </label>
            <input type=\"text\" name=\"c_lname\" id=\"uLname\" required>

            <label  for=\"c_cont\"> Contact Number: </label>
            <input type=\"text\" name=\"c_cont\" id=\"uCont\" required>

            <label  for=\"c_adrs\"> Customer Address: </label>
            <input type=\"text\" name=\"c_adrs\" id=\"uAdrs\"  required>

            <label  for=\"c_image\"> Profile Picture: </label>
            <input type=\"file\" name=\"c_image\" id=\"uDpic\">
        
            <input type=\"submit\" value=\"Update\" id=\"edit-btn\"/>";
    }
}

echo $response."</form>";
?>