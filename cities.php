<?php
/**
 * Plugin Name: Cities Levels for WooCommerce
 * Plugin URI: https://www.instagram.com/adeshokan_bolaji/
 * Author: Adeshokan Bolaji Adedotun
 * Author URI: https://www.instagram.com/adeshokan_bolaji/
 * Description: This plugin adds cities for shipping zones in WooCommerce with custom shipping rates.
 * Version: 0.2.1
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: clw
 */

// Add Basic Plugin Security
defined('ABSPATH') or die;

// Add custom cities and divisions
add_filter('woocommerce_states', 'kingz_clw_add_custom_cities');

function kingz_clw_add_custom_cities($states) {
    $map = array();

    // Define cities and divisions
    $cities = array(
        'NG101' => array(
            'city'     => 'Lagos',
            'division' => 'Lagos Mainland'
        ),
        'NG102' => array(
            'city'     => 'Lagos',
            'division' => 'Lagos Island'
        ),
        'NG103' => array(
            'city'     => 'Abuja',
            'division' => 'Central Area'
        ),
        'NG104' => array(
            'city'     => 'Port Harcourt',
            'division' => 'Port Harcourt Areas: NEW GRA, RUMUOLA, RUMUOKUTA, RUMUIGBO, ORAZI, MILE 4, WIMPEY, AGIP, MILE 3, ELEKAHIA, GARRISON, OGBUNABALI, RUMUOKALABOR, NTA ROAD, HARMONY ESTATE, AIRFORCE BASE, BORI CAMP, STADIUM ROAD, OLD GRA, ABULOMA, ODILI ROAD, TRANS AMADI, SLAUGHTER, RUMUOBIAKANI, OKPORO ROAD, ELIOZU, RUMUOKORO, TOWN, RUKPOKWU, ADA GEORGE, IWOFE, OZUOBA, CHOBA, WOJI, ELENLEWO, GOLF ESTATE, BOROKIRI'
        ),
        'NG105' => array(
            'city'     => 'Kano',
            'division' => 'Kano City'
        ),
        'NG106' => array(
            'city'     => 'Enugu',
            'division' => 'Enugu North'
        ),
        'NG107' => array(
            'city'     => 'Outside Lagos',
            'division' => 'Other States'
        ),
    );

    // Map cities and divisions to state codes
    foreach ($cities as $code => $details) {
        $map[$code] = $details['city'] . ', ' . $details['division'];
    }

    $states['NG'] = $map;

    return $states;
}

// Add custom shipping rates based on city divisions
add_action('woocommerce_cart_calculate_fees', 'kingz_clw_custom_shipping_fee');

function kingz_clw_custom_shipping_fee() {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    $chosen_state = WC()->customer->get_shipping_state();
    $custom_fee = 0;

    // Define custom fees for each city code
    $shipping_fees = array(
        'NG101' => 500, // Lagos Mainland
        'NG102' => 700, // Lagos Island
        'NG103' => 1000, // Abuja
        'NG104' => 800, // Port Harcourt
        'NG105' => 600, // Kano
        'NG106' => 750, // Enugu
        'NG107' => 1200, // Other States
    );

    // Check if the chosen state has a custom fee
    if (array_key_exists($chosen_state, $shipping_fees)) {
        $custom_fee = $shipping_fees[$chosen_state];
    }

    // Add the custom fee to the cart
    if ($custom_fee > 0) {
        WC()->cart->add_fee(__('Custom Shipping Fee', 'clw'), $custom_fee);
    }
}
