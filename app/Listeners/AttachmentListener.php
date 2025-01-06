<?php

namespace App\Listeners;

use App\Events\AttachmentEvent;
use App\Services\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Arr;

class AttachmentListener
{
    public function __construct(protected AttachmentService $service)
    {
    }
    public function handle(AttachmentEvent $event): void
    {
        $this->service->uploadFile(
            Arr::wrap($event->files),
            $event->relation,
            $event->path,
            $event->identifier
        );
    }
}
