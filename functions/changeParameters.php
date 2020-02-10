<?php
require_once('function.php');
$id = (int)$_GET['id'];
if(isset($_POST)){
  $email = htmlspecialchars($_POST['email']);
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $secretquestion = htmlspecialchars($_POST['secretquestion']);
  $secretanswer = htmlspecialchars($_POST['secretanswer']);
  $updateUser = $db->prepare('UPDATE users SET user = ?, firstname = ?, lastname = ?, secretquestion = ?, secretanswer = ? WHERE id="'.$id.'"');
  $updateUser->execute(array($email, $firstname, $lastname, $secretquestion, $secretanswer));
  $_SESSION['success'] = 'Profil mis à jour !';
  header('Location: ../index.php?page=changeParameters&id='.$id);
}
