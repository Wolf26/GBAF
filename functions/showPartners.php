<?php
require_once('function.php');
$id = (int)$_GET['id'];
if (isset($_SESSION['most_recent_activity']) &&
    (time() -   $_SESSION['most_recent_activity'] > 20)) {

 unset($_SESSION['success']);

 }
 $_SESSION['most_recent_activity'] = time();
?>
<div class="content-actor">
<?php

$showPartners = $db->query('SELECT * FROM partners WHERE id='.$id.'');
while($partners = $showPartners->fetch()){
      echo '<div class="partnerSelected">';
      echo '<div class="partnerSelect">';
      echo '<img src="'.$partners['logo'].'" alt="'.$partners['name'].'" />';
      echo '</div>';
      echo '<hr />';
      echo '</div>';
      echo '<div class="partnersContent">';
      echo '<div class="contentPartners">';
      echo '<h2>'.$partners['name'].'</h2>';
      echo '<p>'.$partners['resume'].'</p>';
      echo '<hr />';
      echo '</div>';
      echo '</div>';
  }
?>

<div class="commentaires">
  <?php
  if(isset($_SESSION['success'])){
    ?>
  <div class="alert-success">
   <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
   <?php echo $_SESSION['success'];?>
  </div>
  <?php
  }
   ?>

<?php
$comment = $db->query("SELECT * FROM posts INNER JOIN users ON posts.id_users = users.id WHERE id_partners='$id' ");
$countComment = $comment->rowCount();
$likeVote = $db->query("SELECT * FROM votes WHERE id_partners='$id' AND vote > 0");
$dislikeVote = $db->query("SELECT * FROM votes WHERE id_partners='$id' AND vote < 0");
$likeCount = $likeVote->rowCount();
$dislikeCount = $dislikeVote->rowCount();
echo '<div class="commentLoop">';
echo '<div class="topButtons">';
echo '<div class="numberComments">';
if($countComment <= 1){
  echo '<h2>'.$countComment.' COMMENTAIRE </h2><br />';
}else{
  echo '<h2>'.$countComment.' COMMENTAIRES </h2><br />';
}
echo '</div>';
echo '<div class="votesButtons">';
echo '<img src="./img/like.png" alt="Like" style="width: 20%; height: auto;"/>'.$likeCount.'  <img src="./img/dislike.png" alt="Dislike" style="width: 20%; height: auto;" />'.$dislikeCount.'';
echo '</div>';
echo'<div class="commentButton">';
  echo '<button type="button" class="collapsible">Laisser un commentaire</button>';
  echo '<div class="commentForm">';
  echo "<form action='functions/comment.php?id=".$id."' method='post'>";
  echo "<input type='hidden' name='user' value='".$userId."'>";
  echo "<fieldset>";
  echo "<legend>Laisser un commentaire</legend>";
  echo "<input type='text' name='comment' placeholder='Votre commentaire...'>";
  echo "<label for='like'><img src=\"./img/like.png\" alt=\"Like\" style=\"width: 20%; height: auto;\"/></label><input id='like' type='radio' name='vote' value='1'>";
  echo "<label for='dislike'><img src=\"./img/dislike.png\" alt=\"Dislike\" style=\"width: 20%; height: auto;\"/></label><input id='dislike' type='radio' name='vote' value='-1'>";
  echo "<input type='submit' value='Poster votre commentaire'>";
  echo "</fieldset>";
  echo "</form>";
  echo '</div>';
echo "</div>";
echo "</div>";
/*
$comment = $db->query("SELECT * FROM post WHERE id_partners='$id' AND id_user='$userId' ");
$countComment = $comment->rowCount();*/
if($countComment > 0){
  while($com = $comment->fetch()){
    echo '<div class="comment">';
    echo '<b>'.$com['firstname'].'</b><br />';
    echo date('d-m-Y', strtotime($com['date'])).'<br />';
    echo $com['comment'];
    echo '</div>';
  }
}else{
  echo '<h3>Pas encore de commentaire.</h3>';
}

echo '</div>';
 ?>

</div>
</div>
