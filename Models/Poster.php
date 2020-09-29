<?php

declare(strict_types=1);

const FILE_FOLDER = 'Data';
const FILE_NAME   = 'guestbook_data.txt';
const FILE_PATH   = DIRECTORY_SEPARATOR . FILE_FOLDER . DIRECTORY_SEPARATOR . FILE_NAME;

class Poster
{

    public static function save(Guestbook $guestbookItem): void
    {
        try {
            $data = serialize($guestbookItem) . PHP_EOL;
            $file = getcwd() . FILE_PATH;
            file_put_contents($file, $data, FILE_APPEND);

        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public static function get()
    {
        $data = [];
        try {
            $file = getcwd() . FILE_PATH;
            $data = explode("\n", file_get_contents($file));
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        return $data;
    }
}