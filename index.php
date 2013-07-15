<?php
if (isset($_GET['option'])) {    
    $option = $_GET['option'];
} else {
    $option = '';
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="es">
<!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
        <meta name="description" content="Place to put your description text" />
        <meta name="author" content="Joe Robles - joe.robles.pdj@gmail.com - CollDev" />
        <title>Lazo, De Roma&ntilde;a & Gagliuffi Abogados</title>
        <link rel="stylesheet" href="css/base.css" />
        <link rel="stylesheet" href="css/skeleton.css" />
        <link rel="stylesheet" href="css/screen.css" />
        <link rel="stylesheet" href="css/prettyPhoto.css" />
        <link rel="stylesheet" href="css/lightbox.css" />
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png" />
        <link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
    
    <body>
        <div id="header">
            <div class="container header head-background">
                <div class="logo"><a href="index.html"><img src="images/logo.png" alt="" /></a></div>
            </div>
            <div class="container header nav-background"> 
                <div class="mainmenu">
                    <div id="mainmenu">
                        <ul class="sf-menu">
                            <li><a href="/"<?php if($option == '') { ?> id="visited"<?php } ?>>Estudio</a></li>
                            <li><a href="#"<?php if($option == 'areas') { ?> id="visited"<?php } ?>>Áreas</a>
                                <ul>
                                    <li><a href="#">- Banca y finanzas</a></li>
                                    <li><a href="#">- Mercados de capitales</a></li>
                                    <li><a href="#">- Civil e inmobiliaria</a></li>
                                    <li><a href="#">- Competencia</a></li>
                                    <li><a href="#">- Concursal y patrimonial</a></li>
                                    <li><a href="#">- Corporativo</a></li>
                                    <li><a href="#">- Administrativo</a></li>
                                    <li><a href="#">- Contratación pública</a></li>
                                    <li><a href="#">- Laboral</a></li>
                                    <li><a href="#">- Tributario</a></li>
                                    <li><a href="#">- Propiedad intelectual</a></li>
                                    <li><a href="#">- Protección consumidor</a></li>
                                </ul>
                            </li>
                            <li><a href="#"<?php if($option == 'abogados') { ?> id="visited"<?php } ?>>Abogados</a>
                                <ul>
                                    <li><a href="#">- Socios</a></li>
                                    <li><a href="#">- Asociados</a></li>
                                    <li><a href="#">- Especialidades</a></li>
                                    <li><a href="#">- Buscador</a></li>
                                </ul>
                            </li>
                            <li><a href="#"<?php if($option == 'reconocimientos') { ?> id="visited"<?php } ?>>Reconocimientos</a></li>
                            <li><a href="#"<?php if($option == 'probono') { ?> id="visited"<?php } ?>>Probono</a></li>
                            <li><a href="/contacto"<?php if($option == 'contacto') { ?> id="visited"<?php } ?>>Contacto</a></li>
                        </ul>
                    </div>
                    <form id="responsive-menu" action="#" method="post">
                        <select>
                            <option value="#">Estudio</option>
                            <option value="#">Áreas</option>
                            <option value="#">Abogados</option>
                            <option value="#">Reconocimientos</option>
                            <option value="#">Probono</option>
                            <option value="/contacto">Contacto</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
<?php
if ($option == '') {
    $require = 'inicio';
} else {
    $require = $option;
}
require_once 'contenido/' . $require . '.html';
?>

        <div id="copyright">
            <div class="container">
                <div class="eleven columns alpha">
                    <p class="copyright">Lazo, de Romaña & Gagluffi&copy;2013 Todos los derechos reservados. Creado por <a href="http://www.colldev.com/">CollDev</a>. Alojado en <a href="http://www.royalhoster.com">RoyalHoster</a></p>
                </div>
                <div class="five columns omega">
                    <section class="socials">
                        <ul class="socials fr">
                            <li><a href="#"><img src="images/socials/twitter.png" class="poshytip" title="Twitter"  alt="" /></a></li>
                            <li><a href="#"><img src="images/socials/facebook.png" class="poshytip" title="Facebook" alt="" /></a></li>
                            <li><a href="#"><img src="images/socials/google.png" class="poshytip" title="Google" alt="" /></a></li>
                            <li><a href="#"><img src="images/socials/dribbble.png" class="poshytip" title="Dribbble" alt="" /></a></li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
        <script src="js/jquery-1.8.0.min.js"></script>
        <script src="js/screen.js"></script>
        <script src="js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
        <script src="js/tabs.js"></script>
        <script src="js/jquery.tweetable.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/superfish.js"></script>
        <script src="js/hoverIntent.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/modernizr.custom.29473.js"></script>
        <script src="js/lightbox-2.6.min.js"></script>
    </body>
</html>
