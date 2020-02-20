<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'category_ids' => [
        'blog' => env('CATEGORY_ID_BLOG', 2),
        'faq' => env('CATEGORY_ID_FAQ', 3),
    ]
];
