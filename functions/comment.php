<?php
require_once('function.php');
$id = (int)$_GET['id'];
if(isset($_POST)){
  $checkForExistent = $db->query('SELECT * FROM posts WHERE id_partners="'.$id.'" AND id_users="'.$userId.'" ');
  $do = $checkForExistent->rowCount();
  if($do < 1){
    $insertComment = $db->prepare("INSERT INTO posts(id_partners, id_users, comment) VALUES (:id_partners, :id_users, :comment)");
    $insertComment->execute(array(
      'id_partners' => $id,
      'id_users' => $_POST['user'],
      'comment' => $_POST['comment']
    ));
    $setVote = $db->prepare("INSERT INTO votes(id_partners, id_users, vote) VALUES (:id_partners, :id_users, :vote)");
    $setVote->execute(array(
      'id_partners' => $id,
      'id_users' => $_POST['user'],
      'vote' => $_POST['vote']
    ));
    $_SESSION['success'] = 'Commentaire posté avec succès !';
    header('Location: ../index.php?page=seePartners&id='.$id.'');
  }else{
    $_SESSION['success'] = 'Vous avez déjà posté un commentaire.';
    header('Location: ../index.php?page=seePartners&id='.$id.'');
  }

}else{
  echo 'Erreur';
}
