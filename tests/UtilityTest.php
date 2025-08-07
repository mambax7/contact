<?php

use PHPUnit\Framework\TestCase;
use XoopsModules\Contact\Utility;

class UtilityTest extends TestCase
{
    public function testConvertToInnoDBWithMyISAM()
    {
        $dbMock = $this->getMockBuilder(\XoopsDatabase::class)
            ->disableOriginalConstructor()
            ->addMethods(['query', 'fetchRow', 'queryF'])
            ->getMock();

        $dbMock->expects($this->once())
            ->method('query')
            ->with("SELECT ENGINE FROM information_schema.TABLES WHERE TABLE_SCHEMA = '" . XOOPS_DB_NAME . "' AND TABLE_NAME = '" . XOOPS_DB_PREFIX . "_contact'")
            ->willReturn(true);

        $dbMock->expects($this->once())
            ->method('fetchRow')
            ->willReturn(['myisam']);

        $dbMock->expects($this->once())
            ->method('queryF')
            ->with('ALTER TABLE ' . XOOPS_DB_PREFIX . '_contact ENGINE=InnoDB');

        $GLOBALS['xoopsDB'] = $dbMock;

        $utility = new Utility();
        $utility->convertToInnoDB('contact');
    }

    public function testConvertToInnoDBWithInnoDB()
    {
        $dbMock = $this->getMockBuilder(\XoopsDatabase::class)
            ->disableOriginalConstructor()
            ->addMethods(['query', 'fetchRow', 'queryF'])
            ->getMock();

        $dbMock->expects($this->once())
            ->method('query')
            ->with("SELECT ENGINE FROM information_schema.TABLES WHERE TABLE_SCHEMA = '" . XOOPS_DB_NAME . "' AND TABLE_NAME = '" . XOOPS_DB_PREFIX . "_contact'")
            ->willReturn(true);

        $dbMock->expects($this->once())
            ->method('fetchRow')
            ->willReturn(['innodb']);

        $dbMock->expects($this->never())
            ->method('queryF');

        $GLOBALS['xoopsDB'] = $dbMock;

        $utility = new Utility();
        $utility->convertToInnoDB('contact');
    }
}
