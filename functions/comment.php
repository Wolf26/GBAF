<?php
require_once('function.php');
$id = (int)$_GET['id'];
if(isset($_POST)){
  $insertComment = $db->prepare("INSERT INTO post(id_partners, id_user, comment) VALUES (:id_partners, :id_user, :comment)");
  $insertComment->execute(array(
    'id_partners' => $id,
    'id_user' => $_POST['user'],
    'comment' => $_POST['comment']
  ));
  $setVote = $db->prepare("INSERT INTO vote(id_partners, id_user, vote) VALUES (:id_partners, :id_user, :vote)");
  $setVote->execute(array(
    'id_partners' => $id,
    'id_user' => $_POST['user'],
    'vote' => $_POST['vote']
  ));
  $_SESSION['success'] = 'Commentaire posté avec succès !';
  header('Location: ../index.php?page=seePartners&id='.$id.'');
}else{
  echo 'Erreur';
}
