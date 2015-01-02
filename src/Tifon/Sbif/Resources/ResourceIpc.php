<?php


namespace Tifon\Sbif\Resources;

use Tifon\Sbif\Resources\Resource;
use Tifon\Sbif\Resources\ResourceInterface;

class ResourceIpc extends Resource implements ResourceInterface {
    public function getResourceKey() {

        return 'IPCs';
    }

    public function getResourceName() {

        return 'ipc';
    }
}
