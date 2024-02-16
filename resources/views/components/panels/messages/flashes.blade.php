@php

use App\Services\FlashMessage;
$flashMessages = new FlashMessage();
$errors = $flashMessages->errorMessages();
$successes = $flashMessages->successMessages();
@endphp

@if ($errors->isNotEmpty())
    <x-panels.messages.error :messages="$errors"/>
@endif

@if ($successes->isNotEmpty())
    <x-panels.messages.success :messages="$successes"/>
@endif
