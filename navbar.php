<?php
require_once('./functions/function.php');
 ?>
<nav class="navbar">
 <div class="logo">
   <a href="./index.php"><img src="img/logo.png" style="max-width: 50%; height: auto;" alt="GBAF - Groupe banque assurance français"/></a>
 </div>
 <div class="menu">

   <?php
   if(isset($_SESSION['id'])){
    ?>
    <div class="dropdown">
      <button onclick="myFunction()" class="dropbtn"><?php echo $firstname.' '.$lastname;?></button>
      <div id="myDropdown" class="dropdown-content">
        <a href="index.php?page=changeParameters&id=<?php echo $userId; ?>">Modifier votre profil</a>
        <a href="logout.php">Déconnexion</a>
      </div>
    </div>
    <?php
  }else{
    echo'<ul>';
    echo'<li><a href="index.php?page=login">Connexion</a></li>';
    echo'<li><a href="index.php?page=register">Inscription</a></li>';
    echo'</ul>';
  }
  ?>
 </div>
</nav>
