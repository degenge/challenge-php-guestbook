<?php

declare(strict_types=1);

class Guestbook
{
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
        $guestbookItems = [];
        foreach (Poster::get() as $guestbookItem) {
            $guestbookItems[] = unserialize($guestbookItem, [self::class]);
        }
        return $guestbookItems;
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