<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     99.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<tr class="shipping kols-shipping">
	<th><?php echo wp_kses_post( $package_name ); ?></th>
	<td data-title="<?php echo esc_attr( $package_name ); ?>">
		<?php if ( 1 < count( $available_methods ) ) : ?>
			<ul id="shipping_method">
				<?php foreach ( $available_methods as $method ) : ?>
                                        <li class="<?php echo "method-" . sanitize_html_class($method->id); ?>">
                                            
                                            <input type="radio" name="shipping_method[<?php echo $index; ?>]" data-index="<?php echo $index; ?>" id="shipping_method_<?php echo $index; ?>_<?php echo sanitize_title( $method->id ); ?>" value="<?php echo esc_attr( $method->id ); ?>" class="shipping_method" <?php echo checked( $method->id, $chosen_method, false ); ?> />
                                            <label for="shipping_method_<?php echo $index; ?>_<?php echo sanitize_title( $method->id ); ?>">
                                                <?php // echo wc_cart_totals_shipping_method_label( $method ); ?>
                                                <div class="ak-shipping-title"><?php echo $method->label; ?></div>
                                                <div class="ak-desc">
                                                    <?php if( 'flat_rate1' == sanitize_html_class($method->id) ): ?>
                                                        <?php echo esc_html__( 'Доставка до подъезда в пределах г. Москва (МКАД).', 'Avada' ); ?>
                                                    <?php elseif( 'flat_rate3' == sanitize_html_class($method->id) ) : ?>
                                                        <?php echo esc_html__( 'Стоимость доставки не будет включена в корзину и будет рассчитана дополнительно.', 'Avada' ); ?>
                                                    <?php elseif( 'flat_rate4' == sanitize_html_class($method->id) ) : ?>
                                                        <?php echo esc_html__( 'Вы можете выбрать любую транспортную компанию. Стоимость доставки не будет включена в корзину и будет рассчитана дополнительно.', 'Avada' ); ?>
                                                    <?php elseif( 'local_pickup2' == sanitize_html_class($method->id) ) : ?>
                                                        <?php echo esc_html__( 'Самовывоз со склада в Одинцовском районе.', 'Avada' ); ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="ak-cost"><?php echo esc_html__( 'Стоимость:', 'Avada' ); ?> <?php echo $method->cost; ?> <span class="woocommerce-Price-currencySymbol">₽</span></div>
                                            </label>
                                            
                                            
                                            <?php do_action( 'woocommerce_after_shipping_rate', $method, $index ); ?>    
					</li>
				<?php endforeach; ?>
			</ul>
		<?php elseif ( 1 === count( $available_methods ) ) :  ?>
			<?php
				$method = current( $available_methods );
				printf( '%3$s <input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d" value="%2$s" class="shipping_method" />', $index, esc_attr( $method->id ), wc_cart_totals_shipping_method_label( $method ) );
				do_action( 'woocommerce_after_shipping_rate', $method, $index );
			?>
		<?php elseif ( WC()->customer->has_calculated_shipping() ) : ?>
			<?php
				if ( is_cart() ) {
					echo apply_filters( 'woocommerce_cart_no_shipping_available_html', wpautop( __( 'There are no shipping methods available. Please ensure that your address has been entered correctly, or contact us if you need any help.', 'woocommerce' ) ) );
				} else {
					echo apply_filters( 'woocommerce_no_shipping_available_html', wpautop( __( 'There are no shipping methods available. Please ensure that your address has been entered correctly, or contact us if you need any help.', 'woocommerce' ) ) );
				}
			?>
		<?php elseif ( ! is_cart() ) : ?>
			<?php echo wpautop( __( 'Enter your full address to see shipping costs.', 'woocommerce' ) ); ?>
		<?php endif; ?>

		<?php if ( $show_package_details ) : ?>
			<?php echo '<p class="woocommerce-shipping-contents"><small>' . esc_html( $package_details ) . '</small></p>'; ?>
		<?php endif; ?>

		<?php if ( ! empty( $show_shipping_calculator ) ) : ?>
			<?php woocommerce_shipping_calculator(); ?>
		<?php endif; ?>
	</td>
</tr>
