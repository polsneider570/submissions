<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitRequest;
use App\Jobs\SaveSubmissionJob;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Facades\Log;

class SubmissionController extends Controller
{
    public function submit(SubmitRequest $request) {
        $data = $request->validated();

        try {
            SaveSubmissionJob::dispatch($data['name'], $data['email'], $data['message']);
            return response()->json(['success' => 'ok'], 200);
        } catch (Exception $e) {
            Log::error("Job Dispatch Error: " . $e->getMessage());

            return response()->json(['error' => 'Unable to process submission.'], 500);
        }
    }
}
