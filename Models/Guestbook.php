<?php

declare(strict_types=1);

class Guestbook
{
    const MAX_POSTS = 20;

    private string $author;
    private string $title;
    private string $content;
    private string $postdate;

    /**
     * Guestbook constructor.
     * @param string $author
     * @param string $title
     * @param string $content
     * @param string $postdate
     */
    public function __construct(string $author, string $title, string $content, string $postdate)
    {
        $this->author   = $author;
        $this->title    = $title;
        $this->content  = $content;
        $this->postdate = $postdate;
    }

    public static function getPosts(): array
    {
        $test = Poster::get();
//        var_dump($test);
        $guestbookItems = [];
        foreach ($test as $guestbookItem) {
//            $temp = unserialize($guestbookItem, [__CLASS__]);
//            print_r($temp);
            if (is_object(unserialize($guestbookItem, [__CLASS__]))) {
                $guestbookItems[] = unserialize($guestbookItem, [__CLASS__]);
            }

        }
        return array_slice(array_reverse($guestbookItems), 0, self::MAX_POSTS -1);
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getPostdate(): string
    {
        return $this->postdate;
    }

    public function savePost()
    {
        Poster::save($this);
    }

}