<?php
require_once('functions/function.php');
if (isset($_SESSION['most_recent_activity']) &&
    (time() -   $_SESSION['most_recent_activity'] > 20)) {

 unset($_SESSION['success'], $_SESSION['error']);

 }
 $_SESSION['most_recent_activity'] = time();
 ?>
 <?php
 if(isset($_SESSION['error'])){
   ?>
 <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <?php echo $_SESSION['error'];?>
 </div>
 <?php
 }
  ?>
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
 <form action="resetpassword_complete.php"  method="POST">
 	<fieldset>
    <legend>Réinitialiser le mot de passe</legend>
 		<label for="pseudo">Email :</label>
 		<input type="text" placeholder="Votre email" id="pseudo" name="email" />
    <label for="secretquestion">Question secrète :</label>
    <select name="secretquestion" id="secretquestion" required>
      <option value="1">Quel est le nom de votre mère ?</option>
      <option value="2">Quel est le nom de votre animal de compagnie ?</option>
      <option value="3">Quel est votre équipe de sport favorite ?</option>
    </select>

    <label for="secretanswer">Réponse à la question secrète :</label>
    <input type="text" name="secretanswer" id="secretanswer" placeholder="Réponse à votre question secrète" required />
    <label for="password">Nouveau mot de passe :</label>
    <input type="password" name="password" id="password" placeholder="*****" required />
    <input type="submit" value="Modifier le mot de passe">
    <a href="index.php">Retourner à la page de connexion.</a> - <a href="index.php?page=register">Inscription</a>
  </fieldset>
 </form>
