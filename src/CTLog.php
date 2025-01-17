<?php


namespace CTApi;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class CTLog
{
    private const LOG_FILE = __DIR__ . '/../churchtools-api.log';
    private const LOG_FILE_WARNING = __DIR__ . '/../churchtools-api-warning.log';

    private static ?Logger $logger = null;
    private static bool $fileLogEnabled = true;
    private static bool $consoleLogEnabled = true;

    // Log-Level: https://github.com/Seldaek/monolog/blob/main/doc/01-usage.md#log-levels
    private static int $consoleLogLevel = Logger::ERROR;

    public static function getLog(): Logger
    {
        if (is_null(self::$logger)) {
            self::createLog();
        }
        if (isset(self::$logger)) {
            return self::$logger;
        }
        return new Logger('CTLogger');
    }

    private static function createLog(): void
    {
        self::$logger = new Logger('CTApi');

        if (self::$fileLogEnabled) {
            self::$logger->pushHandler(new StreamHandler(self::LOG_FILE, Logger::INFO));
            self::$logger->pushHandler(new StreamHandler(self::LOG_FILE_WARNING, Logger::WARNING));
        }
        if (self::$consoleLogEnabled) {
            self::$logger->pushHandler(new StreamHandler('php://stdout', self::$consoleLogLevel));
        }
    }

    public static function enableFileLog($enabled = true): void
    {
        self::$fileLogEnabled = $enabled;
        self::createLog();
    }

    public static function enableConsoleLog($enabled = true): void
    {
        self::$consoleLogEnabled = $enabled;
        self::createLog();
    }

    public static function setConsoleLogLevelError(): void
    {
        self::$consoleLogLevel = Logger::ERROR;
        self::createLog();
    }

    public static function setConsoleLogLevelDebug(): void
    {
        self::$consoleLogLevel = Logger::DEBUG;
        self::createLog();
    }
}