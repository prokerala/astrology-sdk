<?php 

/*
 * (c) YOUR NAME <your@email.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Astrology;


class Http {
	private $ch;
    private $base_uri;
    
	private $response = null;
	private $response_code = null;

	public function __construct() {
		$this->ch = curl_init();

        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($this->ch, CURLOPT_ENCODING, '');
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Prokerala SDK API Request');
	}

	public function setAccessToken($access_token) {
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, ['Authorization: bearer '. $access_token]);
	}

	public function setBaseUri($base_uri) {
		$this->base_uri = $base_uri;
	}
	
	public function get($slug, $params) {
		
		$get_parameters = http_build_query($params);
		$url = $this->base_uri . $slug;
		$parsed_url = parse_url($url);
		
		if (isset($parsed_url['query']) && !empty($parsed_url['query'])) {
			$url .= "&{$get_parameters}";
		} else {
			$url .= "?{$get_parameters}";
		}

        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, null);
        curl_setopt($this->ch, CURLOPT_HTTPGET, true);
    	curl_setopt($this->ch, CURLOPT_URL, $url);
        $output = curl_exec($this->ch);
        $this->response_code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
        curl_close($this->ch);
        
        $this->response = $output;
        return $this->response_code ;
    }
    
    public function getResponseCode() {
        return $this->response_code;
    }

	public function post($slug, $params) {
		$post_parameters = http_build_query($params);

		curl_setopt($this->ch, CURLOPT_URL, $this->base_uri . $slug);
		curl_setopt($this->ch, CURLOPT_POST, count($post_parameters));
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post_parameters);    

		$output = curl_exec($this->ch);
        $this->response_code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
		curl_close($this->ch);
        $this->response = $output;
        return $this->response_code ;
    }
    
    public function jsonToArray() {
        return json_decode($this->response, true);
    }

    public function getResponse () {
        return new Data($this->response);
    }
}