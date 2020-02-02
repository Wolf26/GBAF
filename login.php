<?php
require_once('./functions/function.php');

if(isset($_POST)){
  $foundUser = $db->prepare('SELECT * from users WHERE user = ?');
  $foundUser->execute(array($_POST['username']));
  while($data = $foundUser->fetch()){
    $password = password_verify($_POST['password'], $data['password']);
    if($password == $data['password']){
      var_dump($data);
      $_SESSION['id'] = $data['user'];
      header('Location: home.php');
    }else{
      var_dump($data);
      echo $password;
      echo '<br /> Erreur';
    }
  }

}



 ?>
