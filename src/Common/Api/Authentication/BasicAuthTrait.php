<?php

namespace Prokerala\Common\Api\Authentication;

use Psr\Http\Message\RequestInterface;

trait BasicAuthTrait
{
    /**
     * @return RequestInterface
     */
    public function process(RequestInterface $request)
    {
        $token = $this->getToken();

        return $request->withHeader('Authorization', "Bearer {$token}");
    }
}
