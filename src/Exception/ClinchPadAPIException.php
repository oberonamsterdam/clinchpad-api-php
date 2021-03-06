<?php

namespace ClinchPad\Exception;

use Exception;

/**
 * Custom ClinchPadAPI Exception.
 *
 * @package ClinchPadClient
 */
class ClinchPadAPIException extends Exception
{

    /**
     * @inheritdoc
     */
    public function __construct($message = "", $code = 0, Exception $previous = NULL)
    {
        // Construct message from JSON if required.
        if (substr($message, 0, 1) == '{') {
            $message_obj = json_decode($message);
            $message = $message_obj->status . ': ' . $message_obj->title . ' - ' . $message_obj->detail;
            if (!empty($message_obj->errors)) {
                $message .= ' ' . serialize($message_obj->errors);
            }
        }

        parent::__construct($message, $code, $previous);
    }

}
