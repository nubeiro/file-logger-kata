<?php

namespace spec\Nubeiro;

use Nubeiro\FileLogger;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileLoggerSpec extends ObjectBehavior
{

    function letGo()
    {
        $fileName = $this->getFileName()->getWrappedObject();
        if (file_exists($fileName)) {
            unlink($fileName);
        }
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FileLogger::class);
    }

    function it_uses_logfile_with_yyyymmdd_dot_txt_name()
    {
        $this->getFileName()->shouldBe(date('\l\o\gYmd.\tx\t')); // <-- having fun with date formats :-D
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
        $this->log("info message to be logged")->shouldReturn(true);
        $this->log("first message")->shouldReturn(true);
        $this->log("last message")->shouldReturn(true);
        $this->read()->shouldContain("info message to be logged");
        $this->read()->shouldContain("first message");
        $this->read()->shouldContain("last message");
    }

}
