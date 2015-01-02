<?php


namespace Tifon\Sbif\Resources;

use Tifon\Sbif\Resources\Resource;
use Tifon\Sbif\Resources\ResourceInterface;

class ResourceEuro extends Resource implements ResourceInterface {
    public function getResourceKey() {

        return 'Euros';
    }

    public function getResourceName() {

        return 'euro';
    }
}
