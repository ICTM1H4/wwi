<?php 
function sendMail() {
    $data = json_decode($_POST['data']);
    print_r($data);
    $to = "klantenservicewwi@gmail.com";
    $subject = $data->Onderwerp;
    $message = $data->Naam."\r\n".$data->email."\r\nOrdernummer: ".$data->Ordernummer."\r\n"."Vraag van de klant:\r\n".$data->Vraag;
    mail($to, $subject, $message);
    return "Mail is verzonden";
}
sendMail();
