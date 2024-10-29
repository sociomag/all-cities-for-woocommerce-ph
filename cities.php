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
        // Removed Lagos and Abuja entries
        'NG104' => array(
            'city'     => 'Port Harcourt',
            'division' => 'NEW GRA'
        ),
        'NG104A' => array(
            'city'     => 'Port Harcourt',
            'division' => 'RUMUOLA'
        ),
        'NG104B' => array(
            'city'     => 'Port Harcourt',
            'division' => 'RUMUOKUTA'
        ),
        'NG104C' => array(
            'city'     => 'Port Harcourt',
            'division' => 'RUMUIGBO'
        ),
        'NG104D' => array(
            'city'     => 'Port Harcourt',
            'division' => 'ORAZI'
        ),
        'NG104E' => array(
            'city'     => 'Port Harcourt',
            'division' => 'MILE 4'
        ),
        'NG104F' => array(
            'city'     => 'Port Harcourt',
            'division' => 'WIMPEY'
        ),
        'NG104G' => array(
            'city'     => 'Port Harcourt',
            'division' => 'AGIP'
        ),
        'NG104H' => array(
            'city'     => 'Port Harcourt',
            'division' => 'MILE 3'
        ),
        'NG104I' => array(
            'city'     => 'Port Harcourt',
            'division' => 'ELEKAHIA'
        ),
        'NG104J' => array(
            'city'     => 'Port Harcourt',
            'division' => 'GARRISON'
        ),
        'NG104K' => array(
            'city'     => 'Port Harcourt',
            'division' => 'OGBUNABALI'
        ),
        'NG104L' => array(
            'city'     => 'Port Harcourt',
            'division' => 'RUMUOKALABOR'
        ),
        'NG104M' => array(
            'city'     => 'Port Harcourt',
            'division' => 'NTA ROAD'
        ),
        'NG104N' => array(
            'city'     => 'Port Harcourt',
            'division' => 'HARMONY ESTATE'
        ),
        'NG104O' => array(
            'city'     => 'Port Harcourt',
            'division' => 'AIRFORCE BASE'
        ),
        'NG104P' => array(
            'city'     => 'Port Harcourt',
            'division' => 'BORI CAMP'
        ),
        'NG104Q' => array(
            'city'     => 'Port Harcourt',
            'division' => 'STADIUM ROAD'
        ),
        'NG104R' => array(
            'city'     => 'Port Harcourt',
            'division' => 'OLD GRA'
        ),
        'NG104S' => array(
            'city'     => 'Port Harcourt',
            'division' => 'ABULOMA'
        ),
        'NG104T' => array(
            'city'     => 'Port Harcourt',
            'division' => 'ODILI ROAD'
        ),
        'NG104U' => array(
            'city'     => 'Port Harcourt',
            'division' => 'TRANS AMADI'
        ),
        'NG104V' => array(
            'city'     => 'Port Harcourt',
            'division' => 'SLAUGHTER'
        ),
        'NG104W' => array(
            'city'     => 'Port Harcourt',
            'division' => 'RUMUOBIAKANI'
        ),
        'NG104X' => array(
            'city'     => 'Port Harcourt',
            'division' => 'OKPORO ROAD'
        ),
        'NG104Y' => array(
            'city'     => 'Port Harcourt',
            'division' => 'ELIOZU'
        ),
        'NG104Z' => array(
            'city'     => 'Port Harcourt',
            'division' => 'RUMUOKORO'
        ),
        'NG104AA' => array(
            'city'     => 'Port Harcourt',
            'division' => 'TOWN'
        ),
        'NG104AB' => array(
            'city'     => 'Port Harcourt',
            'division' => 'RUKPOKWU'
        ),
        'NG104AC' => array(
            'city'     => 'Port Harcourt',
            'division' => 'ADA GEORGE'
        ),
        'NG104AD' => array(
            'city'     => 'Port Harcourt',
            'division' => 'IWOFE'
        ),
        'NG104AE' => array(
            'city'     => 'Port Harcourt',
            'division' => 'OZUOBA'
        ),
        'NG104AF' => array(
            'city'     => 'Port Harcourt',
            'division' => 'CHOBA'
        ),
        'NG104AG' => array(
            'city'     => 'Port Harcourt',
            'division' => 'WOJI'
        ),
        'NG104AH' => array(
            'city'     => 'Port Harcourt',
            'division' => 'ELENLEWO'
        ),
        'NG104AI' => array(
            'city'     => 'Port Harcourt',
            'division' => 'GOLF ESTATE'
        ),
        'NG104AJ' => array(
            'city'     => 'Port Harcourt',
            'division' => 'BOROKIRI'
        ),
        // Removed Kano, Enugu, and Outside Lagos entries
    );

    // Map cities and divisions to state codes
    foreach ($cities as $code => $details) {
        $map[$code] = $details['city'] . ', ' . $details['division'];
    }

    $states['NG'] = $map;

    return $states;
}
