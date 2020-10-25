<?php

namespace App\Listeners;

use App\Events\CommentPosted;
use App\Mail\commentProductMarkdown;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyUserAboutComment
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CommentPosted $event)
    {
        Mail::to($event->comment->commentable->user->email)->queue(new commentProductMarkdown($event->comment));
    }
}
