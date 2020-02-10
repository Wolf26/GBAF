<?php
require_once('./functions/function.php');
 ?>
<nav class="navbar">
 <div class="logo">
   <a href="./index.php"><img src="img/logo.png" style="max-width: 50%; height: auto;"/></a>
 </div>
 <div class="menu">
   <?php
    echo '<a href="index.php?page=changeParameters&id='.$userId.'">'.$firstname.' '.$lastname.'</a>';
    ?>
    <ul>
      <li><a href="logout.php">Déconnexion</a></li>
    </ul>
 </div>
</nav>
