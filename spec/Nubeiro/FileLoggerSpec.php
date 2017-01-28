<?php

namespace spec\Nubeiro;

use Nubeiro\FileLogger;
use Nubeiro\Writer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileLoggerSpec extends ObjectBehavior
{
    function let(Writer $writer)
    {
        $this->beConstructedWith($writer);
    }

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

    function it_logs_messages($writer)
    {
        $message = "info message to be logged";
        $writer->write($message)->willReturn(true);
        $this->log($message)->shouldReturn(true);
    }

    /**
     * @todo this test does not belong here, needs to be moved to writer implementation.
     *       fileLogger test should not include writer implementation details.
     *
     * @param $writer
     */
    function it_appends_messages($writer)
    {
        $message1 = "first message";
        $message2 = "last message";
        $writer->write($message1)->willReturn(true);
        $writer->write($message2)->willReturn(true);
        $this->log($message1)->shouldReturn(true);
        $this->log($message2)->shouldReturn(true);
    }

    /**
     * @todo provide reader interface and set expectations, broken test
     */
    function it_reads_messages($writer)
    {
        $messages = [
            "info message to be logged",
            "first message",
            "last message",
        ];
        array_map(function ($message) use ($writer) {
            $writer->write($message)->willReturn(true);
        }, $messages);

        array_map(function($message) {
            $this->log($message)->shouldReturn(true);
        }, $messages);
    }

}
