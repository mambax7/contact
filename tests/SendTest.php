<?php

use PHPUnit\Framework\TestCase;
use XoopsModules\Contact\ContactHandler;

class SendTest extends TestCase
{
    public function testSendWithValidData()
    {
        // Mock the ContactHandler
        $contactHandlerMock = $this->createMock(ContactHandler::class);
        $contactHandlerMock->expects($this->once())
            ->method('contactInfoProcessing')
            ->willReturn([
                'contact_name' => 'John Doe',
                'contact_mail' => 'john.doe@example.com',
                'contact_subject' => 'Test Subject',
                'contact_message' => 'Test Message',
            ]);
        $contactHandlerMock->expects($this->once())
            ->method('insert')
            ->willReturn(true);
        $contactHandlerMock->expects($this->once())
            ->method('contactSendMail')
            ->willReturn('Message sent');

        // Replace the original ContactHandler with the mock
        $GLOBALS['contactHandler'] = $contactHandlerMock;

        // Set up the POST data
        $_POST['contact_name'] = 'John Doe';
        $_POST['contact_mail'] = 'john.doe@example.com';
        $_POST['contact_subject'] = 'Test Subject';
        $_POST['contact_message'] = 'Test Message';
        $_POST['submit'] = 'submit';
        $_POST['op'] = 'save';
        $_POST['csrf_token'] = $GLOBALS['xoopsSecurity']->generateToken();

        // Set up the server environment
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';

        // Include the script to be tested
        // This is not ideal, but it's the only way to test this script
        // We will catch the redirect exception
        try {
            require_once dirname(__DIR__) . '/send.php';
        } catch (\Exception $e) {
            $this->assertStringContainsString('Redirect', $e->getMessage());
        }
    }
}
