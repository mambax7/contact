<?php

use PHPUnit\Framework\TestCase;
use XoopsModules\Contact\ContactHandler;
use XoopsModules\Contact\Helper;

class ContactHandlerTest extends TestCase
{
    private $contactHandler;
    private $helperMock;

    protected function setUp(): void
    {
        $dbMock = $this->createMock(\XoopsDatabase::class);
        $this->helperMock = $this->createMock(Helper::class);

        $this->contactHandler = new ContactHandler($dbMock);

        // Manually set the helper mock
        $reflection = new \ReflectionClass($this->contactHandler);
        $property = $reflection->getProperty('helper');
        $property->setAccessible(true);
        $property->setValue($this->contactHandler, $this->helperMock);
    }

    public function testGetIP()
    {
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';
        $this->assertEquals('127.0.0.1', $this->contactHandler->getIP());

        $_SERVER['HTTP_X_FORWARDED_FOR'] = '192.168.1.1';
        $this->assertEquals('192.168.1.1', $this->contactHandler->getIP());
    }

    public function testAnonymizeIP()
    {
        $this->assertEquals('192.168.1.0', $this->contactHandler->anonymizeIP('192.168.1.100'));
        $this->assertEquals('2001:db8:85a3::', $this->contactHandler->anonymizeIP('2001:db8:85a3:8d3:1319:8a2e:370:7348'));
        $this->assertEquals('', $this->contactHandler->anonymizeIP('not an ip'));
    }

    public function testContactToEmails()
    {
        $this->helperMock->method('getConfig')
            ->willReturnMap([
                ['contact_recipient_std', 'test@example.com'],
                ['contact_dept', ['Sales,sales@example.com', 'Support,support@example.com']],
            ]);

        $this->assertEquals(['test@example.com'], $this->contactHandler->contactToEmails());
        $this->assertEquals(['test@example.com', 'sales@example.com'], $this->contactHandler->contactToEmails('Sales'));
        $this->assertEquals(['test@example.com', 'support@example.com'], $this->contactHandler->contactToEmails('Support'));
    }
}
