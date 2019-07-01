<!DOCTYPE html>
<html>
  <head>
    <title>Vincent GIL</title>
    <meta charset= "utf-8">
  </head>
  <body>
    <!-- Menu de navigation -->
    <?php include 'menunavigation.php'; ?>

    <form method="post">
      <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" required>
      <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
      <input type="repassword" name="repassword" id="repassword" placeholder="Retaper votre mot de passe" required>
      <input type="text" name="email" id="email" placeholder="Votre email" required>
      <input type="submit" name="formsend" id="formsend">
    </form>

    <?php

      if(isset($_POST['formsend'])){

        extract($_POST);

        if(!empty($password) && !empty($repassword) && !empty($email)){

          if($password == $repassword){
        
            $option = [
            'cost' => 12,
            ];

           $hashpass = password_hash($password, PASSWORD_BCRYPT, $option)."\n";
            }

            include 'include/database.php';
            global $db;

            $q = $db->prepare("INSERT INTO utilisateurs(email,password) VALUES(:email,:password)");
            $q->execute([
              'email' => $email,
              'password' => $hashpass
            ]);
    
            $q = $db->prepare("INSERT INTO utilisateurs(pseudonyme,password,email) 
            VALUES(:pseudonyme,:password,:email)");
            $q->execute([
              'pseudonyme' => 'Bobby99229004324',
              'email' => 'bobby31003944@gmail.com',
              'password' => $hashpass
            ]);

            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            if(!empty($pseudo) && !empty($password) && !empty($passwordrep) && !empty($email)){

              echo "Votre pseudo : ".$_POST['pseudo'] . "<br>";
              echo "Votre mot de passe: ".$_POST['password'] . "<br>";
              echo "email: ".$_POST['email'] . "<br>";
            
        }
      }
     }
    ?>
  </body>
</html>