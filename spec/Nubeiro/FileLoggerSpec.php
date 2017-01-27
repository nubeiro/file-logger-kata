<?php

namespace spec\Nubeiro;

use Nubeiro\FileLogger;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileLoggerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FileLogger::class);
    }

    /**
     * 2) When this method is called, it should append the message to the end of a file,
     * "log.txt", located in the same folder as the running application (or tests).
     *
     */
    function it_logs_messages()
    {
        $this->log("info message to be logged")->shouldReturn(true);
    }
}
