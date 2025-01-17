<?php


use CTApi\CTConfig;
use CTApi\Exceptions\CTConfigException;
use CTApi\Requests\PersonRequest;
use PHPUnit\Framework\TestCase;

class ConfigExceptionTest extends TestCase
{
    protected function setUp(): void
    {
        CTConfig::clearConfig();
    }

    public function testApiUrlEmpty(): void
    {
        $this->expectException(CTConfigException::class);
        // CTConfig: API-Url is not set
        PersonRequest::whoami();
    }

    public function testApiUrlEmptyValidate(): void
    {
        $this->expectException(CTConfigException::class);
        // CTConfig: API-Url is not set
        CTConfig::validateConfig();
    }
}