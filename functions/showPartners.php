<?php
require_once('function.php');

$showPartners = $db->prepare('SELECT * FROM partners');
$prepareToFetch = $showPartners->execute();


 ?>

<div class="partnersAll">
  <?php
  while($partners = $prepareToFetch->fetchAll()){
    echo $partners['name'];
  }

   ?>
</div>
