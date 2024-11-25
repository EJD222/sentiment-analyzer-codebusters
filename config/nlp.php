<?php

return [
    'default' => env('NLP_PROVIDER', 'meaningcloud'),

    'providers' => [
        'meaningcloud' => [
            'url' => 'https://api.meaningcloud.com/sentiment-2.1',
            'key' => env('MEANINGCLOUD_API_KEY'), // Set this in .env
        ],
        'twinword' => [
            'url' => 'https://twinword-sentiment-analysis.p.rapidapi.com/analyze/',
            'key' => env('TWINWORD_API_KEY'), // Set this in .env
        ],
        'aylien' => [
            'url' => 'https://api.aylien.com/api/v1/sentiment',
            'app_id' => env('AYLIEN_APP_ID'), // Set this in .env
            'key' => env('AYLIEN_API_KEY'),  // Set this in .env
        ],
    ],
];
