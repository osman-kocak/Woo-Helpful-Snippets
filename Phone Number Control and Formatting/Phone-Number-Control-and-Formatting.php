add_action('woocommerce_checkout_process', 'check_phone_number');
function check_phone_number(){
    $phone = $_POST['formatted_phone'];
    if (!empty($phone)) {
        $phone_number = preg_replace('/\D/', '', $phone); // Get only digits

        // If starts with +90, skip
        if (substr($phone_number, 0, 3) === '+90') {
            return; // If starts with +90, bypass without any action
        }

        // If no leading 0
        if (substr($phone_number, 0, 1) !== '0') {
            $_POST['formatted_phone'] = '+90' . $phone_number;
        } elseif (substr($phone_number, 1, 2) === '90') {
            // If starts with 0 and not with +90, add +
            $_POST['formatted_phone'] = '+' . $phone_number;
        } else {
            // If starts with 0 and not with 90, add +9
            $_POST['formatted_phone'] = '+9' . $phone_number;
        }
    }
}
