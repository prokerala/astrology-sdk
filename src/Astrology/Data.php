<?php 

/*
 * (c) Ennexa Technologies <api@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Astrology;

class Data
{

    private $data;
    
    /**
     * Initialize a new Data object
     * 
     * @param array $data Response data
     */
    public function __construct(stdClass $data)
    {
        $this->data = $data;
    }

    /
    public function jsonToArray()
    {
        $jsonObj  = json_decode($this->data, true);
        if (is_null($jsonObj)) {
            return ['status' => 'error', 'message' => 'Requested string is not a valid json. '. json_last_error_msg()];
        }

        return $jsonObj;
    }
}