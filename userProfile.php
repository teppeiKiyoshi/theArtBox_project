<?php

session_start();
$activeEmail = $_SESSION['email'];

$xml = new DOMDocument();
$xml->load("accounts.xml");

$response="";
$accounts = $xml->getElementsByTagName("account");

foreach($accounts as $account){
    $userEmail = $account->getElementsByTagName("email")[0]->nodeValue;

    if($userEmail == $activeEmail){
        $userProfilePic = $account->getElementsByTagName("profilePic")[0]->nodeValue;
        $userContact = $account->getElementsByTagName("contact")[0]->nodeValue;
        $userAddress = $account->getElementsByTagName("address")[0]->nodeValue;
        $userFirstName = $account->getElementsByTagName("firstName")[0]->nodeValue;
        $userLastName = $account->getElementsByTagName("lastName")[0]->nodeValue;

        $response.="
        <div class=\"account-info\">
        <h2>PROFILE</h2>
            <table>
            <tr>
                <td rowspan=\"6\"><img src=$userProfilePic style=\"width:200px;height:200px;\"></td>
                <td><b>Name:</b></td>
                <td>$userFirstName $userLastName</td>
                <tr>
                <tr>
                <td><b>Email:</b></td>
                <td>$userEmail</td>
                </tr>
                <tr>
                <td><b>Contact:</b></td>
                <td>$userContact</td>
                </tr>
                <tr>
                <td><b>Address:</b></td>
                <td>$userAddress</td>
                </tr>
                </tr>
            </tr>
            </table>
            <button class=\"account-logout\" onclick=\"logout()\">LOG OUT</button>
            <button class=\"account-edit\" onclick=\"editDeets()\">EDIT</button>
        </div>";
    }
}
echo $response;

function showHistory(){
    $xml = new DOMDocument();
    $xml->load("cart.xml");
    $carts = $xml->getElementsByTagName("cart");
    foreach($carts as $cart){
        $date = "today";
        $transactionID = "Sample";
    }
    $response.="
    <div class=\"history-info\">
        <h2>HISTORY</h2>
        <table>
          <tr>
            <th>Date</th>
            <th>Transaction ID</th>
            <th>Amount</th>
            <th>Details</th>
          </tr>
          <tr>
            <td>12/12/2020</td>
            <td>1</td>
            <td>UNKNOWN</td>
            <td><button>View</button></td>
          </tr>
        </table>
      </div>
  </div>";
}
?>