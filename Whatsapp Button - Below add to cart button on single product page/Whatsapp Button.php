function ecommercehints_content_after_add_to_cart_form() {
    // Get the product ID
    $product_id = get_the_ID();
    $product_title = get_the_title($product_id);
    // Get the product URL
    $product_url = get_permalink($product_id);
    ?>

    <style>
        .order_on_whatsapp {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 45px;
            border-radius: 10px;
            background-color: #02CD3D;
            color: white;
            padding: 10px;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid #02CD3D;
            font-size: 17px;
        }
        .order_on_whatsapp img {
            margin-right: 10px;
            width: 14px;
        }
    
    </style>

    <?php
    // Output the styled WhatsApp link filled with the product title and URL
    echo '<a href="https://api.whatsapp.com/send?phone=+905XXXXXXXXX&text=Hello,%20can%20I%20get%20information%20about%20this%20product%20?%20' . $product_title . ' (' . $product_url . ')" class="order_on_whatsapp">
    <img src="https://woo.cdesksolutions.com/wp-content/uploads/2022/11/whatsapp.webp" width="14px" height="14px">
    Ask on WhatsApp
    </a>';
}

add_action( 'woocommerce_after_add_to_cart_button', 'ecommercehints_content_after_add_to_cart_form', 30);
