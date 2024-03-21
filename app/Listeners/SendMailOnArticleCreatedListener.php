<?php

namespace App\Listeners;

use App\Events\ArticleCreatedEvent;
use App\Mail\ArticleCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendMailOnArticleCreatedListener
{
    public function handle(ArticleCreatedEvent $event): void
    {
        if ($address = config('mail.from.admin')) {
            Mail::to($address)->send(new ArticleCreatedMail($event->article()));
        }
    }
}
