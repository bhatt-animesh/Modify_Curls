<?php
require_once('../Mcurl.php');

$Mcurl = new Mcurl;
/**
 * Custom request with GET METHOD
 * @param url      : Require true
 * @param method   : Require true
 * @param data     : Require false
 * @param headers  : Require false
 * @param cookie   : Require false
 * @param server   : Require false
 * 
 */

// Custom request structure with HTTPAUTH
$Mcurl::Custom('https://luminati.io/api/count_available_ips?customer=CUSTOMER&zone=ZONE', 'GET', NULL, ['Authorization: Bearer API_TOKEN']);
/**
 * Set the CURLOPT_HTTPAUTH MODE
 * MODES:
 *  CURLAUTH_BASIC
 *  CURLAUTH_BEARER
 * MORE IN https://curl.haxx.se/libcurl/c/CURLOPT_HTTPAUTH.html
 */
$Mcurl::SetOpt([CURLOPT_HTTPAUTH => CURLAUTH_BEARER]);
// send the Custom request and catch in $resp
$resp = $Mcurl::Run();
// Print the object data or if you are working is develop mode, you can use Debug()
// To print the body response: $resp->body;
print_r($resp);

/**
 * Debug() : support pretty print to html and json
 * @param true = json print
 * @param false = html print
 * 
 * $Mcurl::Debug(true);
 */
