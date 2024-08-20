<?php

namespace App\Jobs;

use App\Events\SubmissionSaved;
use App\Models\Submission;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Exception;

class SaveSubmissionJob implements ShouldQueue
{
    use Queueable;

    protected $name;
    protected $email;
    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Submission::create([
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message,
            ]);

            event(new SubmissionSaved($this->name, $this->email));
        } catch (Exception $e) {
            Log::error("Error Saving Submission: " . $e->getMessage());
        }
    }
}
