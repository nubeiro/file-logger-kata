<?php

namespace Nubeiro;

class FileLogger
{
    protected $fileName;
    /**
     * @var \Nubeiro\Writer
     */
    private $writer;

    /**
     * @var Reader
     */
    private $reader;

    public function __construct(Writer $writer, Reader $reader)
    {
        $this->fileName = sprintf('log%s.txt', date('Ymd'));
        $this->writer = $writer;
        $this->reader = $reader;
    }


    public function getFileName()
    {
        return $this->fileName;
    }

    public function log($message)
    {
        return $this->writer->write($message);
    }

    public function read()
    {
        return $this->reader->read();
    }
}
