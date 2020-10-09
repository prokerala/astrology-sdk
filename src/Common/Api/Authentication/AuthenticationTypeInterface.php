<?php

namespace Prokerala\Common\Api\Authentication;

use Psr\Http\Message\RequestInterface;

interface AuthenticationTypeInterface
{
    /**
     * @internal
     * @return RequestInterface
     */
    public function process(RequestInterface $request);

    /**
     * @internal
     * @param string $message
     * @param int    $code
     * @return void
     */
    public function handleError($message, $code);

}
