<?php

/**
 *| ________________________________________________________
 *|
 *| SimpleClient configuration settings
 *| ________________________________________________________
 */
return [
  /**
   *| ________________________________________________________
   *|
   *| UserAgent string for package
   *| ________________________________________________________
   */
  'user_agent' => "SimpleClient (Api Package v1.0)",

  /**
   *| ________________________________________________________
   *| 
   *| The default configuration settings for:
   *|  - request_method,
   *|  - headers,
   *|  - curl_options, etc.
   *| ________________________________________________________
   */
  'defaults' => [
    'request_method' => "GET",
  
    'headers' => [
      "Accept: application/json",
      "Content-Type: application/json",
    ],

    'curl_options' => [
      'fail_on_error'     => false,
      'ssl_verifyhost'    => false,
      'ssl_verifypeer'    => false,
      'verbose'           => true,
      'follow_redirects'  => true,
      'max_redirects'     => 5,
      'info_header_out'   => true,
      'return_transfer'   => true,
      'ca_info'           => null,
      'connect_timeout'   => 15,
      'timeout'           => 30,
      'dns_cache_timeout' => 45,
    ],
  ],

  /**
   *| ________________________________________________________
   *|
   *| Possible array/object keys for the response from the
   *| remote service provider's API
   *| ________________________________________________________
   */
  'possible_response_body_keys' => [
    "Body", 
    "Product", 
    "Category",
    "Message",
    ["Body", "Categories"],
  ],

];
