<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContact;

class Book extends Model implements TranslatableContact
{
    use Translatable;
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['user_id'];
    public function author(){
        return $this->belongsTo(User::class);
    }
}
