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
            $objData = serialize($guestbookItem);
            $file    = getcwd() . FILE_PATH;
            file_put_contents($file, $objData, FILE_APPEND);

        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public static function get()
    {
        $objData = [];
        try {
            $file    = getcwd() . FILE_PATH;
            $objData = file_get_contents($file);
            $test = unserialize(file_get_contents($file), [Guestbook::class]);
//
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        return $objData;
    }
}