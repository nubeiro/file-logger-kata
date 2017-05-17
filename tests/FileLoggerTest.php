<?php
declare(strict_types=1);

namespace Nubeiro;

use Nubeiro\FileLogger;
use PHPUnit\Framework\TestCase;

class FileLoggerTest extends TestCase
{

    public function testItLogs()
    {
        $this->assertTrue((new FileLogger())->log("message"));
    }
}
