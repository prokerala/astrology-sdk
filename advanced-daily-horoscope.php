<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

include 'prepend.inc.php';

/** @var \Prokerala\Common\Api\Client $client */

$datetime = new DateTimeImmutable();
$sign = 'aries';
$type = 'general';


try {
    $method = new \Prokerala\Api\Horoscope\Service\DailyPredictionAdvanced($client);
    $result = $method->process($datetime, $sign, $type);

    print_r($result->getDailyPredictions());
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
