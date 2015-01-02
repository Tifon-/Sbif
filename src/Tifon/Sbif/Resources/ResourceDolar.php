<?php


namespace Tifon\Sbif\Resources;

use Tifon\Sbif\Resources\Resource;
use Tifon\Sbif\Resources\ResourceInterface;

class ResourceDolar extends Resource implements ResourceInterface {
    public function getResourceKey() {

        return 'Dolares';
    }

    public function getResourceName() {

        return 'dolar';
    }
}
