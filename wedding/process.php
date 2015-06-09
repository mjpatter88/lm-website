<?php

//Only do this if it is a post request
if(isset($_POST))
{
    $form_ok = true;
    $errors = array();

    $ip_address = $_SERVER['REMOTER_ADDR'];
    $date = date('d/m/Y');
    $time = date('H:i:s');

    //Get the data from the form
    $name = $_POST['name'];
    $response = $_POST['response'];
    $phone_num = $_POST['phone'];
    $comments = $_POST['comments'];
    if(isset($_POST['illinois']))
    {
        $location = "Illinois";
    }
    elseif(isset($_POST['iowa']))
    {
        $location = "Iowa";
    }
    else
    {
        $formok = false;
        $errors[] = "The location was not determined. Did you submit the rsvp form?";
    }

    // Validate the remaining data
    if(empty($name))
    {
        $formok = false;
        $errors[] = "You have not entered a name.";
    }
    if(empty($response))
    {
        $formok = false;
        $errors[] = "You have not entered a response.";
    }
    if(empty($phone_num))
    {
        $formok = false;
        $errors[] = "You have not entered a phone number.";
    }
    // It's ok to not enter additional comments, so don't check that this exists.

    // Send Liz and I an email if everything is ok.
    if($form_ok)
    {
        $headers = "From: Michaelplusliz.com" . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $emailbody = "<p>A new guest has completed an RSVP to {$location}.</p>
                      <p><strong>Name: </strong> {$name} </p>
                      <p><strong>Response: </strong> {$response} </p>
                      <p><strong>Phone Number: </strong> {$phone_num} </p>
                      <p><strong>Comments: </strong> {$comments} </p>
                      <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>";

        $mail_sent = mail("mjpatter88@gmail.com", "NEW RSVP", $emailbody, $headers);
        $mail_sent = mail("ealee665@gmail.com","NEW RSVP",$emailbody,$headers);

        if($mail_sent)
        {
            header('Location: rsvp-thanks.html');
        }
        else
        {
            header('Location: rsvp-problem.html');
        }
    }
    // Otherwise email me with the problem and redirect.
    else
    {
        $headers = "From: Michaelplusliz.com" . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $emailbody = "<p>Problem with the RSVP submission to {$location}.</p>
                      <p><strong>Name: </strong> {$name} </p>
                      <p><strong>Response: </strong> {$response} </p>
                      <p><strong>Phone Number: </strong> {$phone_num} </p>
                      <p><strong>Comments: </strong> {$comments} </p>
                      <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>";

        $mail_sent = mail("mjpatter88@gmail.com", "NEW RSVP", $emailbody, $headers);
        header('Location: rsvp-problem.html');
    }


}

?>
