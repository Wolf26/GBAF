<?php
require_once('functions/function.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>GBAF - Groupement des banques </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php
$page = $_GET['page'];
if(isset($_SESSION['id'])){
  switch($page){
    default:
    require_once('home.php');
    break;
    case 'seePartners':
    require_once('functions/showPartners.php');
    break;
    case 'postComment':
    require_once('functions/postComment.php');
    break;
    case 'setLike':
    require_once('functions/setLike.php');
  }
}else{
  switch($page){
    case 'login':
    require_once('login.php');
    break;
    case 'register':
    require_once('register.php');
    break;
    default:
    require_once('default.php');
    break;
  }
}


?>
</body>
</html>
