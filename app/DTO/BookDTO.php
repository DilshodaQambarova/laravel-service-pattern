<?php

namespace App\DTO;

class BookDTO
{
    public string $title;
    public  $user_id;
    public string $content;
    public $images;
    public $translations;
    public function __construct($title, $content, $images, $user_id, $translations)
    {
        $this->title = $title;
        $this->content = $content;
        $this->images = $images;
        $this->user_id = $user_id;
        $this->translations = $translations;
    }
}
