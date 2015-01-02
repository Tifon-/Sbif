<?php



namespace Tifon\Sbif\Exception;

use Exception;


class CodeErrorApiException extends Exception {


    public function __construct($url, $message, $code = 0, Exception $previous = null) {
        if (is_array($message)) {
            $message = array_shift($message);
        }
        $message .= '. Url: ' . $url;
        parent::__construct($message, $code, $previous);
    }
}
