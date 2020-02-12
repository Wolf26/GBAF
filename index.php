<?php
require_once('functions/function.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>GBAF - Groupement des banques </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <?php
          require_once('navbar.php');
   ?>
    <?php
    $page = $_GET['page'];
    if(isset($_SESSION['id'])){
      switch($page){
        default:
        require_once('home.php');
        break;
        case 'seePartners':
        if(isset($_GET['id'])){
          require_once('functions/showPartners.php');
        }else{
          header('Location: ?page=');
        }
        break;
        case 'mentions':
        require_once('mentions.php');
        break;
        case 'contact':
        require_once('contact.php');
        break;
        case 'changeParameters':
        if(isset($_GET['id'])){
          require_once('functions/setParameters.php');
        }else{
          header('Location: ?page=');
        }
        break;
        case 'postComment':
        require_once('functions/postComment.php');
        break;
        case 'setLike':
        require_once('functions/setLike.php');
        break;
      }
    }else{
      switch($page){
        case 'login':
        require_once('login.php');
        break;
        case 'register':
        require_once('register.php');
        break;
        case'resetpassword':
        require_once('resetpassword.php');
        break;
        default:
        require_once('default.php');
        break;
        case 'mentions':
        require_once('mentions.php');
        break;
        case 'contact':
        require_once('contact.php');
        break;
      }
    }

    ?>
    <div class="footer">
      <a href="./index.php?page=mentions">Mentions légales</a> | <a href="./index.php?page=contact">Contact</a>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
