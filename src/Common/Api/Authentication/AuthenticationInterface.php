<?php
declare(strict_types=1);

namespace Prokerala\Common\Api\Authentication;

use Psr\Http\Message\RequestInterface;

interface AuthenticationInterface
{
    public function process(RequestInterface $request);
    public function handleError($message, $code);
}
