<?php
require_once('function.php');
?>
<div class="content-actor">
<?php
$showPartners = $db->query('SELECT * FROM partners WHERE id='.$_GET['id'].'');
while($partners = $showPartners->fetch()){
      echo '<div class="partnerSelected">';
      echo '<div class="partnerSelect">';
      echo '<img src="'.$partners['logo'].'" />';
      echo '</div>';
      echo '</div>';
      echo '<div class="partnersContent">';
      echo '<div class="contentPartners">';
      echo '<h2>'.$partners['name'].'</h2>';
      echo '<p>'.$partners['resume'].'</p>';
      echo '</div>';
      echo '</div>';
  }
?>
</div>
