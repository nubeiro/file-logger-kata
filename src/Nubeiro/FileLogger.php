<?php

namespace Nubeiro;

class FileLogger
{
    public function log($message)
    {
        $result = file_put_contents("file.log", $message);
        if ($result === false) {
            return false;
        }

        return true;
    }

    public function read()
    {
        return file_get_contents("file.log");
    }
}
