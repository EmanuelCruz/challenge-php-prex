<?php

return [
    'api_key' => env('GIPHY_API_KEY', null),
    'url' => [
        'search' => 'api.giphy.com/v1/gifs/search',
        'search-by-id' => 'api.giphy.com/v1/gifs/{id}',
    ],
];
