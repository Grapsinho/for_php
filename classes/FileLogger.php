<?php

namespace classes;

class FileLogger {
    private static $logMessage = [];

    public static function logFunc($message) {
        self::$logMessage[] = $message;
    }

    public static function logAllMessage() {
        return implode("\n",self::$logMessage);
    }
}

FileLogger::logFunc('Message 1');

FileLogger::logFunc('Message 2')

?>