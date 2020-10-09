<?php
declare(strict_types=1);

namespace Prokerala\Common\Api\Authentication;

use Psr\Http\Message\RequestInterface;

abstract class BasicAuth implements AuthenticationInterface
{
    /**
     * @param RequestInterface $request
     * @return RequestInterface
     * @internal
     */
    public function process(RequestInterface $request)
    {
        $token = $this->getToken();
        $request = $request->withHeader('Authorization', "Bearer {$token}");
        return $request;
    }

    abstract public function getToken();
}
