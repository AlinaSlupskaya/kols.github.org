<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
    wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/css/theme.css', array( 'child-style' ) );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function avada_lang_setup() {
    $lang = get_stylesheet_directory() . '/languages';
    load_child_theme_textdomain('Avada', $lang);
}
add_action('after_setup_theme', 'avada_lang_setup');

function woo_remove_product_tabs($tabs) {
    unset($tabs['reviews']); // Remove the reviews tab
    unset($tabs['additional_information']);   // Remove the additional information tab
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function custom_variation_price( $price, $product ) {
    $price = '';

    if (!$product->min_variation_price || $product->min_variation_price !== $product->max_variation_price){
        $price .= '' . _x(' ', 'min_price', 'woocommerce') . ' ';
    }

    $price .= woocommerce_price($product->get_price());
    
    return $price;
}
add_filter('woocommerce_variable_price_html', 'custom_variation_price', 10, 2);


add_filter('woocommerce_show_variation_price', function() {return TRUE;});


// When logging in, send the user to their orders screen (bypassing the dashboard), unless its during checkout.
function WOO_login_redirect( $redirect, $user ) {

    $redirect_page_id = url_to_postid( $redirect );
    $checkout_page_id = wc_get_page_id( 'orders' );

    if ($redirect_page_id == $checkout_page_id) {
        return $redirect;
    }

    return get_permalink(get_option('woocommerce_myaccount_page_id')) . 'orders/';

}

add_action('woocommerce_login_redirect', 'WOO_login_redirect', 10, 2);

// Remove dashboard and wishlist tabs from Account navigation.
function WOO_account_menu_items($items) {
    
    unset($items['dashboard']);
    unset($items['tinv_wishlist']);
    unset($items['edit-address']);
    
    return $items;            
}

add_filter ('woocommerce_account_menu_items', 'WOO_account_menu_items');

add_action( 'woocommerce_before_single_product', 'bbloomer_prev_next_product' );
function bbloomer_prev_next_product(){
 
echo '<div class="prev_next_buttons">';
 
    // 'product_cat' will make sure to return next/prev from current category
        $previous = next_post_link('%link', '&larr; ПРЕДЫДУЩИЙ', TRUE, ' ', 'product_cat');
    $next = previous_post_link('%link', 'СЛЕДУЮЩИЙ &rarr;', TRUE, ' ', 'product_cat');
 
    echo $previous;
    echo $next;
     
echo '</div>';
         
}

//удаление из панели элементов меню - начало
function wph_new_toolbar() {
global $wp_admin_bar;
 
// здесь вставляем пункты меню для удаления
$wp_admin_bar->remove_menu('comments'); //меню "комментарии"
$wp_admin_bar->remove_menu('edit'); //меню "редактировать запись"
$wp_admin_bar->remove_menu('new-content'); //меню "добавить"
$wp_admin_bar->remove_menu('updates'); //меню "обновления"
$wp_admin_bar->remove_menu('wp-logo'); //меню "о wordpress"
//$wp_admin_bar->remove_menu('themes'); //меню "внешний вид"
}
add_action('wp_before_admin_bar_render', 'wph_new_toolbar');
//удаление из панели элементов меню – конец

add_action('admin_menu', 'remove_admin_menu');
function remove_admin_menu() {
	//remove_menu_page('options-general.php'); // Удаляем раздел Настройки	
  	remove_menu_page('tools.php'); // Инструменты
	remove_menu_page('plugins.php'); // Плагины
	//remove_menu_page('themes.php'); // Внешний вид	
	remove_menu_page('edit-comments.php'); // Комментарии	
	remove_menu_page('link-manager.php'); // Ссылки
    remove_menu_page('loco');   // Loco Translate
    remove_menu_page('wdi_feeds');   // Inst
    remove_menu_page('tinvwl');   // wish
	//remove_menu_page('wpcf7');   // Contact form 7
    //remove_menu_page('edit.php?post_type=avada_portfolio');   // avada
    //remove_menu_page('edit.php?post_type=avada_faq');   // avada
    //remove_menu_page('fusion-builder-options');   // avada
    //remove_menu_page('edit.php?post_type=themefusion_elastic');   // avada
    //remove_menu_page('avada');   // avada
    //remove_menu_page('woo-variation-swatches-settings');   // avada



}
