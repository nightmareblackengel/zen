<?php

declare(strict_types=1);

namespace ZenPaymentSdk;

enum ResponseCodes: int
{
    // the request was successful (some API calls may return 201 instead)
    case OK = 200;
    // the request was successful and a resource was created
    case Created = 201;
    // the request was successful, but there is no representation to return (i.e. the response is empty)
    case NoContent = 204;
    // the request could not be understood or was missing required parameters
    case BadRequest = 400;
    // authentication failed or user does not have permissions for requested operation
    case Unauthorized = 401;
    // access denied
    case Forbidden = 403;
    // the resource was not found
    case NotFound = 404;
    // requested method is not supported for the resource
    case MethodNotAllowed = 405;
    // 	the server encountered an unexpected condition that prevented it from fulfilling the request
    case InternalServerError = 500;
    // the server is not ready to handle the request
    case ServiceUnavailable = 503;
}