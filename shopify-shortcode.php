<?php
/**
 * Plugin Name: Shopify Shortcode
 * Plugin URI: https://divi.tech
 * Description: Allows the usage of shopify emebed code into Divi Builder
 * Version: 1.0.1
 * Author: Eduard Ungureanu
 * Author URI: https://divi.tech
 * Requires at least: 4.9.6
 * Tested up to: 4.9.6
 */

/*
 * List WooCommerce Products by tags
 *
 * ex: [shopify domain="" apykey="" id="caf86812763" product_id=caf86812763]
 */

function display_shopify($atts, $content = null){
	$div_id = shortcode_atts(array(
		'domain' => '',
		'apikey' => '',
		'id' => '',
		'product_id' => ''
	), $atts);

	$domain = $div_id['domain'];
	$apikey = $div_id['apikey'];
	$full_div_id = 'product-component-'.$div_id['id'];
	$product_id = $div_id['product_id'];

	$output = '';
	
	$output .= '<div id="'.$full_div_id.'"></div>';
	$output .= '<script type="text/javascript">/*<![CDATA[*/(function () {var scriptURL = "https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js";if (window.ShopifyBuy){if (window.ShopifyBuy.UI) { ShopifyBuyInit();} else {loadScript();}} else {loadScript();} function loadScript() { var script = document.createElement("script"); script.async = true; script.src = scriptURL; (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(script); script.onload = ShopifyBuyInit; }  function ShopifyBuyInit() { var client = ShopifyBuy.buildClient({ domain: "'.$domain.'", apiKey: "'.$apikey.'", appId: "6",  });  ShopifyBuy.UI.onReady(client).then(function (ui) {  ui.createComponent("product", { id: ['.$product_id.'], node: document.getElementById("'.$full_div_id.'"),  moneyFormat: "%24%7B%7Bamount%7D%7D", options: { "product": { "variantId": "all", "width": "240px", "contents": { "img": false, "imgWithCarousel": false, "title": false,  "variantTitle": false, "price": false, "description": false, "buttonWithQuantity": false, "quantity": false }, "styles": {"product": {"@media (min-width: 601px)": {"max-width": "100%", "margin-left": "0", "margin-bottom": "50px" } }, "button": { "background-color": "#000000", "font-family": "Lato, sans-serif", "font-size": "13px", "padding-top": 14.5px", "padding-bottom": "14.5px", "padding-left": "8px", "padding-right": "8px", ":hover": { "background-color": "#000000" }, "border-radius": "px", ":focus": { "background-color": "#000000" }, "font-weight": "bold" }, "variantTitle": { "font-weight": "bold" }, "title": { "font-weight": "normal", "font-size": "26px" }, "description": { "font-weight": "bold" }, "price": { "font-size": "18px", "font-weight": "bold" }, "quantityInput": { "font-size": "13px", "padding-top": "14.5px", "padding-bottom": "14.5px" }, "compareAt": { "font-size": "15px", "font-family": "Helvetica Neue, sans-serif", "font-weight": "bold" } }, "googleFonts": [ "Lato" ] }, "cart": { "contents": { "button": true }, "styles": { "button": { "background-color": "#000000", "font-family": "Lato, sans-serif", "font-size": "13px", "padding-top": "14.5px", "padding-bottom": "14.5px", ":hover": { "background-color": "#000000" }, "border-radius": "px", ":focus": { "background-color": "#000000" }, "font-weight": "bold" }, "footer": { "background-color": "#ffffff" } }, "googleFonts": [ "Lato" ] }, "modalProduct": { "contents": { "img": false, "imgWithCarousel": true, "variantTitle": false, "buttonWithQuantity": true, "button": false, "quantity": false }, "styles": { "product": { "@media (min-width: 601px)": { "max-width": "100%", "margin-left": "0px", "margin-bottom": "0px" } }, "button": { "background-color": "#000000", "font-family": "Lato, sans-serif", "font-size": "13px", "padding-top": "14.5px", "padding-bottom": "14.5px", "padding-left": "8px", "padding-right": "8px", ":hover": { "background-color": "#000000" }, "border-radius": "px", ":focus": { "background-color": "#000000" }, "font-weight": "bold" }, "variantTitle": { "font-weight": "bold" }, "title": { "font-weight": "normal" }, "description": { "font-weight": "bold" }, "price": { "font-weight": "bold" }, "quantityInput": { "font-size": "13px", "padding-top": "14.5px", "padding-bottom": "14.5px" }, "compareAt": { "font-family": "Helvetica Neue, sans-serif", "font-weight": "bold" } }, "googleFonts": [ "Lato" ] }, "toggle": { "styles": { "toggle": { "font-family": "Lato, sans-serif", "background-color": "#000000", ":hover": { "background-color": "#000000" }, ":focus": { "background-color": "#000000" }, "font-weight": "bold" }, "count": { "color": "#ffffff", ":hover": { "color": "#ffffff" }, "font-size": "13px" }, "iconPath": { "fill": "#ffffff" } }, "googleFonts": [ "Lato" ] }, "option": { "styles": { "label": { "font-weight": "bold" }, "select": { "font-weight": "bold" } } }, "productSet": { "styles": { "products": { "@media (min-width: 601px)": { "margin-left": "-20px" } } } }} }); }); }})();/*]]>*/</script>';
	return $output;
}

add_shortcode( 'shopify', 'display_shopify' );
