# File logger kata

My PHP7.1 version of file logger kata, using  ~~phpSpec~~ PHPUnit.
See https://github.com/ardalis/kata-catalog/blob/master/katas/File%20Logger.md.


# Instructions #

1. Write a class 'FileLogger' with one method, ``Log(string message)``.

1. When this method is called, it should append the message to the end of a file, "log.txt", located in the same folder as the running application (or tests).

1. If the file doesn't exist, create it. If it does exist, use it and append to it.

1. Now update the method so that it writes to a file called logYYYYMMDD.txt, where YYYYMMDD corresponds to the current date.

1. Verify that a new file is created if it doesn't exist on each new day.

1. The IT manager doesn't want to have to open multiple files on Mondays. Any time logging is occurring on a Saturday or Sunday, have it log to a file called "weekend.txt". If it already exists, it can just append to it.

1. Actually, the manager just gave us new requirements. The first time you log to a file on a new weekend, make sure you start with a fresh "weekend.txt" file.

# To run tests

    php composer install
    ./vendor/bin/phpunit
