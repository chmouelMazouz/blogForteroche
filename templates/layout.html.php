<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <title>Mon superbe blog - <?= $pageTitle ?></title>
</head>

<body>
<header>
    <nav class="grey darken-3" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo green-text text-darken-3">Blog de Jean Forteroche</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php?controller=adminController&task=registerAction" class="green-text text-darken-1">S'inscrire</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php?controller=adminController&task=login" class="green-text text-darken-1">Se connecter</a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="col s12 m8 offset-m2 l6 offset-l3">
    <div class="card-panel grey lighten-5 z-depth-1">
        <div class="row valign-wrapper">
            <div class="col s2">
                <img src="images/fond.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">
                This is a square image. Add the "circle" class to it to make it appear circular.
              </span>
            </div>
        </div>
    </div>
</div>



    <?= $pageContent ?>
</body>

</html>