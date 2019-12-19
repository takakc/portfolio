<?php

return [
    'direction' => [
        'sendAdmin' => 1,
        'sendUser' => 2,
    ],
    'blog_path' => env('BLOG_PATH', public_path() . '/assets/blogs/'),
];
