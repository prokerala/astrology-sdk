<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Numerology\Service\Chaldean;

use App\Prokerala\Module\Numerology\Entity\Name;
use Prokerala\Api\Astrology\Traits\Service\TimeZoneAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Api\Numerology\Result\BalanceNumberResult;
use Prokerala\Api\Numerology\Result\Chaldean\BirthNumberResult;
use Prokerala\Api\Numerology\Result\DestinyResult;
use Prokerala\Api\Numerology\Result\InclusionTableResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\IdentityProviderException;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Traits\Api\ClientAwareTrait;

final class LifePathNumber
{
    use ClientAwareTrait;
    use TimeZoneAwareTrait;

    /** @var string */
    protected $slug = '/numerology/chaldean/lifepath-number';

    /** @var Transformer<IdentityInitialCode> */
    private $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(IdentityInitialCode::class);
        $this->addDateTimeTransformer($this->transformer);
    }

    /**
     * Fetch result from API.
     *
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     **
     * @return BalanceNumberResult
     */
    public function process(\DateTimeImmutable $datetime)
    {
        $parameters = [
            'datetime' => $datetime,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);

        return $this->transformer->transform($apiResponse->data);
    }
}
