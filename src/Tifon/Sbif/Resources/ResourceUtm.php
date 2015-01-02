<?php


namespace Tifon\Sbif\Resources;

use Tifon\Sbif\Resources\Resource;
use Tifon\Sbif\Resources\ResourceInterface;


class ResourceUtm extends Resource implements ResourceInterface {
    public function getResourceKey() {

        return 'UTMs';
    }

    public function getResourceName() {

        return 'utm';
    }
}
