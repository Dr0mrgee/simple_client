<?php

namespace Vault\SimpleClient\Services\StatusCodes;


Class StatusCodesServices
{

  const HTTP_STATUS_CODES = [
    
    /**
     * ========================================================================================================
     * 
     * Status Codes of kind: 1xx
     * 
     * ========================================================================================================
     *
     */
    // Code: 100 - Continue
    100 => [
      'code' => "100", 
      'message' => "Continue", 
      'description' => "The server has received the request headers and the client should proceed to send the request body (in the case of a request for which a body needs to be sent; for example, a POST request). Sending a large request body to a server after a request has been rejected for inappropriate headers would be inefficient. To have a server check the request's headers, a client must send Expect: 100-continue as a header in its initial request and receive a 100 Continue status code in response before sending the body. If the client receives an error code such as 403 (Forbidden) or 405 (Method Not Allowed) then it should not send the request's body. The response 417 Expectation Failed indicates that the request should be repeated without the Expect header as it indicates that the server does not support expectations (this is the case, for example, of HTTP/1.0 servers)."
    ], 
    // Code: 101 - Switching Protocols
    101 => [
      'code' => "101", 
      'message' => "Switching Protocols", 
      'description' => "The requester has asked the server to switch protocols and the server has agreed to do so."
    ], 
    // Code: 102 - Processing (WebDAV; RFC 2518)
    102 => [
      'code' => "102", 
      'message' => "Processing (WebDAV; RFC 2518)", 
      'description' => "A WebDAV request may contain many sub-requests involving file operations, requiring a long time to complete the request. This code indicates that the server has received and is processing the request, but no response is available yet. This prevents the client from timing out and assuming the request was lost."
    ], 
    // Code: 103 - Early Hints (RFC 8297)
    103 => [
      'code' => "103", 
      'message' => "Early Hints (RFC 8297)", 
      'description' => "Used to return some response headers before final HTTP message."
    ], 

    /**
     * ========================================================================================================
     * 
     * Status Codes of kind: 2xx
     * 
     * ========================================================================================================
     *
     */
    // Code: 200 - OK
    200 => [
      'code' => "200", 
      'message' => "OK", 
      'description' => "Standard response for successful HTTP requests. The actual response will depend on the request method used. In a GET request, the response will contain an entity corresponding to the requested resource. In a POST request, the response will contain an entity describing or containing the result of the action."
    ], 
    // Code: 201 - Created
    201 => [
      'code' => "201", 
      'message' => "Created", 
      'description' => "The request has been fulfilled, resulting in the creation of a new resource."
    ], 
    // Code: 202 - Accepted
    202 => [
      'code' => "202", 
      'message' => "Accepted", 
      'description' => "The request has been accepted for processing, but the processing has not been completed. The request might or might not be eventually acted upon, and may be disallowed when processing occurs."
    ], 
    // Code: 203 - Non-Authoritative Information (since HTTP/1.1)
    203 => [
      'code' => "203", 
      'message' => "Non-Authoritative Information (since HTTP/1.1)", 
      'description' => "The server is a transforming proxy (e.g. a Web accelerator) that received a 200 OK from its origin, but is returning a modified version of the origin's response."
    ], 
    // Code: 204 - No Content
    204 => [
      'code' => "204", 
      'message' => "No Content", 
      'description' => "The server successfully processed the request, and is not returning any content."
    ], 
    // Code: 205 - Reset Content
    205 => [
      'code' => "205", 
      'message' => "Reset Content", 
      'description' => "The server successfully processed the request, asks that the requester reset its document view, and is not returning any content."
    ], 
    // Code: 206 - Partial Content (RFC 7233)
    206 => [
      'code' => "206", 
      'message' => "Partial Content (RFC 7233)", 
      'description' => "The server is delivering only part of the resource (byte serving) due to a range header sent by the client. The range header is used by HTTP clients to enable resuming of interrupted downloads, or split a download into multiple simultaneous streams."
    ], 
    // Code: 207 - Multi-Status (WebDAV; RFC 4918)
    207 => [
      'code' => "207", 
      'message' => "207 Multi-Status (WebDAV; RFC 4918)", 
      'description' => "The message body that follows is by default an XML message and can contain a number of separate response codes, depending on how many sub-requests were made."
    ], 
    // Code: 208 - Already Reported (WebDAV; RFC 5842)
    208 => [
      'code' => "208", 
      'message' => "208 Already Reported (WebDAV; RFC 5842)", 
      'description' => "The members of a DAV binding have already been enumerated in a preceding part of the (multistatus) response, and are not being included again."
    ], 
    // Code: 226 - IM Used (RFC 3229)
    226 => [
      'code' => "226", 
      'message' => "IM Used (RFC 3229)", 
      'description' => "The server has fulfilled a request for the resource, and the response is a representation of the result of one or more instance-manipulations applied to the current instance."
    ], 

    /**
     * ========================================================================================================
     * 
     * Status Codes of kind: 3xx
     * 
     * ========================================================================================================
     *
     */
    // Code: 300 - Multiple Choices
    300 => [
      'code' => "300", 
      'message' => "Multiple Choices", 
      'description' => "Indicates multiple options for the resource from which the client may choose (via agent-driven content negotiation). For example, this code could be used to present multiple video format options, to list files with different filename extensions, or to suggest word-sense disambiguation."
    ], 
    // Code: 301 - Created
    301 => [
      'code' => "301", 
      'message' => "Moved Permanently", 
      'description' => "This and all future requests should be directed to the given URI."
    ], 
    // Code: 302 - Accepted
    302 => [
      'code' => "302", 
      'message' => "Found", 
      'description' => "Tells the client to look at (browse to) another URL. 302 has been superseded by 303 and 307. This is an example of industry practice contradicting the standard. The HTTP/1.0 specification (RFC 1945) required the client to perform a temporary redirect (the original describing phrase was 'Moved Temporarily') but popular browsers implemented 302 with the functionality of a 303 See Other. Therefore, HTTP/1.1 added status codes 303 and 307 to distinguish between the two behaviours. However, some Web applications and frameworks use the 302 status code as if it were the 303."
    ], 
    // Code: 303 - No Content
    303 => [
      'code' => "303", 
      'message' => "See Other", 
      'description' => "The response to the request can be found under another URI using the GET method. When received in response to a POST (or PUT/DELETE), the client should presume that the server has received the data and should issue a new GET request to the given URI."
    ], 
    // Code: 304 - Switching Protocols
    304 => [
      'code' => "304", 
      'message' => "Not Modified (RFC 7232)", 
      'description' => "Indicates that the resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match. In such case, there is no need to retransmit the resource since the client still has a previously-downloaded copy."
    ], 
    // Code: 305 - Switching Protocols
    305 => [
      'code' => "305", 
      'message' => "Use Proxy", 
      'description' => "The requested resource is available only through a proxy, the address for which is provided in the response. For security reasons, many HTTP clients (such as Mozilla Firefox and Internet Explorer) do not obey this status code."
    ], 
    // Code: 306 - Switching Protocols
    306 => [
      'code' => "306", 
      'message' => "Switch Proxy", 
      'description' => "No longer used. Originally meant 'Subsequent requests should use the specified proxy.'"
    ], 
    // Code: 307 - Switching Protocols
    307 => [
      'code' => "307", 
      'message' => "Temporary Redirect", 
      'description' => "In this case, the request should be repeated with another URI; however, future requests should still use the original URI. In contrast to how 302 was historically implemented, the request method is not allowed to be changed when reissuing the original request. For example, a POST request should be repeated using another POST request."
    ], 
    // Code: 308 - Switching Protocols
    308 => [
      'code' => "308", 
      'message' => "Permanent Redirect (RFC 7538)", 
      'description' => "The request and all future requests should be repeated using another URI. 307 and 308 parallel the behaviors of 302 and 301, but do not allow the HTTP method to change. So, for example, submitting a form to a permanently redirected resource may continue smoothly."
    ], 

    /**
     * ========================================================================================================
     * 
     * Status Codes of kind: 4xx
     * 
     * ========================================================================================================
     *
     */
    // Code: 400 - Bad Request
    400 => [
      'code' => "400", 
      'message' => "Bad Request", 
      'description' => "The server cannot or will not process the request due to an apparent client error (e.g., malformed request syntax, size too large, invalid request message framing, or deceptive request routing)."
    ], 
    // Code: 401 - Unauthorized (RFC 7235)
    401 => [
      'code' => "401", 
      'message' => "Unauthorized (RFC 7235)", 
      'description' => "Similar to 403 Forbidden, but specifically for use when authentication is required and has failed or has not yet been provided. The response must include a WWW-Authenticate header field containing a challenge applicable to the requested resource. See Basic access authentication and Digest access authentication. 401 semantically means \"unauthorised\", the user does not have valid authentication credentials for the target resource. Note: Some sites incorrectly issue HTTP 401 when an IP address is banned from the website (usually the website domain) and that specific address is refused permission to access a website."
    ], 
    // Code: 402 - Payment Required
    402 => [
      'code' => "402", 
      'message' => "Payment Required", 
      'description' => "Reserved for future use. The original intention was that this code might be used as part of some form of digital cash or micropayment scheme, as proposed, for example, by GNU Taler, but that has not yet happened, and this code is not widely used. Google Developers API uses this status if a particular developer has exceeded the daily limit on requests. Sipgate uses this code if an account does not have sufficient funds to start a call. Shopify uses this code when the store has not paid their fees and is temporarily disabled. Stripe uses this code for failed payments where parameters were correct, for example blocked fraudulent payments."
    ], 
    // Code: 403 - Forbidden
    403 => [
      'code' => "403", 
      'message' => "Forbidden", 
      'description' => "The request contained valid data and was understood by the server, but the server is refusing action. This may be due to the user not having the necessary permissions for a resource or needing an account of some sort, or attempting a prohibited action (e.g. creating a duplicate record where only one is allowed). This code is also typically used if the request provided authentication by answering the WWW-Authenticate header field challenge, but the server did not accept that authentication. The request should not be repeated."
    ], 
    // Code: 404 - Not Found
    404 => [
      'code' => "404", 
      'message' => "Not Found", 
      'description' => "The requested resource could not be found but may be available in the future. Subsequent requests by the client are permissible."
    ], 
    // Code: 405 - Method Not Allowed
    405 => [
      'code' => "405", 
      'message' => "Method Not Allowed", 
      'description' => "A request method is not supported for the requested resource; for example, a GET request on a form that requires data to be presented via POST, or a PUT request on a read-only resource."
    ], 
    // Code: 406 - Not Acceptable
    406 => [
      'code' => "406", 
      'message' => "Not Acceptable", 
      'description' => "The requested resource is capable of generating only content not acceptable according to the Accept headers sent in the request. See Content negotiation."
    ], 
    // Code: 407 - 
    407 => [
      'code' => "407", 
      'message' => "Proxy Authentication Required (RFC 7235)", 
      'description' => "The client must first authenticate itself with the proxy."
    ], 
    // Code: 408 - Request Timeout
    408 => [
      'code' => "408", 
      'message' => "Request Timeout", 
      'description' => "The server timed out waiting for the request. According to HTTP specifications: \"The client did not produce a request within the time that the server was prepared to wait. The client MAY repeat the request without modifications at any later time.\""
    ], 
    // Code: 409 - Conflict
    409 => [
      'code' => "409", 
      'message' => "Conflict", 
      'description' => "Indicates that the request could not be processed because of conflict in the current state of the resource, such as an edit conflict between multiple simultaneous updates."
    ], 
    // Code: 410 - Gone
    410 => [
      'code' => "401", 
      'message' => "Gone", 
      'description' => "Indicates that the resource requested is no longer available and will not be available again. This should be used when a resource has been intentionally removed and the resource should be purged. Upon receiving a 410 status code, the client should not request the resource in the future. Clients such as search engines should remove the resource from their indices. Most use cases do not require clients and search engines to purge the resource, and a \"404 Not Found\" may be used instead."
    ], 
    // Code: 411 - Length Required
    411 => [
      'code' => "411", 
      'message' => "Length Required", 
      'description' => "The request did not specify the length of its content, which is required by the requested resource."
    ], 
    // Code: 412 - Precondition Failed (RFC 7232)
    412 => [
      'code' => "412", 
      'message' => "Precondition Failed (RFC 7232)", 
      'description' => "The server does not meet one of the preconditions that the requester put on the request header fields."
    ], 
    // Code: 413 - Payload Too Large (RFC 7231)
    413 => [
      'code' => "413", 
      'message' => "Payload Too Large (RFC 7231)", 
      'description' => "The request is larger than the server is willing or able to process. Previously called \"Request Entity Too Large\"."
    ], 
    // Code: 414 - URI Too Long (RFC 7231)
    414 => [
      'code' => "414", 
      'message' => "URI Too Long (RFC 7231)", 
      'description' => "The URI provided was too long for the server to process. Often the result of too much data being encoded as a query-string of a GET request, in which case it should be converted to a POST request.[46] Called \"Request-URI Too Long\" previously."
    ], 
    // Code: 415 - Unsupported Media Type (RFC 7231)
    415 => [
      'code' => "415", 
      'message' => "Unsupported Media Type (RFC 7231)", 
      'description' => "The request entity has a media type which the server or resource does not support. For example, the client uploads an image as image/svg+xml, but the server requires that images use a different format."
    ], 
    // Code: 416 - Range Not Satisfiable (RFC 7233)
    416 => [
      'code' => "416", 
      'message' => "Range Not Satisfiable (RFC 7233)", 
      'description' => "The client has asked for a portion of the file (byte serving), but the server cannot supply that portion. For example, if the client asked for a part of the file that lies beyond the end of the file. Called \"Requested Range Not Satisfiable\" previously."
    ], 
    // Code: 417 - Expectation Failed
    417 => [
      'code' => "417", 
      'message' => "Expectation Failed", 
      'description' => "The server cannot meet the requirements of the Expect request-header field."
    ], 
    // Code: 418 - I'm a teapot (RFC 2324, RFC 7168)
    418 => [
      'code' => "418", 
      'message' => "I'm a teapot (RFC 2324, RFC 7168)", 
      'description' => "This code was defined in 1998 as one of the traditional IETF April Fools' jokes, in RFC 2324, Hyper Text Coffee Pot Control Protocol, and is not expected to be implemented by actual HTTP servers. The RFC specifies this code should be returned by teapots requested to brew coffee. This HTTP status is used as an Easter egg in some websites, such as Google.com's I'm a teapot easter egg."
    ], 
    // Code: 419 - Page Expired
    419 => [
      'code' => "419", 
      'message' => "Page Expired", 
      'description' => "Laravel specific - timed out request or non CSRF token part of the request query. Used by the Laravel Framework when a CSRF Token is missing or expired."
    ], 
    // Code: 421 - Misdirected Request (RFC 7540)
    421 => [
      'code' => "421", 
      'message' => "Misdirected Request (RFC 7540)", 
      'description' => "The request was directed at a server that is not able to produce a response (for example because of connection reuse)."
    ], 
    // Code: 422 - Unprocessable Entity (WebDAV; RFC 4918)
    422 => [
      'code' => "422", 
      'message' => "Unprocessable Entity (WebDAV; RFC 4918)", 
      'description' => "The request was well-formed but was unable to be followed due to semantic errors."
    ], 
    // Code: 423 - Locked (WebDAV; RFC 4918)
    423 => [
      'code' => "423", 
      'message' => "Locked (WebDAV; RFC 4918)", 
      'description' => "The resource that is being accessed is locked."
    ], 
    // Code: 424 - Failed Dependency (WebDAV; RFC 4918)
    424 => [
      'code' => "424", 
      'message' => "Failed Dependency (WebDAV; RFC 4918)", 
      'description' => "The request failed because it depended on another request and that request failed (e.g., a PROPPATCH)."
    ], 
    // Code: 425 - Too Early (RFC 8470)
    425 => [
      'code' => "425", 
      'message' => "Too Early (RFC 8470)", 
      'description' => "Indicates that the server is unwilling to risk processing a request that might be replayed."
    ], 
    // Code: 426 - Upgrade Required
    426 => [
      'code' => "426", 
      'message' => "Upgrade Required", 
      'description' => "The client should switch to a different protocol such as TLS/1.3, given in the Upgrade header field."
    ], 
    // Code: 428 - Precondition Required (RFC 6585) 
    428 => [
      'code' => "428", 
      'message' => "Precondition Required (RFC 6585)", 
      'description' => "The origin server requires the request to be conditional. Intended to prevent the 'lost update' problem, where a client GETs a resource's state, modifies it, and PUTs it back to the server, when meanwhile a third party has modified the state on the server, leading to a conflict."
    ], 
    // Code: 429 - Too Many Requests (RFC 6585)
    429 => [
      'code' => "429", 
      'message' => "Too Many Requests (RFC 6585)", 
      'description' => "The user has sent too many requests in a given amount of time. Intended for use with rate-limiting schemes."
    ], 
    // Code: 431 - Request Header Fields Too Large (RFC 6585)
    431 => [
      'code' => "431", 
      'message' => "Request Header Fields Too Large (RFC 6585)", 
      'description' => "The server is unwilling to process the request because either an individual header field, or all the header fields collectively, are too large."
    ], 
    // Code: 451 - Unavailable For Legal Reasons (RFC 7725)
    451 => [
      'code' => "451", 
      'message' => "Unavailable For Legal Reasons (RFC 7725)", 
      'description' => "A server operator has received a legal demand to deny access to a resource or to a set of resources that includes the requested resource. The code 451 was chosen as a reference to the novel Fahrenheit 451 (see the Acknowledgements in the RFC)."
    ], 
    /**
     * ========================================================================================================
     * 
     * Status Codes of kind: 5xx
     * 
     * ========================================================================================================
     *
     */
    // Code: 500 - Internal Server Error
    500 => [
      'code' => "500", 
      'message' => "Internal Server Error", 
      'description' => "A generic error message, given when an unexpected condition was encountered and no more specific message is suitable."
    ],
    // Code: 501 - Not Implemented
    501 => [
      'code' => "501", 
      'message' => "Not Implemented", 
      'description' => "The server either does not recognize the request method, or it lacks the ability to fulfil the request. Usually this implies future availability (e.g., a new feature of a web-service API)."
    ],
    // Code: 502 - Bad Gateway
    502 => [
      'code' => "502", 
      'message' => "Bad Gateway", 
      'description' => "The server was acting as a gateway or proxy and received an invalid response from the upstream server."
    ],
    // Code: 503 - Service Unavailable 
    503 => [
      'code' => "503", 
      'message' => "Service Unavailable", 
      'description' => "The server cannot handle the request (because it is overloaded or down for maintenance). Generally, this is a temporary state."
    ],
    // Code: 504 - Gateway Timeout 
    504 => [
      'code' => "504", 
      'message' => "Gateway Timeout", 
      'description' => "The server was acting as a gateway or proxy and did not receive a timely response from the upstream server."
    ], 
    // Code: 505 - HTTP Version Not Supported
    505 => [
      'code' => "505", 
      'message' => "HTTP Version Not Supported", 
      'description' => "The server does not support the HTTP protocol version used in the request."
    ], 
    // Code: 506 - Variant Also Negotiates (RFC 2295)
    506 => [
      'code' => "506", 
      'message' => "Variant Also Negotiates (RFC 2295)", 
      'description' => "Transparent content negotiation for the request results in a circular reference."
    ], 
    // Code: 507 - Insufficient Storage (WebDAV; RFC 4918)
    507 => [
      'code' => "507", 
      'message' => "Insufficient Storage (WebDAV; RFC 4918)", 
      'description' => "The server is unable to store the representation needed to complete the request."
    ], 
    // Code: 508 - Loop Detected (WebDAV; RFC 5842)
    508 => [
      'code' => "508", 
      'message' => "Loop Detected (WebDAV; RFC 5842)", 
      'description' => "The server detected an infinite loop while processing the request (sent instead of 208 Already Reported)."
    ], 
    // Code: 510 - Not Extended (RFC 2774)
    510 => [
      'code' => "510", 
      'message' => "Not Extended (RFC 2774)", 
      'description' => "Further extensions to the request are required for the server to fulfil it."
    ], 
    // Code: 511 - Network Authentication Required (RFC 6585)
    511 => [
      'code' => "511", 
      'message' => "Network Authentication Required (RFC 6585)", 
      'description' => "The client needs to authenticate to gain network access. Intended for use by intercepting proxies used to control access to the network (e.g., \"captive portals\" used to require agreement to Terms of Service before granting full Internet access via a Wi-Fi hotspot)."
    ], 
  ]; 


  public function __construct( $code=200 )
  {
    if ( !isset( $code ) || is_null( $code ) ) return;

    return static::getStatus( $code );
  }


  public static function getStatus( $code )
  {
    $class = get_called_class();

    return $class::HTTP_STATUS_CODES[$code];
  }

}
