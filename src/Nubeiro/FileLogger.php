<?php

namespace Nubeiro;

use Nubeiro\Writer;

class FileLogger
{
    protected $fileName;
    /**
     * @var \Nubeiro\Writer
     */
    private $writer;

    public function __construct(Writer $writer)
    {
        $this->fileName = sprintf('log%s.txt', date('Ymd'));
        $this->writer = $writer;
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
        return file_get_contents($this->fileName);
    }
}
