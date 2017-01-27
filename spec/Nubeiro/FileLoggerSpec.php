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

    function it_logs_messages()
    {
        $this->log("info message to be logged")->shouldReturn(true);
    }

    function it_appends_messages()
    {
        $this->log("first message")->shouldReturn(true);
        $this->log("last message")->shouldReturn(true);
    }

    function it_reads_messages()
    {
        $this->read()->shouldContain("info message to be logged");
        $this->read()->shouldContain("first message");
        $this->read()->shouldContain("last message");
    }

}
