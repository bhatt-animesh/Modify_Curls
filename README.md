# Modify_Curls
Mcurl 0.0.1
================

Mcurl is a HTTP basic library written in PHP, for human beings and has no dependencies, working with PHP 7.4+.


Mcurl allows you to send **GET**, **POST**, **PUT**, **DELETE** AND MORE HTTP METHODS. You can add headers, form data, json data,
and parameters with simple arrays, and access the response data in the same way. You can add a HTTP TUNNEL with PROXY, server ROTATIONS like [LUMINATI][], [APIFY][], [IPVANISH][].

[LUMINATI]: https://luminati.io/
[APIFY]: https://apify.com/
[IPVANISH]: https://www.ipvanish.com/

GET, POST AND CUSTOM Syntax
--------

```php
# GET
$Mcurl::Get('https://api.myip.com/');

# POST
$Mcurl::Post('https://api.myip.com/', 'my_form_id=test&hello=mom');

# CUSTOM
$Mcurl::Custom('https://api.myip.com/', 'HEAD');
$Mcurl::Run();
```

HTTP TUNNEL SYNTAX
--------

```php
# PRROXY (http/s, socks4, socks5)
$server = [
    'METHOD' => 'TUNNEL',
    'SERVER' => '47.254.145.99:3128'
];

# LIMINATI valid syntax
$server = [
    'METHOD' => 'LUMINATI',
    'USERNAME' => 'lum-customer-hl_876f552a-zone-static',#lum-customer-CUSTOMER-zone-static
    'PASSWORD' => 'my_ultra_secret_password',
    'COUNTRY' => 'RU',
    'SESSION' => mt_rand()
];

# APIFY valid syntax
$server = [
    'METHOD' => 'APIFY',
    'PASSWORD' => 'my_ultra_secret_password'
];

# IPVANISH valid syntax
$server = [
    'METHOD' => 'IPVANISH',
    'SERVER' => 'akl-c12.ipvanish.com',
    'AUTH'   => 'my_zone_customer_id:my_zone_customer_password'
];
```

GET SYNTAX
--------

```php
#Simple GET
$test0 = $Mcurl::Get("http://httpbin.org/get");

#GET with Custom Headers
$headers = array(
    'Host: api.myip.com',
    'my-custom-header: my-header-value'
);
$test1 = $Mcurl::Get("http://httpbin.org/get", $headers);

#GET with Headers and Cookie
$cookie = uniqid();
$test2 = $Mcurl::Get("http://httpbin.org/get", $headers, $cookie);

#GET with Headers, Cookie and Proxy Tunnel
$server = [
    'METHOD' => "TUNNEL",
    'SERVER' => "47.254.145.99:3128"
];
$test3 = $Mcurl::Get("http://httpbin.org/get", $headers, $cookie, $server);
#After all request was complete, you can delete the cookie file, Only when you use the $cookie parameter.
$Mcurl::deleteCookie();

# Response status of the request
var_dump($test3->success);
// bool(true)

# Status code of the request
var_dump($test3->code);
// int(200)

# Content type of the request
var_dump($test3->headers['response_headers']['content-type']);
// string(24) "text/html; charset=UTF-8"

# Body response of the request
var_dump($test3->body);
// string(51) "{...}"
```

POST SYNTAX
--------

```php
#Simple POST with NULL data
$test0 = $Mcurl::Post("http://httpbin.org/post");

#POST with Data-form and Custom Headers
$headers = array(
    'Host: httpbin.org',
    'my-custom-header: my-header-value'
);
$test1 = $Mcurl::Post("http://httpbin.org/post", "test_ID=666&hello=mom", $headers);

#POST with Json-Data and Custom Headers
$data = array(
    'hello' => "mom",
    'key' => "value"
);
$test2 = $Mcurl::Post("http://httpbin.org/post", $data, $headers);

#POST with Custom-Data, Custom Headers and Cookie
$cookie = uniqid();
$test3 = $Mcurl::Post("http://httpbin.org/post", $data, $headers, $cookie);

#POST with Json-Data, Custom Headers, Cookie and Proxy Tunnel
$server = [
    'METHOD' => "TUNNEL",
    'SERVER' => "47.254.145.99:3128"
];
$test4 = $Mcurl::Post("http://httpbin.org/post", $data, $headers, $cookie, $server);
#After all request was complete, you can delete the cookie file, Only when you use the $cookie parameter.
$Mcurl::deleteCookie();

# Response status of the request
var_dump($test3->success);
// bool(true)

# Status code of the request
var_dump($test4->code);
// int(200)

# Content type of the request
var_dump($test4->headers['response_headers']['content-type']);
// string(24) "..."

# Body response of the request
var_dump($test4->body);
// string(51) "{...}"
```

Other functions
--------

```php
    // Set a custom option to current CURL structure
    $Mcurl::SetOpt([CURLOPT_HTTPAUTH => CURLAUTH_BEARER]);

    // Get a rand line from text file
    $Mcurl::GetRandVal('proxies.txt');
    // Output: 202.137.25.8:8080

    // Parse a string by two specify strings
    $str = "Mcurl is the best for web scraping";
    $Mcurl::ParseString($str, "Mcurl", "scraping")
    // Output: is the best for web

    // Clean all spaces from a string
    $Mcurl::CleanString($str);
    // Output: Mcurlisthebestforwebscraping

    /**
     * Show all data process|errors of the request
     * 
     * Debug() : now support pretty print to html and json
     * @param true = json response
     * @param false = html response
     * 
     * Recommended for develop work space
     * 
    */
    $Mcurl::Debug(false);
```
