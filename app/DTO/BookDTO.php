<?php

namespace App\DTO;

class BookDTO
{
    public  $user_id;
    public $images;
    public $translations;
    public function __construct($images, $user_id, $translations)
    {
        $this->images = $images;
        $this->user_id = $user_id;
        $this->translations = $translations;
    }
}
