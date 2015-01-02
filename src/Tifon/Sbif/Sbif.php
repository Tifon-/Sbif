<?php


namespace Tifon\Sbif;

class Sbif {

    const VERSION = '0.1';

    const URI_API_SBIF = 'http://api.sbif.cl/api-sbifv3/recursos_api';

    /**
     * Format key for the query request.
     */
    const FORMAT_KEY = 'formato';

    const CODE_ERROR_KEY = 'CodigoError';

    const ERROR_MESSAGE_KEY = 'Mensaje';


    /**
     * @var string
     */
    protected $apiKey;


    protected $format;

    /**
     * Constructor
     *
     * By default the format will be json.
     */
    public function __construct($apiKey) {

        $this->apiKey = $apiKey;
        $this->format = 'json';
    }

    /**
     *
     */
    public function setFormat($format) {
        $allowedFormat = array('json', 'xml');

        if (in_array($format, $allowedFormat)) {
            $this->format = $format;

            return $this;
        }

        throw new Exception("Error Processing Request");

    }

    public function getFormat() {

        return $this->format;
    }


    public function getApiKey() {

        return $this->apiKey;
    }

    /**
     *
     */
    public function resource($resourceName) {
        $resourceName = strtolower($resourceName);
        $className = '\\Tifon\\Sbif\\Resources\\Resource' . ucfirst($resourceName);
        if (class_exists($className)) {


            return new $className($this);
        }

        throw new Exception("Error Processing Request");

    }

}
