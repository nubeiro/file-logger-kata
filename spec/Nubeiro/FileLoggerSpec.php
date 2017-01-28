<?php

namespace spec\Nubeiro;

use Nubeiro\FileLogger;
use Nubeiro\Reader;
use Nubeiro\Writer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileLoggerSpec extends ObjectBehavior
{
    /**
     * @todo Providing a reader for fileLogger feels like cheating.
     *
     * @param Writer $writer
     * @param Reader $reader
     */
    function let(Writer $writer, Reader $reader)
    {
        $this->beConstructedWith($writer, $reader);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FileLogger::class);
    }

    function it_uses_logfile_with_yyyymmdd_dot_txt_name()
    {
        $this->getFileName()->shouldBe(date('\l\o\gYmd.\tx\t')); // <-- having fun with date formats :-D
    }

    function it_logs_messages(Writer $writer)
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
     * @todo reading from this class seems out of the scope of this kata.
     */
    function it_reads_messages(Reader $reader)
    {
        $message = "info message to be logged";
        $reader->read()->willReturn($message);
        $this->read($message)->shouldReturn($message);
    }

}
