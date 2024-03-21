<?php

namespace App\Listeners;

use App\Events\ArticleDeletedEvent;
use App\Mail\ArticleDeletedMail;
use Illuminate\Support\Facades\Mail;

class SendMailOnArticleDeletedListener
{
    public function handle(ArticleDeletedEvent $event): void
    {
        if ($address = config('mail.from.admin')) {
            Mail::to($address)->send(new ArticleDeletedMail($event->article()));
        }
    }
}
