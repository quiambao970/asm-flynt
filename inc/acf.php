<?php

namespace Flynt\Acf;

use Flynt\Utils\Options;

// Website global settings
Options::addGlobal('Website Settings', [
    [
        [
            'name' => 'facebook_url',
            'label' => 'Facebook URL',
            'type' => 'url',
        ],
        [
            'name' => 'pinterest_url',
            'label' => 'Pinterest URL',
            'type' => 'url',
        ],
        [
            'name' => 'instagram_url',
            'label' => 'Instagram URL',
            'type' => 'url',
        ],
        [
            'name' => 'youtube_url',
            'label' => 'Youtube URL',
            'type' => 'url',
        ]
    ],
]);
