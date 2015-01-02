<?php


namespace Tifon\Sbif\Resources;

use Tifon\Sbif\Resources\Resource;
use Tifon\Sbif\Resources\ResourceInterface;

class ResourceTab extends Resource implements ResourceInterface {
    public function getResourceKey() {

        return 'TABs';
    }

    public function getResourceName() {

        return 'tab';
    }
}