<?php
require_once('functions/function.php');
if(isset($_POST)){
  $email = htmlspecialchars($_POST['email']);
  $secretanswer = htmlspecialchars($_POST['secretanswer']);
  $secretquestion = (int)$_POST['secretquestion'];
  $userInfo = $db->prepare('SELECT * FROM users WHERE user = ?');
  $userInfo->execute(array($email));
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  while($getUser = $userInfo->fetch()){
    if($getUser['user'] == $email){
      if($getUser['secretquestion'] == $secretquestion){
        if($getUser['secretanswer'] == $secretanswer){
          $updateUser = $db->prepare("UPDATE users SET password = ? WHERE email='".$email."'");
          $updateUser->execute(array($password));
          $_SESSION['success'] = 'Mot de passe mis à jour !';
          header('Location: index.php?page=resetpassword');
        }else{
          $_SESSION['error'] = 'Réponse secrète incorrect !';
          header('Location: index.php?page=resetpassword');
        }
      }else{
        $_SESSION['error'] = 'Question secrète incorrect !';
        header('Location: index.php?page=resetpassword');
      }
    }else{
      $_SESSION['error'] = 'Email inconnue !';
      header('Location: index.php?page=resetpassword');
    }

  }

}
 ?>
