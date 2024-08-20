<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Support\Facades\Log;

class SubmissionSavedListener
{
    /**
     * Handle the event.
     */
    public function handle(SubmissionSaved $event): void
    {
        // Доступ к свойствам события
        $name = $event->name;
        $email = $event->email;

        // Логирование
        Log::info("Submission saved: Name - {$name}, Email - {$email}");
    }
}