<?php

namespace Tifon\Sbif\Util;

use Tifon\Sbif\Resources\Resource;
use Httpful\Response;


/**
 *
 */
class Result implements \Iterator{

    private $resource;

    private $data = array();

    public function __construct(Resource $resource, Response $response) {
        $this->resource = $resource;

        $resourceKey = $this->resource->getResourceKey();

        $this->data = $response->body->{$resourceKey};
    }

    public function fetchAll() {

        return $data;
    }


    /* Implementations of Iterator. */

    public function key() {

        return key($this->data);
    }

    public function rewind() {

        reset($this->data);
    }

    public function current() {

        return current($this->data);
    }

    public function next() {

        return next($this->data);
    }

    public function valid() {
        $key = key($this->data);

        return ($key !== NULL && $key !== FALSE);
    }
}
