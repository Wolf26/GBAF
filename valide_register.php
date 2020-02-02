<?php
require_once('functions/function.php');

if(isset($_POST)){
  $username       = htmlspecialchars($_POST['username']);
  $password       = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $firstname      = htmlspecialchars($_POST['firstname']);
  $lastname       = htmlspecialchars($_POST['lastname']);
  $secretquestion = htmlspecialchars($_POST['secretquestion']);
  $secretanswer   = htmlspecialchars($_POST['secretanswer']);


  $newUser = $db->prepare('INSERT INTO users(user, password, firstname, lastname, secretquestion, secretanswer) VALUES (:user, :password, :firstname, :lastname, :secretquestion, :secretanswer)');
  $newUser->execute(array(
    'user' => $username,
    'password' => $password,
    'firstname' => $firstname,
    'lastname' => $lastname,
    'secretquestion' => $secretquestion,
    'secretanswer' => $secretanswer
  ));
$_SESSION['id'] = $username;
header('Location: home.php');
}
