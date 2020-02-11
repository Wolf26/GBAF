<?php
require_once('functions/function.php');

if(isset($_POST)){
  $username       = htmlspecialchars($_POST['username']);
  $password       = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $firstname      = htmlspecialchars($_POST['firstname']);
  $lastname       = htmlspecialchars($_POST['lastname']);
  $secretquestion = htmlspecialchars($_POST['secretquestion']);
  $secretanswer   = htmlspecialchars($_POST['secretanswer']);
$searchFor = $db->prepare('SELECT * FROM users WHERE user = ?');
$searchFor->execute(array($username));
$searchForFound = $searchFor->rowCount();
if($searchForFound < 1){
  $newUser = $db->prepare('INSERT INTO users(email, password, firstname, lastname, secretquestion, secretanswer) VALUES (:email, :password, :firstname, :lastname, :secretquestion, :secretanswer)');
  $newUser->execute(array(
    'email' => $username,
    'password' => $password,
    'firstname' => $firstname,
    'lastname' => $lastname,
    'secretquestion' => $secretquestion,
    'secretanswer' => $secretanswer
  ));
$_SESSION['id'] = $username;
header('Location: index.php');
exit;
}else{
  $_SESSION['message'] = 'Compte utilisateur existant';
  header('Location: index.php?page=register');
  exit;
}

}else{
  $_SESSION['message'] = 'Merci de renseigner tous les champs';
  header('Location: index.php?page=register');
  exit;
}
