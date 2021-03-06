<?php

require_once('../Mcurl.php');

$Mcurl = new CurlX;
/**
 * Custom request with PUT METHOD
 * @param url      : Require true
 * @param method   : Require true
 * @param data     : Require false
 * @param headers  : Require false
 * @param cookie   : Require false
 * @param server   : Require false
 * 
 */

// generate a new unique id for file name
$cookie = uniqid();
// basic proxy server configuration
$server = [
    'METHOD' => 'TUNNEL',
    'SERVER' => $Mcurl::GetRandVal('../proxies.txt')
];

// Custom request structure
$Mcurl::Custom('http://host/users/666', 'PUT', 'params[name]=James', ['custom-header: my-custom-value', 'foo: bar'], $cookie, $server);

// send the Custom request and catch in $resp
$resp = $Mcurl::Run();

/**
 * After all process you can delete the cookie file with DeleteCookie(); ONLY IF YOU USE THE COOKIE PARAM
 */
$Mcurl::DeleteCookie();

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
