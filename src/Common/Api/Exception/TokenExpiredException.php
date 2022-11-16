<?php

declare(strict_types=1);

namespace Prokerala\Common\Api\Exception;

final class TokenExpiredException extends AuthenticationException implements RetryableExceptionInterface
{
}
