<?php

namespace App\Controller;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Main
{
    protected $logger;

    function __construct(){
        $this->logger = new Logger('channel-name');
        $this->logger->pushHandler(new StreamHandler('log/app.log', Logger::DEBUG));
    }
}    