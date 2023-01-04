<?php

namespace App\Utils;

class Loggerbis
{
    /**
     * A file pointer resource of the log file.
     */
    private $fileHandle;
    private static $_instance;


    private function __construct()
    {
        $this->fileHandle = fopen('logger.txt', 'a');
    }

    /**
     * The method you use to get the Loggerbis's instance.
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {

            self::$_instance = new Loggerbis();
        }
        return self::$_instance;
    }

    /**
     * Write a log entry to the opened file resource.
     */
    public function writeLog(string $message): void
    {
        $date = date('Y-m-d');
        fwrite($this->fileHandle, "$date: $message\n");
    }

    /**
     * Just a handy shortcut to reduce the amount of code needed to log messages
     * from the client code.
     */
    public static function log(string $message): void
    {
        $logger = self::getInstance();
        $logger->writeLog($message);
    }
}