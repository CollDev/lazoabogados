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
        <link href="css/base.css" rel="stylesheet" />
        <link href="css/skeleton.css" rel="stylesheet" />
        <link href="css/screen.css" rel="stylesheet" />
        <link href="css/prettyPhoto.css" rel="stylesheet" />
        <link href="css/lightbox.css" rel="stylesheet" />
        <link href="lib/jquery-ui/css/ui-darkness/jquery-ui-1.10.3.custom.css" rel="stylesheet" />
        <link href="css/jquery.jscrollpane.css" rel="stylesheet" />
        <link href="images/favicon.ico" rel="shortcut icon" />
        <link href="images/apple-touch-icon.png" rel="apple-touch-icon" />
        <link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72" />
        <link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114" />
        <link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic" rel="stylesheet" />
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
    
    <body>
<?php
$header = array('', 'abogados', 'reconocimientos', 'contacto', 'trabaja-con-nosotros');
if (in_array($option, $header)) {
?>
        <div id="header">
            <div class="container header head-background">
                <div class="logo"><a href="/"><img src="images/logo.png" alt="" /></a></div>
            </div>
            <div class="container header nav-background"> 
                <div class="mainmenu">
                    <div id="mainmenu">
                        <ul class="sf-menu">
                            <li><a href="/"<?php if($option == '') { ?> id="visited"<?php } ?>>Estudio</a></li>
                            <li><a href="#"<?php if($option == 'areas') { ?> id="visited"<?php } ?>>Áreas</a>
                                <ul>
                                    <li><a href="/banca-y-finanzas">- Banca y finanzas</a></li>
                                    <li><a href="/civil-e-inmobiliaria">- Civil e inmobiliaria</a></li>
                                    <li><a href="/competencia">- Competencia</a></li>
                                    <li><a href="/concursal-y-reestructuracion-patrimonial">- Concursal y patrimonial</a></li>
                                    <li><a href="/corporativa">- Corporativa</a></li>
                                    <li><a href="/derecho-administrativo-y-contratacion-publica">- Administrativo</a></li>
                                    <li><a href="/laboral">- Laboral</a></li>
                                    <li><a href="/propiedad-intelectual">- Propiedad intelectual</a></li>
                                    <li><a href="/proteccion-al-consumidor-y-publicidad-comercial">- Protección consumidor</a></li>
                                    <li><a href="/tributaria-y-planeamiento-tributario">- Tributario</a></li>
                                </ul>
                            </li>
                            <li><a href="/abogados"<?php if($option == 'abogados') { ?> id="visited"<?php } ?>>Abogados</a>
                                <ul>
                                    <li><a href="/abogados#tabs-1">- Socios</a></li>
                                    <li><a href="/abogados#tabs-2">- Asociados</a></li>
                                    <li><a href="/abogados#tabs-3">- Especialidades</a></li>
                                </ul>
                            </li>
                            <li><a href="/reconocimientos"<?php if($option == 'reconocimientos') { ?> id="visited"<?php } ?>>Reconocimientos</a></li>
                            <li><a href="#"<?php if($option == 'probono') { ?> id="visited"<?php } ?>>Probono</a></li>
                            <li><a href="/contacto"<?php if($option == 'contacto') { ?> id="visited"<?php } ?>>Contacto</a></li>
                        </ul>
                    </div>
                    <form id="responsive-menu" action="#" method="post">
                        <select>
                            <option value="/">Estudio</option>
                            <option value="#">Áreas</option>
                            <option value="/abogados">Abogados</option>
                            <option value="/reconocimientos">Reconocimientos</option>
                            <option value="#">Probono</option>
                            <option value="/contacto">Contacto</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
<?php
}

if ($option == '') {
    require_once 'contenido/inicio.php';
} else {
    require_once 'contenido/' . $option . '.html';
}

if (!in_array($option, $header)) {
    require_once 'contenido/areas.html';
}
?>
        <div class="container slideTogglebox">
            <div class="one_sixth">
                <p>ESTUDIO</p>
                <div style="border-left: 1px solid #3C3C3B;">
                    <ul>
                        <li>Misión y Visión</li>
                        <li><a href="/reconocimientos">Reconocimientos</a></li>
                        <li>Noticias</li>
                        <li>Boletín</li>
                    </ul>
                </div>
            </div>
            <div class="one_third">
                <p>ÁREAS</p>
                <div>
                    <ul>
                        <li><a href="/banca-y-finanzas">Banca y finanzas</a></li>
                        <li><a href="/civil-e-inmobiliaria">Civil e inmobiliaria</a></li>
                        <li><a href="/competencia">Competencia</a></li>
                        <li><a href="/concursal-y-reestructuracion-patrimonial">Concursal y patrimonial</a></li>
                        <li><a href="/corporativa">Corporativa</a></li>
                        <li><a href="/derecho-administrativo-y-contratacion-publica">Administrativo</a></li>
                        <li><a href="/laboral">Laboral</a></li>
                        <li><a href="/propiedad-intelectual">Propiedad intelectual</a></li>
                        <li><a href="/proteccion-al-consumidor-y-publicidad-comercial">Protección consumidor</a></li>
                        <li><a href="/tributaria-y-planeamiento-tributario">Tributario</a></li>
                    </ul>
                </div>
            </div>
            <div class="one_sixth">
                <p>ABOGADOS</p>
                <div>
                    <ul>
                        <li><a href="/abogados#tabs-1">Socios</a></li>
                        <li><a href="/abogados#tabs-2">Asociados</a></li>
                        <li><a href="/abogados#tabs-3">Especialidades</a></li>
                    </ul>
                </div>
            </div>
            <div class="one_sixth">
                <p>RSE</p>
                <div>
                    <ul>
                        <li>Probono</li>
                    </ul>
                </div>
            </div>
            <div class="one_sixth">
                <p>HERRAMIENTAS</p>
                <div>
                    <ul>
                        <li><a href="/trabaja-con-nosotros">Trabaja con nosotros</a></li>
                        <li><a href="/contacto">Contacto</a></li>
                        <li>English</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="copyright">
            <div class="container">
                <div class="one_half alpha">
                    <div id="slideToggle" class="footer-button">Mapa de Sitio</div>
                    <a href="/boletin"><div class="footer-button">Boletín</div></a>
                </div>
                <div class="one_half omega">
                    <a href="/trabaja-con-nosotros"><div class="footer-button right">&nbsp;&nbsp;&nbsp;&nbsp;Trabaja con nosotros</div></a>
                </div>
                <div>Todos los derechos reservados</div>
            </div>
        </div>
        <script src="js/jquery-1.8.0.min.js"></script>
        <script src="js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
        <script src="js/tabs.js"></script>
        <script src="js/jquery.tweetable.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/superfish.js"></script>
        <script src="js/hoverIntent.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/modernizr.custom.29473.js"></script>
        <script src="js/lightbox-2.6.min.js"></script>
        <script src="js/jquery.jscrollpane.min.js"></script>
        <script src="js/jquery.mousewheel.js"></script>
        <script src="lib/jquery-ui/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="js/screen.js"></script>
    </body>
</html>