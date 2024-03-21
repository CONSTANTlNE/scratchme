<?php

use Illuminate\Support\Facades\Log;

function logExecutionTime($name, $start, $end) {
    $executionTime = ($end - $start) / 1e+6; // Convert nanoseconds to milliseconds
    Log::channel('execution_time')->info("{$name} - Execution time: {$executionTime} milliseconds");
}