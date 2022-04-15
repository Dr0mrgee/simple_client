<?php

namespace App\Helpers;

use App/Utilties/UrlHelpers;


class SimpleClient
{
  protected $handler;

  public $config;
  public $baseUrl;
  public $userAgent;
  
  private $url;
  private $method = "GET";
  private $data = [];
  private $headers = [];

  const JSON_ENC_OPTS = "JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE";
  const JSON_DEC_OPTS = false;

  const CURL_MAX_REDIRECTS = 5;
  const CURL_CONNECT  = 15;
  const CURL_TIMEOUT  = 30;
  const CURL_DNSCACHE = 45;


  public function setUrl($url): Self
  {
    $this->url = $url;

    return $this;
  }

  public function extendUrl($url_part): Self
  {
    $_url = $this->url ."/". trim($this->encodedUrl($url_part), "/");

    return $this->setUrl($_url);
  }

  public function getUrl(): String
  {
    if (UrlHelpers::validateUrl($this->url)) {
      return $this->url;
    }
  }

  public function setData($data=[]): Self
  {
    $this->data = $data;

    return $this;
  }

  public function extendData($data=[]): Self
  {
    $_data = array_merge($this->data, $data);

    return $this->setData($_data);
  }

  public function getData(): Array
  {
    return $this->data;
  }

  public function setHeaders($headers=[]): Self
  {
    $this->headers = $headers;

    return $this;
  }

  public function extendHeaders($headers=[]): Self
  {
    $_headers = array_merge($this->headers, $headers);

    return $this->setHeaders($_headers);
  }

  public function getHeaders(): Array
  {
    return $this->headers;
  }

  public function setMethod($method="GET"): Self
  {
    $this->method = $method;

    return $this;
  }

  public function getMethod(): String
  {
    return $this->method;
  }

  public function setUserAgent($userAgent): Self
  {
    $this->userAgent = $userAgent;

    return $this;
  }

  public function getUserAgent(): String
  {
    return $this->userAgent;
  }


  public function __construct(
    ?String $config="",
    ?String $url="", 
    ?String $method="GET", 
    ?Array  $headers=[], 
    ?Array  $data=[]
  ): void
  {
    $this->setHeaders([
      "Content-Type: application/json",
      "Accept: application/json",
    ]);

    if ($config && (! empty($config) || $config != "")) {
      $this->config = config()->get($config);

      try {
        $this->baseUri = $this->config["api_base_url"];

      } catch(\Exception $error) {
        info($error);
      }
    }

    if ($url && (! empty($url) || $url != "")) {
      $this->url = $this->setUrl($url)->getUrl();
    }

    if ($method && (! empty($method) || $method != "")) {
      $this->method = $this->setMethod($method)->getMethod();
    }

    if ($headers && (! empty($headers) || count($headers) > 0)) {
      $this->headers = $this->extendHeaders($headers)->getHeaders();
    }

    if ($data && (! empty($data) || count($data) > 0)) {
      $this->data = $this->extendData($data)->getData();
    }

    $this->handler = $this->initCurl();
  }

  public function initCurl()
  {
    if ($this->checkForFunction('curl_init')) {
      return curl_init();
    }
  }

  protected function checkForFunction(String $fn)
  {
    if (! function_exists({$fn}) {
      throw new \Exception("{$fn} function not found", 1030);
    }

    return !0;
  }

  private function checkCurlResourceHandler(Resource $handler=null)
  {
    return is_null($handler) || ! $handler;
  }
  
  private function checkClassCurlResourceHandler()
  {
    return property_exists($this, 'handler') || ! is_null($this->handler);
  }

  public function executeCurlCall(Resource $handler=null)
  {
    if (! $this->checkCurlResourceHandler($handler)) {
      $handler = $this->checkClassCurlResourceHandler() ? $this->handler : null;
    }

    if ($this->checkForFunction('curl_exec')) {
      return curl_exec($handler);
    }
  }

  private function headerInformationCurl(Resource $handler=null)
  {
    if (! $this->checkCurlResourceHandler($handler)) {
      $handler = $this->checkClassCurlResourceHandler() ? $this->handler : null;
    }

    if ($this->checkForFunction('curl_getinfo')) {
      return curl_getinfo($handler);
    }
  }
  
  private function httpCodeCurl($handler=null)
  {
    if (! $this->checkCurlResourceHandler($handler)) {
      $handler = $this->checkClassCurlResourceHandler() ? $this->handler : null;
    }

    if ($this->checkForFunction('curl_getinfo')) {
      return curl_getinfo($handler, CURLINFO_HTTP_CODE);
    }
  }
  
  protected function clientSetup($url, $data=[], $headers=[])
  {
    curl_setopt($this->handler, CURLOPT_URL, $this->setUrl($url)->getUrl());
    
    array_map([get_class(), 'extendHeaders'], $headers);
    curl_setopt($this->handler, CURLOPT_HTTPHEADER, $this->getHeaders());

    $this->setupDefaultOptions();

    $_data = ! empty($data) && is_array($data)
      ? $this->extendData($data)->getData()
      : [];

    if ((! is_null($_data) || ! empty($_data)) && $_data) {
      $this->data = \json_encode(
        $this->setData($_data)->getData(),
        self::JSON_ENC_OPTS
      );
    }

    return $this;
  }
  
  public function fetch($url, $data=[], $headers=[], $method="GET")
  {
    $this->clientSetup($url, $data, $headers);

    $body = ! in_array($method, ['POST', 'PUT', 'PATCH', 'UPDATE']) 
        ? null
        : ['data' => $this->data, 'dataLen' => strlen($this->data)];

    $this->setupMethod($method, $body);

    $return = $this->call();

    curl_close($this->handler);

    return (is_object($return) || is_array($return)) && json_encode($return)
      ? json_encode($return, self::JSON_ENC_OPTS)
      : $return;
  }

  private function setupDefaultOptions()
  {
    // VERBOSE cURL output
    curl_setopt($this->handler, CURLOPT_VERBOSE, true);
    // Do not Fail cURL request if response code 4xx
    curl_setopt($this->handler, CURLOPT_FAILONERROR, false);

    // RESPONSE headers and data to be returned
    curl_setopt($this->handler, CURLINFO_HEADER_OUT, true);
    curl_setopt($this->handler, CURLOPT_RETURNTRANSFER, true);

    // Follow redirects with maximum of 5
    curl_setopt($this->handler, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($this->handler, CURLOPT_MAXREDIRS, self::MAX_REDIRECTS);

    // TIMEOUT parameters (seconds)
    curl_setopt($this->handler, CURLOPT_CONNECTTIMEOUT, self::CURL_CONNECT);
    curl_setopt($this->handler, CURLOPT_TIMEOUT, self::CURL_TIMEOUT);
    curl_setopt($this->handler, CURLOPT_DNS_CACHE_TIMEOUT, self::CURL_DNS_CACHE);

    // SSL certificates checks & set location of CA-bundle if present
    curl_setopt($this->handler, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($this->handler, CURLOPT_SSL_VERIFYPEER, false);

    if (property_exists($this, 'ssl_cert') && 
      (isset($this->ssl_cert) || null != $this->ssl_cert)) {
      curl_setopt($this->handler, CURLOPT_CAINFO, $this->ssl_cert);
    }
  }

  private function setupMethod()
  {
    if (func_num_args() < 2) {
      // throw new \Exception("At least 2 arguments expected", 4020);
      exit("At least 2 arguments expected");
    }

    $arguments = func_get_args();
    $method = $arguments[0] ?: "GET";
    $options = $arguments[1];

    switch(strtolower($method))
    {
      case('patch'):
      case('put'):
      case('update'):
          curl_setopt($this->handler, CURLOPT_CUSTOMREQUEST, $method);
          curl_setopt($this->handler, CURLOPT_POSTFIELDS, $options['data']);
          curl_setopt($this->handler, CURLOPT_CONTENTLENGTH, $options['dataLen']);
        break;

      case('delete'):
      case('header'):
      case('options'):
          curl_setopt($this->handler, CURLOPT_CUSTOMREQUEST, $method);
          // throw new \Exception("Not yet implemented", 4030);
          exit("Not yet implemented");
        break;

      case('post'):
          curl_setopt($this->handler, CURLOPT_POST, !0);
          curl_setopt($this->handler, CURLOPT_POSTFIELDS, $options['data']);
          curl_setopt($this->handler, CURLOPT_CONTENTLENGTH, $options['dataLen']);
        break;

      default: 
          // Default Method -> GET
        break;
    }
  }

  private function call()
  {
    $api_response = [
      'status_code' => null,
      'information' => "API Client Exception: No data received from API reauest",
      'response'    => json_encode([]),
    ];
    
    if ($this->handler && is_resource($this->handler)) {
      $api_response = [
        'status_code' => $this->httpCodeCurl($this->handler, CURLINFO_HTTP_CODE),
        'information' => $this->headerInformationCurl($this->handler),
        'response'    => $this->executeCurlCall($this->handler),
      ];
    }
    
    return json_encode($api_response, self::JSON_ENC_OPTS);
  }
  
  protected function isJsonString($str)
  {
    try {
      json_decode($str, JSON_DEC_OPTS);

    } catch(\Exception $error) {
      return !1;
    }

    return !0;
  }

  protected function makeJsonString($obj)
  {
    $json = '';

    try {
      $json = json_encode($obj, JSON_ENC_OPTS);

    } catch(\Exception $error) {
      return !1;
    }

    return $json;
  }

}
