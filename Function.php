<?PHP

/*
Plugin Name: Yetinc Short ROUND TVA
Plugn URL : https://yetinc.ch 
Description: Ajoute d'un arrondi de TVA pour Woocommmerce et Wordpress 
Version: 1.1
Author: Yetinc Sàrl
Author URI: https://yetinc.ch 
Update URI: https://yetinc.ch 
Text domain: Yetinc Round TVA by Coding Manufactory
*/

add_filter( 'woocommerce_cart_tax_total', 'round_subtotal', 10, 3);
add_filter( 'woocommerce_get_price_excluding_tax', 'round_price_product', 10, 1 );
add_filter( 'woocommerce_get_price_including_tax', 'round_price_product', 10, 1 );
add_filter( 'woocommerce_tax_round', 'round_price_product', 10, 1);
add_filter( 'woocommerce_product_get_price', 'round_price_product', 10, 1);
add_filter( 'woocommerce_calculated_total', 'round_price_product', 10, 1);
add_filter( 'woocommerce_calculated_subtotal', 'round_price_product', 10, 1);
add_filter( 'woocommerce_cart_subtotal', 'round_subtotal', 10, 3);
 
function round_subtotal( $cart_subtotal, $compound, $instance ) {
$origValue = $cart_subtotal;
preg_match( '/\d+\.\d+/', $origValue, $floatValue);
$roundedValue = number_format( round_price_product( $floatValue[0] ), 2 );
$returnValue = str_replace( $floatValue, $roundedValue, $origValue );
return $returnValue;
}
function round_price_product( $price ){
// Return rounded price
return round( $price * 2, 1 ) / 2;
}
?>