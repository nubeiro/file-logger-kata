<?php

namespace Nubeiro;

class FileLogger
{
    protected $fileName;

    public function __construct()
    {
        $this->fileName = sprintf('log%s.txt', date('Ymd'));
    }


    public function getFileName()
    {
        return $this->fileName;
    }

    public function log($message)
    {
        $result  = file_put_contents($this->fileName, $message, FILE_APPEND);
        if ($result === false) {
            return false;
        }

        return true;
    }

    public function read()
    {
        return file_get_contents($this->fileName);
    }
}
