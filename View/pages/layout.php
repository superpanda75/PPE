<?php header( 'content-type: text/html; charset=utf-8' ); ?>
<!DOCTYPE html>
<!--
Template Name: Cytocean
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html lang="fr">
<head>
    <title>M2L</title>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link id="stylesheet" href="<?=BASE_URL?>/View/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <script>
        function swapStyleSheet(sheet){
            document.getElementById('stylesheet').setAttribute('href', sheet);
        }
    </script>

</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
    <div id="topbar" class="hoc clear">
        <!-- ################################################################################################ -->
        <div class="fl_left">
            <ul>
                <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
            </ul>
        </div>
        <div class="fl_right">
            <ul>
                <?php
                if(isset($_SESSION['connecte']) && $_SESSION['connecte'] = true){
                    echo "<li><a href='".BASE_URL."/accueil'><i class='fa fa-lg fa-home'></i></a></li>";
                    echo "<li><a href='".BASE_URL."/AccountController'><i class='fa fa-lg fa-user'></i>Profil</a></li>";
                    echo "<li><a href='".BASE_URL."/loginController?a=logout'>Deconnexion</a></li>";

                } else{
                    echo "<li><a href='".BASE_URL."/loginController'><i class='fa fa-lg fa-'></i></a></li>";
                    echo "<li><a href='".BASE_URL."/loginController'>Connexion</a></li>";
                }
                ?>
            </ul>
        </div>
        <!-- ################################################################################################ -->
    </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
    <header id="header" class="hoc clear">
        <div id="logo">
            <!-- ################################################################################################ -->
            <h1><a href="<?=BASE_URL?>/accueil">M.2.L</a></h1>
            <h2>Maison des ligues de la Lorraine</h2>
            <!-- ################################################################################################ -->
        </div>
        <nav id="mainav" class="clear">
            <!-- ################################################################################################ -->
            <ul class="clear">
                <li class="active"><a href="<?=BASE_URL?>/accueil">Accueil</a></li>
                <li><a class="drop" href="#">Formations</a>
                    <ul>
                        <li><a href="<?=BASE_URL?>/FormationController">Formations</a></li>
                        <li><a href="<?=BASE_URL?>/full-widthController">Commentaires</a></li>
                        <li><a href="<?=BASE_URL?>/sidebar-leftController">Sidebar Left</a></li>
                        <li><a href="<?=BASE_URL?>/sidebar-rightController">Sidebar Right</a></li>
                        <li><a href="<?= BASE_URL ?>/basic-gridController">Basic Grid</a></li>
                    </ul>
                </li>
                <li><a class="drop" href="#">Dropdown</a>
                    <ul>
                        <li><a href="#">Level 2</a></li>
                        <li><a class="drop" href="#">Level 2 + Drop</a>
                            <ul>
                                <li><a href="#">Level 3</a></li>
                                <li><a href="#">Level 3</a></li>
                                <li><a href="#">Level 3</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Level 2</a></li>
                    </ul>
                </li>
                <li><a href="#">Long Link Text</a></li>
            </ul>
            <!-- ################################################################################################ -->
        </nav>
    </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php
echo $contenu;
?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
    <footer id="footer" class="hoc clear">
        <!-- ################################################################################################ -->
        <div class="one_third first">
            <h6 class="heading">Cytocean</h6>
            <nav>
                <ul class="nospace">
                    <li><a href="accueil.php"><i class="fa fa-lg fa-home"></i></a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Cookies</a></li>
                    <li><a href="#">Disclaimer</a></li>
                    <li><a href="#">Online Shop</a></li>
                    <li><a href="#">Sitemap</a></li>
                </ul>
            </nav>
            <ul class="faico clear">
                <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
            </ul>
        </div>
        <div class="one_third">
            <h6 class="heading">Aenean molestie velit</h6>
            <ul class="nospace linklist contact">
                <li><i class="fa fa-map-marker"></i>
                    <address>
                        Street Name &amp; Number, Town, Postcode/Zip
                    </address>
                </li>
                <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
            </ul>
        </div>
        <div class="one_third">
            <h6 class="heading">Aliquam sit condimentum</h6>
            <form method="post" action="#">
                <fieldset>
                    <legend>Newsletter:</legend>
                    <input class="btmspace-15" type="text" value="" placeholder="Name">
                    <input class="btmspace-15" type="text" value="" placeholder="Email">
                    <button type="submit" value="submit">Submit</button>
                </fieldset>
            </form>
        </div>
        <!-- ################################################################################################ -->
    </footer>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="<?=BASE_URL?>/View/js/jquery.min.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.backtotop.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.mobilemenu.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.flexslider-min.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery-3.2.0.min.js"></script>
</body>
</html>