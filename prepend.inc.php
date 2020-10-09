<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

include __DIR__.'/vendor/autoload.php';

const API_KEY = '9e7f22e1be6c801186583cb4a042d5a8a69ffcd874de10b7482abe89fb399b47';

$apiKey = API_KEY === 'YOUR_API_KEY_HERE' ? getenv('API_KEY') : API_KEY;
