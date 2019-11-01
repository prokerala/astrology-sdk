<?php

/**
 * (c) Ennexa <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Ennexa <api@prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology
 */

namespace Prokerala\Common\Api;

use Prokerala\Common\Api\Exception\InvalidArgumentException;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

/**
 * Client
 *
 * PHP version 5
 */
class Client
{
    public $response_code;
    public $base_uri;
    private $_cHandle;
    private $_baseUri = 'https://api.prokerala.com/v1/astrology/';

    private $_response;
    private $_responseCode;

    /**
     * Constructor
     *
     * @param string $key API token value
     */
    public function __construct($key)
    {
        $version = json_decode(file_get_contents(__DIR__ . '/../../../composer.json'))->version;

        $this->_cHandle = curl_init();
        curl_setopt($this->_cHandle, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->_cHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->_cHandle, CURLOPT_AUTOREFERER, true);
        curl_setopt($this->_cHandle, CURLOPT_ENCODING, '');
        curl_setopt($this->_cHandle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->_cHandle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->_cHandle, CURLOPT_USERAGENT, "PHP SDK Client v{$version}");
        curl_setopt($this->_cHandle, CURLOPT_HTTPHEADER, ['Authorization: bearer ' . $key]);
    }

    /**
     * Function used to set the base uri
     *
     * @param string $base_uri base URI
     */
    public function setBaseUri($base_uri)
    {
        $this->_baseUri = $base_uri;
    }

    /**
     * Function used to get response from API (GET Method)
     *
     * @param  string $slug   section URI
     * @param  array  $params request parameters
     * @return array
     */
    public function doGet($slug, $params)
    {
        $get_parameters = http_build_query($params);
        $url = $this->_baseUri . $slug;
        $parsed_url = parse_url($url);

        if (isset($parsed_url['query']) && !empty($parsed_url['query'])) {
            $url .= "&{$get_parameters}";
        } else {
            $url .= "?{$get_parameters}";
        }
        curl_setopt($this->_cHandle, CURLOPT_CUSTOMREQUEST, null);
        curl_setopt($this->_cHandle, CURLOPT_HTTPGET, true);
        curl_setopt($this->_cHandle, CURLOPT_URL, $url);

        $this->_response = curl_exec($this->_cHandle);
        $this->response_code = curl_getinfo($this->_cHandle, CURLINFO_HTTP_CODE);

        //  // curl_close($this->_cHandle);
        // $head = curl_getinfo($this->_cHandle);
        // $ff = '';
        // $head1 = curl_getinfo($this->_cHandle, CURLINFO_PRIVATE);
        // $header_size = curl_getinfo($this->_cHandle, CURLINFO_HEADER_SIZE);
        //  $header = substr($this->_response , 0, $header_size);
        //  $body = substr($this->_response , $header_size);
        //  // print_r($header_size);
        //  // print_r($header);
        //  // print_r($body);
        //  // print_r($head);
        //  // print_r($head1);
        //  // print_r("head1");
        //  // print_r($ff);
        //  $ah = get_headers($url);
        //  print_r($this->response_code);
        //  // print_r($ah);
        //  // print_r($this->_response);
        // echo $this->response;
        // exit;
        $response = $this->jsonToArray($this->_response)->response;
        // print_r($response);
        // exit;
        if (600 == $response->status_code) {
            return $this->jsonToArray($this->_response);
        }
        if (601 == $response->status_code) {
            throw new InvalidArgumentException($response->status_message, $response->status_code);
        }
        if (602 == $response->status_code) {
            throw new QuotaExceededException($response->status_message, $response->status_code);
        }
        if (603 == $response->status_code) {
            throw new RateLimitExceededException($response->status_message, $response->status_code);
        }

        throw new \Exception($response->status_message, $response->status_code);
    }

    /**
     * Function used to get response code
     *
     * @return int
     */
    public function getResponseCode()
    {
        return $this->response_code;
    }

    /**
     * Function used to get response from API (POST Method)
     *
     * @param  string $slug   section URI
     * @param  array  $params request parameters
     * @return array
     */
    public function post($slug, $params)
    {
        $post_parameters = http_build_query($params);

        curl_setopt($this->_cHandle, CURLOPT_URL, $this->base_uri . $slug);
        curl_setopt($this->_cHandle, CURLOPT_POST, count($post_parameters));
        curl_setopt($this->_cHandle, CURLOPT_POSTFIELDS, $post_parameters);

        $this->_response = curl_exec($this->_cHandle);
        $this->response_code = curl_getinfo($this->_cHandle, CURLINFO_HTTP_CODE);
        curl_close($this->_cHandle);

        return $this->jsonToArray($this->_response);
    }

    /**
     * Function used convert json to array
     *
     * @param  array $data json response
     * @param  mixed $flag
     * @return array
     */
    public function jsonToArray($data, $flag = false)
    {
        return $flag ? json_decode($data, true) : json_decode($data);
    }
}
