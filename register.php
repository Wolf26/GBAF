<?php
require_once('functions/function.php');
?>
<?php
if(isset($_SESSION['message'])){
  ?>
<div class="alert">
 <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
 <?php echo $_SESSION['message'];?>
</div>
<?php
}
 ?>
<form action="valide_register.php" method="POST">
  <fieldset>
    <legend>Inscription</legend>
  <label for="username">Email</label>
  <input type="email" name="username" id="username" placeholder="Email" required />

  <label for="password">Mot de passe</label>
  <input type="password" name="password" id="password" placeholder="****" required />

  <label for="lastname">Nom</label>
  <input type="text" name="lastname" id="lastname" placeholder="Nom" required />

  <label for="firstname">Prénom</label>
  <input type="text" name="firstname" id="firstname" placeholder="Prénom" required />

  <label for="secretquestion">Question secrète</label>
  <select name="secretquestion" id="secretquestion" required>
    <option value="1">Quel est le nom de votre mère ?</option>
    <option value="2">Quel est le nom de votre animal de compagnie ?</option>
    <option value="3">Quel est votre équipe de sport favorite ?</option>
  </select>

  <label for="secretanswer">Réponse à la question secrète</label>
  <input type="text" name="secretanswer" id="secretanswer" placeholder="Réponse à votre question secrète" / required>

  <input type="submit" value="S'enregister">
  </fieldset>
</form>
