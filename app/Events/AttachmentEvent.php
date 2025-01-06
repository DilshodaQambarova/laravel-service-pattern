<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AttachmentEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public array|UploadedFile $files,
        public MorphOne|MorphMany|MorphToMany|null $relation = null,
        public string $path = 'files',
        public ?string $identifier = null
    ) {
    }
}
