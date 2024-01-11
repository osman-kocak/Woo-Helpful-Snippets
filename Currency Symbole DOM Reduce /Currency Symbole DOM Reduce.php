add_filter('woocommerce_price_format', 'remove_currency_symbol');

function remove_currency_symbol($format) {
    $format = '%2$s'; // Format that places the currency symbol only at the end of the price
    return $format;
}

add_filter('woocommerce_get_price_html', 'add_custom_text_after_bdi', 10, 2);

function add_custom_text_after_bdi($price_html, $product) {
    $new_text = 'TL'; // New custom text (I left a space before the custom text)
    
    // Add the custom text to the end of the <bdi> tag inside the price
    $new_price_html = str_replace('</bdi>', $new_text . '</bdi>', $price_html);
    
    return $new_price_html;
}
