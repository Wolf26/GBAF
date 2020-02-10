<?php
require_once('./functions/function.php');

if(isset($_POST)){
  $userName           = htmlspecialchars($_POST['username']);
  $passwordBeforeHash = htmlspecialchars($_POST['password']);

  $foundUser  = $db->prepare('SELECT * from users WHERE user = ?');
  $foundUser->execute(array($userName));
  $userExist = $foundUser->rowCount();
  if($userExist == 1){
    $data = $foundUser->fetch();
    $password = password_verify($passwordBeforeHash, $data['password']);
    if($password == $data['password']){
      $_SESSION['id'] = $data['user'];
      header('Location: index.php');
    }else{
      $_SESSION['message_login'] = 'Mot de passe incorrect.';
      header('Location: index.php');
      exit;
    }
  }else{
    $_SESSION['message_login'] = 'Utilisateur incorrect.';
    header('Location: index.php');
    exit;
  }
}else{
  $_SESSION['message_login'] = 'Merci de renseigner tous les champs.';
  header('Location: index.php');
  exit;
}



?>
