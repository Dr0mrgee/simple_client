<?php

namespace Vault\SimpleClient\Services\StatusCodes;



Class StatusCodesServices
{

  /**
   * ========================================================================================================
   * 
   * Status Codes of kind: 1xx
   * 
   * ========================================================================================================
   *
   */
  // Code: 100 - Continue
  const _100 = [
    'code' => "100", 
    'message' => "Continue", 
    'description' => "The server has received the request headers and the client should proceed to send the request body (in the case of a request for which a body needs to be sent; for example, a POST request). Sending a large request body to a server after a request has been rejected for inappropriate headers would be inefficient. To have a server check the request's headers, a client must send Expect: 100-continue as a header in its initial request and receive a 100 Continue status code in response before sending the body. If the client receives an error code such as 403 (Forbidden) or 405 (Method Not Allowed) then it should not send the request's body. The response 417 Expectation Failed indicates that the request should be repeated without the Expect header as it indicates that the server does not support expectations (this is the case, for example, of HTTP/1.0 servers)."
  ];
  // Code: 101 - Switching Protocols
  const _101 = [
    'code' => "101", 
    'message' => "Switching Protocols", 
    'description' => "The requester has asked the server to switch protocols and the server has agreed to do so."
  ];
  // Code: 101 - Switching Protocols
  const _102 = [
    'code' => "102", 
    'message' => "Processing (WebDAV; RFC 2518)", 
    'description' => "A WebDAV request may contain many sub-requests involving file operations, requiring a long time to complete the request. This code indicates that the server has received and is processing the request, but no response is available yet. This prevents the client from timing out and assuming the request was lost."
  ];
  // Code: 101 - Switching Protocols
  const _103 = [
    'code' => "103", 
    'message' => "Early Hints (RFC 8297)", 
    'description' => "Used to return some response headers before final HTTP message."
  ];

  /**
   * ========================================================================================================
   * 
   * Status Codes of kind: 2xx
   * 
   * ========================================================================================================
   *
   */
  // Code: 200 - OK
  const _200 = [
    'code' => "200", 
    'message' => "OK", 
    'description' => "Standard response for successful HTTP requests. The actual response will depend on the request method used. In a GET request, the response will contain an entity corresponding to the requested resource. In a POST request, the response will contain an entity describing or containing the result of the action."
  ];
  // Code: 201 - Created
  const _201 = [
    'code' => "201", 
    'message' => "Created", 
    'description' => "The request has been fulfilled, resulting in the creation of a new resource."
  ];
  // Code: 202 - Accepted
  const _202 = [
    'code' => "202", 
    'message' => "Accepted", 
    'description' => "The request has been accepted for processing, but the processing has not been completed. The request might or might not be eventually acted upon, and may be disallowed when processing occurs."
  ];
  // Code: 203 - No Content
  const _203 = [
    'code' => "203", 
    'message' => "No Content", 
    'description' => "The server successfully processed the request, and is not returning any content."
  ];
  // Code: 204 - Switching Protocols
  const _204 = [
    'code' => "204", 
    'message' => "No Content", 
    'description' => "The server successfully processed the request, and is not returning any content"
  ];
  // Code: 205 - Switching Protocols
  const _205 = [
    'code' => "205", 
    'message' => "Reset Content", 
    'description' => "The server successfully processed the request, asks that the requester reset its document view, and is not returning any content."
  ];
  // Code: 206 - Switching Protocols
  const _206 = [
    'code' => "206", 
    'message' => "Partial Content (RFC 7233)", 
    'description' => "The server is delivering only part of the resource (byte serving) due to a range header sent by the client. The range header is used by HTTP clients to enable resuming of interrupted downloads, or split a download into multiple simultaneous streams."
  ];
  // Code: 207 - Switching Protocols
  const _207 = [
    'code' => "207", 
    'message' => "207 Multi-Status (WebDAV; RFC 4918)", 
    'description' => "The message body that follows is by default an XML message and can contain a number of separate response codes, depending on how many sub-requests were made."
  ];
  // Code: 208 - Switching Protocols
  const _208 = [
    'code' => "208", 
    'message' => "208 Already Reported (WebDAV; RFC 5842)", 
    'description' => "The members of a DAV binding have already been enumerated in a preceding part of the (multistatus) response, and are not being included again."
  ];
  // Code: 226 - IM Used (RFC 3229)
  const _226 = [
    'code' => "226", 
    'message' => "IM Used (RFC 3229)", 
    'description' => "The server has fulfilled a request for the resource, and the response is a representation of the result of one or more instance-manipulations applied to the current instance."
  ];

  /**
   * ========================================================================================================
   * 
   * Status Codes of kind: 3xx
   * 
   * ========================================================================================================
   *
   */
  // Code: 300 - OK
  const _300 = [
    'code' => "300", 
    'message' => "Multiple Choices", 
    'description' => "Indicates multiple options for the resource from which the client may choose (via agent-driven content negotiation). For example, this code could be used to present multiple video format options, to list files with different filename extensions, or to suggest word-sense disambiguation."
  ];
  // Code: 201 - Created
  const _301 = [
    'code' => "301", 
    'message' => "Moved Permanently", 
    'description' => "This and all future requests should be directed to the given URI."
  ];
  // Code: 202 - Accepted
  const _302 = [
    'code' => "302", 
    'message' => "Found", 
    'description' => "Tells the client to look at (browse to) another URL. 302 has been superseded by 303 and 307. This is an example of industry practice contradicting the standard. The HTTP/1.0 specification (RFC 1945) required the client to perform a temporary redirect (the original describing phrase was 'Moved Temporarily') but popular browsers implemented 302 with the functionality of a 303 See Other. Therefore, HTTP/1.1 added status codes 303 and 307 to distinguish between the two behaviours. However, some Web applications and frameworks use the 302 status code as if it were the 303."
  ];
  // Code: 203 - No Content
  const _303 = [
    'code' => "303", 
    'message' => "See Other", 
    'description' => "The response to the request can be found under another URI using the GET method. When received in response to a POST (or PUT/DELETE), the client should presume that the server has received the data and should issue a new GET request to the given URI."
  ];
  // Code: 204 - Switching Protocols
  const _304 = [
    'code' => "304", 
    'message' => "Not Modified (RFC 7232)", 
    'description' => "Indicates that the resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match. In such case, there is no need to retransmit the resource since the client still has a previously-downloaded copy."
  ];
  // Code: 205 - Switching Protocols
  const _305 = [
    'code' => "305", 
    'message' => "Use Proxy", 
    'description' => "The requested resource is available only through a proxy, the address for which is provided in the response. For security reasons, many HTTP clients (such as Mozilla Firefox and Internet Explorer) do not obey this status code."
  ];
  // Code: 206 - Switching Protocols
  const _306 = [
    'code' => "306", 
    'message' => "Switch Proxy", 
    'description' => "No longer used. Originally meant 'Subsequent requests should use the specified proxy.'"
  ];
  // Code: 207 - Switching Protocols
  const _307 = [
    'code' => "307", 
    'message' => "Temporary Redirect", 
    'description' => "In this case, the request should be repeated with another URI; however, future requests should still use the original URI. In contrast to how 302 was historically implemented, the request method is not allowed to be changed when reissuing the original request. For example, a POST request should be repeated using another POST request.[28]
    "
  ];
  // Code: 208 - Switching Protocols
  const _308 = [
    'code' => "308", 
    'message' => "Permanent Redirect (RFC 7538)", 
    'description' => "The request and all future requests should be repeated using another URI. 307 and 308 parallel the behaviors of 302 and 301, but do not allow the HTTP method to change. So, for example, submitting a form to a permanently redirected resource may continue smoothly."
  ];

  /**
   * ========================================================================================================
   * 
   * Status Codes of kind: 4xx
   * 
   * ========================================================================================================
   *
   */
  // Code: 400 - OK
  const _400 = [
    'code' => "400", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 201 - Created
  const _401 = [
    'code' => "401", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 402 - Accepted
  const _402 = [
    'code' => "402", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 203 - No Content
  const _403 = [
    'code' => "303", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 204 - Switching Protocols
  const _404 = [
    'code' => "304", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 205 - Switching Protocols
  const _405 = [
    'code' => "305", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 206 - Switching Protocols
  const _406 = [
    'code' => "306", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 207 - Switching Protocols
  const _407 = [
    'code' => "307", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 208 - Switching Protocols
  const _408 = [
    'code' => "308", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 400 - OK
  const _409 = [
    'code' => "400", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 201 - Created
  const _410 = [
    'code' => "401", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 402 - Accepted
  const _411 = [
    'code' => "411", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 203 - No Content
  const _412 = [
    'code' => "412", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 204 - Switching Protocols
  const _413 = [
    'code' => "304", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 205 - Switching Protocols
  const _414 = [
    'code' => "305", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 206 - Switching Protocols
  const _415 = [
    'code' => "306", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 207 - Switching Protocols
  const _416 = [
    'code' => "307", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 208 - Switching Protocols
  const _417 = [
    'code' => "308", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 402 - Accepted
  const _418 = [
    'code' => "402", 
    'message' => "I'm a teapot (RFC 2324, RFC 7168)", 
    'description' => "This code was defined in 1998 as one of the traditional IETF April Fools' jokes, in RFC 2324, Hyper Text Coffee Pot Control Protocol, and is not expected to be implemented by actual HTTP servers. The RFC specifies this code should be returned by teapots requested to brew coffee. This HTTP status is used as an Easter egg in some websites, such as Google.com's I'm a teapot easter egg."
  ];
  // Code: 419 - Page Expired
  const _419 = [
    'code' => "419", 
    'message' => "Page Expired", 
    'description' => "Laravel specific - timed out request or non CSRF token part of the request query. Used by the Laravel Framework when a CSRF Token is missing or expired."
  ];
  // Code: 204 - Switching Protocols
  const _421 = [
    'code' => "304", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 205 - Switching Protocols
  const _422 = [
    'code' => "305", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 206 - Switching Protocols
  const _423 = [
    'code' => "306", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 207 - Switching Protocols
  const _424 = [
    'code' => "307", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 208 - Switching Protocols
  const _425 = [
    'code' => "308", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 206 - Switching Protocols
  const _426 = [
    'code' => "306", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 207 - Switching Protocols
  const _428 = [
    'code' => "307", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 208 - Switching Protocols
  const _429 = [
    'code' => "308", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 206 - Switching Protocols
  const _431 = [
    'code' => "306", 
    'message' => "", 
    'description' => ""
  ];
  // Code: 207 - Switching Protocols
  const _451 = [
    'code' => "307", 
    'message' => "", 
    'description' => ""
  ];





}


/**
 * __TEMPLATE__
 * 
 *   // Code: 101 - Switching Protocols
 *   const _101 = [
 *     'code' => "", 
 *     'message' => "", 
 *     'description' => ""
 *   ];
 */
