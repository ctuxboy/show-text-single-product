// SHOW TEXT FOR 'NOT VERIFIED USERS' OR 'NOT LOGGED IN USERS'
add_action( 'woocommerce_before_single_product', 'show_text_not_verified_user' );


// If post metafield for current post ID is 'yes'
function show_text_not_verified_user() {
    // Load post metafield value in $meta
    $meta = get_post_meta( get_the_ID(), '_wcj_price_by_user_role_empty_price_guest', true );

    $user = wp_get_current_user();
    
    // if guest OR customer AND $meta field value set to 'yes' then show text on single product page
    if ( ( in_array( 'customer', (array) $user->roles ) OR !is_user_logged_in() ) && ( $meta == 'yes' ) ) {
        echo '<div style="margin: 10px; text-align: center">';
        echo '<p style="display: inline-block; color: red; padding: 5px; border: 1px solid red; text-align: center;">* The price is only visible for registered users. Please register <a href="#">here</a>! *</p>';
        print_r($meta);
    echo '</div>';
    }
}
