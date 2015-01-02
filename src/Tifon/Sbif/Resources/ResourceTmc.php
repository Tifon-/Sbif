<?php


namespace Tifon\Sbif\Resources;

use Tifon\Sbif\Resources\Resource;
use Tifon\Sbif\Resources\ResourceInterface;

class ResourceTmc extends Resource implements ResourceInterface {
    public function getResourceKey() {

        return 'TMCs';
    }

    public function getResourceName() {

        return 'tmc';
    }
}
