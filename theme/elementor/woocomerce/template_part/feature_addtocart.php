<?php
// Generate a unique class for the form and quantity input
$uniqueClass = 'wps_p_block_id_' . uniqid();
?>

<?php if ('bottom' === $settings['wps_columns_expand']) : ?>
    <div class="hide_content">
<?php endif; ?>

<?php if (isset($settings['show_product_features']) && $settings['show_product_features']) : ?>
    <?php if (!get_post_meta(get_the_ID(), 'meta_show_featuretext', true)) : ?>
        <div class="wps_order order-<?php echo esc_attr($settings['position_order_seven']); ?>">
            <div class="wps_meta_text">
                <?php echo wp_kses(get_post_meta(get_the_ID(), 'meta_text', true), wp_kses_allowed_html('post')); ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if (isset($settings['show_prduct_x_button']) && $settings['show_prduct_x_button']) : ?>
    <?php if (!get_post_meta(get_the_ID(), 'meta_show_product_button', true)) : ?>
        <div class="wps_order order-<?php echo esc_attr($settings['position_order_eight']); ?> <?php echo esc_attr($uniqueClass); ?> hider_area_2">
            <?php if ($settings['wps_quick_view_button_link']) : ?>
                <div class="quick_defult_wps">
                    <a href="<?php echo esc_url($settings['wps_quick_view_button_link']); ?>">
                        <button class="open-wps wps_button"><?php echo esc_html($settings['wps_quick_view_button']); ?></button>
                    </a>
                </div>
            <?php else : ?>
                <?php if ($product->is_in_stock()) : ?>
                    <div class="<?php echo esc_attr($uniqueClass); ?>">
                        <form class="cart wps_cart_qnt <?php echo esc_attr($uniqueClass); ?>" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                            <?php do_action('woocommerce_before_add_to_cart_button'); ?>
                            <?php if ($settings['wps_product_qun_hide']) : ?>
                                <div class="wps_qnt_button">
                                    <div class="quantity">
                                        <button type="button" class="minus <?php echo esc_attr($uniqueClass); ?>">-</button>
                                        <input type="number" class="qty <?php echo esc_attr($uniqueClass); ?>" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" />
                                        <button type="button" class="plus <?php echo esc_attr($uniqueClass); ?>">+</button>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="cart-btn quick_defult_wps">
                                <button class="open-wps wps_button" type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
                                    <?php if ($settings['show_prduct_addtocart_icon']) : ?>
                                        <i class="<?php echo esc_attr(str_replace('icon ', '', $settings['wps_product_adcart_icon']['value'])); ?>"></i>
                                    <?php endif; ?>
                                    <?php echo esc_html($settings['wps_quick_view_button']); ?>
                                </button>
                            </div>
                            <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                        </form>
                        <script>
                            jQuery(document).ready(function ($) {
                                $('body').on('click', '.<?php echo esc_js($uniqueClass); ?> .plus, .<?php echo esc_js($uniqueClass); ?> .minus', function () {
                                    var $qty = $(this).siblings('.qty');
                                    var currentVal = parseInt($qty.val());
                                    var max = parseFloat($qty.attr('max'));
                                    var min = parseFloat($qty.attr('min'));
                                    var step = parseFloat($qty.attr('step'));

                                    if ($(this).is('.plus')) {
                                        if (max && (currentVal >= max)) {
                                            $qty.val(max).change();
                                        } else {
                                            $qty.val(currentVal + step).change();
                                        }
                                    } else {
                                        if (min && (currentVal <= min)) {
                                            $qty.val(min).change();
                                        } else if (currentVal > 1) {
                                            $qty.val(currentVal - step).change();
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if ('bottom' === $settings['wps_columns_expand']) : ?>
    </div>
<?php endif; ?>
