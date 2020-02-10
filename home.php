<?php
require_once('functions/function.php'); ?>
<div class="content">
  <div class="presentation">
  <h1>Groupement Banque Assurance Français​</h1>
  <hr>
  <p><strong>Le Groupement Banque Assurance Français</strong>​ (GBAF) est une fédération représentant les 6 grands groupes français :
    <ul>
      <li>BNP Paribas ;</li>
      <li>BPCE ;</li>
      <li>Crédit Agricole ;</li>
      <li>Crédit Mutuel-CIC ;</li>
      <li>Société Générale ;</li>
      <li>La Banque Postale.</li>
    </ul>
    Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
</p>
<img src="img/logo.png" style="max-width: 100%; height: auto;">
<hr>
</div>
<div class="partners">

<h2>Découvrez nos acteurs et partenaires.</h2> <!--Inventez un texte pour partenaires !-->
<div class="showPartners">
<?php
$showPartners = $db->query('SELECT * FROM partners');

while($partners = $showPartners->fetch()){
      echo '<div class="partnerLoop">';
      echo '<img src="'.$partners['logo'].'" class="imgPartner" />';
      echo '<div class="contentPartners">';
      echo '<h3>'.$partners['name'].'</h3>';
      echo '<p>'.$partners['resume'].'</p>';
      echo '</div>';
      echo '<div class="next">';
      echo '<a href="#" class="button">Lire la suite</a>';
      echo '</div>';
      echo '</div>';
}
?>
</div>
</div>
</div>
