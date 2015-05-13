<?php
print("Hi");
flush();
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
    
    //printf("$name \n");
    //printf($response);
    //printf($phone_num);
    printf("Hello");
    flush();
    printf($name);
    flush();
    
    //validate data
    if(empty($name))
    {
        $formok = false;
        $errors[] = "You have not entered a name.";
        print_r($errors);
        printf("Hello1");
        flush();
    }
    if(empty($response))
    {
        $formok = false;
        $errors[] = "You have not entered a response.";
        print_r($errors);
        printf("Hello2");
        flush();
    }
    if(empty($phone_num))
    {
        $formok = false;
        $errors[] = "You have not entered a phone number.";
        print_r($errors);
        printf("Hello3");
        flush();
    }
    //It's ok to not enter additional comments

    printf("Hello3");
    printf($form_ok);
    flush();
    
 
    //send email if everything is ok
    if($form_ok){
        printf("Hello4");
        flush();
        $headers = "From: Michaelplusliz.com" . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $emailbody = "<p>A new guest has completed an RSVP.</p>
                      <p><strong>Name: </strong> {$name} </p>
                      <p><strong>Response: </strong> {$response} </p>
                      <p><strong>Phone Number: </strong> {$phone_num} </p>
                      <p><strong>Comments: </strong> {$comments} </p>
                      <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>";

        $mail_sent = mail("mjpatter88@gmail.com","NEW RSVP",$emailbody,$headers);
        
        if($mail_sent)
        {
            printf("Mail sent");
        }
        else
        {
            printf("Mail not sent");
        }
    }
 
    
}






?>