<?php

namespace Novocast\Liquifire;

class Liquifire
{
    
    private $request = [];
    private $requestUrl = '';
    
    private $endpoint = '';
    private $urls = [];
    private $version = 'web';

    private $params = [];
    

    public function __construct()
    {
        if ($this->hasValidConfig()) {
            $this->setup();

        } else {
            throw new \ErrorException('Invalid Config File');

        }
    }
    

    /**
     * Validate configuration file
     * @throws \ErrorException
     */
    protected function hasValidConfig()
    {
        
        $valid = true;

        if (!\Config::has('liquifire')) {
            throw new \ErrorException('Unable to find config file.');
            $valid = false;

        }

        $config = \Config::get('liquifire');
            
        if (!array_key_exists('endpoint', $config) || empty($config['endpoint'])) {
            throw new \ErrorException('URL endpoint is not set in config file.');
            $valid = false;
        }

        if (!array_key_exists('urls', $config) || !count($config['urls'] < 1)) {
            throw new \ErrorException('Service URL is not set in config file');
            $valid = false;
        }
            
        if (!array_key_exists('version', $config) || empty($config['version'])) {
            throw new \ErrorException('Version is not set in config file');
            $valid = false;
        }

        return $valid;
    }
    

    /**
     * Setup config
     */
    protected function setup()
    {
        $config = \Config::get('liquifire');
            
        // Assisgn values
        $this->endpoint         = $config['endpoint'];
        $this->urls             = $config['urls'];
        $this->version          = $config['version'];
        
        return $this;
    }
    
    /**
     * Set the end point for the API. This dictates format of response. JSON is default
     * @param array $param
     * @return object $this
     */
    protected function setParameters($parameters = false)
    {
        if ($parameters !== false && is_array($parameters)) {
            // is given endpoint correct
            $this->parameters =  $parameters;

        }
        
        return $this;
    }
    
    /**
     * Set the end point for the API. This dictates format of response. JSON is default
     * @param array $param
     * @return object $this
     */
    protected function setEndPoint($endpoint = false)
    {
        $this->requestEndPoint = 'json.ws';
        
        if ($endpoint !== false && array_key_exists($endpoint, $this->endPoints)) {
            // is given endpoint correct
            $this->requestEndPoint =  $endpoint;

        }
        
        return $this;
    }
    
    /**
     * Build request URL from config and parameters
     * @return $this
     */
    protected function buildRequestURL()
    {
        $params = [];
        $this->requestUrl = $this->endpoint.'?'.$this->getRequestParams().'&'.$this->getRequestService().'&';

        /*
            myyears.liquifire.com/myyears?set=line1[fdskjhfdskjhsfdkjhsfdkhjdsfkhdsf],prodID[BZ25_NN],version[web]&call=url[file:dev_1_products/displayProduct]&scale=size[1048]&sink
        */

        return $this;
    }
    
    /**
     * Make an API request
     * @return object
     */
    protected function makeRequest()
    {
        $this->buildRequestURL();
      
        $ch = curl_init($this->requestUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
       
        if ($output === false) {
            throw new \ErrorException(curl_error($ch));
        }

        curl_close($ch);
        return $output;

    }

    public function parseResponse($response)
    {
        return $response;
        
    }

    /**
     * Returns last request URL string
     * @return string last url string
     */
    public function getLastRequestURL()
    {
        return $this->requestUrl;
        
    }
}
