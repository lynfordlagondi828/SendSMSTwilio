<?php
require  'vendor/autoload.php';
use Twilio\Rest\Client;

if(isset($_POST["submit"])){

    $contact_number = $_POST["contact_number"];
    $message = $_POST["message"];

     // Your Account SID and Auth Token from twilio.com/console
     $account_sid = 'AC7a87bebc089b99f28aef6cd8ad64ef24';
     $auth_token = '152f033a4e029015cbd69dd3b2553441';
     // In production, these should be environment variables. E.g.:
     // $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
 
     // A Twilio number you own with SMS capabilities
     $twilio_number = "+12565008442";
 
     $client = new Client($account_sid, $auth_token);
     $client->messages->create(
         // Where to send a text message (your cell phone?)
        $contact_number,
         array(
             'from' => $twilio_number,
             'body' => $message
         )
     );
     echo "SMS sent";
}
?>

<form method="post">
    <input type="text" name="contact_number" placeholder="Mobile No">
    <input type="text" name="message" placeholder="Message">
    <button name="submit">Send</button>
</form>