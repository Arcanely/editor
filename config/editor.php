<?php

$unsplash_enabled_in_editor = env('UNSPLASH_EDITOR') && env('UNSPLASH_APP_NAME') && env('UNSPLASH_CLIENT_ID');

/*
 * You can place your custom package configuration in here.
 */
$editorConfig = [
    'holder' => 'editorjs',
    'tools' => [
        'header' => [
            'class' => 'ArcanelyEditor.Header',
            'shortcut' => 'CMD+SHIFT+H',
        ],
        'nestedList' => [
            'class' => 'ArcanelyEditor.NestedList',
            'inlineToolbar' => true,
        ],
        'checklist' => [
            'class' => 'ArcanelyEditor.Checklist',
            'inlineToolbar' => true,
        ],
        'raw' => 'ArcanelyEditor.RawTool',
        'underline' => 'ArcanelyEditor.Underline',
        'inlineCode' => [
            'class' => 'ArcanelyEditor.InlineCode',
            'shortcut' => 'CMD+SHIFT+M',
        ],
        'marker' => 'ArcanelyEditor.Marker',
        'quote' => [
            'class' => 'ArcanelyEditor.Quote',
            'inlineToolbar' => true,
            'shortcut' => 'CMD+SHIFT+Q',
            'config' => [
                'quotePlaceholder' => 'Enter a quote',
                'captionPlaceholder' => 'Quote\'s author',
            ],
        ],
        'image' => 'ArcanelyEditor.SimpleImage',
        'delimiter' => 'ArcanelyEditor.Delimiter',
        'table' => 'ArcanelyEditor.Table',
        'code' => 'ArcanelyEditor.CodeTool',
        'alert' => [
            'class' => 'ArcanelyEditor.Alert',
            'inlineToolbar' => true,
            'shortcut' => 'CMD+SHIFT+A',
            'config' => [
                'defaultType' => 'primary',
                'messagePlaceholder' => 'Enter something',
            ],
        ],
        'AnyButton' => [
            'class' => 'ArcanelyEditor.AnyButton',
            'inlineToolbar' => false,
            'config' => [
                'css' =>[
                    "btnColor" => "btn--gray"
                ]
            ]
        ],
        'link' => [
            'class' => 'ArcanelyEditor.LinkAutocomplete',
            'config' => [ // TODO => https://github.com/editor-js/link-autocomplete
                'endpoint' => 'http://localhost:3000/',
                'queryParam' => 'search'
            ]
        ]
    ]
];


if ($unsplash_enabled_in_editor) {

    $editorConfig['tools']['image'] = [
        'class' => 'ArcanelyEditor.InlineImage',
        'inlineToolbar' => true,
        'config' => [
            'embed' => [
                'display' => "true", // bug. only the string displays the embed panel
            ],
            'unsplash' => [ // TODO: PR: make a display option here too.
                'appName' => env('UNSPLASH_APP_NAME') ?: '',
                'clientId' => env('UNSPLASH_CLIENT_ID') ?: ''
            ]
        ]
    ];

}

return $editorConfig;
