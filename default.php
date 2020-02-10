<?php
if(isset($_SESSION['message_login'])){
  ?>
<div class="alert">
 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
 <?php echo $_SESSION['message_login'];?>
</div>
<?php
}
 ?>
<form action="login.php" method="post">
  <fieldset>
    <legend>Connexion</legend>
  <label for="username">Nom d'utilisateur</label>
  <input type="text" name="username" id="username" placeholder="Nom d'utilisateur">
  <label for="password">Mot de passe</label>
  <input type="password" name="password" id="password" placeholder="*****">
  <input type="submit" value="Connexion">
  <a href="./forgot_password.php">Mot de passe oublié ?</a> - <a href="?page=register">Inscription</a>
  </fieldset>
</form>
