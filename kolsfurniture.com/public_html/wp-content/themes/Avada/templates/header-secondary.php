<?php
/**
 * Template for the secondary header.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php

$content_1 = avada_secondary_header_content( 'header_left_content' );
$content_2 = avada_secondary_header_content( 'header_right_content' );
?>

<div class="fusion-secondary-header">
	<div class="fusion-row">
		<?php if ( $content_1 ) : ?>
			<div class="fusion-alignleft">
				<a class="fusion-button button-flat fusion-button-round button-small button-custom button-51 fancybox-inline" target="_blank" rel="noopener noreferrer" href="#contact_form_zvonok" ><span class="fusion-button-text" >Заказать звонок</span></a> <a href="tel:+79163676760" style="padding-left: 20px; padding-right: 20px;">+7 (916) 367 67 60</a><a href="http://kolsfurniture.com/cart/" class="fusion-bar-highlight" role="menuitem"><span class="iconbag2"></span></a>
			</div>
		<?php endif; ?>
		<?php if ( $content_2 ) : ?>
			<div class="fusion-alignright">
<nav class="fusion-secondary-menu" role="navigation" aria-label="Secondary Menu"><ul role="menubar" id="menu-header_right" class="menu"><li  id="menu-item-340"  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-340"  data-item-id="340"><a  href="http://kolsfurniture.com/wishlist/" class="fusion-bar-highlight" role="menuitem"><span class="menu-text">Избранное</span></a></li><li  id="menu-item-343"  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-343"  data-item-id="343"><a  href="http://kolsfurniture.com/my-account/" class="fusion-bar-highlight" role="menuitem"><span class="menu-text">Личный кабинет</span></a></li><li  id="menu-item-339"  class="icon-bag menu-item menu-item-type-post_type menu-item-object-page menu-item-339" data-item-id="339"><a href="http://kolsfurniture.com/cart/" class="fusion-bar-highlight" role="menuitem"> <span class="menu-text">Корзина</span><span class="iconbag"></span></a></li></ul></nav><nav class="fusion-mobile-nav-holder fusion-mobile-menu-text-align-left"></nav>	
			</div>
		<?php endif; ?>
	</div>
</div>
