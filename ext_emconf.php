<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Trans-Ladder',
    'description' => 'Do weird things to your content',
    'category' => 'be',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'author' => 'Cedric Ziel',
    'author_email' => 'cedric@cedric-ziel.com',
    'author_company' => '',
    'version' => '8.5.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.5.0-8.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'CedricZiel\\Transladder\\' => 'Classes'
        ]
    ]
];
