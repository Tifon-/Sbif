<?php


namespace Tifon\Sbif\Resources;

use Tifon\Sbif\Resources\ResourceInterface;
use Tifon\Sbif\Exception\CodeErrorApiException;
use Tifon\Sbif\Util\Url;
use Tifon\Sbif\Util\Result;
use Tifon\Sbif\Sbif;
use Httpful\Request;


/**
 *
 */
abstract class Resource {

    /**
     * Nombre del recurso.
     */
    protected $resourceName;

    /**
     * Key que usa sbif en su respuesta.
     */
    protected $resourceKey;

    /**
     * Objeto Sbif
     */
    protected $sbif;

    /**
     * Objeto Url
     */
    protected $url;


    public function __construct(Sbif $sbif) {
        $this->sbif = $sbif;

        $this->resourceName = $this->getResourceName();
        $this->resourceKey = $this->getResourceKey();

        $this->url = new Url(Sbif::URI_API_SBIF);
        $this->url->add($this->resourceName);
    }

    /**
     * Define the year for the query.
     *
     * @param int $year
     *
     * @return Tifon\Sbif\Resource\Resource
     */
    public function year($year) {
        $this->url->setYear($year);

        return $this;
    }

    /**
     * Define the month for the query.
     *
     * @param int $month
     *
     * @return Tifon\Sbif\Resource\Resource
     */
    public function month($month) {
        $this->url->setMonth($month);

        return $this;
    }

    /**
     * Define the day for the query.
     *
     * @param int $day
     *
     * @return Tifon\Sbif\Resource\Resource
     */
    public function day($day) {
        $this->url->setDay($day);

        return $this;
    }

    /**
     * Define the query type to after.
     *
     * @return Tifon\Sbif\Resource\Resource
     */
    public function after() {
        $this->url->setQueryType(Url::AFTER);

        return $this;
    }

    /**
     * Define the query type to previous.
     *
     * @return Tifon\Sbif\Resource\Resource
     */
    public function previous() {
        $this->url->setQueryType(Url::PREVIOUS);

        return $this;
    }

    /**
     * Send and get the result from the API.
     *
     * @return \Tifon\Sbif\Util\Result
     */
    public function get() {
        $query = array(
            'apikey' => $this->sbif->getApiKey(),
            Sbif::FORMAT_KEY => $this->sbif->getFormat(),
        );

        $this->url->addQuery($query);

        $url = $this->url->build();

        $request = Request::get($url);

        if ($this->sbif->getFormat() == 'xml') {
            $request->expectsXml();
        }
        else {
            $request->expectsJson();
        }

        try {
            $response = $request->send();
        }
        catch (\Exception $exception) {
            throw new CodeErrorApiException($url, 'Error', 503);
        }


        if ($response->code != 200) {
            throw new CodeErrorApiException($url, $this->response->body->{Sbif::ERROR_MESSAGE_KEY}, $this->response->body->{Sbif::CODE_ERROR_KEY});
        }

        return new Result($this, $response);
    }
}
