 <?php



 echo '<script>
    jQuery(document).ready(function($) {

        // Owl Carousel Initialization
        if ($(".' . esc_js( $unique_id ) . ' .wps_owls_slide").length) {
            $(".' . esc_js( $unique_id ) . ' .wps_owls_slide").owlCarousel({
                loop: false,
                margin:0,
                nav:true,
                smartSpeed: 500,
                autoplay: ' . wp_json_encode($settings['slide_auto_loop'] === '1') . ',
                navText: [ \'<span class="' . esc_js( $unique_id ) . ' wps_slider_path wps_slider_left eicon-angle-left"></span>\', \'<span class="' . esc_js( $unique_id ) . ' wps_slider_path wps_slider_right eicon-angle-right"></span>\' ],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:2
                    },
                    600:{
                        items:3
                    },
                    800:{
                        items:4
                    },
                    1024:{
                        items:' . wp_json_encode($settings['wps_columns']) . ' // Ensure that the value is passed correctly
                    },
                }
            });         
        }
        
          //put the js code under this line 
        var swiper = new Swiper(".' . esc_js( $unique_id ) . ' .mySwiper", {
            pagination: {
                el: ".' . esc_js( $unique_id ) . ' .swiper-pagination",
                type: "fraction",
            },
            navigation: {
                nextEl: ".' . esc_js( $unique_id ) . ' .swiper-button-next",
                prevEl: ".' . esc_js( $unique_id ) . ' .swiper-button-prev",
            },
            autoplay: {
                delay: 3000, // Set the delay (in milliseconds) between slides
            },
        });

    jQuery(document).ready(function ($) {
        $(".' . esc_js( $unique_id ) . ' .cart.wps_cart_qnt").on("click", ".plus, .minus", function () {
            var $qty = $(this).closest(".' . esc_js( $unique_id ) . ' .cart").find(".qty");
            var currentVal = parseInt($qty.val()) || 0;
            var max = parseFloat($qty.attr("max")) || 0;
            var min = parseFloat($qty.attr("min")) || 0;
            var step = 1; // Set step to 1 for each click

            if ($(this).is(".plus")) {
                if (!max || (currentVal < max)) {
                    $qty.val(currentVal + step).change();
                }
            } else {
                if (!min || (currentVal > min)) {
                    $qty.val(Math.max(min, currentVal - step)).change();
                }
            }
        });
    });


    });
</script>';
?>