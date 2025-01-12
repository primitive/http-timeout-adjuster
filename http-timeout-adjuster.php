<?php

/**
 * Plugin Name: HTTP Timeout Adjuster
 * Plugin URI: https://primitive.industries/wordpress-plugins
 * Description: Adjusts the timeout for HTTP requests and cURL settings in WordPress.
 * Version: 1.0.0
 * Author: Primitive Industries
 * Author URI: https://primitive.industries
 * Text Domain: http-timeout-adjuster
 * License: GPL2
 */

// "Get outta my pub!" (disallow direct file access)
if ( !defined('ABSPATH') ) { exit; }

// Filter to adjust the timeout for HTTP requests
add_filter('http_request_args', 'bal_http_request_args', 100, 1);
function bal_http_request_args($r) {
    $r['timeout'] = 120;
    return $r;
}

// Action to adjust the timeout for cURL requests
add_action('http_api_curl', 'bal_http_api_curl', 100, 1);
function bal_http_api_curl($handle) {
    curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 120 );
    curl_setopt( $handle, CURLOPT_TIMEOUT, 120 );
}
