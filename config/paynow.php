<?php

return [
    'integration_id' => env('PAYNOW_INTEGRATION_ID'),
    'integration_key' => env('PAYNOW_INTEGRATION_KEY'),
    'result_url' => env('PAYNOW_RESULT_URL'),
    'return_url' => env('PAYNOW_RETURN_URL'),
    'sandbox' => env('PAYNOW_SANDBOX', true), // Ensure sandbox is enabled
];
