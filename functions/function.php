<?php
session_start();
$dbhost = 'localhost';
$dbname = 'projet3';
$dbuser = 'root';
$dbpswd = '';
try{
  $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}catch(PDOexception $e){
  die("Une erreur est survenue lors de la connexion a la base de donnees");
}

if(isset($_SESSION['id'])){
  $userInfo = $db->prepare('SELECT * FROM users WHERE user = ?');
  $userInfo->execute(array($_SESSION['id']));
  while($getUser = $userInfo->fetch()){
    $username       = $getUser['user'];
    $firstname      = $getUser['firstname'];
    $lastname       = $getUser['lastname'];
    $userId         = $getUser['id'];
    $password       = $getUser['password'];
    $secretquestion = $getUser['secretquestion'];
    $secretanswer   = $getUser['secretanswer'];
  }

}



 ?>
