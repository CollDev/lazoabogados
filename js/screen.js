$.ajaxSetup({
    cache: false
});
$(document).ready(function() {
    $('.poshytip').poshytip({
        className: 'tip-twitter',
        showTimeout: 1,
        alignTo: 'target',
        alignX: 'center',
        alignY: 'bottom',
        offsetY: 5,
        allowTipHover: true,
    });
    //Responsive Menu
    $("#responsive-menu select").change(function() {
        window.location = jQuery(this).find("option:selected").val();
    });
    //Hook up the FlexSlider
    $('.flexslider').flexslider({
        animation: "fade", //String: Select your animation type, "fade" or "slide"
        slideDirection: "horizontal", //String: Select the sliding direction, "horizontal" or "vertical"
        slideshow: true, //Boolean: Animate slider automatically
        slideshowSpeed: 2000, //Integer: Set the speed of the slideshow cycling, in milliseconds
        animationDuration: 3000, //Integer: Set the speed of animations, in milliseconds
        directionNav: true, //Boolean: Create navigation for previous/next navigation? (true/false)
        controlNav: true, //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        keyboardNav: true, //Boolean: Allow slider navigating via keyboard left/right keys
        mousewheel: false, //Boolean: Allow slider navigating via mousewheel
        prevText: "Anterior", //String: Set the text for the "previous" directionNav item
        nextText: "Siguiente", //String: Set the text for the "next" directionNav item
        pausePlay: false, //Boolean: Create pause/play dynamic element
        randomize: false, //Boolean: Randomize slide order
        slideToStart: 0, //Integer: The slide that the slider should start on. Array notation (0 = first slide)
        animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        pauseOnAction: true, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
        pauseOnHover: false, //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
        start: function() {
        }, //Callback: function(slider) - Fires when the slider loads the first slide
        before: function() {
        }, //Callback: function(slider) - Fires asynchronously with each slider animation
        after: function() {
        }, //Callback: function(slider) - Fires after each slider animation completes
        end: function() {
        }  //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)
    });
    //Twitter
    $(function() {
        $('#tweets').tweetable({username: 'anariel77', time: true, limit: 1, replies: true, position: 'append'});
    });
    //Activate the contactform
    $(function() {
        $('#contact-form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var post_url = form.attr('action');
            var post_data = form.serialize();
            $('#loader', form).html('<img src="images/loader.gif" /> Please Wait...');
            $.ajax({
                type: 'POST',
                url: post_url,
                data: post_data,
                success: function(msg) {
                    $(form).fadeOut(500, function() {
                        form.html(msg).fadeIn();
                    });
                }
            });
        });
    });
    //Activate the prettyPhoto
    $("a[class^='prettyPhoto']").prettyPhoto();
    //Activate the MainMenu
    $("ul.sf-menu").superfish();
    //Toggle box
    $('.toggle-trigger').click(function() {
        $(this).next().toggle('slow');
        $(this).toggleClass("active");
        return false;
    }).next().hide();

    $(function() {
        $("form .send-button").live('click', function(e) {
            e.preventDefault();
            var nombre = $("input#nombre"),
                apellidos = $("input#apellidos"),
                email = $("input#email"),
                comentario = $("textarea#comentario"),
                telefono     = $("input#telefono"),
                dni = $("input#dni"),
                nameRegex = /^[a-zA-Záéíóú]+$/,
                emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
                phoneRegex   = /[0-9-()+]{3,20}/;

            if (nombre.val() == "") {
                inlineMsg('nombre','Debe ingresar su nombre.',3);
                nombre.focus();
                return false;
            } else if(!nombre.val().match(nameRegex)) {
                inlineMsg('nombre','Ha ingresado un nombre no válido.',3);
                nombre.focus();
                return false;
            } else if (apellidos.val() != '' && !apellidos.val().match(nameRegex)) {
                inlineMsg('apellidos','Ha ingresado un apellido no válido.',3);
                apellidos.focus();
                return false;
            } else if (email.val() == "") {
                inlineMsg('email','Debe ingresar su correo electrónico.',3);
                email.focus();
                return false;
            } else if (!email.val().match(emailRegex)) {
                inlineMsg('email','Ha ingresado un correo no válido.',3);
                email.focus();
                return false;
            } else if (telefono.val() != '' && !telefono.val().match(phoneRegex)) {
                inlineMsg('telefono','Ha ingresado un teléfono no válido.',3);
                telefono.focus();
                return false;
            } else if (dni.val() != '' && !dni.val().match(phoneRegex)) {
                inlineMsg('dni','Ha ingresado un DNI no válido.',3);
                dni.focus();
                return false;
            } else if (comentario.val() == "") {
                inlineMsg('comentario','Debe ingresar un comentario.',3);
                comentario.focus();
                return false;
            }
            $form = $('form#contact-form');
            $.ajax({
                type: "POST",
                url: $form.attr("action"),
                data: $form.serialize(),
                dataType: "json"
            }).done(function(data){
                var response = data.responseCode == 200 ? 'success' : 'fail';
                $("#" + response).append($("<span />").text(data.response)).slideDown(500, function(){
                    setTimeout(function(){
                        $("#" + response).slideUp(1000, function() {
                            $("#" + response + ' span').remove();
                        });
                    }, 1500);
                });
                if (response == 'success') {
                    $form.each (function(){
                        this.reset();
                    });
                }
            }).fail(function(data){
                $("#fail").append($("<span />").text(data.statusText)).slideDown(500, function(){
                    setTimeout(function(){
                        $("#fail").slideUp(1000, function() {
                            $("#fail" + ' span').remove();
                        });
                    }, 1500);
                });
            });
        });
    });

    var MSGTIMER = 20,
        MSGSPEED = 5,
        MSGOFFSET = 3,
        MSGHIDE = 3;

    // face the message box //
    function fadeMsg(flag) {
        if(flag == null) {
            flag = 1;
        }
        var msg = document.getElementById('msg');
        var value;
        if(flag == 1) {
            value = msg.alpha + MSGSPEED;
        } else {
            value = msg.alpha - MSGSPEED;
        }
        msg.alpha = value;
        msg.style.opacity = (value / 100);
        msg.style.filter = 'alpha(opacity=' + value + ')';
        if(value >= 99) {
            clearInterval(msg.timer);
            msg.timer = null;
        } else if(value <= 1) {
            msg.style.display = "none";
            clearInterval(msg.timer);
        }
    }
    // build out the divs, set attributes and call the fade function //
    function inlineMsg(target,string,autohide) {
        var msg;
        var msgcontent;
        if(!document.getElementById('msg')) {
            msg = document.createElement('div');
            msg.id = 'msg';
            msgcontent = document.createElement('div');
            msgcontent.id = 'msgcontent';
            document.body.appendChild(msg);
            msg.appendChild(msgcontent);
            msg.style.filter = 'alpha(opacity=0)';
            msg.style.opacity = 0;
            msg.alpha = 0;
        } else {
            msg = document.getElementById('msg');
            msgcontent = document.getElementById('msgcontent');
        }
        msgcontent.innerHTML = string;
        msg.style.display = 'block';
        var msgheight = msg.offsetHeight;
        var targetdiv = document.getElementById(target);
        targetdiv.focus();
        var targetheight = targetdiv.offsetHeight;
        var targetwidth = targetdiv.offsetWidth;
        var topposition = topPosition(targetdiv) - ((msgheight - targetheight) / 2);
        var leftposition = leftPosition(targetdiv) + targetwidth + MSGOFFSET;
        msg.style.top = topposition + 'px';
        msg.style.left = leftposition + 'px';
        clearInterval(msg.timer);
        msg.timer = setInterval(function(){fadeMsg(1)}, MSGTIMER);
        if(!autohide) {
            autohide = MSGHIDE;
        }
        window.setTimeout(function(){hideMsg()}, (autohide * 1000));
    }

    // hide the form alert //
    function hideMsg(msg) {
        var msg = document.getElementById('msg');
        if(!msg.timer) {
            msg.timer = setInterval(function(){fadeMsg(0)}, MSGTIMER);
        }
    }

    // calculate the position of the element in relation to the left of the browser //
    function leftPosition(target) {
        var left = 0;
        if(target.offsetParent) {
            while(1) {
                left += target.offsetLeft;
                if(!target.offsetParent) {
                      break;
                }
                target = target.offsetParent;
            }
        } else if(target.x) {
            left += target.x;
        }
        return left;
    }

    // calculate the position of the element in relation to the top of the browser window //
    function topPosition(target) {
        var top = 0;
        if(target.offsetParent) {
            while(1) {
                top += target.offsetTop;
                if(!target.offsetParent) {
                    break;
                }
                target = target.offsetParent;
            }
        } else if(target.y) {
            top += target.y;
        }
        return top;
    }

    // preload the arrow //
    if(document.images) {
        arrow = new Image(7,80);
        arrow.src = "../images/msg_arrow.gif";
    }
    var time = 4000;
    var slides = $('.slide');
    var numberSlides = slides.length;
    var slideWidth = $('.slide').width();
    var wrap = $('.info');
    var padding = 19;
    var visibleSlides = 3;
    var sum = parseInt(slideWidth) + parseInt(padding * 2);

    wrap.width(parseInt(numberSlides * slideWidth) + (padding * 2 * numberSlides));

    function moveMent() {
        for (var r = 0; r < 100; r++) {
            for (var i = 0; i < numberSlides - visibleSlides; i++) {
                wrap
                    .delay(time)
                    .animate({
                    left: '-=' + sum + 'px'
                    })
                    .fadeTo(500, 1)
            }
            wrap.animate({
                left: '0'
            }, 0);
        }
    };
    moveMent();

    var timea = 2000;
    var slidesa = $('.slidea');
    var numberSlidesa = slidesa.length;
    var slideWidtha = $('.slidea').width();
    var wrapa = $('.clients');
    var padding = 17;
    var visibleSlides = 4;
    var suma = parseInt(slideWidtha) + parseInt(padding * 2);

    wrapa.width(parseInt(numberSlidesa * slideWidtha) + (padding * 2 * numberSlidesa));

    function moveMentAreas() {
        for (var r = 0; r < 100; r++) {
            for (var i = 0; i < numberSlidesa - visibleSlides; i++) {
                wrapa
                    .delay(timea)
                    .animate({
                    left: '-=' + suma + 'px'
                    })
                    .fadeTo(500, 1)
            }
            wrapa.animate({
                left: '0'
            }, 0);
        }
    };
    moveMentAreas();

    $(function() {
        $( "#abogados" ).tabs();
    });
    $("#slideToggle").click(function () {
        $('.slideTogglebox').slideToggle(500);
        $("html, body").animate({ scrollTop: $(document).height() }, 500);
    });

    $('a.link-associated').on('click', function(e){
        e.preventDefault();
        var $this = this;
        $('a.link-associated').removeClass().addClass('link-associated').addClass('orange');
        $($this).removeClass().addClass('link-associated');
        $.getJSON("includes/json.php", {
            abogado: $($this).attr('href')
        })
            .done(function(data) {
                $.get("js/mustache/perfil.html", function(template) {
                    $("div#lawyer-associated").html('');
                    var app = 'No hay resultados para la búsqueda.';
                    if (data !== '') {
                        app = $.mustache(template, data);
                    }
                    $("div#lawyer-associated").append(app);
                });
            });
    });
    $('div#tabs-1 ul li a').eq(0).trigger('click');
    $('a.link-partner').on('click', function(e){
        e.preventDefault();
        var $this = this;
        $('a.link-partner').removeClass().addClass('link-partner').addClass('orange');
        $($this).removeClass().addClass('link-partner');
        $.getJSON("includes/json.php", {
            abogado: $($this).attr('href')
        })
            .done(function(data) {
                $.get("js/mustache/perfil.html", function(template) {
                    $("div#lawyer-partner").html('');
                    var app = 'No hay resultados para la búsqueda.';
                    if (data !== '') {
                        app = $.mustache(template, data);
                    }
                    $("div#lawyer-partner").append(app);
                });
            });
    });
    $('div#tabs-2 ul li a').eq(0).trigger('click');
    $('a.link-special').on('click', function(e){
        e.preventDefault();
        var $this = this;
        $('a.link-special').removeClass().addClass('link-special').addClass('orange');
        $($this).removeClass().addClass('link-special');
        $.getJSON("includes/json.php", {
            especialidad: $($this).attr('href')
        })
            .done(function(data) {
                $.get("js/mustache/especial.html", function(template) {
                    $("div#lawyer-special").html('');
                    var app = 'No hay resultados para la búsqueda.';
                    if (data !== '') {
                        app = $.mustache(template, data);
                    }
                    $("div#lawyer-special").append(app);
                });
            });
    });
    $('div#tabs-3 ul li a').eq(0).trigger('click');
    $(document).on('click', 'a.link-profile', function(e){
        e.preventDefault();
        $("div#myModal").html('');
        $.getJSON("includes/json.php", {
            abogado: $(this).attr('href')
        })
            .done(function(data) {
                $.get("js/mustache/perfil.html", function(template) {
                    var app = 'No hay resultados para la búsqueda.';
                    if (data !== '') {
                        app = $.mustache(template, data);
                    }
                    $("div#myModal").append(app);
                });
            });
        $("div#myModal").dialog({
            position: { my: "center", at: "center", of: "#header" },
            modal: true,
            width: 680
        });
    });
});