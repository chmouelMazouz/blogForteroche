<?php
if (session_id() == "")
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Blog de Jean Forteroche -<?= $pageTitle ?></title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/css?family=Long+Cang&display=swap" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'.tinymce'});</script>
</head>

<body>
<div class="navbar-fixed">
<nav class="white" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="#" class="brand-logo">Jean Forteroche</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?controller=articleController&task=biographie">Biographie</a>
            <li><a href="index.php?controller=commentController&task=contact">Contact</a>
                <?php
                if (!empty($_SESSION)){
                    if($_SESSION["pseudo"]!=""){
                        echo'<li><a href="index.php?controller=adminController&task=showBackOffice">Back-Office</a></li>';
                    }
                }
                ?>
            <?php
            if (!empty($_SESSION)){
                if($_SESSION["pseudo"]!=""){
                    echo'<li><a href="index.php?controller=adminController&task=logoutAction">Déconnexion</a></li>';
                }
            }else {
                echo'<li><a href="index.php?controller=adminController&task=login">Connexion</a></li>';
            }
            ?>

        </ul>

        <ul id="nav-mobile" class="sidenav">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?controller=articleController&task=biographie">Biographie</a>
            <li><a href="index.php?controller=commentController&task=contact">Contact</a>
            <?php
            if (!empty($_SESSION)){
                if($_SESSION["pseudo"]!=""){
                    echo'<li><a href="index.php?controller=adminController&task=logoutAction">Deconnexion</a></li>';
                }
            }else {
                echo'<li><a href="index.php?controller=adminController&task=login">Connexion</a></li>';
            }
            ?>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
</div>

    <?= $pageContent; ?><br>

<footer class="page-footer teal">
    <div class="footer-copyright">
        <div class="container">
            Réalisé par Chmouel Mazouz - Etudiant Openclassrooms
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
</body>



</html>