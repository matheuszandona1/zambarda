<script src="<?php echo __ROOT_URL;?>/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo __ROOT_URL;?>/js/bootstrap.min.js"></script>
<script src="<?php echo __ROOT_URL;?>/js/jquery.validate.min.js"></script>
<script src="<?php echo __ROOT_URL;?>/js/jquery-validate.bootstrap-tooltip.js"></script>
<!-- Load JS siles -->
<script src="<?php echo __ROOT_URL;?>/js/owl.carousel.js"></script>
<!-- SLIDER REVOLUTION SCRIPTS  -->
<script src="<?php echo __ROOT_URL;?>/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo __ROOT_URL;?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- general script file -->
<script src="<?php echo __ROOT_URL;?>/js/script.js"></script>
<script>
    jQuery(document).ready(function($){
        jQuery('.link-on-page').on('click', function () {
            jQuery('.menu-mobile').removeClass('opened');
            var href = jQuery(this).attr('href');
            //jQuery('.responsive-menu.open').removeClass('open');
            jQuery('.link-on-page').removeClass('active');
            jQuery(this).addClass('active')
            jQuery('html, body').animate({
                scrollTop: jQuery(href).offset().top-100
            }, 1000);
        })

        var nav = $('.header');

        $(window).scroll(function () {
            if ($(this).scrollTop() > 125) {
                nav.addClass("header-fixed");
            } else {
                nav.removeClass("header-fixed");
            }
        });

        jQuery('.navbar-toggle').on('click', function () {
           jQuery('.menu-mobile').toggleClass('opened');
        });


    });


    function ligamosPraVoce()
    {
       jQuery('#modal-ligamos-pra-voce').modal('show');
    }

    $(function() {

        $("#form-contato").validate({
            rules: {
                nome: "required",
                celular: "required",
                email: {
                    required: true,
                    email: true
                },

            },
            messages: {
                nome: "* Obrigatório.",
                celular: "* Obrigatório.",
                email: {
                    required: "* Obrigatório.",
                    email: "Ex: user@mail.com"
                }
            }
        });

        $("#form-ligamos-pra-voce").validate({
            rules: {
                nome: "required",
                celular: "required",
                email: {
                    required: true,
                    email: true
                },

            },
            messages: {
                nome: "* Obrigatório.",
                celular: "* Obrigatório.",
                email: {
                    required: "* Obrigatório.",
                    email: "Ex: user@mail.com"
                }
            }
        });

        $("#form-ligamos-pra-voce, #form-contato").submit(function(){
            var form = $(this);
            if(form.valid())
            {
                $(".button-submit", form).hide('slow', function () {
                    $('.loading', form).show('slow', function () {
                        $.post(form.attr("action"), form.serialize(), function(data){
                            var data = jQuery.parseJSON(data);
                            $('.loading', form).hide('slow', function () {
                                if(data.error == false)
                                {
                                    $(".div-result", form).html('<div class="alert alert-success"><strong>Sucesso:</strong> A mensagem foi enviada com sucesso.</div>');
                                    form[0].reset();
                                }
                                else
                                {
                                    $(".div-result", form).html('<div class="alert alert-danger"><strong>Erro:</strong>'+data.message+'</div>');
                                    $(".button-submit", form).show('slow');
                                }
                                setTimeout(function(){
                                    $(".div-result", form).slideUp("slow");
                                },3000);
                            });
                        });
                    });
                });




            }
            return false;
        });

    });

</script>