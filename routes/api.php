<?php

use App\Http\Controllers\Api\V1\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function ()
{
    Route::post('submit',    [ SubmissionController::class, 'submit' ]);
});