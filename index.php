<?php

use Afbora\KirbyLatte\Template;
use Kirby\Cms\App as Kirby;

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('afbora/kirby-latte', [
    'options' => [
        'autoRefresh' => true,
        'templatesDirectory' => null,
        'tempDirectory' => null,
        'filters' => [],
        'functions' => [],
        'macros' => [],
    ],
    'components' => [
        'template' => function (Kirby $kirby, string $name, string $contentType = null) {
            return new Template($kirby, $name, $contentType);
        }
    ],
    'routes' => [
        [
            // Block all requests to /url.latte and return 404
            'pattern' => '(:all)\.latte',
            'action' => function ($all) {
                return false;
            }
        ]
    ]
]);
