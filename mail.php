<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Envoi d'un email par formulaire</title>
</head>

<body>
    <?php
    $retour = mail('vincengp13@gmail.com', 'Envoi depuis le site gmail',$_POST['message'], 'From : webmaster@gmail.com');
    if ($retour) {
        echo '<p>Votre message a bien été envoyé !</p>';
    }
    ?>
</body>

</html>