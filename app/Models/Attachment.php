<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\URL;

class Attachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'extra_identifier',
        'title',
        'path',
        'size',
        'type',
        'attachment_type',
        'attachment_id',
    ];

    public function url(): Attribute
    {
        return Attribute::make(fn(): string => URL::to('storage/' . $this->path));
    }
    public function attachment(): MorphTo
    {
        return $this->morphTo();
    }
}
