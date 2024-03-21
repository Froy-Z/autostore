<?php

namespace App\Listeners;

use App\Events\ArticleUpdatedEvent;
use App\Mail\ArticleUpdatedMail;
use Illuminate\Support\Facades\Mail;

class SendMailOnArticleUpdatedListener
{
    public function handle(ArticleUpdatedEvent $event): void
    {
        if ($address = config('mail.from.admin')) {
            Mail::to($address)->send(new ArticleUpdatedMail($event->article()));
        }
    }
}
