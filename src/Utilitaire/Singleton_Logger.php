<?php

namespace App\Utilitaire;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Singleton_Logger extends Logger
{
    private static $_instance = null;


    public function __construct(string $name, array $handlers = [], array $processors = [], ?DateTimeZone $timezone = null)
    {
        parent::__construct($name, $handlers, $processors, $timezone );

    }



    public static function getInstance():Logger {


        if(is_null(self::$_instance)) {
            self::$_instance = new Singleton_Logger('cafe');
            $dateDuJour = date('Y-m-d');
            self::$_instance->pushHandler(new StreamHandler(__DIR__.'/'.$dateDuJour.'_app.log', Logger::DEBUG));
            self::$_instance->pushProcessor(function ($record) {
                $record['extra']['IP'] = $_SERVER['REMOTE_ADDR'];
                return $record;
            });

        }

        return self::$_instance;
    }
}