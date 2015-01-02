<?php


namespace Tifon\Sbif\Resources;

use Tifon\Sbif\Resources\Resource;
use Tifon\Sbif\Resources\ResourceInterface;


class ResourceUf extends Resource implements ResourceInterface {
    public function getResourceKey() {

        return 'UFs';
    }

    public function getResourceName() {

        return 'uf';
    }
}
