<?php
require_once('function.php');
if (isset($_SESSION['most_recent_activity']) &&
    (time() -   $_SESSION['most_recent_activity'] > 20)) {

 unset($_SESSION['success'], $_SESSION['error']);

 }
 $_SESSION['most_recent_activity'] = time();
?>
<div class="content-actor">
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
<h1>  Bienvenue <b><?php echo $firstname; ?></b></h1>

<form action="functions/changeParameters.php?id=<?php echo $_GET['id'];?>" method='POST'>
  <fieldset>
    <legend>Modification du compte</legend>
  <label for="username">Email</label>
  <input type="email" name="email" id="username" value="<?php echo $username; ?>" required />

  <label for="lastname">Nom</label>
  <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" required />

  <label for="firstname">Prénom</label>
  <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>" required />

  <label for="secretquestion">Question secrète</label>
  <select name="secretquestion" id="secretquestion" required>
    <option value="1" <?php if($secretquestion == 1) {echo'selected';} ?>>Quel est le nom de votre mère ?</option>
    <option value="2" <?php if($secretquestion == 2) {echo'selected';} ?>>Quel est le nom de votre animal de compagnie ?</option>
    <option value="3" <?php if($secretquestion == 3) {echo'selected';} ?>>Quel est votre équipe de sport favorite ?</option>
  </select>

  <label for="secretanswer">Réponse à la question secrète</label>
  <input type="text" name="secretanswer" id="secretanswer" value="<?php echo $secretanswer; ?>" required />

  <input type="submit" value="Modifier le profil">
  </fieldset>
</div>
