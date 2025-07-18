<?php

declare(strict_types=1);

namespace CashonRails\Service;

use Psr\Log\LogLevel;

class Logger extends \Katzgrau\KLogger\Logger
{
    private $debugLogger;

    public function __construct($debug = false)
    {
        $this->debugLogger = (bool) $debug;
        parent::__construct(
            'data',
            $this->debugLogger ? LogLevel::DEBUG : LogLevel::INFO,
            [
                'extension' => 'log',
                'filename' => 'plugin',
            ]
        );
    }

    public function write($message)
    {
        if ($this->debugLogger) {
            echo $message, "\n";
        }
        parent::write($message);
    }
}
