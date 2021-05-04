<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['secret_key'] = 'skyq29';
$config['token_expiry'] = 14400;
$config['URIseperator'] = "|";
$config['URIoperators'] = array(
	">:"=>">=", //Greater Than Equal to
	"<:"=>"<=", //Smaller Than Equal to
	"<>"=>"<>", //Not Equal to
	"!$"=>"NOT LIKE", // Not Like
	":"=>"=", // Equal to
	">"=>">", //Greater Than
	"<"=>"<", //Smaller Than
	"$"=>"LIKE", // Like
	"~"=>"IS" // Is

	//"$"=>"IN", // IN
	//"$"=>"BETWEEN", // BETWEEN
	//"$"=>"IS NULL" // NULL

	//-._~:/?#[]@!$&'()*+,;=`.
);
$config['URItranslation_methods'] = array("$","!$","~");
$config['URItranslations'] = array(
	"."=>"%", //wildcard
	"!"=>"NOT ", //not
	"["=>"(", //Bracket Open
	"]"=>")" //Bracket Close
);

$config['uploadConfig'] = "";

$config['appConfig']['ladder7'] = array(
	'AppName' => 'Ladder7',
	'version' => '1.0',
	'URIoperators' => array_flip($config['URIoperators']),
	'URItranslations' => array_flip($config['URItranslations'])
);


/**
	Informational Response Codes
	100 - 199
**/
$config['RC']['SWITCHING_PROTOCOLS'] = 101;
$config['RM']['SWITCHING_PROTOCOLS'] = "Switching Protocols";


/**
	Success Response Codes
	200 - 299
**/
$config['RC']['OK'] = 200;
$config['RM']['OK'] = "OK";

$config['RC']['ACCEPTED'] = 202;
$config['RM']['ACCEPTED'] = "Accepted";


/**
	Redirection Response Codes
	300 - 399
**/
$config['RC']['MOVED_PERMANENTLY'] = 301;
$config['RM']['MOVED_PERMANENTLY'] = "Moved Permanently";


/**
	Client errors Response Codes
	400 - 499
**/
$config['RC']['BAD_REQUEST'] = 400;
$config['RM']['BAD_REQUEST'] = "Bad Request";

$config['RC']['UNAUTHORIZED'] = 401;
$config['RM']['UNAUTHORIZED'] = "Unauthorized";

$config['RC']['FORBIDDEN'] = 403;
$config['RM']['FORBIDDEN'] = "Forbidden";

$config['RC']['NOT_FOUND'] = 404;
$config['RM']['NOT_FOUND'] = "Not Found";

$config['RC']['METHOD_NOT_ALLOWED'] = 405;
$config['RM']['METHOD_NOT_ALLOWED'] = "Method Not Allowed";

$config['RC']['NOT_ACCEPTABLE'] = 406;
$config['RM']['NOT_ACCEPTABLE'] = "Not Acceptable";

$config['RC']['REQUEST_TIMEOUT'] = 408;
$config['RM']['REQUEST_TIMEOUT'] = "Request Timeout";

$config['RC']['PAYLOAD_TOO_LONG'] = 413;
$config['RM']['PAYLOAD_TOO_LONG'] = "Payload Too Large";

$config['RC']['URI_TOO_LONG'] = 414;
$config['RM']['URI_TOO_LONG'] = "URI Too Long";

$config['RC']['UNSUPPORTED_MEDIA_TYPE'] = 415;
$config['RM']['UNSUPPORTED_MEDIA_TYPE'] = "Unsupported Media Type";

$config['RC']['TOO_MANY_REQUESTS'] = 429;
$config['RM']['TOO_MANY_REQUESTS'] = "Too Many Requests";

$config['RC']['INVALID_TOKEN'] = 498;
$config['RM']['INVALID_TOKEN'] = "Invalid Token";

$config['RC']['TOKEN_REQUIRED'] = 499;
$config['RM']['TOKEN_REQUIRED'] = "Token Required";


/**
	Server errors Response Codes
	500 - 599
**/
$config['RC']['INTERNAL_SERVER_ERROR'] = 500;
$config['RM']['INTERNAL_SERVER_ERROR'] = "Internal Server Error";

$config['RC']['NOT_IMPLEMENTED'] = 501;
$config['RM']['NOT_IMPLEMENTED'] = "Not Implemented";

$config['RC']['BAD_GATEWAY'] = 502;
$config['RM']['BAD_GATEWAY'] = "Bad Gateway";

$config['RC']['SERVICE_UNAVAILABLE'] = 503;
$config['RM']['SERVICE_UNAVAILABLE'] = "Service Unavailable";

$config['RC']['GATEWAY_TIMEOUT'] = 504;
$config['RM']['GATEWAY_TIMEOUT'] = "Gateway Timeout";

$config['RC']['INSUFFICIENT_STORAGE'] = 507;
$config['RM']['INSUFFICIENT_STORAGE'] = "Insufficient Storage";