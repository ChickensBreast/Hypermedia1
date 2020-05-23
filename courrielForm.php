<?php

if (isset($_POST['submit'])){
    $nom =$_POST['nom'];
    $sujet =$_POST['sujet'];
    $mailFrom =$_POST['courriel'];
    $message =$_POST['message'];


    $mailTo = "CPhotoShare@yandex.com";
    $headers = "From: ".$mailFrom;
    $txt = "Vous avez reçu un courriel de ".$nom.".\n\n".$$message;

    mail($mailTo,$sujet,$txt,$headers);
    header("Location: questionFeedback.php?CourrielEnvoyer");
}