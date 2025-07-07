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
$signOne = 'aries';
$signTwo = 'taurus';


try {
    $method = new \Prokerala\Api\Horoscope\Service\DailyLovePrediction($client);
    $result = $method->process($datetime, $signOne, $signTwo);

    print_r($result->getDailyLovePredictions());
} catch (QuotaExceededException $e) {
} catch (RateLimitExceededException $e) {
}
