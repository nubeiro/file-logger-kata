<?php

namespace Nubeiro;

class FileLogger
{
    private $logFile = "file.log";

    public function log($message)
    {
        $result  = file_put_contents($this->logFile, $message);
        if ($result === false) {
            return false;
        }

        return true;
    }

    public function read()
    {
        return file_get_contents($this->logFile);
    }
}
