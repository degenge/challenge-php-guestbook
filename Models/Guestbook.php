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


}